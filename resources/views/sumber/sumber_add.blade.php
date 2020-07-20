@extends('layouts.master')

@section('content')
<form action="{{url('sumber-pemasukan/add')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nama Sumber</label>
      <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Sumber">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Tambah Sumber</button>
    </div>
  </form>
@endsection