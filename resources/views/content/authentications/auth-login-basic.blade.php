@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="brand-name display-5 bold">CofeFlow</span>
            </a>
          </div>
          <!-- /Logo -->
          <form id="formAuthentication" class="mb-3" action="{{ route('auth-login-account') }}" method="post">
            @csrf
            @if ($errors->any())
              <div class="row">
                <ul>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{ $error }}
                    </div>
                    @endforeach
                </ul>
              </div>
            @endif
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="text" class="form-control" id="username" name="username" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div>
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex justify-content-between form-check">
                <div>
                  <input class="form-check-input" type="checkbox" id="remember-me">
                  <label class="form-check-label" for="remember-me">
                    Remember Me
                  </label>
                </div>
                <a href="{{url('auth/forgot-password-basic')}}">
                  <small>Forgot Password?</small>
                </a>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>
          <p class="text-center">
            <span>or Sign in with</span>
          </p>
          <div class="d-flex justify-content-center gap-2 inline-spacing">
            <button type="button" class="btn btn-icon btn-primary">
              <span class="tf-icons bx bxl-github"></span>
            </button>
            <button type="button" class="btn btn-icon btn-primary">
              <span class="tf-icons bx bxl-gmail"></span>
            </button>
            <button type="button" class="btn btn-icon btn-primary">
              <span class="tf-icons bx bxl-facebook-circle"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
