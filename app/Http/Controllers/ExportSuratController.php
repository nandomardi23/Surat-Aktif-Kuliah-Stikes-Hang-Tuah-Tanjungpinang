<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use setasign\Fpdi\Fpdi;

class ExportSuratController extends Controller
{

    private function justifyText($text, $width, $pdf)
    {
        $words = explode(' ', $text);
        $currentLine = '';
        $lines = [];

        foreach ($words as $word) {
            $testLine = $currentLine . ' ' . $word;
            $testWidth = $pdf->GetStringWidth($testLine);
            if ($testWidth > $width) {
                $lines[] = trim($currentLine);
                $currentLine = $word;
            } else {
                $currentLine = $testLine;
            }
        }
        $lines[] = trim($currentLine);

        // Proses penambahan spasi (diubah)
        foreach ($lines as $key => $line) {
            if ($key === count($lines) - 1) break;
            $words = explode(' ', $line);
            $totalSpaces = count($words) - 1;
            if ($totalSpaces === 0) continue;

            $totalWidth = $pdf->GetStringWidth($line);
            $spaceWidth = ($width - $totalWidth) / $totalSpaces;

            // Tambahkan spasi fisik
            $spaces = str_repeat(' ', ceil($spaceWidth / $pdf->GetStringWidth(' ')));
            $newLine = implode($spaces, $words);
            $lines[$key] = $newLine;
        }

        return implode("\n", $lines);
    }


    private function formatTanggal($dateString)
    {
        $bulanIndo = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $date = date_parse($dateString);

        if ($date['error_count'] === 0 && checkdate($date['month'], $date['day'], $date['year'])) {
            return $date['day'] . ' ' . $bulanIndo[$date['month']] . ' ' . $date['year'];
        }

        return 'Tanggal tidak valid'; // Fallback jika parsing gagal
    }

    public function exportSurat(Surat $surat)
    {
        // Eager load relationships
        // $surat->load(['student', 'pejabat', 'status']);
        $surat->load([
            'student',
            'student.prodi',
            'student.semester',
            'pejabat',
            'status'
        ]);

        $pdf = new Fpdi();

        $pdf->AddPage();

        $pdf->setSourceFile(storage_path('app/public/template-surat/template.pdf'));
        $templateId = $pdf->importPage(1);

        $pdf->useTemplate($templateId);

        $pdf->SetFont("Arial", "", 12);

        $pdf->SetXY(115, 49.2); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->nomor_surat, 0, 1);

        // Data Mahasiswa
        $pdf->SetXY(95, 64); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nama_mahasiswa, 0, 1);

        $pdf->SetXY(95, 71); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nim, 0, 1);


        $tglLahir = $this->formatTanggal($surat->student->tanggal_lahir);
        // $ttl =  $surat->student->tempat_lahir . ',' . $tglLahir;
        $pdf->SetXY(95, 78.5); //3.2 inc x 1.1 inc
        $pdf->MultiCell(0, 10, $surat->student->tempat_lahir . ',' . $tglLahir, 0, 1);

        $pdf->SetXY(95, 86); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->jenis_kelamin, 0, 1);

        $alamatMahasiswa = $this->justifyText($surat->student->alamat_mahasiswa, 100, $pdf);
        $pdf->SetXY(95, 95); //3.2 inc x 1.1 inc
        $pdf->MultiCell(100, 6, $alamatMahasiswa, 0, 'l');

        $pdf->SetXY(95, 122); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nama_ayah, 0, 1);


        $pdf->SetXY(95, 129); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->pekerjaan_ayah, 0, 1);

        $pdf->SetXY(95, 137); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nama_ibu, 0, 1);

        $pdf->SetXY(95, 144); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->pekerjaan_ibu, 0, 1);

        $alamatOrangTua = $this->justifyText($surat->student->alamat_orang_tua, 100, $pdf);
        $pdf->SetXY(95, 153); //3.2 inc x 1.1 inc
        $pdf->MultiCell(100, 6, $alamatOrangTua, 0, 'L');

        $deskripsi = "      Adalah benar yang bersangkutan mahasiswa semester " . $surat->student->semester->semesterRomawi . " Program Studi " . $surat->student->prodi->namaProdi . " Stikes Hang Tuah Tanjungpinang.";
        $pdf->SetXY(38, 180); //3.2 inc x 1.1 inc
        $pdf->MultiCell(0, 6, $deskripsi, 0, 1);


        $pdf->SetXY(126, 210); // Posisi di kanan
        $pdf->Cell(0, 10, "Tanjungpinang, Maret 2025", 0, 1);

        // Nama institusi
        $pdf->SetXY(121, 215); // Turun 20mm dari tanggal
        $pdf->Cell(0, 10, "Stikes Hang Tuah Tanjungpinang", 0, 1);

        // Jabatan
        $pdf->SetXY(147, 220); // Turun 20mm dari institusi
        $pdf->Cell(0, 10, $surat->pejabat->jabatan, 0, 1);

        // Garis tanda tangan (panjang 50mm)
        // $pdf->Line(120, 230, 170, 230); // X1=120, Y1=200, X2=170, Y2=200

        // Nama dan gelar
        $pdf->SetXY(117, 250); // 5mm di bawah garis
        $pdf->Cell(0, 10, $surat->pejabat->nama_pejabat, 0, 1);

        // NIK
        $pdf->SetXY(143, 255); // Turun 10mm dari nama
        $pdf->Cell(0, 10, "NIK." . $surat->pejabat->nik, 0, 1);


        //see the results
        $pdf->Output();
    }
}
