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
                    <div class="breadcrumb-item">Tambah Warga</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('warga.store') }}">
                    @csrf
                    <div class="card-header">
                      <h4>Form Tambah Warga</h4>
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
                                    <input type="text" name="nama_warga" class="form-control" required>
                                    <div class="invalid-feedback">Nama warganya siapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>NIK Warga</label>
                                    <input type="text" name="nik" class="form-control" required>
                                    <div class="invalid-feedback">NIKnya berapa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                    <div class="invalid-feedback">Tanggal lahirnya berapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" required name="tempat_lahir">
                                    <div class="invalid-feedback">Tempat lahirnya dimana?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" required name="alamat">
                                    <div class="invalid-feedback">Alamatnya dimana?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" class="form-control" required name="no_telp">
                                    <div class="invalid-feedback">Nomor Teleponnya berapa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control required" name="jenis_kelamin" required>
                                        <option selected disabled hidden value="">Silahkan Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    <div class="invalid-feedback">Jenis Kelaminnya apa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control required" name="agama" required>
                                        <option selected disabled hidden value="">Silahkan Pilih</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                    <div class="invalid-feedback">Status Perkawinannya apa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" required name="pekerjaan">
                                    <div class="invalid-feedback">Pekerjaannya apa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group form-anggota">
                                    <label class="d-block">Status Perkawinan</label>
                                    <div class="form-check">
                                      <input class="form-check-input status-nikah" type="radio" value="Menikah" name="status_perkawinan" id="status1" required>
                                      <label class="form-check-label" for="status1">
                                        Menikah
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input status-nikah" type="radio" value="Lajang" name="status_perkawinan" id="status2">
                                      <label class="form-check-label" for="status2">
                                        Lajang
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No Kartu Keluarga</label>
                            <input type="number" class="form-control" required name="no_kk">
                            <input type="text" name="akun" value="Aktif" id="" hidden>
                            <div class="invalid-feedback">Nomor Kartu Keluarganya berapa?</div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            {{-- end content --}}
        </section>
    </div>
@endsection
@push('titlePages')
    {{$titlePage}}
@endpush
@push('addWarga')
    {{$navigation}}
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <style>
        .anggota-keluarga{
            display: none;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            
        });
    </script>
@endpush