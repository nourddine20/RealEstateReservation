@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand text-center mx-auto">
                <a href="/index.html" class="text-center mx-auto">


                         <img src="{{asset('clientside/assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo mx-auto" alt="logo">


                </a>
              </div>
            </div>

            <div class="card-body p-5">
              <h4 class="text-dark mb-5"> {{ __('Se Connecter') }}</h4>

              <form method="POST" action="{{ route('admin.postlogin') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                  <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

<div class="col-md-6">
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> -->
@if(session()->has('error_msg'))
    <div class="alert alert-danger">
        {{ session()->get('error_msg') }}
    </div>
@endif

<div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input id="email" type="email" class="form-control input-lg  @error('email') is-invalid @enderror"  aria-describedby="emailHelp"  placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                                            </div>




                  </div>


                  <div class="form-group col-md-12 ">
                  <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                    <!-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> -->

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                                            </div>


                  </div>

                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <!-- <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">Remember me
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>
                      </div> -->

                      <!-- @if (Route::has('password.request'))

                                  <p><a class="btn btn-link" href="{{ route('password.request') }}">  {{ __('Forgot Your Password?') }}</a></p>

                        @endif -->

                    </div>



                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Login</button>



                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    localStorage.clear();
</script>
@endsection
