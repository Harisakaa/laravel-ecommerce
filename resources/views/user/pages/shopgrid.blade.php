
    @extends('user.layouts.index')
    @section('title', 'Product Grid - Delcraft')
    @section('content' )
    <main class="main">
        <div class="section-box">
          <div class="breadcrumbs-div">
            <div class="container">
              <ul class="breadcrumb">
                <li><a class="font-xs color-gray-1000" href="{{route('home')}}">Home</a></li>
                <li><a class="font-xs color-gray-500 active">Shop</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="section-box shop-template mt-30">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 order-first order-lg-last">
                <div class="box-filters mt-0 pb-5 border-bottom">
                  <div class="row">
                    <div class="col-xl-2 col-lg-3 mb-10 text-lg-start text-center"><a class="btn btn-filter font-sm color-brand-3 font-medium">Produk</a></div>
                    @php
                    $start = ($products->currentPage() - 1) * $products->perPage() + 1;
                    $end = min($start + $products->perPage() - 1, $products->total());
                    @endphp
                    <div class="col-xl-10 col-lg-9 mb-10 text-lg-end text-center"><span class="font-sm color-gray-900 font-medium border-1-right span">Showing {{ $start }}&ndash;{{ $end }} of {{ $products->total() }} results</span>
                      <div class="d-inline-block"><span class="font-sm color-gray-500 font-medium">Urutkan: {{ $sort == 'terbaru' ? 'Terbaru' : ($sort == 'terlama' ? 'Terlama' : ($sort == 'terendah' ? 'Harga: Rendah ke Tinggi' : ($sort == 'tertinggi' ? 'Harga: Tinggi ke Rendah' : 'Paling Sesuai'))) }}
                    </button> </span>
                        <div class="dropdown dropdown-sort border-1-right">
                            <form method="GET" action="{{ route('shop.grid', ['id' => $id]) }}">
                            <button class="btn dropdown-toggle font-sm color-gray-900 font-medium" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort" style="margin: 0px;">
                                <li><button type="submit" name="sort" value="default" class="dropdown-item">Paling Sesuai</button></li>
                                <li><button type="submit" name="sort" value="terbaru" class="dropdown-item">Terbaru</button></li>
                                <li><button type="submit" name="sort" value="terlama" class="dropdown-item">Terlama</button></li>
                                <li><button type="submit" name="sort" value="terendah" class="dropdown-item">Harga: Rendah ke Tinggi</button></li>
                                <li><button type="submit" name="sort" value="tertinggi" class="dropdown-item">Harga: Tinggi ke Rendah</button></li>
                            </ul>
                        </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-20">

                @foreach($products as $product)
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-grid-style-3 home6-style">
                        <div class="card-grid-inner">
                          <div class="image-box"><a href="{{ route('shop.detail', $product->id_stok) }}"><img src="{{ asset('fotoProduk/' . explode(",",$product->foto)[0]) }}" alt="{{ $product->nama_stok }}" alt="Ecom"></a>
                          </div>
                          <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">{{$product->nama_kategori}}</a><br><a class="color-brand-3 font-sm-bold" style="display: block; height: 50px; white-space: normal;" href="{{ route('shop.detail', $product->id_stok) }}">{{$product->nama_stok}}</a>
                            <div class="rating"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom">
                            <img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><span class="font-xs color-gray-500">({{$product->qty ?? 0}}) Terjual</span></div>
                            <div class="price-info mb-10"><strong class="font-lg-bold color-brand-3 price-main">Rp{{ number_format($product->harga_jual, 0, ',', '.') }}</strong></div>
                            <div class="mt-10 box-btn-cart">
                                <form action="{{ route('addProduct.to.cart', $product->id_stok) }}"  method="POST">
                                    @csrf
                                <button type="submit"class="btn btn-cart" >+ Keranjang</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  @endforeach
                </div>
                @if ($products->hasPages())
                <nav>
                <ul class="pagination">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled"><a class="page-link page-prev" href="#"></a></li>
                    @else
                        <li class="page-item"><a class="page-link page-prev" href="{{ $products->previousPageUrl() }}"></a></li>
                    @endif

                    @foreach ($products->links()->elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $products->currentPage())
                                    <li class="page-item"><a class="page-link active">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($products->hasMorePages())
                        <li class="page-item"><a class="page-link page-next" href="{{ $products->nextPageUrl() }}"></a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link page-next" href="#"></a></li>
                    @endif
                </ul>
            </nav>
        @endif
              </div>
              <div class="col-lg-3 order-last order-lg-first">
                <div class="sidebar-border mb-0">
                  <div class="sidebar-head">
                    <h6 class="color-gray-900">Kategori Produk</h6>
                  </div>
                  <div class="sidebar-content">
                    <ul class="list-nav-arrow">
                      @foreach ($categories as $category)
                          <li class="{{ request()->route('id') == $category->id ? 'active' : '' }}">
                              <a href="{{ route('shop.grid', ['id' => $category->id]) }}">
                                  {{ $category->nama_kategori }}
                                  <span class="number">{{ $category->total_product }}</span>
                              </a>
                          </li>
                      @endforeach
                  </ul>
                  </div>
                </div>
            </div>
        </div>
      </main>
      @endsection


