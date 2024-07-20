@extends('user.layouts.index')
@section('content')
    @include('sweetalert::alert')
    <section class="section-box shop-template mt-30">
        <div class="container box-account-template">

            <h3>Akun Saya</h3>
            <p class="font-md color-gray-500">Dari dasbor akun Anda, Anda dapat dengan mudah mengelola alamat pengiriman Anda, <br class="d-none d-lg-block"> serta mengedit
                kata sandi dan detail akun Anda.</p>
            <div class="box-tabs mb-100 mt-40">
                <ul class="nav nav-tabs nav-tabs-account" role="tablist">
                    <li><a href="{{ route('profile.edit') }}">Pengaturan Akun</a></li>
                    <li><a class="active" href="{{ route('alamat.form') }}">Daftar Alamat</a></li>
                </ul>
                <div class="border-bottom mt-20 mb-40"></div>
                <div class="tab-content mt-30">
                    <div class="tab-pane fade active show" id="tab-setting" role="tabpanel" aria-labelledby="tab-setting">
                        <div class="row">
                            <div class="col-lg-6 mb-20">
                                <form action="{{ route('alamat.form') }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="font-md-bold color-brand-3 mt-15 mb-20">Alamat Pengiriman</h5>
                                        </div>
                                        {{-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control font-sm" name="label" type="text"
                                                    placeholder="Label Alamat" value="{{ $address->label ?? '' }}">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control font-sm" name="alamat" rows="2" placeholder="Alamat Lengkap">{{ $address->alamat ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control font-sm" name="kode_pos" type="text"
                                                    placeholder="Kode Pos" value="{{ $address->kode_pos ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control font-sm" name="nohp" type="text"
                                                    placeholder="Nomor Hp" value="{{ $address->nohp ?? '' }}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <textarea class="form-control font-sm" name="additional_info" placeholder="Additional Information" rows="3">{{ $address->additional_info ?? '' }}</textarea>
                            </div>
                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="form-group mt-20">
                                                <input class="btn btn-buy w-auto h54 font-md-bold" type="submit"
                                                    value="Simpan">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-1 mb-20"></div>
                            <div class="col-lg-5 mb-20">
                                <div class="mt-40">
                                    <h4 class="mb-10">{{ Auth::user()->name }}</h4>
                                    <div class="mb-10">
                                        <p class="font-sm color-brand-3 font-medium">Alamat :</p><span
                                            class="font-sm color-gray-500 font-medium">{{ $address->alamat ?? '' }}</span>
                                    </div>
                                    <div class="mb-10">
                                        <p class="font-sm color-brand-3 font-medium">Nomor HP:</p><span
                                            class="font-sm color-gray-500 font-medium">(+62)
                                            {{ ltrim($address->nohp ?? '', '0') }}</span>
                                    </div>
                                    <div class="mb-10 mt-15"><a class="btn btn-cart w-auto">Set as Default</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
