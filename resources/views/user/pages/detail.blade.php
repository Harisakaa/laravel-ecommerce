
    @extends('user.layouts.index')
    @section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
          <div class="container">
            <ul class="breadcrumb">
              <li><a class="font-xs color-gray-1000" href="{{route('home')}}">Home</a></li>
              <li><a class="font-xs color-gray-500">Product</a></li>
              <li><a class="font-xs color-gray-500" >Details</a></li>
            </ul>
          </div>
        </div>
      </div>
      <section class="section-box shop-template">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="gallery-image">
                <div class="galleries">
                  <div class="detail-gallery">
                    <div class="product-image-slider">
                      @foreach(explode(",",$product->foto) as $foto)
                      <figure class="border-radius-10"><img src="{{ asset('fotoProduk/' . $foto) }}" alt="product image"></figure>
                      @endforeach
                    </div>
                  </div>
                  <div class="slider-nav-thumbnails">
                    @foreach(explode(",",$product->foto) as $foto)
                    <div>
                      <div class="item-thumb"><img src="{{ asset('fotoProduk/' . $foto) }}" alt="product image"></div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h3 class="color-brand-3 mb-25">{{$product->nama_stok}}</h3>
              <div class="rating mt-5"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom">
                <img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom">
                <img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom">
                <span class="font-xs color-gray-500">({{$product->terjual}}) Terjual</span></div>
              <div class="border-bottom pt-20 mb-40"></div>
              <div class="box-product-price">
                <h3 class="color-brand-3 price-main d-inline-block mr-10">Rp{{ number_format($product->harga_jual, 0, ',', '.') }}</h3>
              </div>
              <div class="product-description mt-20 color-gray-900">{{$product->deskripsi}}</div>
              <div class="buy-product mt-20">
                <p class="font-sm mb-20">Quantity</p>
                <form action="{{ route('addProduct.to.cart', $product->id_stok) }}" method="POST">
                 @csrf
                <div class="box-quantity">
                  <div class="input-quantity-detail">
                    <input class="font-xl color-brand-3" name="qty" type="text" value="1" min="1" max="{{ $product->saldo_awal }}">
                    <span class="minus-cart"></span>
                    <span class="plus-cart"></span>
                  </div>
                  <div class="button-buy"><button class="btn btn-cart" type="submit" >+ Keranjang</button></div>
                </div>
                </form>
              </div>
              <div class="info-product mt-20 font-md color-gray-900">Category: {{$product->nama_kategori}}<br> Stok: {{ $product->saldoakhir }} <br> Satuan: {{ $product->nama_satuan }}</div>
            </div>
          </div>
          <div class="border-bottom pt-20 mb-40"></div>
        </div>
      </section>
      <section class="section-box shop-template">
        <div class="container">
          <div class="pt-30 mb-10">
            <ul class="nav nav-tabs nav-tabs-product" role="tablist">
              <li><a class="active" href="#tab-description" data-bs-toggle="tab" role="tab" aria-controls="tab-description" aria-selected="true">Informasi Produk</a></li>
              <li><a href="#tab-specification" data-bs-toggle="tab" role="tab" aria-controls="tab-specification" aria-selected="true">Spefikasi Produk</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tab-description" role="tabpanel" aria-labelledby="tab-description">
                <div class="display-text-short">
                  <p>{{$product->deskripsi}}</p>
                </div>
                <div class="mt-20 text-center"><a class="btn btn-border font-sm-bold pl-80 pr-80 btn-expand-more">More Details</a></div>
              </div>
              <div class="tab-pane fade" id="tab-specification" role="tabpanel" aria-labelledby="tab-specification">
                <h5 class="mb-25">Specification</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <td>Mode</td>
                      <td>#SK10923</td>
                    </tr>
                    <tr>
                      <td>Brand</td>
                      <td>SamSung</td>
                    </tr>
                    <tr>
                      <td>Size</td>
                      <td>6.7"</td>
                    </tr>
                    <tr>
                      <td>Finish</td>
                      <td>Pacific Blue</td>
                    </tr>
                    <tr>
                      <td>Origin of Country</td>
                      <td>United States</td>
                    </tr>
                    <tr>
                      <td>Manufacturer</td>
                      <td>USA</td>
                    </tr>
                    <tr>
                      <td>Released Year</td>
                      <td>2022</td>
                    </tr>
                    <tr>
                      <td>Warranty</td>
                      <td>International</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-additional" role="tabpanel" aria-labelledby="tab-additional">
                <h5 class="mb-25">Additional information</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Weight</td>
                        <td>
                          <p>0.240 kg</p>
                        </td>
                      </tr>
                      <tr>
                        <td>Dimensions</td>
                        <td>
                          <p>0.74 x 7.64 x 16.08 cm</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--Related products-->
              <div class="border-bottom pt-30 mb-50"></div>
              <h4 class="color-brand-3">Produk Serupa</h4>
              <div class="tab-pane fade active show" id="tab-3-all" role="tabpanel" aria-labelledby="tab-3-all">
                <div class="box-swiper">
                  <div class="swiper-container swiper-tab-1">
                    <div class="swiper-wrapper pt-5">
                      <div class="swiper-slide">
                        <div class="list-products-5">
                            @foreach ($relatedProducts as $productRelated)
                            <div class="card-grid-style-3 home6-style">
                            <div class="card-grid-inner">
                              <div class="tools"> <a class="btn btn-quickview btn-tooltip" aria-label="Quick view" aria-label="Quick view" data-bs-toggle="modal" data-bs-target="#ModalQuickview{{ $productRelated->id_stok }}"></a></div>
                              <div class="image-box"><a href="{{ route('shop.detail', $productRelated->id_stok) }}"><img src="{{ asset('fotoProduk/' . explode(",",$productRelated->foto)[0]) }}" alt="{{ $productRelated->nama_stok }}" alt="Ecom"></a>
                              </div>
                              <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">{{$productRelated->nama_kategori}}</a><br><a class="color-brand-3 font-sm-bold" style="display: block; height: 50px; white-space: normal;" href="shop-single-product-2.html">{{$productRelated->nama_stok}}</a>
                                <div class="rating"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><span class="font-xs color-gray-500">(65)</span></div>
                                <div class="price-info mb-10"><strong class="font-lg-bold color-brand-3 price-main">Rp{{ number_format($productRelated->harga_jual, 0, ',', '.') }}</strong></div>
                                <div class="mt-10 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a></div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </section>


      @endsection
