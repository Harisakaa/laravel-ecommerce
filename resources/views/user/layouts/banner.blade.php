<section class="section-box mt-35">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="banner-left">
            <div class="box-adsolute-banner">
              <h5 class="color-gray-900">Perlengkapan Kantor</h5><a href="{{ route('shop.grid', ['keyword' => 'kantor']) }}" class="btn btn-link-brand-2 text-capitalize">Lihat Produk</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-30">
          <div class="box-swiper">
            <div class="swiper-container swiper-banner-1">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="banner-middle" style="background-image: url('{{ asset('homepage-section/imgs/page/homepage6/banner2.png') }}')">
                    <div class="box-adsolute-banner">
                      <h6 class="color-gray-900 mb-10">Big & Fresh Offers</h6>
                      <h2 class="color-gray-1000 mb-5">DECORA & CRAFTS</h2>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="banner-middle" style="background-image: url('{{ asset('homepage-section/imgs/page/homepage6/banner2-2.png') }}')">
                    <div class="box-adsolute-banner">
                      <h6 class="color-gray-900 mb-10">Big & Fresh Offers</h6>
                      <h2 class="color-gray-1000 mb-5">DECORA & CRAFTS</h2>
                      <a class="btn btn-link-brand-2 text-capitalize">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next swiper-button-next-style-4"></div>
              <div class="swiper-button-prev swiper-button-prev-style-4"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="banner-right-home6">
            <div class="box-adsolute-banner">
              <h5 class="color-gray-900">Living Room</h5><a href="{{ route('shop.grid', ['keyword' => 'sofa']) }}" class="btn btn-link-brand-2 text-capitalize">Lihat Produk</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <div class="section-box mt-0 mb-25">
    <div class="section-box mt-30">
        <div class="container">
        <div class="col-lg-12 mb-40 text-center">
            <h3>Kategori Pilihan</h3>
            <p class="font-base color-gray-500">Temukan furniture berdasarkan kategori pilihan</p>
        </div>
          <div class="box-swiper">
            <div class="swiper-container swiper-group-6">
              <div class="swiper-wrapper pt-5">
                @foreach ($showCategories as $categories )
                <div class="swiper-slide">
                <a href="{{ route('shop.grid', ['id' => $categories->id]) }}">
                  <div class="item-cat">
                    <div class="box-category-1">
                      <div class="box-image">
                        <div class="inner-image"><img src="{{ asset('storage/kategori/' . $categories->gambar) }}" alt="Ecom"></div>
                      </div>
                      <div class="box-info"> <a class="color-gray-900 font-md-bold" href="#">{{$categories->nama_kategori}}</a>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!-- Categories -->
  {{-- <section class="section-box mt-20">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Pilihan Ruangan</h3>
          <p class="font-base color-gray-500">Temukan furniture sesuai ruangan yang kamu inginkan</p>
        </div>
      </div>
      <div class="mt-50">
        <div class="box-swiper">
          <div class="swiper-container swiper-group-4">
            <div class="swiper-wrapper pt-5">
              <div class="swiper-slide">
                <div class="card-category">
                  <div class="card-image"><a href="#"><img src="{{ asset('homepage-section/imgs/page/homepage6/living-room.png')}}" alt="Ecom"></a></div>
                  <div class="card-info"><a href="blog-single.html">
                      <h5 class="color-brand-3 mb-5">Ruang Tamu</h5>
                      <p class="font-md color-gray-500"></p></a></div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card-category">
                  <div class="card-image"><a href="#"><img src="{{ asset('homepage-section/imgs/page/homepage6/bed-room.png')}}" alt="Ecom"></a></div>
                  <div class="card-info"><a href="blog-single.html">
                      <h5 class="color-brand-3 mb-5">Ruang Tidur</h5>
                      <p class="font-md color-gray-500">156 products</p></a></div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card-category">
                  <div class="card-image"><a href="#"><img src="{{ asset('homepage-section/imgs/page/homepage6/kitchen.png')}}" alt="Ecom"></a></div>
                  <div class="card-info"><a href="blog-single.html">
                      <h5 class="color-brand-3 mb-5">Dapur</h5>
                      <p class="font-md color-gray-500">156 products</p></a></div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card-category">
                  <div class="card-image"><a href="#"><img src="{{ asset('homepage-section/imgs/page/homepage6/decoration.png')}}" alt="Ecom"></a></div>
                  <div class="card-info"><a href="blog-single.html">
                      <h5 class="color-brand-3 mb-5">Dekorasi</h5>
                      <p class="font-md color-gray-500">produk</p></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="border-bottom"></div>
    </div>
  </section> --}}
