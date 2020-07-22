<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = \DB::table('pemasukan as a')->join('sumber as b', 'a.sumber_pemasukan', '=', 'b.id')->get();

        return view('pemasukan.pemasukan_index', compact('data'));
    }
}
