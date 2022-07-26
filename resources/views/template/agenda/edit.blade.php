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
                    <div class="breadcrumb-item">Edit Agenda</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('agenda.update', $agenda->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Form Edit Agenda</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" hidden name="users_id" value="{{ Auth::user()->id }}">
                            <label>Judul Agenda</label>
                            <input type="text" class="form-control" required="" value="{{ $agenda->judul }}" name="judul">
                            <div class="invalid-feedback">Judul agendanya apa?</div>
                        </div>
                        <div class="form-group">
                            <label>Isi Agenda</label>
                            <textarea name="isi" id="" cols="30" rows="10" class="form-control" required>{{ $agenda->isi }}</textarea>
                            <div class="invalid-feedback">Rincian agendanya?</div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Agenda</label>
                            <input type="text" class="form-control" required name="tempat" value="{{ $agenda->tempat }}">
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
                                      <input type="date" name="tanggal_mulai" required class="form-control" value="{{ $agenda->tanggal_mulai }}">
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
                                      <input type="date" name="tanggal_selesai" required class="form-control" value="{{ $agenda->tanggal_selesai }}">
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
                                      <input type="text" name="waktu_mulai" required class="form-control" id="start" value="{{ $agenda->waktu_mulai }}">
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
                                      <input type="text" name="waktu_selesai" required class="form-control" id="finish" value="{{ $agenda->waktu_selesai }}">
                                      <div class="invalid-feedback">Waktu selesainya kapan?</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status Agenda</label>
                            <select class="form-control required" name="status">
                                <option selected disabled hidden value="">Silahkan Pilih</option>
                                <option value="arsip" {{$agenda->status == 'arsip'?'selected':''}}>Arsip</option>
                                <option value="segera" {{$agenda->status == 'segera'?'selected':''}}>Segera</option>
                                <option value="selesai {{$agenda->status == 'selesai'?'selected':''}}">Selesai</option>
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