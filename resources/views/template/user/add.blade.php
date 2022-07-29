@extends('template.component.base')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Pengguna</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('agenda.index') }}">List Pengguna</a></div>
                    <div class="breadcrumb-item">Tambah Pengguna</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('agenda.store') }}">
                    @csrf
                    <div class="card-header">
                      <h4>Form Tambah Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Warga</label>
                            <select class="form-control select2" name="users_id" required>
                                @foreach ($dataWarga as $item)
                                    <option value="{{ $item->id }}"></option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Belum pilih Warga</div>
                        </div>
                        <div class="form-group">
                            <label>Isi Agenda</label>
                            <textarea name="isi" id="" cols="30" rows="10" class="form-control" required></textarea>
                            <div class="invalid-feedback">Rincian agendanya?</div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Agenda</label>
                            <input type="text" class="form-control" required name="tempat">
                            <div class="invalid-feedback">Tempatnya dimana?</div>
                        </div>
                        <div class="form-group">
                            <label>Status Agenda</label>
                            <select class="form-control required" name="status" required>
                                <option selected disabled hidden value="">Silahkan Pilih</option>
                                <option value="arsip">Arsip</option>
                                <option value="segera">Segera</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            <div class="invalid-feedback">Status Agendanya gimana?</div>
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
@push('addUser')
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