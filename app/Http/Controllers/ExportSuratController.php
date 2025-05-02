<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use setasign\Fpdi\Fpdi;

class ExportSuratController extends Controller
{

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


    private function writeCenteredMultiLine($pdf, $text, $centerX, &$y, $maxWidth)
    {
        $lines = explode("\n", $text);

        foreach ($lines as $line) {
            // Hitung posisi X
            $textWidth = $pdf->GetStringWidth(trim($line));
            $x = $centerX - ($textWidth / 2);

            // Tulis teks
            $pdf->SetXY($x, $y);
            $pdf->Cell(0, 6, trim($line));

            // Update posisi Y
            $y += 6;
        }
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

        $pdf->SetFont("Arial", "", 11);

        $pdf->SetXY(115, 49.2); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->nomor_surat, 0, 1);

        // Data Mahasiswa
        $pdf->SetXY(95, 64); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nama_mahasiswa, 0, 1);

        $pdf->SetXY(95, 71); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nim, 0, 1);


        $tglLahir = $this->formatTanggal($surat->student->tanggal_lahir);
        $pdf->SetXY(95, 78.5); //3.2 inc x 1.1 inc
        $pdf->MultiCell(0, 10, $surat->student->tempat_lahir . ', ' . $tglLahir, 0, 1);

        $pdf->SetXY(95, 86); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->jenis_kelamin, 0, 1);

        $pdf->SetXY(95, 95); //3.2 inc x 1.1 inc
        $pdf->MultiCell(100, 6, $surat->student->alamat_mahasiswa, 0, 'J');

        $pdf->SetXY(95, 122); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nama_ayah, 0, 1);


        $pdf->SetXY(95, 129); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->pekerjaan_ayah, 0, 1);

        $pdf->SetXY(95, 137); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nama_ibu, 0, 1);

        $pdf->SetXY(95, 144); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->pekerjaan_ibu, 0, 1);

        $pdf->SetXY(95, 153); //3.2 inc x 1.1 inc
        $pdf->MultiCell(100, 6, $surat->student->alamat_orang_tua, 0, 'J');

        $deskripsi = "      Adalah benar yang bersangkutan mahasiswa semester " . $surat->student->semester->semesterRomawi . " Program Studi " . $surat->student->prodi->namaProdi . " Stikes Hang Tuah Tanjungpinang.";
        $pdf->SetXY(38, 180); //3.2 inc x 1.1 inc
        $pdf->MultiCell(0, 6, $deskripsi, 0, 1);

        // =============== BAGIAN TANDA TANGAN ===============
        $startY = 210; // Posisi awal
        $lineHeight = 6;
        $marginX = 80; // Margin kiri-kanan

        // Posisi untuk konten tengah
        $contentWidth = 150; // Lebar area konten
        $centerX = $marginX + ($contentWidth / 2);

        // Tanggal
        $tanggalText = "Tanjungpinang, " . $this->formatTanggal(date('Y-m-d'));
        $this->writeCenteredMultiLine($pdf, $tanggalText, $centerX, $startY, $contentWidth);
        // $startY += 10;

        // Institusi + Jabatan
        $institusiText = "Stikes Hang Tuah Tanjungpinang\n" . $surat->pejabat->jabatan;
        $this->writeCenteredMultiLine($pdf, $institusiText, $centerX, $startY, $contentWidth);
        $startY += 20;

        // Nama Pejabat
        $this->writeCenteredMultiLine($pdf, $surat->pejabat->nama_pejabat, $centerX, $startY, $contentWidth);
        // $startY += 6;

        // NIK
        $this->writeCenteredMultiLine($pdf, "NIK: " . $surat->pejabat->nik, $centerX, $startY, $contentWidth);

        $pdf->Output();
    }
}
