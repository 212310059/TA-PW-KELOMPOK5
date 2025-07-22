<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan Online | Verifikasi Email</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Perpustakaan</b>Online</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
        <div class="text-center">
            <h4 class="mb-3">{{ __('Verifikasi Alamat Email Anda') }}</h4>
        </div>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Link verifikasi baru telah dikirimkan ke alamat email Anda.') }}
            </div>
        @endif

        <p>{{ __('Sebelum melanjutkan, mohon periksa email Anda untuk link verifikasi.') }}</p>
        <p>{{ __('Jika Anda tidak menerima email') }},</p>

        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-block">{{ __('klik di sini untuk meminta lagi') }}</button>.
        </form>
    </div>
  </div>
</div>
</body>
</html>
