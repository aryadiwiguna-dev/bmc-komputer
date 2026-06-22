@extends('layout.master2')

@section('content')
<div class="row w-100 mx-0 auth-page">
  <div class="col-md-8 col-xl-6 mx-auto">
    <div class="card">
      <div class="row">
        <div class="col-md-4 pe-md-0">
          <div class="auth-side-wrapper" style="background-image: url('https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=400&q=80')">

          </div>
        </div>
        <div class="col-md-8 ps-md-0">
          <div class="auth-form-wrapper px-4 py-5">
            <a href="#" class="nobleui-logo d-block mb-2">BMC<span>Computer</span></a>
            <h5 class="text-secondary fw-normal mb-4">Selamat datang! Silakan login ke akun Anda.</h5>
            <form class="forms-sample" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <label for="userEmail" class="form-label">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="userEmail" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="userPassword" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="userPassword" name="password" autocomplete="current-password" placeholder="Password" required>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="authCheck" name="remember">
                <label class="form-check-label" for="authCheck">
                  Ingat Saya
                </label>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('catalog.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-1">
                  <i data-lucide="shopping-bag" class="icon-sm"></i>
                  <span>Lihat Katalog Produk</span>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection