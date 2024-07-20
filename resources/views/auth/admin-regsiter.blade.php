<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg">
    <link href="{{url('admin-page/assets/css/style.css?v=1.0.0')}}" rel="stylesheet">
    <title>Ecom - Marketplace Dashboard Template</title>
  </head>
  <body>
    <main class="main-wrap ml-0">
      <section class="content-main">
        <div class="card mx-auto card-login">
          <div class="card-body">
            <h4 class="card-title mb-4">Buat Akun Admin</h4>
            <form method="POST" action="{{ route('register.admin.store') }}">
                @csrf
            <div class="mb-3">
                <label class="form-label">Nama*</label>
                <input class="form-control" name="name" placeholder="Nama" type="text">
              </div>
              <div class="mb-3">
                <label class="form-label">Email*</label>
                <input class="form-control" name="email" placeholder="example@gmail.com" type="email">
              </div>
              <div class="mb-3">
                <label class="form-label">password*</label>
                <input class="form-control"  name="password" placeholder="Password" type="password">
              </div>
              <div class="mb-3">
                <label class="form-label">Konfirmasi password*</label>
                <input class="form-control"  name="password_confirmation" placeholder="Password" type="password">
              </div>
              <div class="mb-4">
                <button class="btn btn-primary w-100" type="submit"> Daftar</button>
              </div>
              <p class="text-center mb-2">Sudah punya akun?<a href="{{route('login.admin')}}"> Masuk</a></p>
            </form>
          </div>
        </div>
      </section>
    </main>
    <script src="{{url('admin-page/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <script src="{{url('admin-page/assets/js/vendors/chart.js')}}"></script>
    <script src="{{url('admin-page/assets/js/main.js?v=1.0.0')}}"></script>
    <script src="{{url('admin-page/assets/js/custom-chart.js')}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </body>
</html>
