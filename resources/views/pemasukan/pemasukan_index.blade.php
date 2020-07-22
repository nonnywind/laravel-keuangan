@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Data Pemasukan</h3>
              <a href="#" class="btn btn-outline-default">Tambah Pemasukan</a>

            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="table-pemasukan" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">#</th>
                    <th scope="col" class="sort" data-sort="budget">Sumber</th>
                    <th scope="col" class="sort" data-sort="status">Nominal</th>
                    <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                
              </table>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
      </div>
    
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#table-pemasukan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url('pemasukan/yajra')}}',
        columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'rownum', name: 'rownum'},
            {data: 'nama', name: 'nama'},
            {data: 'nominal', name: 'nominal'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            
        ]
    });
        });
    </script>
@endsection