@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Data Pemasukan</h3>
              <a href="{{url('pemasukan/add')}}" class="btn btn-outline-default">Tambah Pemasukan</a>

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

      {{-- MODAL --}}
  <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
        	
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Apakah kamu yakin menghapus data ini?</h4>
                    
                </div>
                
            </div>
            
            <div class="modal-footer">
                <form action="" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-white">Ok, Got it</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
            
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

      $('body').on('click', '.btn-hapus', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $('#modal-notification').find('form').attr('action', url);
        $('#modal-notification').modal();
      });

    </script>
@endsection