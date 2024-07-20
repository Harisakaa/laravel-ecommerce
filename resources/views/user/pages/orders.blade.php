
@extends('user.layouts.index')
@section('content')

<div class="section-box">
    <div class="breadcrumbs-div">
      <div class="container">
        <ul class="breadcrumb">
          <li><a class="font-xs color-gray-1000" href="index.html">Home</a></li>
          <li><a class="font-xs color-gray-500" href="shop-grid.html">Shop</a></li>
          <li><a class="font-xs color-gray-500">Daftar Transaksi</a></li>
        </ul>
      </div>
    </div>
  </div>

@if($orders->isEmpty())
<div class="container mt-100 pb-100">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <img src="{{asset('homepage-section/imgs/page/checkout/sheet.png')}}" alt="Keranjang Kosong" width="200">
            <h3 class="mt-">Belum ada pesanan</h3>
            <p>Sepertinya Anda belum melakukan pesanan, silahkan melakukan pesanan terlebih dahulu.</p>
            <a href="{{route('shop.grid')}}" class="btn btn-buy w-auto arrow-back mb-10 mt-10">Belanja Sekarang</a>
        </div>
    </div>
</div>
@else
<section class="section-box shop-template mt-30">
    <div class="container box-account-template">
        <h3>Hai, {{Auth::user()->name}}</h3>
        <p class="font-md color-gray-500">From your account dashboard. you can easily check & view your recent orders,<br
                class="d-none d-lg-block">manage your shipping and billing addresses and edit your password and account
            details.</p>
        <div class="box-tabs mb-100 pt-40">
            <ul class="nav nav-tabs nav-tabs-account" role="tablist">
                <li><a href="#tab-orders" class="active" data-bs-toggle="tab" role="tab" aria-controls="tab-orders"aria-selected="true">Daftar Transaksi</a></li>
            </ul>
            <div class="border-bottom mt-20 mb-40"></div>
            <div class="tab-pane fade active show" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders">
                @foreach ($orders as $no_bukti => $orderGroup)
                <div class="box-orders">
                    <div class="head-orders">
                        <div class="head-left">
                            <h5 class="mr-20">NO. Pesanan: #{{$no_bukti}}</h5><span
                                class="font-md color-brand-3 mr-20">Tanggal:  {{ \Carbon\Carbon::parse($orderGroup->first()->created_at)->format('d-m-Y') }}</span>
                                @if ($orderGroup->first()->status == 'pending')
                                <span class="label-delivery">Menunggu Verifikasi</span>
                                @else
                                <span class="label-delivery label-delivered">Sukses</span>
                                @endif
                        </div>
                        <div class="head-right"><a href="{{ route('cetak.struk', ['no_bukti' => $no_bukti]) }}" class="btn btn-buy font-sm-bold w-auto">Lihat Detail</a></div>
                    </div>
                    <div class="body-orders">
                        <div class="list-orders">

                            @foreach ($orderGroup as $order )
                            <div class="item-orders">
                                <div class="image-orders"><img src="{{ asset('fotoProduk/' . explode(",",$order->foto)[0]) }}" alt="Ecom">
                                </div>
                                <div class="info-orders">
                                    <h5>{{$order->nama_stok}}</h5> <br>

                                </div>
                                <div class="quantity-orders">
                                    <h5>X{{$order->qty}} </h5>
                                </div>
                                <div class="price-orders">
                                    <h5>Rp{{ number_format($order->harga_jual * $order->qty, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link page-prev" href="#"></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link active" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link page-next" href="#"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
