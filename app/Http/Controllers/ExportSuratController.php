<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use setasign\Fpdi\Fpdi;

class ExportSuratController extends Controller
{
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
        $tglLahir = date('d-m-Y', strtotime($surat->student->tanggal_lahir));
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


        $pdf->SetXY(95, 79); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->tempat_lahir . ',' . $tglLahir, 0, 1);

        $pdf->SetXY(95, 71); //3.2 inc x 1.1 inc
        $pdf->Cell(0, 10, $surat->student->nim, 0, 1);





        //see the results
        $pdf->Output();
    }
}
