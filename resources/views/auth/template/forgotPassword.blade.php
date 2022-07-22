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
              <div class="card-header"><a href="{{ route('loginPage') }}" title="Kembali"><img src="{{ asset('img/back.png') }}" alt=""></a>&nbsp;&nbsp;<h4 style="font-weight: 700; font-size: 20px; color: #064E3B;"> Lupa Password</h4></div>

              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Lupa Password
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
    {{$titlePage}}
@endpush