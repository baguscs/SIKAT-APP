@extends('template.component.base')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{$titlePage}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="javascript:void(0);">Aduan</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('aduan.index') }}">List Aduan</a></div>
                    <div class="breadcrumb-item">Tambah Aduan</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('aduan.store') }}">
                    @csrf
                    <div class="card-header">
                      <h4>Form Tambah Aduan</h4>
                    </div>
                    <div class="container">
                        @error('bukti')
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
                            <input type="text" hidden name="users_id" value="{{ Auth::user()->id }}">
                            <label>Judul Aduan</label>
                            <input type="text" class="form-control" required="" name="judul" value="{{ old('judul') }}">
                            <div class="invalid-feedback">Judul aduan apa?</div>
                        </div>
                        <div class="form-group">
                            <label>Isi Aduan</label>
                            <textarea name="isi" id="" cols="30" rows="10" class="form-control" required>{{ old('isi') }}</textarea>
                            <div class="invalid-feedback">Rincian agendanya?</div>
                        </div>
                        <div class="form-group">
                            <label>Bukti Aduan</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image" id="customFile" name="bukti" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <span class="infoFile">File extensi : JPG, PNG, JPEG</span><br>
                            <span class="infoFile">Ukuran Max File: 1MB</span>
                            <div class="invalid-feedback">Buktinya mana?</div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload" src="{{ asset('img/no_image.png') }}"
                                alt="preview image" style="max-height: 250px;">
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
@push('addAgenda')
    {{$navigation}}
@endpush
@push('css')
<style>
    .infoFile{
        color: red;
        font-size: 13px;
    }
</style>
@endpush
@push('js')
    <script type="text/javascript">

        $(document).ready(function (e) {
            $('.image').change(function(){   
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview-image-before-upload').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush