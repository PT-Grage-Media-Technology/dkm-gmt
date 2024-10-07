<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use App\Models\Anggota;
use App\Models\Tabungankur;
use Illuminate\Http\Request;

class ImputAnggotaController extends Controller
{
    public function showAssignForm(Request $request)
    {
        $anggotaId = $request->query('anggota_id');
        $users = collect();
        $selectedAnggota = null;
        $assignedUsersCount = 0;

        if ($anggotaId) {
            $selectedAnggota = Anggota::with('alamatAnggota')->find($anggotaId);

            if ($selectedAnggota) {
                // Mengambil pengguna berdasarkan alamat anggota dan status persetujuan dalam 1 hari terakhir
                $users = User::select('users.*')
                    ->join('tabungankurs', 'users.id', '=', 'tabungankurs.user_id')
                    ->where('tabungankurs.status_persetujuan', 'Disetujui')
                    ->where('tabungankurs.updated_at', '>=', now()->subDay())
                    ->whereHas('alamat', function ($query) use ($selectedAnggota) {
                        $query->where('rt', $selectedAnggota->alamatAnggota->rt)
                                ->where('rw', $selectedAnggota->alamatAnggota->rw)
                                ->where('kelurahan', $selectedAnggota->alamatAnggota->kelurahan)
                                ->where('kabupaten', $selectedAnggota->alamatAnggota->kabupaten)
                                ->where('kecamatan', $selectedAnggota->alamatAnggota->kecamatan)
                                ->where('provinsi', $selectedAnggota->alamatAnggota->provinsi);
                    })
                    ->distinct()
                    ->orderBy('tabungankurs.updated_at', 'desc')
                    ->get();

                $assignedUsersCount = User::where('anggota_id', $selectedAnggota->id_anggota)->count();
            }
        }

        $anggotas = Anggota::with('alamatAnggota')->get();

        return view('admin.inputanggota', compact('users', 'anggotas', 'selectedAnggota', 'assignedUsersCount'));
    }

    public function assignUserToAnggota(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'anggota_id' => 'required|exists:anggotas,id_anggota',
        ]);

        $user = User::find($request->user_id);
        $anggota = Anggota::find($request->anggota_id);

        if (!$user->alamat || !$anggota->alamatAnggota) {
            return redirect()->back()->withErrors(['Alamat pengguna atau alamat anggota tidak ditemukan.']);
        }

        if ($user->alamat->rt !== $anggota->alamatAnggota->rt ||
            $user->alamat->rw !== $anggota->alamatAnggota->rw ||
            $user->alamat->kelurahan !== $anggota->alamatAnggota->kelurahan ||
            $user->alamat->kabupaten !== $anggota->alamatAnggota->kabupaten ||
            $user->alamat->kecamatan !== $anggota->alamatAnggota->kecamatan ||
            $user->alamat->provinsi !== $anggota->alamatAnggota->provinsi) {
            return redirect()->back()->withErrors(['Alamat tidak sama']);
        }

        $assignedUsersCount = User::where('anggota_id', $anggota->id_anggota)->count();
        if ($assignedUsersCount >= 5) {
            return redirect()->back()->withErrors(['Anggota ini sudah memiliki 5 pengguna yang ditetapkan.']);
        }

        $user->anggota_id = $anggota->id_anggota;
        $user->save();

    // Redirect to the "pembin" page after success
    return redirect()->route('pembin')->with('success', 'Pengguna berhasil ditetapkan ke anggota.');
    }
}
