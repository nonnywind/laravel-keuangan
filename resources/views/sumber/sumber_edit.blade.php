@extends('layouts.master')

@section('content')
<form action="{{url('sumber-pemasukan/'.$data->id)}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="form-group">
      
      <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{$data->nama}}" placeholder="Nama Sumber">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Edit Sumber</button>
    </div>
  </form>
@endsection