{{-- @extends('shop.pages.layouts.index')
@section('content')
    <!doctype html>
    <html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/bootstrap.min.css') }}">
        <!-- animate CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/animate.css') }}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/owl.carousel.min.css') }}">
        <!-- nice select CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/nice-select.css') }}">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/all.css') }}">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ url('shop-page/css/themify-icons.css') }}">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/magnific-popup.css') }}">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/slick.css') }}">
        <link rel="stylesheet" href="{{ url('shop-page/css/price_rangs.css') }}">
        <!-- style CSS -->
        <link rel="stylesheet" href="{{ url('shop-page/css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    </head>

    <style>
        button.inumber-decrement,
        button.number-increment {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        button.inumber-decrement i,
        button.number-increment i {
            font-size: inherit;
            color: inherit;
        }
        .cart_area{
            margin-bottom: 100px;
        }
    </style>


    <section class="cart_area">
        <div class="container">
            <section class="breadcrumb ">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Your Cart </h2>
                        <p>Home <span>-</span>Cart Products</p>
                    </div>
                </div>

            </section>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table id= "cart" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"><i class="fas fa-times" style="color: #797979; font-size: 20px;"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $items)
                                <tr id-stok="{{ $items->id_stok }}">
                                    <td>
                                        <div class="media">
                                            <div class="d-flex" style="height: 200px; object-fit: cover; display: block;">
                                                <img src="{{ asset('fotoProduk/' . explode(',', $items->foto)[0]) }}"
                                                    alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $items->nama_stok }} </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($items->harga_jual, 0, ',', '.') }}</h5>
                                    </td>
                                    <td>
                                        <form action="{{ route('update.cart', ['id_stok' => $items->id_stok]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="product_count d-flex align-items-center">
                                                <button class="inumber-decrement" name="decrement"> <i
                                                        class="ti-minus"></i></button>
                                                <input class="input-number" name="qty" type="text"
                                                    value="{{ $items->qty }}" min="1">
                                                <button class="number-increment" name="increment"> <i
                                                        class="ti-plus"></i></button>
                                            </div>
                                        </form>

                                    </td>
                                    <td>
                                        <h5 id="total-price-{{ $items->id_stok }}">
                                            {{ number_format($items->harga_jual * $items->qty, 0, ',', '.') }}</h5>
                                    </td>
                                    <td class="actions">
                                        <form action="{{ route('delete.cart.product', $items->id_stok) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk?')"
                                                style="background: none; border: none; padding: 0;">
                                                <i class="fas fa-times"
                                                    style="color: #797979; font-size: 20px; cursor: pointer;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h3><strong>Subtotal: </strong></h3>
                                </td>
                                <td>
                                    <h4>{{ number_format($subtotal, 0, ',', '.') }}</h4>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_3" href="{{ route('home') }}">Continue Shopping</a>
                        <a class="btn_3 checkout_btn_1" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
    </section>
@endsection --}}



@extends('user.layouts.index')
@section('content')
{{--
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                    <th class="li-product-remove">remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $items)
                                <tr>
                                    <td class="li-product-thumbnail"><img src="{{ asset('fotoProduk/' . explode(",", $items->foto)[0]) }}" alt="Li's Product Image"></td>
                                    <td class="li-product-name"><p>{{ $items->nama_stok }}</p></td>
                                    <td class="li-product-price"><span class="amount">$46.80</span></td>
                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="">
                                            <form action="{{ route('update.cart',['id_stok' => $items->id_stok]) }}" method="POST">
                                                @csrf
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" name="qty" type="text" value="{{ $items->qty }}" min="1">
                                                    <div class="dec qtybutton" name="decrement"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton" name="increment"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </form>
                                            </div>
                                        </td>
                                    <td class="product-subtotal"><span class="amount">{{ number_format($items->harga_jual * $items->qty, 0, ',', '.') }}</span></td>
                                    <td class="action">
                                        <form action="{{ route('delete.cart.product', $items->id_stok) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk?')" style="background: none; border: none; padding: 0;">
                                                <i class="fa fa-times" style="color: #797979; font-size: 20px; cursor: pointer;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>$130.00</span></li>
                                    <li>Total <span>$130.00</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div> --}}

@include('sweetalert::alert')
    <div class="section-box">
      <div class="breadcrumbs-div">
        <div class="container">
          <ul class="breadcrumb">
            <li><a class="font-xs color-gray-1000" href="index.html">Home</a></li>
            <li><a class="font-xs color-gray-500" href="shop-grid.html">Shop</a></li>
            <li><a class="font-xs color-gray-500" href="shop-cart.html">Cart</a></li>
          </ul>
        </div>
      </div>
    </div>
    @if($cartItems->isEmpty())
    <div class="container mt-100 pb-150">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="{{asset('homepage-section/imgs/page/cart/empty-cart.png')}}" alt="Keranjang Kosong" width="300">
                <h3 class="mt-">Keranjang belanja Anda kosong</h3>
                <p>Sepertinya Anda belum menambahkan produk ke keranjang.</p>
                <a href="{{route('shop.grid')}}" class="btn btn-buy w-auto arrow-back mb-10 mt-10">Belanja Sekarang</a>
            </div>
        </div>
    </div>
    @else
    <section class="section-box shop-template">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 mb">
            <div class="box-carts">
              <div class="head-wishlist">
                <div class="item-wishlist">
                  <div class="wishlist-cb">
                  </div>
                  <div class="wishlist-product"><span class="font-md-bold color-brand-3">Produk</span></div>
                  <div class="wishlist-price"><span class="font-md-bold color-brand-3">Harga Unit</span></div>
                  <div class="wishlist-status"><span class="font-md-bold color-brand-3">Quantity</span></div>
                  <div class="wishlist-action"><span class="font-md-bold color-brand-3">Subtotal</span></div>
                  <div class="wishlist-remove"><span class="font-md-bold color-brand-3">Hapus</span></div>
                </div>
              </div>
              <div class="content-wishlist mb-20">
                @foreach ($cartItems as $items)
                <div class="item-wishlist">
                  <div class="wishlist-cb">
                  </div>
                  <div class="wishlist-product">
                    <div class="product-wishlist">
                      <div class="product-image"><a href=""><img src="{{ asset('fotoProduk/' . explode(',', $items->foto)[0]) }}" alt="Ecom"></a></div>
                      <div class="product-info"><a href="shop-single-product.html">
                          <h6 class="color-brand-3">{{$items->nama_stok}}</h6></a>
                      </div>
                    </div>
                  </div>
                  <div class="wishlist-price">
                    <h4 class="color-brand-3 unit-price">{{ number_format($items->harga_jual, 0, ',', '.') }}</h4>
                  </div>
                  <div class="wishlist-status">
                    <div class="box-quantity">
                    <form action="{{ route('update.cart',['id_stok' => $items->id_stok]) }}" method="POST">
                        @csrf
                      <div class="input-quantity">
                        <input class="color-brand-3" type="text" name="qty"  value="{{ $items->qty }}">
                        <span class="qty-plus qtybutton"></span>
                        <span class="qty-minus qtybutton"></span>
                      </div>
                    </form>
                    </div>
                  </div>
                  <div class="wishlist-action">
                    <h4 class="color-brand-3 unit-price"> {{ number_format($items->harga_jual * $items->qty, 0, ',', '.') }}</h4>
                  </div>
                  <div class="wishlist-remove">
                    <form action="{{ route('delete.cart.product', $items->id_stok) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-delete"></button>
                    </form>
                </div>
                </div>
                @endforeach
              </div>
              <div class="row mb-40">
                <div class="col-lg-6 col-md-6 col-sm-6-col-6"><a class="btn btn-buy w-auto arrow-back mb-10" href="shop-grid.html">Lanjut Berbelanja</a></div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="summary-cart">
              <div class="border-bottom mb-20 pb-10">
                <span class="font-md-bold color-gray-500 pb">Ringkasan belanja</span>
              </div>
              <div class="mb-10">
                <div class="row">
                  <div class="col-6"><span class="font-md-bold color-gray-500">Total</span></div>
                  <div class="col-6 text-end">
                    <h4 class="total">	{{ number_format($subtotal, 0, ',', '.') }}</h4>
                  </div>
                </div>
              </div>
              <div class="box-button"><a class="btn btn-buy" href="{{route('checkout.show')}}">Checkout</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

    <div class="modal fade" id="ModalFiltersForm" tabindex="-1" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-xl">
        <div class="modal-content apply-job-form">
          <div class="modal-header">
            <h5 class="modal-title color-gray-1000 filters-icon">Addvance Fillters</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-30">
            <div class="row">
              <div class="col-w-1">
                <h6 class="color-gray-900 mb-0">Brands</h6>
                <ul class="list-checkbox">
                  <li>
                    <label class="cb-container">
                      <input type="checkbox" checked="checked"><span class="text-small">Apple</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Samsung</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Baseus</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Remax</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Handtown</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Elecom</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Razer</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Auto Focus</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Nillkin</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Logitech</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">ChromeBook</span><span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
              <div class="col-w-1">
                <h6 class="color-gray-900 mb-0">Special offers</h6>
                <ul class="list-checkbox">
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">On sale</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox" checked="checked"><span class="text-small">FREE shipping</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Big deals</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Shop Mall</span><span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
                <h6 class="color-gray-900 mb-0 mt-40">Ready to ship in</h6>
                <ul class="list-checkbox">
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">1 business day</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox" checked="checked"><span class="text-small">1&ndash;3 business days</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">in 1 week</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Shipping now</span><span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
              <div class="col-w-1">
                <h6 class="color-gray-900 mb-0">Ordering options</h6>
                <ul class="list-checkbox">
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Accepts gift cards</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Customizable</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox" checked="checked"><span class="text-small">Can be gift-wrapped</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Installment 0%</span><span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
                <h6 class="color-gray-900 mb-0 mt-40">Rating</h6>
                <ul class="list-checkbox">
                  <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(5 stars)</span></a></li>
                  <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(4 stars)</span></a></li>
                  <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(3 stars)</span></a></li>
                  <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(2 stars)</span></a></li>
                  <li class="mb-5"><a href="#"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom"><span class="ml-10 font-xs color-gray-500 d-inline-block align-top">(1 star)</span></a></li>
                </ul>
              </div>
              <div class="col-w-2">
                <h6 class="color-gray-900 mb-0">Material</h6>
                <ul class="list-checkbox">
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Nylon (8)</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Tempered Glass (5)</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox" checked="checked"><span class="text-small">Liquid Silicone Rubber (5)</span><span class="checkmark"></span>
                    </label>
                  </li>
                  <li>
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Aluminium Alloy (3)</span><span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
                <h6 class="color-gray-900 mb-20 mt-40">Product tags</h6>
                <div><a class="btn btn-border mr-5" href="#">Games</a><a class="btn btn-border mr-5" href="#">Electronics</a><a class="btn btn-border mr-5" href="#">Video</a><a class="btn btn-border mr-5" href="#">Cellphone</a><a class="btn btn-border mr-5" href="#">Indoor</a><a class="btn btn-border mr-5" href="#">VGA Card</a><a class="btn btn-border mr-5" href="#">USB</a><a class="btn btn-border mr-5" href="#">Lightning</a><a class="btn btn-border mr-5" href="#">Camera</a></div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-start pl-30"><a class="btn btn-buy w-auto" href="#">Apply Fillter</a><a class="btn font-sm-bold color-gray-500" href="#">Reset Fillter</a></div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalQuickview" tabindex="-1" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-xl">
        <div class="modal-content apply-job-form">
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-body p-30">
            <div class="row">
              <div class="col-lg-6">
                <div class="gallery-image">
                  <div class="galleries-2">
                    <div class="detail-gallery">
                      <div class="product-image-slider-2">
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></figure>
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></figure>
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></figure>
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></figure>
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></figure>
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></figure>
                        <figure class="border-radius-10"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></figure>
                      </div>
                    </div>
                    <div class="slider-nav-thumbnails-2">
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="product image"></div>
                      </div>
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="product image"></div>
                      </div>
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="product image"></div>
                      </div>
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="product image"></div>
                      </div>
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="product image"></div>
                      </div>
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="product image"></div>
                      </div>
                      <div>
                        <div class="item-thumb"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="product image"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-tags">
                  <div class="d-inline-block mr-25"><span class="font-sm font-medium color-gray-900">Category:</span><a class="link" href="#">Smartphones</a></div>
                  <div class="d-inline-block"><span class="font-sm font-medium color-gray-900">Tags:</span><a class="link" href="#">Blue</a>,<a class="link" href="#">Smartphone</a></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="product-info">
                  <h5 class="mb-15">SAMSUNG Galaxy S22 Ultra, 8K Camera & Video, Brightest Display Screen, S Pen Pro</h5>
                  <div class="info-by"><span class="bytext color-gray-500 font-xs font-medium">by</span><a class="byAUthor color-gray-900 font-xs font-medium" href="shop-vendor-list.html"> Ecom Tech</a>
                    <div class="rating d-inline-block"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><img src="assets/imgs/template/icons/star.svg" alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65 reviews)</span></div>
                  </div>
                  <div class="border-bottom pt-10 mb-20"></div>
                  <div class="box-product-price">
                    <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3><span class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
                  </div>
                  <div class="product-description mt-10 color-gray-900">
                    <ul class="list-dot">
                      <li>8k super steady video</li>
                      <li>Nightography plus portait mode</li>
                      <li>50mp photo resolution plus bright display</li>
                      <li>Adaptive color contrast</li>
                      <li>premium design & craftmanship</li>
                      <li>Long lasting battery plus fast charging</li>
                    </ul>
                  </div>
                  <div class="box-product-color mt-10">
                    <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink Gold</span></p>
                    <ul class="list-colors">
                      <li class="disabled"><img src="assets/imgs/page/product/img-gallery-1.jpg" alt="Ecom" title="Pink"></li>
                      <li><img src="assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom" title="Gold"></li>
                      <li><img src="assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom" title="Pink Gold"></li>
                      <li><img src="assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom" title="Silver"></li>
                      <li class="active"><img src="assets/imgs/page/product/img-gallery-5.jpg" alt="Ecom" title="Pink Gold"></li>
                      <li class="disabled"><img src="assets/imgs/page/product/img-gallery-6.jpg" alt="Ecom" title="Black"></li>
                      <li class="disabled"><img src="assets/imgs/page/product/img-gallery-7.jpg" alt="Ecom" title="Red"></li>
                    </ul>
                  </div>
                  <div class="box-product-style-size mt-10">
                    <div class="row">
                      <div class="col-lg-12 mb-10">
                        <p class="font-sm color-gray-900">Style:<span class="color-brand-2 nameStyle">S22</span></p>
                        <ul class="list-styles">
                          <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                          <li class="active" title="S22">S22</li>
                          <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                        </ul>
                      </div>
                      <div class="col-lg-12 mb-10">
                        <p class="font-sm color-gray-900">Size:<span class="color-brand-2 nameSize">512GB</span></p>
                        <ul class="list-sizes">
                          <li class="disabled" title="1GB">1GB</li>
                          <li class="active" title="512 GB">512 GB</li>
                          <li title="256 GB">256 GB</li>
                          <li title="128 GB">128 GB</li>
                          <li class="disabled" title="64GB">64GB</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="buy-product mt-5">
                    <p class="font-sm mb-10">Quantity</p>
                    <div class="box-quantity">
                      <div class="input-quantity">
                        <input class="font-xl color-brand-3" type="text" value="1"><span class="minus-cart"></span><span class="plus-cart"></span>
                      </div>
                      <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add to cart</a><a class="btn btn-buy" href="shop-checkout.html">Buy now</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
