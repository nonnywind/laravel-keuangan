@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<form action="{{url('pengeluaran/'.$data->pengeluaran_id)}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('put')}}
    
    <div class="form-group">
      <label for="exampleInputPassword1" style="color: white;">Nominal</label>
      <input name="nominal"  type="number" value="{{$data->nominal}}" class="form-control" id="exampleInputPassword1" placeholder="Nominal">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" style="color: white;">Tanggal</label>
        <input name="tanggal"  type="text" value="{{date('Y-m-d', strtotime($data->tanggal))}}" class="form-control datepicker " id="exampleInputPassword1" placeholder="Tanggal" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" style="color: white;">Keterangan</label>
        <textarea name="keterangan" rows="10" class="form-control">{{$data->keterangan}}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".datepicker").datepicker();
        })
    </script>
@endsection