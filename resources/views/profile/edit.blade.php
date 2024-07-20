@extends('user.layouts.index')
@section('content')
    <section class="section-box shop-template mt-30">
        <div class="container box-account-template">

            <h3>Akun Saya</h3>
            <p class="font-md color-gray-500">Dari dasbor akun Anda, Anda dapat dengan mudah mengelola alamat pengiriman
                Anda, <br class="d-none d-lg-block"> serta mengedit
                kata sandi dan detail akun Anda.</p>
            <div class="box-tabs mb-100 mt-40">
                <ul class="nav nav-tabs nav-tabs-account" role="tablist">
                    <li><a class="active" href="#tab-notification" data-bs-toggle="tab" role="tab"
                            aria-controls="tab-notification" aria-selected="true">Pengaturan Akun</a></li>
                    <li><a href="{{ route('alamat.form') }}">Daftar Alamat</a></li>
                </ul>

                <div class="border-bottom mt-20 mb-40"></div>
                <div class="tab-content mt-30">
                    <div class="tab-pane fade active show" id="tab-notification" role="tabpanel"
                        aria-labelledby="tab-notification">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="tab-pane fade" id="tab-setting" role="tabpanel" aria-labelledby="tab-setting">
                        <div class="row">
                            <div class="col-lg-6 mb-20">

                                <div class="col-lg-1 mb-20"></div>
                                <div class="col-lg-5 mb-20">
                                    <div class="mt-40">
                                        <h4 class="mb-10">Steven Job</h4>
                                        <div class="mb-10">
                                            <p class="font-sm color-brand-3 font-medium">Home Address:</p><span
                                                class="font-sm color-gray-500 font-medium">205 North Michigan Avenue, Suite
                                                810 Chicago, 60601, USA</span>
                                        </div>
                                        <div class="mb-10">
                                            <p class="font-sm color-brand-3 font-medium">Delivery address:</p><span
                                                class="font-sm color-gray-500 font-medium">205 North Michigan Avenue, Suite
                                                810 Chicago, 60601, USA</span>
                                        </div>
                                        <div class="mb-10">
                                            <p class="font-sm color-brand-3 font-medium">Phone Number:</p><span
                                                class="font-sm color-gray-500 font-medium">(+01) 234 567 89 - (+01) 688 866
                                                99</span>
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


    {{--
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div> --}}
@endsection
