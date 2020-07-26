<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;


class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.laporan_index');
    }

    public function cari(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pemasukan = \DB::table('pemasukan as p')->join('sumber as s', 'p.sumber_pemasukan', '=', 's.id')->whereBetween('tanggal', [$dari, $sampai])->get();
        $total_pemasukan = \DB::table('pemasukan as p')->join('sumber as s', 'p.sumber_pemasukan', '=', 's.id')->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');
        $pengeluaran = \DB::table('pengeluaran')->whereBetween('tanggal', [$dari, $sampai])->get();
        $total_pengeluaran = \DB::table('pengeluaran')->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        return view('laporan.laporan_index', compact('pemasukan', 'pengeluaran', 'total_pemasukan', 'total_pengeluaran', 'dari', 'sampai'));
    }

    public function export_pemasukan($dari, $sampai)
    {
        $title = 'Laporan Pemasukan';

        $pemasukan = \DB::table('pemasukan as p')->join('sumber as s', 'p.sumber_pemasukan', '=', 's.id')->whereBetween('tanggal', [$dari, $sampai])->get();
        $total_pemasukan = \DB::table('pemasukan as p')->join('sumber as s', 'p.sumber_pemasukan', '=', 's.id')->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        Excel::create($title, function ($excel) use ($pemasukan, $total_pemasukan) {
            $excel->sheet('Sheetname', function ($sheet) use ($pemasukan, $total_pemasukan) {

                $sheet->loadView('laporan.laporan_pemasukan_excel')->with('pemasukan', $pemasukan)->with('total_pemasukan', $total_pemasukan);
            });
        })->export('xls');
    }

    public function export_pengeluaran($dari, $sampai)
    {
        $title = 'Laporan Pengeluaran';

        $pengeluaran = \DB::table('pengeluaran')->whereBetween('tanggal', [$dari, $sampai])->get();
        $total_pengeluaran = \DB::table('pengeluaran')->whereBetween('tanggal', [$dari, $sampai])->sum('nominal');

        Excel::create($title, function ($excel) use ($pengeluaran, $total_pengeluaran) {
            $excel->sheet('Sheetname', function ($sheet) use ($pengeluaran, $total_pengeluaran) {

                $sheet->loadView('laporan.laporan_pengeluaran_excel')->with('pengeluaran', $pengeluaran)->with('total_pengeluaran', $total_pengeluaran);
            });
        })->export('xls');
    }
}
