<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = \DB::table('pemasukan as a')->join('sumber as b', 'a.sumber_pemasukan', '=', 'b.id')->get();

        return view('pemasukan.pemasukan_index', compact('data'));
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $pemasukan = DB::table('pemasukan as a')->join('sumber as b', 'a.sumber_pemasukan', '=', 'b.id')->select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'a.pemasukan_id',
            'a.sumber_pemasukan',
            'a.nominal',
            'a.tanggal',
            'a.keterangan',
            'b.nama'
        ]);
        $datatables = Datatables::of($pemasukan);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
}
