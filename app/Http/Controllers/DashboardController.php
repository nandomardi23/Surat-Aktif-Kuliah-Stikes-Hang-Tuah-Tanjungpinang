<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Surat;
// use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        // Gunakan left join dari tabel statuses
        $statusCounts = DB::table('statuses')
            ->leftJoin('surats', 'statuses.id', '=', 'surats.status_id')
            ->select(
                'statuses.nama_status',
                \DB::raw('COUNT(surats.id) as count')
            )
            ->groupBy('statuses.nama_status')
            ->pluck('count', 'nama_status');
        // dd($statusCounts);
        // Format status dengan default 0 untuk semua status yang diperlukan
        $counts = [
            'masuk' => $statusCounts->get('Masuk', 0),
            'proses' => $statusCounts->get('Proses', 0),
            'selesai' => $statusCounts->get('Selesai', 0),
            'ditolak' => $statusCounts->get('Ditolak', 0),
        ];
        return view('pages.dashboard.index', compact('counts'));
    }

    public function getSurat(Request $request)
    {
        $query = Surat::with(['student.prodi', 'status']); // Eager load relasi
        // dd($query);
        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('nim', function ($surat) {
                    return $surat->student->nim ?? '-';
                })
                ->addColumn('nama_mahasiswa', function ($surat) {
                    return $surat->student->nama_mahasiswa ?? '-'; // Sesuaikan dengan nama field yang benar
                })
                ->addColumn('prodi', function ($surat) {
                    return $surat->student->prodi->namaProdi ?? '-';
                })
                ->addColumn('status_surat', function ($surat) {
                    return $surat->status->nama_status ?? '-';
                })
                ->filterColumn('student.nim', function ($query, $keyword) {
                    $query->whereHas('student', function ($q) use ($keyword) {
                        $q->where('nim', 'like', "%{$keyword}%");
                    });
                })
                ->rawColumns(['nim', 'nama_mahasiswa', 'prodi', 'status_surat'])
                ->make(true);
        }
    }
}
