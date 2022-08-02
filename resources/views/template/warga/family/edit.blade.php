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
                    <div class="breadcrumb-item"><a href="{{ route('warga.show', $family->wargas_id) }}">Detail Warga</a></div>
                    <div class="breadcrumb-item">Edit Anggota Keluarga</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('family.update', $family->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Form Edit Anggota Keluarga</h4>
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
                        <div class="form-group">
                            <label>Nama Kepala Keluarga</label>
                            <select name="wargas_id" id="" class="form-control select2" required>
                                @foreach ($dataWarga as $item)
                                    <option value="{{ $item->id }}" {{ $family->wargas_id == $item->id ? 'selected' : '' }} >{{ $item->nama_warga }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Nomor Kartu Keluarganya berapa?</div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama Warga</label>
                                    <input type="text" name="nama_warga" class="form-control" value="{{ $family->nama_warga }}" required>
                                    <div class="invalid-feedback">Nama warganya siapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>NIK Warga</label>
                                    <input type="text" name="nik" class="form-control" value="{{ $family->nik }}" required>
                                    <div class="invalid-feedback">NIKnya berapa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $family->tanggal_lahir }}" required>
                                    <div class="invalid-feedback">Tanggal lahirnya berapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" required name="tempat_lahir" value="{{ $family->tempat_lahir }}">
                                    <div class="invalid-feedback">Tempat lahirnya dimana?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" class="form-control" required name="no_telp" value="{{ $family->no_telp }}">
                                    <div class="invalid-feedback">Nomor Teleponnya berapa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" required name="pekerjaan" value="{{ $family->pekerjaan }}">
                                    <div class="invalid-feedback">Pekerjaannya apa?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control required" name="jenis_kelamin" required>
                                        <option selected disabled hidden value="">Silahkan Pilih</option>
                                        <option value="Pria" {{ $family->jenis_kelamin == "Pria" ? 'selected' : '' }}>Pria</option>
                                        <option value="Wanita" {{ $family->jenis_kelamin == "Wanita" ? 'selected' : '' }}>Wanita</option>
                                    </select>
                                    <div class="invalid-feedback">Jenis Kelaminnya apa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control required" name="agama" required>
                                        <option selected disabled hidden value="">Silahkan Pilih</option>
                                        <option value="Islam" {{ $family->agama == "Islam" ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ $family->agama == "Kristen" ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ $family->agama == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ $family->agama == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ $family->agama == "Budha" ? 'selected' : '' }}>Budha</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status Hubungan</label>
                            <select class="form-control required" name="status_hubungan" required>
                                <option selected disabled hidden value="">Silahkan Pilih</option>
                                <option value="Orang Tua" {{ $family->status_hubungan == "Orang Tua" ? 'selected' : '' }}>Orang Tua</option>
                                <option value="Istri" {{ $family->status_hubungan == "Istri" ? 'selected' : '' }}>Istri</option>
                                <option value="Anak" {{ $family->status_hubungan == "Anak" ? 'selected' : '' }}>Anak</option>
                            </select>
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
@push('warga')
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
            function backHistory(){
                window.history.back();
            }
        });
    </script>
@endpush