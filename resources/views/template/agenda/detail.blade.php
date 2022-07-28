@extends('template.component.base')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Agenda</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('agenda.index') }}">List Agenda</a></div>
                    <div class="breadcrumb-item">Detail Agenda</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('agenda.update', $agenda->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Form Detail Agenda</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul Agenda</label>
                            <input type="text" class="form-control" required="" value="{{ $agenda->judul }}" name="judul" readonly>
                            <div class="invalid-feedback">Judul agendanya apa?</div>
                        </div>
                        <div class="form-group">
                            <label>Isi Agenda</label>
                            <textarea name="isi" id="" cols="30" rows="10" class="form-control" required readonly>{{ $agenda->isi }}</textarea>
                            <div class="invalid-feedback">Rincian agendanya?</div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Agenda</label>
                            <input type="text" class="form-control" required name="tempat" value="{{ $agenda->tempat }}" readonly>
                            <div class="invalid-feedback">Tempatnya dimana?</div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-calendar"></i>
                                        </div>
                                      </div>
                                      <input type="date" name="tanggal_mulai" required readonly class="form-control" value="{{ $agenda->tanggal_mulai }}">
                                      <div class="invalid-feedback">Tanggal mulainya kapan?</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-calendar"></i>
                                        </div>
                                      </div>
                                      <input type="date" name="tanggal_selesai" required readonly class="form-control" value="{{ $agenda->tanggal_selesai }}">
                                      <div class="invalid-feedback">Tanggal selesainya kapan?</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Waktu Mulai</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-calendar"></i>
                                        </div>
                                      </div>
                                      <input type="text" name="waktu_mulai" required readonly class="form-control" id="start" value="{{ $agenda->waktu_mulai }}">
                                      <div class="invalid-feedback">Waktu mulainya kapan?</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Waktu Selesai</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-calendar"></i>
                                        </div>
                                      </div>
                                      <input type="text" name="waktu_selesai" readonly required class="form-control" id="finish" value="{{ $agenda->waktu_selesai }}">
                                      <div class="invalid-feedback">Waktu selesainya kapan?</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status Agenda</label>
                            <input type="text" class="form-control" value="{{ $agenda->status }}" readonly>
                            <div class="invalid-feedback">Status Agendanya gimana?</div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <a type="button" href="{{ route('agenda.index') }}" class="btn btn-info">Kembali</a>
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
@push('agenda')
    {{$navigation}}
@endpush
@push('css')
<link rel="stylesheet" href="{{ asset('css/timepicker.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('js/timepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#start').timepicker();
            $('#finish').timepicker();
        });
    </script>
@endpush