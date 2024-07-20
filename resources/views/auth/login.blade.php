{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

{{-- <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center ">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">

            <div class="text-center">
                <h1 class="text-5xl font-extrabold text-gray-800 mb-4">RizzCom.</h1>

            </div>

            <div class="mt-4 flex flex-col items-center">
                <div class="w-full flex-1 mt-2">
                    <div class="my-10 border-b text-center">
                        <div
                            class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Login
                        </div>
                    </div>

                    <div class="mx-auto max-w-xs">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="email" placeholder="Email" name="email" />
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="password" placeholder="Password" name="password" />

                            <button
                                class="mt-5 tracking-wide font-semibold bg-green-500 w-full py-4 rounded-lg hover:bg-green-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <span class="text-white">
                                    Masuk
                                </span>
                            </button>

                            <p class="mt-6 text-xs text-gray-600 text-center">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="border-b border-gray-500 border-dotted">
                                    Daftar
                                </a>
                            </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-green-300 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('{{ url('template/dist/assets/static/images/bg/login.svg') }}');">
            </div>
        </div>
    </div>
</div>

--}}

@extends('user.layouts.index')
@section('title', 'Masuk - Delcraft')
@section('content')
<section class="section-box shop-template mt-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center mb-4">
                        <h3 class="d-flex justify-content-center align-items-center">
                            <img alt="Ecom" src="{{ asset('homepage-section/imgs/template/logo-1.png')}}" class="img-fluid" style="width: 300px; margin-right: 15px;">
                    </div>
                    <div class="form-register mt-30 mb-30">
                        <h5 class="text-center">Masuk/Daftar</h5>
                        <div class="form-group">
                            <label class="mb-5 font-sm color-gray-700">Email *</label>
                            <input class="form-control" name="email" type="email" placeholder="email@gmail.com">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label class="mb-5 font-sm color-gray-700">Password *</label>
                            <input class="form-control" name="password" type="password" placeholder="******************">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group text-center">
                            <input class="font-md-bold btn btn-buy" type="submit" value="LOG IN">
                        </div>
                        <div class="text-center mt-20">
                            <span class="font-xs color-gray-500 font-medium">Belum Punya Akun?</span>
                            <a class="font-xs color-brand-3 font-medium" href="{{ route('register') }}"> Daftar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  </section>
@endsection
{{-- <div class="min-h-screen relative flex justify-center py-16 bg-gradient-to-br from-sky-50 to-gray-200">
    <div class="relative container m-auto px-6 text-gray-500 md:px-12 xl:px-40">
        <div class="m-auto md:w-8/12 lg:w-6/12 xl:w-6/12">
            <div class="rounded-xl bg-white shadow-xl">
                <div class="p-6 sm:p-16">
                    <div class="space-y-4">
                        <h2 class="text-center mb-12 text-5xl font-extrabold text-cyan-900">RizzCom.</h2>
                        <h2 class="text-center text-xl">Sign in to your account
                        </h2>
                    </div>
                    <div class="mt-2 grid space-y-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <input class="w-full px-8 py-4 rounded-full font-medium border-2 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="email" placeholder="Email" name="email" />
                            <input
                                class="w-full px-8 py-4 rounded-full font-medium border-2 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="password" placeholder="Password" name="password" />

                                <button
                                class="mt-5 tracking-wide font-semibold bg-blue-600 w-full py-4 rounded-full hover:bg-blue-500 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <span class="text-white">
                                    Sign in
                                </span>
                            </button>
                        </form>
                    </div>
                    <p class="mt-6 text-xs text-gray-600 text-center">
                        No account??
                        <a href="{{ route('register') }}" class="border-b border-gray-500">
                            Sign up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}


