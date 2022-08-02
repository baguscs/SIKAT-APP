@extends('template.component.base')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Warga</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('warga.index') }}">List Warga</a></div>
                    <div class="breadcrumb-item">Detail Warga</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('warga.update', $warga->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Form Detail Warga</h4>
                    </div>
                    <div class="container">
                        @error('nik')
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                                </div>
                            </div> 
                        @enderror
                        @error('no_kk')
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                                </div>
                            </div> 
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Warga</label>
                                    <input type="text" readonly name="nama_warga" class="form-control" value="{{ $warga->nama_warga }}" required>
                                    <div class="invalid-feedback">Nama warganya siapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>NIK Warga</label>
                                    <input type="text" readonly name="nik" class="form-control" value="{{ $warga->nik }}" required>
                                    <div class="invalid-feedback">NIKnya berapa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" readonly name="tanggal_lahir" class="form-control" value="{{ $warga->tanggal_lahir }}" required>
                                    <div class="invalid-feedback">Tanggal lahirnya berapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" readonly class="form-control" required name="tempat_lahir" value="{{ $warga->tempat_lahir }}">
                                    <div class="invalid-feedback">Tempat lahirnya dimana?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" readonly class="form-control" required name="alamat" value="{{ $warga->alamat }}">
                                    <div class="invalid-feedback">Alamatnya dimana?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" readonly class="form-control" required name="no_telp" value="{{ $warga->no_telp }}">
                                    <div class="invalid-feedback">Nomor Teleponnya berapa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $warga->jenis_kelamin }}" readonly>
                                    <div class="invalid-feedback">Jenis Kelaminnya apa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" value="{{ $warga->agama }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" readonly required name="pekerjaan" value="{{ $warga->pekerjaan }}">
                                    <div class="invalid-feedback">Pekerjaannya apa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group form-anggota">
                                    <label class="d-block">Status Perkawinan</label>
                                    <input type="text" class="form-control" readonly value="{{ $warga->status_perkawinan }}" id="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No Kartu Keluarga</label>
                            <input type="number" class="form-control" required name="no_kk" value="{{ $warga->no_kk }}" readonly>
                            <input type="text" name="akun" value="{{ $warga->akun }}" id="" hidden>
                            <div class="invalid-feedback">Nomor Kartu Keluarganya berapa?</div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Tabel Anggota Keluarga</h4>
                </div>
                <div class="container">
                    @error('nik')
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                            </div>
                        </div> 
                    @enderror
                    @error('no_kk')
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ $message }}
                            </div>
                        </div> 
                    @enderror
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Warga</th>
                                <th>NIK</th>
                                <th>Status Hubungan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($family as $iteration => $item)
                                <td>{{ $iteration+1 }}</td>
                                <td>{{ $item->nama_warga }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->status_hubungan }}</td>
                                <td>
                                    <form action="{{ route('family.destroy', $item->id) }}" method="POST">
                                        @if (Auth::user()->jabatan->nama_jabatan == 'Super Admin')
                                            <a href="{{ route('family.edit', $item->id) }}" class="btn btn-info" title="Edit"><span class="ion-edit"></span></a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger show_confirm" data-name="{{ $item->nama_warga }}" data-toggle="toolip"><i class="ion-trash-a"></i></button>
                                        @endif
                                    </form>      
                                </td>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end content --}}
        </section>
    </div>
@endsection
@push('titlePages')
    {{$titlePage}}
@endpush
@push('warga')
    {{$navigation}}
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/ionicons/css/ionicons.min.css') }}">
    <style>
        .anggota-keluarga{
            display: none;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
     <!-- JS Libraies -->
     <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

     <!-- Page Specific JS File -->
     <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                var family = $(this).attr('data-name');
                event.preventDefault();
                swal({
                    title: `Apakah anda yakin ingin menghapus keluarga `+family+ ' ?',
                    text: "Jika anda hapus, data keluarga "+family+" akan hilang permanen",
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

            @if ($message = Session::get('success'))
                swal(
                    "Berhasil!",
                    "{{ $message }}",
                    "success"
                );
            @endif
        });
    </script>
@endpush