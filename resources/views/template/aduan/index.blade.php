@extends('template.component.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Aduan</a></div>
                    <div class="breadcrumb-item">List Aduan</div>
                </div>
            </div>
            {{-- edit content --}}
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Aduan</h4>
                                <a href="{{ route('aduan.create') }}" class="btn btn-primary btn-add">Tambah Aduan</a>
                                <a href="{{ route('aduan.mypost') }}" class="btn btn-info btn-add">Lihat Aduan Ku</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>                                 
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Judul Agenda</th>
                                                <th>Pelapor</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                 
                                            @foreach ($dataAduan as $iteration => $item)
                                                <tr>
                                                    <td>{{$iteration+1}}</td>
                                                    <td>{{$item->judul}}</td>
                                                    <td>{{$item->user->warga->nama_warga}}</td>
                                                    <td>
                                                        @if ($item->status == 'ditinjau')
                                                            <div class="badge badge-warning">Perlu Direview</div>
                                                            @elseif($item->status == 'diterima')
                                                                <div class="badge badge-info">Tunggu Tanggapan</div>
                                                            @elseif($item->status == 'ditanggapi')
                                                                <div class="badge badge-success">Telah Ditanggapi</div>
                                                            @else
                                                                <div class="badge badge-danger">Ditolak</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'ditinjau' && $item->users_id == Auth::user()->id)
                                                            <a href="{{ route('aduan.edit', $item->id) }}" class="btn btn-info" title="Edit"><span class="ion-edit"></span></a>
                                                        @elseif( Auth::user()->jabatan->nama_jabatan == 'Super Admin' || Auth::user()->jabatan->nama_jabatan == 'Admin')
                                                            <a href="{{ route('aduan.review', $item->id) }}" class="btn btn-warning" title="Tinjau"><span class="ion-eye"></span></a>
                                                        @else
                                                        @endif
                                                        <a class="btn btn-primary" href="{{ route('aduan.show', $item->id) }}" title="Detail"><i class="ion-ios-information-outline"></i></a>        
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
@push('aduan')
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
            margin-left: 25px;
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
              title: `Apakah anda yakin ingin menghapus aduan `+judul+ ' ?',
              text: "Jika anda hapus, data aduan "+judul+" akan hilang permanen",
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