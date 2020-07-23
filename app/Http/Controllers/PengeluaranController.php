<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data = \DB::table('pengeluaran')->get();

        return view('pengeluaran.pengeluaran_index', compact('data'));
    }
}
