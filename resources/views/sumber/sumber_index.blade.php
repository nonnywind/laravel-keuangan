@extends('layouts.master')
    
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Managae Sumber Pemasukan</h3>
          <a href="{{url('sumber-pemasukan/add')}}" class="btn btn-outline-default">Tambah Sumber</a>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" >#</th>
                <th scope="col" >Nama</th>
                <th scope="col" >Created At</th>
                <th scope="col" >
                  <center>Action</center>
                </th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
                @foreach ($sumber as $index=>$sb)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$sb->nama}}</td>
                    <td>{{$sb->created_at}}</td>
                    <td>
                      <center>
                        <div>
                          <a href="{{url('sumber-pemasukan/'.$sb->id)}}">
                            <i class="ni ni-ruler-pencil"></i>
                            <span>Edit</span>
                          </a>
                        </div>
                      </center>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        
      </div>
    </div>
  </div>
@endsection