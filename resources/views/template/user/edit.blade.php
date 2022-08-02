@extends('template.component.base')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Pengguna</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('users.index') }}">List Pengguna</a></div>
                    <div class="breadcrumb-item">Edit Pengguna</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Form Edit Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Warga</label>
                            <select class="form-control select2" name="wargas_id" required>
                                <option selected disabled hidden value="">Silahkan Pilih</option>
                                @foreach ($dataWarga as $item)
                                    <option value="{{ $item->id }}" {{ $user->wargas_id == $item->id ? 'selected' : '' }}>{{ $item->nama_warga }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Belum pilih Warga</div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required name="email" value="{{ $user->email }}">
                            <div class="invalid-feedback">Emailnya apa?</div>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control required" name="jabatans_id" required>
                                <option selected disabled hidden value="">Silahkan Pilih</option>
                                @foreach ($dataJabatan as $list)
                                    <option value="{{ $list->id }}" {{ $user->jabatans_id == $list->id ? 'selected' : '' }}>{{ $list->nama_jabatan }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Jabatannya apa?</div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control required" name="status" required>
                                <option selected disabled hidden value="">Silahkan Pilih</option>
                                <option value="aktif" {{ $user->status == "aktif" ? 'selected' : '' }}>Aktif</option>
                                <option value="mati" {{ $user->status == "mati" ? 'selected' : '' }}>Mati</option>
                            </select>
                            <div class="invalid-feedback">Jabatannya apa?</div>
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
@push('user')
    {{$navigation}}
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            
        });
    </script>
@endpush