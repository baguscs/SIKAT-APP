@extends('template.component.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-wallet icon-card"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Dana</h4>
                            </div>
                            <div class="card-body">
                                Rp. {{number_format($inflow-$outlay,0,',','.')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-file-alt icon-card"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Aduan</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalAduan }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-users icon-card"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Warga</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalWarga }}
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Aduan Terbaru</h4>
                            <div class="card-header-action">
                                <a href="{{ route('aduan.index') }}" class="btn btn-primary">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Judul Aduan</th>
                                        <th scope="col">Isi Aduan</th>
                                        <th scope="col">Pengadu</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aduan as $item)
                                        <tr>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->isi }}</td>
                                            <td>{{ $item->user->warga->nama_warga }}</td>
                                            <td>
                                                @if ($item->status == 'ditinjau')
                                                    <a href="javasrcipt:void(0);" class="btn btn-warning btn-rounded">Perlu Direview</a>
                                                @else
                                                    <a href="javasrcipt:void(0);" class="btn btn-success btn-rounded">Telah Ditanggapi</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Agenda Terbaru</h4>
                        </div>
                        <div class="card-body">             
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($agenda as $list)
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="float-right text-primary">{{ date('d M, Y', strtotime($list->created_at)) }}</div>
                                            <div class="media-title">{{ $list->judul }}</div>
                                            <span class="text-small text-muted">
                                                {!! Str::words($list->isi, 30, '...') !!}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="{{ route('agenda.index') }}" class="btn btn-primary btn-lg btn-round">
                                Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('titlePages')
    {{$titlePage}}
@endpush
@push('dashboard')
    {{$navigation}}
@endpush
@push('css')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <style>
        .sideBar{
            margin-top: 10px;
        }
        .icon-card{
            margin-top: 25px;
        }
        .btn-rounded{
            border-radius: 20px;
        }
    </style>
@endpush
@push('js')
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index-0.js') }}"></script>
@endpush