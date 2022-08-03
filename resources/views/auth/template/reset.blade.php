@extends('layouts.base')
@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('img/login.png') }}" alt="logo" width="100">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4 style="font-weight: 700; font-size: 20px; color: #064E3B;"> Reset Password</h4></div>
               <div class="container">
                    @if($messege = Session::get("pesan"))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ Session::get("pesan") }}
                            </div>
                        </div> 
                    @endif
                    @error('password')
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
                <form method="POST" action="{{ route('execute_forgot', $parameter) }}">
                  @csrf
                  <div class="form-group">
                    <label for="email">Password</label>
                    <input id="email" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="email">Konfirmasi Password</label>
                    <input id="email" type="password" class="form-control" name="password_confirmation" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('titlePages')
    Reset Password
@endpush