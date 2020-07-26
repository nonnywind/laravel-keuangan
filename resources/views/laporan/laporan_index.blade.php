@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<form action="{{url('cari-laporan')}}" method="GET">
    {{ csrf_field() }}
   
    <div class="form-group">
        <label for="exampleInputPassword1" style="color: white;">Dari</label>
        <input name="dari"  type="text" class="form-control datepicker " id="exampleInputPassword1" placeholder="Tanggal" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" style="color: white;">Sampai</label>
        <input name="sampai"  type="text" class="form-control datepicker " id="exampleInputPassword1" placeholder="Tanggal" autocomplete="off">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Cari</button>
  </form>

  @if (isset ($pemasukan))
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="mb-0">Data Pemasukan</h3>
                </div>
                <div class="table-responsive">
                    <table id="table-pemasukan" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">#</th>
                            <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                            <th scope="col" class="sort" data-sort="status">Nominal</th>
                            <th scope="col" class="sort" data-sort="budget">Sumber</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukan as $index=>$ps)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{date('d M Y', strtotime($ps->tanggal))}}</td>
                            <td>Rp. {{number_format($ps->nominal, 0)}}</td>
                            <td>{{$ps->nama}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Total Pemasukan</td>
                            <td><b><i>Rp. {{number_format($total_pemasukan, 0)}}</i></b></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  @endif

  @if (isset ($pengeluaran))
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header border-0">
                  <h3 class="mb-0">Data Pengeluaran</h3>
              </div>
              <div class="table-responsive">
                  <table id="table-pemasukan" class="table align-items-center table-flush">
                  <thead class="thead-light">
                      <tr>
                          <th scope="col" class="sort" data-sort="name">#</th>
                          <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                          <th scope="col" class="sort" data-sort="status">Nominal</th>
                          <th scope="col" class="sort" data-sort="budget">Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($pengeluaran as $index=>$pl)
                      <tr>
                          <td>{{$index+1}}</td>
                          <td>{{date('d M Y', strtotime($pl->tanggal))}}</td>
                          <td>Rp. {{number_format($pl->nominal, 0)}}</td>
                          <td>{{$pl->keterangan}}</td>
                      </tr>
                      @endforeach
                      <tr>
                          <td></td>
                          <td>Total Pengeluaran</td>
                          <td><b><i>Rp. {{number_format($total_pengeluaran, 0)}}</i></b></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@endif
    
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".datepicker").datepicker();
        })
    </script>
@endsection