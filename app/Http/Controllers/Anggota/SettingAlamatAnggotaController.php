<?Php

namespace App\Http\Controllers\anggota;

use Illuminate\Http\Request;
use App\Models\AlamatAnggota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingAlamatAnggotaController extends Controller
{
    public function indexalamatanggota()
    {
        // $anggota = auth()->user();
        $anggota = Auth::guard('anggota')->user();
        $alamatAnggota = AlamatAnggota::where('anggota_id', $anggota->id_anggota)->first();
        return view('anggota.settings.ubah_alamat_anggota', compact('alamatAnggota'));
    }

    public function editalamatanggota()
    {
        // $anggota = auth()->user();
        $anggota = Auth::guard('anggota')->user();
        $alamatAnggota = AlamatAnggota::where('anggota_id', $anggota->id_anggota)->first();
        return view('anggota.settings.edit_alamat_anggota', compact('alamatAnggota'));
    }

    public function createalamatanggota(Request $request)
    {
        $request->validate([
            'alamat_lengkap' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'provinsi' => 'nullable|string',
        ]);

        // $anggota = auth()->user();
        $anggota = Auth::guard('anggota')->user();

        $alamatAnggota = new AlamatAnggota();
        $alamatAnggota->anggota_id = $anggota->id_anggota;
        $alamatAnggota->alamat_lengkap = $request->alamat_lengkap;
        $alamatAnggota->rt = $request->rt;
        $alamatAnggota->rw = $request->rw;
        $alamatAnggota->kelurahan = $request->kelurahan;
        $alamatAnggota->kabupaten = $request->kabupaten;
        $alamatAnggota->kecamatan = $request->kecamatan;
        $alamatAnggota->provinsi = $request->provinsi;
        $alamatAnggota->save();

        return redirect()->route('settingAlamatAnggota')->with('success', 'Alamat anggota berhasil ditambahkan.');
    }

    public function updatealamatanggota(Request $request, $id)
    {
        $request->validate([
            'alamat_lengkap' => 'nullable|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'provinsi' => 'nullable|string',
        ]);

        $alamatAnggota = AlamatAnggota::findOrFail($id);
        $alamatAnggota->update($request->all());

        return redirect()->route('settingAlamatAnggota')->with('success', 'Alamat anggota berhasil diperbarui.');
    }
}
