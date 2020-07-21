<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sumber = \DB::table('sumber')->get();

        return view('sumber.sumber_index', compact('sumber'));
    }

    public function add()
    {
        return view('sumber.sumber_add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        $nama = $request->nama;

        \DB::table('sumber')->insert([
            'id' => \Uuid::generate(4),
            'nama' => $nama,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('sumber-pemasukan');
    }

    public function edit($id)
    {
        $data = \DB::table('sumber')->where('id', $id)->first();

        return view('sumber.sumber_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        \DB::table('sumber')->where('id', $id)->update([
            'nama' => $request->nama,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('sumber-pemasukan');
    }
}
