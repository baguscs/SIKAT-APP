@extends('template.component.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Warga</a></div>
                    <div class="breadcrumb-item">List Warga</div>
                </div>
            </div>
            {{-- edit content --}}
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Warga</h4>
                                {{-- @if (Auth::user()->jabatan->nama_jabatan == 'Super Admin') --}}
                                    <a href="{{ route('warga.create') }}" class="btn btn-primary btn-add">Tambah Warga</a>
                                {{-- @endif --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>                                 
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Nama Warga</th>
                                                <th>NIK</th>
                                                <th>Akun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                 
                                            @foreach ($dataWarga as $iteration => $item)
                                                <tr>
                                                    <td>{{$iteration+1}}</td>
                                                    <td>{{$item->nama_warga}}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>
                                                        @if ($item->akun == 'terdaftar')
                                                            <div class="badge badge-success">Aktif</div>
                                                        @else
                                                            <div class="badge badge-danger">Mati</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    {{-- @if (Auth::user()->jabatan->nama_jabatan == 'Super Admin') --}}
                                                        <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-info" title="Edit"><span class="ion-edit"></span></a>
                                                        <a href="{{ route('warga.family', $item->id) }}" type="button" class="btn btn-warning" title="Tambah Anggota Keluarga"><i class="ion-plus-circled"></i></a>
                                                        {{-- @else --}}
                                                        {{-- @endif --}}
                                                        <a class="btn btn-primary" href="{{ route('agenda.show', $item->id) }}" title="Detail"><i class="ion-ios-information-outline"></i></a>
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

  </script>
@endpush