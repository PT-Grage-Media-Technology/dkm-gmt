<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabunganInput;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function downloadWord(Request $request)
    {
        // dd($request->all());
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
        $produkId = $request->query('produk_id');


        // Ambil data berdasarkan user_id
        $tabunganInputs = TabunganInput::whereHas('tabunganKur', function ($query) use ($produkId) {
                                                            $query->where('produk_id', $produkId);
                                                        })->where('user_id', $userId)
                                                        ->get(); // Sesuaikan dengan model dan kolom yang benar

        // Membuat objek PhpWord
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $table = $section->addTable();

        // Menambahkan header tabel
        $table->addRow();
        $table->addCell(2000)->addText('No.');
        $table->addCell(2000)->addText('Nama');
        $table->addCell(2000)->addText('Tanggal');
        $table->addCell(2000)->addText('Nominal');
        $table->addCell(2000)->addText('Sisa Pembayaran');
        $table->addCell(2000)->addText('Sisa Bulan');

        // Menambahkan data ke tabel
        foreach ($tabunganInputs as $index => $input) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($input->tabunganKur->produk->name ?? 'Tidak ada nama');
            $table->addCell(2000)->addText($input->rincian_tanggal_bayar);
            $table->addCell(2000)->addText($input->total_bayar);
            $table->addCell(2000)->addText($input->minus_pembayaran);
            $table->addCell(2000)->addText($input->sisa_bulan);
        }

        // Menyimpan dan mendownload file
        $filename = 'Rincian_Tabungan_'.$userId.'.docx'; // Nama file bisa disesuaikan
        $response = new StreamedResponse(function () use ($phpWord) {
            $writer = IOFactory::createWriter($phpWord, 'Word2007');
            $writer->save('php://output');
        });
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $response->headers->set('Content-Disposition', "attachment; filename=\"$filename\"");

        return $response;
    }
}
