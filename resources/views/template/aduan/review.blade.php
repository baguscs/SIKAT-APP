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
                    <div class="breadcrumb-item">Review Aduan</div>
                </div>
            </div>

            {{-- edit content --}}
            <div class="card">
                <form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('aduan.respond', $aduan->id) }}">
                    @csrf
                    <div class="card-header">
                      <h4>Form Review Aduan</h4>
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
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" hidden name="users_id" value="{{ Auth::user()->id }}">
                                    <label>Judul Aduan</label>
                                    <input type="text" class="form-control" required="" name="judul" value="{{ $aduan->judul }}" readonly>
                                    <div class="invalid-feedback">Judul aduan apa?</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Isi Aduan</label>
                                    <textarea name="isi" id="" cols="30" rows="10" class="form-control" required readonly>{{ $aduan->isi }}</textarea>
                                    <div class="invalid-feedback">Rincian agendanya?</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                      <input type="text" value="{{ $aduan->bukti }}" class="form-control" placeholder="" aria-label="" readonly>
                                      <div class="input-group-append">
                                        <a href="{{ asset('storage/aduan/'. $aduan->bukti) }}" target="_blank" class="btn btn-primary" type="button">Lihat Bukti</a>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="d-block">Apakah Aduan ini layak untuk ditampilkan?</label>
                                    <div class="form-check">
                                      <input class="form-check-input review" type="radio" name="radio_review" value="ya" id="review1" data-name="ya" required>
                                      <label class="form-check-label" for="review1">
                                        Ya, Layak
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input review" type="radio" name="radio_review" value="tidak" id="review2" data-name="tidak">
                                      <label class="form-check-label" for="review2">
                                        Tidak
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-radio">
                            <label class="d-block">Apakah anda ingin menanggapi aduan ini?</label>
                            <div class="form-check">
                              <input class="form-check-input tanggapan" type="radio" value="ya" name="tanggapan" id="tanggapan1" data-name="ya">
                              <label class="form-check-label" for="tanggapan1">
                                Ya
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input tanggapan" type="radio" value="tidak" name="tanggapan" id="tanggapan2" data-name="tidak">
                              <label class="form-check-label" for="tanggapan2">
                                Tidak
                              </label>
                            </div>
                        </div>
                        <div class="content-tanggapan form-tanggapan">
                            <div class="card-header">
                                <h4>Form Tanggapan Aduan</h4>
                                </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" hidden name="users_id" value="{{ Auth::user()->id }}">
                                    <input type="text" hidden name="aduans_id" value="{{ $aduan->id }}">
                                    <label>Isi Aduan</label>
                                    <textarea name="isi" id="" cols="30" rows="10" class="form-control input-tanggapan" >{{ old('isi') }}</textarea>
                                    <div class="invalid-feedback">Rincian agendanya?</div>
                                </div>
                                <div class="form-group">
                                    <label>Bukti Aduan</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image input-tanggapan" id="customFile" name="bukti">
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
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" id="btn-submit" name="" value="" class="btn btn-primary">Submit</button>
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
@push('aduan')
    {{$navigation}}
@endpush
@push('css')
<style>
    .infoFile{
        color: red;
        font-size: 13px;
    }
    .form-radio{
        display: none;
    }
    .form-tanggapan{
        display: none;
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

            $('.review').click(function(){
                if($(this).prop("checked") == true){
                    var verif = $(this).attr('data-name');
                    if (verif == 'ya') {
                        $(".form-radio").show();
                        $(".tanggapan").attr('required', true);
                    } else {
                        $(".form-radio").hide();
                        $(".tanggapan").removeAttr('required', false);
                        $(".form-tanggapan").hide();
                        $(".tanggapan").prop('checked', false);
                    }
                    
                }
            });
            
            $('.tanggapan').click(function(){
                if($(this).prop("checked") == true){
                    var verif = $(this).attr('data-name');
                    if (verif == 'ya') {
                        $(".form-tanggapan").show();
                        $(".input-tanggapan").attr('required', true);
                        $("#btn-submit").attr('value', 'tanggapi');
                        $("#btn-submit").attr('name', 'tanggapi');
                    } else {
                        $(".form-tanggapan").hide();
                        $(".input-tanggapan").removeAttr('required', false);
                        $("#btn-submit").attr('value', 'review');
                        $("#btn-submit").attr('name', 'review');
                    }

                }
            });
        });
    </script>
@endpush