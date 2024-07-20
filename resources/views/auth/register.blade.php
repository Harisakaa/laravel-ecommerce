{{-- @vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">

            <div class="text-center">
                <img src="{{ url('template/dist/assets/static/images/logo/LOGO_UMRI.png') }}" class=" w-28 mx-auto"
                    alt="UMRI Logo">
            </div>
            <div class="mt-4 flex flex-col items-center">
                <div class="w-full flex-1 mt-2">
                    <div class="my-4 border-b text-center">
                        <div
                            class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Register
                        </div>
                    </div>
                    <div class="mx-auto max-w-xs">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="text" placeholder="Nama" name="name" />

                            <input
                                class="w-full px-8 py-4 mt-5 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="email" placeholder="Email" name="email" />

                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="password" placeholder="Password" name="password" />

                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="password" placeholder="Konfirmasi password" name="password_confirmation" />

                            <button
                                class="mt-5 tracking-wide font-semibold bg-green-500 w-full py-4 rounded-lg hover:bg-green-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <span class="text-white">
                                    Daftar
                                </span>
                            </button>
                        </form>
                        <p class="mt-6 text-xs text-gray-600 text-center">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="border-b border-gray-500 border-dotted">
                                Masuk
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-green-300 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('{{ url('template/dist/assets/static/images/bg/Sign.svg') }}');">
            </div>
        </div>
    </div>
</div>
 --}}


@extends('user.layouts.index')
@section('title', 'Daftar - Delcraft')
@section('content')
    <section class="section-box shop-template mt-60">
      <div class="container">
        <div class="row mb-100">
          <div class="col-lg-1"></div>
          <div class="col-lg-5">
            <h3>Daftar</h3>
            <div class="form-register mt-30 mb-30">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Nama*</label>
                <input class="form-control"  type="text" placeholder="Nama" name="name">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Email *</label>
                <input class="form-control"  type="email" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Password *</label>
                <input class="form-control" type="password" placeholder="************" name="password">
              </div>
              <div class="form-group">
                <label class="mb-5 font-sm color-gray-700">Konfirmasi Password *</label>
                <input class="form-control" type="password" placeholder="*************" name="password_confirmation">
              </div>
              <div class="form-group">
                <input class="font-md-bold btn btn-buy" type="submit" value="Sign Up">
              </div>
              <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Sudah punya akun?</span><a class="font-xs color-brand-3 font-medium" href="{{ route('login') }}"> Masuk</a></div>
            </form>
            </div>
          </div>
          <div class="col-lg-5 d-flex justify-content-center align-items-center">
            <div class="box-login-social  pl-50">
              <div class="text-center mb-4">
                <h3 class="d-flex justify-content-center align-items-center">
                    <img alt="Ecom" src="{{ asset('homepage-section/imgs/template/logo-1.png')}}" class="img-fluid" style="width: 400px; margin-right: 15px;">
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection
