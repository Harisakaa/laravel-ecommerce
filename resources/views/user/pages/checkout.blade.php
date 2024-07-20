@extends('user.layouts.index')
@section('content')
@include('sweetalert::alert')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="index.html">Home</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-grid.html">Shop</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-cart.html">Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
    @if(session('checkout_success'))
    <div class="container mt-5">
        <div class="row justify-content-center mt-50">
            <div class="col-md-3 text-center">
                <img src="{{asset('homepage-section/imgs/page/checkout/circle.png')}}" alt="Keranjang Kosong" width="120">
                <h4 class="mt-3">Pesanan Berhasil</h4>
                <a href="{{route('home')}}" class="btn btn-home mt-10" >Kembali Ke Halaman Utama</a>
                <a href="{{route('orders.view')}}" class="btn btn-order mt-3">Lihat Detail Transaksi</a>
            </div>
        </div>
    </div>
    @else
    <section class="section-box shop-template">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <div class="box-border">
                        <div class="border-bottom-4 text-center mb-20">
                            <div class="text-or font-md color-gray-500">Checkout</div>
                        </div>
                        <form action="{{route('checkout.item')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-lg-6 col-sm-6 mb-20">
                                <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Infromasi Kontak</h5>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control font-sm" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                            </div>
                            <div class="col-lg-12">
                                <h5 class="font-md-bold color-brand-3 mt-15 mb-10">Alamat Pengiriman</h5>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- <input class="form-control font-sm" type="text"
                                        value="{{ Auth::user()->name }}" disabled> --}}
                                    @if ($address)
                                        <strong>&bull; {{ Auth::user()->name }} (+62) {{ ltrim($address->nohp, '0') }}</strong>
                                        <p class="mb-2">{{ $address->alamat }} {{ $address->kode_pos }}</p>
                                        <a href="{{ route('alamat.form') }}">Ubah Alamat</a>
                                     @else
                                        <p>Isi alamat terlebih dahulu!</p>
                                        <a href="{{ route('alamat.form') }}">Tambah Alamat</a>
                                    @endif
                                        {{-- <textarea class="form-control font-sm" rows="2" readonly><span>{{ Auth::user()->name }}</span></textarea> --}}
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control font-sm" name="alamat" type="text" placeholder="Alamat Lengkap*" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control font-sm" name="nohp"  type="text" placeholder="Nomor HP*" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control font-sm" name="kode_pos"  type="text" placeholder="Kode POS*" required>
                                </div>
                            </div> --}}
                            <div class="col-lg-6 col-sm-6 mb-20">
                                <h5 class="font-md-bold color-brand-3 text-sm-start text-center">Pembayaran</h5>
                            </div>
                            <div class="box-payment">
                                <a class="btn btn-gpay radio" data-value="BCA">
                                    <img src="https://i.pinimg.com/originals/ed/a9/aa/eda9aabed661a98d62c5df2df6879258.png"
                                        alt="BCA">
                                </a>
                                <a class="btn btn-paypal radio" data-value="BNI">
                                    <img src="https://logowik.com/content/uploads/images/bni-bank-negara-indonesia8078.logowik.com.webp"
                                        alt="BNI">
                                </a>
                                <a class="btn btn-amazon radio" data-value="BRI">
                                    <img src="https://brandingkan.com/wp-content/uploads/2023/02/Logo-BRI.jpg" alt="BRI">
                                </a>
                            </div>
                            <p id="nomorRek" class="form-heading ">NO REK: <span id="nomorTujuan"></span></p>
                            <div class="col-lg-12">
                                <p class="form-heading">Bukti Pembayaran</span></p>
                                <div class="form-group">
                                    <input class="form-control font-sm file-input" name="bukti_pembayaran" type="file" placeholder="Kode POS*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <textarea class="form-control font-sm" name="pesan" placeholder="(Opsional) Tinggalkan pesan ke penjual" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1"
                                href="{{ route('show.cart') }}">Kembali ke Keranjang</a></div>
                                @if ($address)
                        <div class="col-lg-6 col-7 mb-20 text-end"><button class="btn btn-buy w-auto arrow-next" type="submit">Buat Pesanan</button></div>
                        @else
                        <p class="text-danger">Silakan isi alamat terlebih dahulu untuk membuat pesanan!</p>
                        @endif
                    </div>
                </form>
                </div>
                <div class="col-lg-6">
                    <div class="box-border">
                        <h5 class="font-md-bold mb-20">Produk Dipesan</h5>
                        <div class="listCheckout">
                            @foreach ($itemsInCart as $items)
                                <div class="item-wishlist">
                                    <div class="wishlist-product">
                                        <div class="product-wishlist">
                                            <div class="product-image"><a href=""><img
                                                        src="{{ asset('fotoProduk/' . explode(',', $items->foto)[0]) }}"
                                                        alt="Ecom"></a></div>
                                            <div class="product-info"><a href="shop-single-product.html">
                                                    <h6 class="color-brand-3">{{ $items->nama_stok }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wishlist-status">
                                        <h5 class="color-gray-500">x{{ $items->qty }}</h5>
                                    </div>
                                    <div class="wishlist-price">
                                        <h4 class="color-brand-3 font-lg-bold">
                                            Rp{{ number_format($items->harga_jual * $items->qty, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group mt-10">
                            <div class="border-bottom mb-10 pb-5">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">Total</span></div>
                                <div class="col-lg-6 col-6 text-end"><span
                                        class="font-lg-bold color-brand-3">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
