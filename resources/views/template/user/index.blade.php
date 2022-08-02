@extends('template.component.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Pengguna</a></div>
                    <div class="breadcrumb-item">List Pengguna</div>
                </div>
            </div>
            {{-- edit content --}}
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pengguna</h4>
                                @if (Auth::user()->jabatan->nama_jabatan == 'Super Admin')
                                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-add">Tambah Pengguna</a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>                                 
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Nama Pengguna</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                 
                                            @foreach ($dataUser as $iteration => $item)
                                                <tr>
                                                    <td>{{$iteration+1}}</td>
                                                    <td>{{$item->warga->nama_warga}}</td>
                                                    <td>{{ $item->jabatan->nama_jabatan }}</td>
                                                    <td>
                                                        @if ($item->status == 'aktif')
                                                            <div class="badge badge-success">Aktif</div>
                                                        @else
                                                            <div class="badge badge-danger">Mati</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                                            @if (Auth::user()->jabatan->nama_jabatan == 'Super Admin')
                                                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-info" title="Edit"><span class="ion-edit"></span></a>

                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger show_confirm" data-name="{{ $item->warga->nama_warga }}" data-toggle="toolip"><i class="ion-trash-a"></i></button>
                                                                @endif
                                                        </form>   
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end content --}}
        </section>
    </div>
       
@endsection
@push('titlePages')
    {{$titlePage}}
@endpush
@push('user')
    {{$navigation}}
@endpush
@push('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/ionicons/css/ionicons.min.css') }}">
    <style>
        .btn-add{
            margin-left: 660px;
        }
        
    </style>
@endpush
@push('js')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>

      <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>

    

    <script type="text/javascript">
        @if ($message = Session::get('success'))
           swal(
               "Berhasil!",
               "{{ $message }}",
               "success"
           );
       @endif

       $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          var judul = $(this).attr('data-name');
          event.preventDefault();
          swal({
              title: `Apakah anda yakin ingin menghapus akun `+judul+ ' ?',
              text: "Jika anda hapus, data pengguna "+judul+" akan hilang permanen",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  </script>
@endpush