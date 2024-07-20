{{-- <style>
    .product_list_slider {
        margin-top: 30px;
    }

    .single_product_item {
        background-color: #fff;
        border: 1px solid #ebebeb;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 30px;
        height: 100%;
        text-align: center;
    }

    .single_product_item:hover {
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .product_image {
        margin-bottom: 15px;
        display: block;
        width: 100%;
        height: 200px; /* Set a fixed height for the product image */
        object-fit: cover;
    }

    .product_title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product_price {
        font-size: 16px;
        font-weight: 500;
        color: #ff3e6c;
        margin-bottom: 10px;

    }

    .product_description {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .add_cart {
        display: inline-block;
        background-color: #333;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }

    .add_cart:hover {
        background-color: #333;
        color: #fff;
        text-decoration: none;
    }

    .product_link {
        display: block;
        text-decoration: none;
        color: inherit;
    }
</style>

<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Catalog <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($products as $product)
                            @if($product->pajang == 'YA')
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <a href="{{ route('shop.detail', $product->id_stok) }}" class="product_link">
                                            <img class="product_image" src="{{ asset('fotoProduk/' . explode(",",$product->foto)[0]) }}" alt="{{ $product->nama_stok }}">
                                            <h4 class="product_title">{{ $product->nama_stok }}</h4>
                                        <div class="product_details">
                                            <p class="product_price">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</p>
                                            <p class="product_description">{{ $product->deskripsi }}</p>
                                            <form action="{{ route('addProduct.to.cart', $product->id_stok) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="add_cart">+ add to cart</button>
                                            </form>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}


{{-- @extends('shop.pages.layouts.index')
@section('content')
<style>
    .add-actions .add-actions-link .add-cart-btn {
    display: inline-block;
    width: 100%;
    background: none;
    border: none;
    color: inherit;
    cursor: pointer;
    text-align: center;
    font-weight: 500;
    padding: 0;
}

</style>

<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-12 col-md-12">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-1">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                <h2>Chamcham Galaxy S9 | S9+</h2>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-02 bg-2">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                <h2>Work Desk Surface Studio 2018</h2>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-3">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                <h2>Phantom 4 Pro+ Obsidian</h2>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->


            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Banner Area End Here -->
<!-- Begin Static Top Area -->
<div class="static-top-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="static-top-content mt-sm-30">
                    Gift Special: Gift every single day on Weekends - New Coupon code "
                    <span>LimupaSaleoff</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Top Area End Here -->
<!-- product-area start -->
<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                       <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                       <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($products as $product)
                        @if($product->pajang == 'YA')
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{ route('shop.detail', $product->id_stok) }}">
                                        <img src="{{ asset('fotoProduk/' . explode(",",$product->foto)[0]) }}" alt="{{ $product->nama_stok }}" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html"></a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">{{ $product->nama_stok }}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <form action="{{ route('addProduct.to.cart', $product->id_stok) }}" method="POST">
                                                @csrf
                                                <li class="add-cart">
                                                    <button type="submit" class="add-cart-btn">Add to cart</button>
                                                </li>
                                            </form>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-area end -->


<!-- Begin Li's Static Banner Area -->
<div class="li-static-banner li-static-banner-4 text-center pt-20">
    <div class="container">
        <div class="row">
            <!-- Begin Single Banner Area -->
            <div class="col-lg-6">
                <div class="single-banner pb-sm-30 pb-xs-30">
                    <a href="#">
                        <img src="{{ url('shop-template/images/banner/2_3.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-6">
                <div class="single-banner">
                    <a href="#">
                        <img src="{{ url('shop-template/images/banner/2_4.jpg')}}" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Static Banner Area End Here -->


<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Laptop</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                        <li><a href="shop-left-sidebar.html">Computers</a></li>
                        <li><a href="shop-left-sidebar.html">Electronics</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/1.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/2.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/3.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/4.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/5.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/6.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>TV & Audio</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        <li class="active"><a href="shop-left-sidebar.html">Chamcham</a></li>
                        <li><a href="shop-left-sidebar.html">Meito</a></li>
                        <li><a href="shop-left-sidebar.html">XailStation</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/3.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/5.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/7.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/9.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/11.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Accusantium dolorem1</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$46.80</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/product/large-size/11.jpg" alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2">$71.80</span>
                                            <span class="old-price">$77.22</span>
                                            <span class="discount-percentage">-7%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Sanai Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> $1209.00</span>
                    </p>
                    <div class="default-btn">
                        <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Li's Static Home Area End Here -->
<!-- Begin Group Featured Product Area -->
<div class="group-featured-product pt-60 pb-40 pb-xs-25">
    <div class="container">
        <div class="row">
            <!-- Begin Featured Product Area -->
            <div class="col-lg-4">
                <div class="featured-product">
                    <div class="li-section-title">
                        <h2>
                            <span>Chamcham</span>
                        </h2>
                    </div>
                    <div class="featured-product-active-2 owl-carousel">
                        <div class="featured-product-bundle">
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/1.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/2.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/3.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Area End Here -->
            <!-- Begin Featured Product Area -->
            <div class="col-lg-4">
                <div class="featured-product pt-sm-10 pt-xs-25">
                    <div class="li-section-title">
                        <h2>
                            <span>Meito</span>
                        </h2>
                    </div>
                    <div class="featured-product-active-2 owl-carousel">
                        <div class="featured-product-bundle">
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/4.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/5.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/6.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Area End Here -->
            <!-- Begin Featured Product Area -->
            <div class="col-lg-4">
                <div class="featured-product pt-sm-10 pt-xs-25">
                    <div class="li-section-title">
                        <h2>
                            <span>Sanai</span>
                        </h2>
                    </div>
                    <div class="featured-product-active-2 owl-carousel">
                        <div class="featured-product-bundle">
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/6.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/4.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-featured-pro-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="images/featured-product/2.jpg">
                                        </a>
                                    </div>
                                    <div class="featured-pro-content">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="product-details.html">Studio Design</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <h4><a class="featured-product-name" href="single-product.html">Mug Today is a good day</a></h4>
                                        <div class="featured-price-box">
                                            <span class="new-price">$71.80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Area End Here -->
        </div>
    </div>
</div>
@endsection --}}

@extends('user.layouts.index')
@section('content')
@include('user.layouts.banner')
<section class="section-box mt-50">
    <div class="container">
      <div class="head-main bd-gray-200">
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <h3 class="mb-5">Rekomendasi</h3>
            <p class="font-base color-gray-500">Temukan bermacam furnitur terbaik dari delcraft</p>
          </div>
          <div class="col-xl-6 col-lg-6">
            <ul class="nav nav-tabs text-uppercase pr-100" role="tablist">
              <li><a class="active" href="#tab-3-new" data-bs-toggle="tab" role="tab" aria-controls="tab-3-new" aria-selected="true" data-index="1">Produk Terbaru</a></li>
              <li><a href="#tab-3-bestseller" data-bs-toggle="tab" role="tab" aria-controls="tab-3-best" aria-selected="false" data-index="2">Paling Laris</a></li>
              <li><a href="{{route('shop.grid')}}">Lihat Semua</a></li>
            </ul>
            <!-- Button slider-->
            <div class="box-button-slider">
              <div class="button-slider-nav" id="tab-3-new-nav">
                <div class="swiper-button-next swiper-button-next-tab-1"></div>
                <div class="swiper-button-prev swiper-button-prev-tab-1"></div>
              </div>
              <div class="button-slider-nav" id="tab-3-best-nav">
                <div class="swiper-button-next swiper-button-next-tab-2"></div>
                <div class="swiper-button-prev swiper-button-prev-tab-2"></div>
              </div>
            </div>
            <!-- End Button slider-->
          </div>
        </div>
      </div>
      <div class="tab-content tab-content-slider">
        <div class="tab-pane fade active show" id="tab-3-new" role="tabpanel" aria-labelledby="tab-3-new">
            <div class="box-swiper">
              <div class="swiper-container swiper-tab-1">
                <div class="swiper-wrapper pt-5">
                  <div class="swiper-slide">
                    <div class="list-products-5">
                        @foreach ($newArrivals as $new)
                        @if($new->pajang == 'YA')
                        <div class="card-grid-style-3 home6-style">
                        <div class="card-grid-inner">
                          <div class="tools"> <a class="btn btn-quickview btn-tooltip" aria-label="Quick view" aria-label="Quick view" data-bs-toggle="modal" data-bs-target="#ModalQuickview{{ $new->id_stok }}"></a></div>
                          <div class="image-box"><span class="label bg-success">Terbaru</span><a href="{{ route('shop.detail', $new->id_stok) }}"><img src="{{ asset('fotoProduk/' . explode(",",$new->foto)[0]) }}" alt="{{ $new->nama_stok }}" alt="Ecom"></a>
                          </div>
                          <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">{{$new->nama_kategori}}</a><br><a class="color-brand-3 font-sm-bold" style="display: block; height: 50px; white-space: normal;" href="{{ route('shop.detail', $new->id_stok) }}">{{$new->nama_stok}}</a>
                            <div class="rating"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom">
                                <img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><span class="font-xs color-gray-500">({{$new->terjual ?? 0}}) Terjual</span></div>
                            <div class="price-info mb-10"><strong class="font-lg-bold color-brand-3 price-main">Rp{{ number_format($new->harga_jual, 0, ',', '.') }}</strong></div>
                            <div class="mt-10 box-btn-cart">
                                <form action="{{ route('addProduct.to.cart', $new->id_stok) }}"  method="POST">
                                    @csrf
                                <button type="submit"class="btn btn-cart" >+ Keranjang</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="tab-3-bestseller" role="tabpanel" aria-labelledby="tab-3-bestseller">
            <div class="box-swiper">
              <div class="swiper-container swiper-tab-2">
                <div class="swiper-wrapper pt-5">
                  <div class="swiper-slide">
                    <div class="list-products-5">
                        @foreach ($topSelling as $product)
                        <div class="card-grid-style-3 home6-style">
                        <div class="card-grid-inner">
                          <div class="tools"> <a class="btn btn-quickview btn-tooltip" aria-label="Quick view" aria-label="Quick view" data-bs-toggle="modal" data-bs-target="#ModalQuickview{{ $product->id_stok }}"></a></div>
                          <div class="image-box"><label class="label color-gray-500 bg-danger">Terlaris</label><a href="{{ route('shop.detail', $product->id_stok) }}"><img src="{{ asset('fotoProduk/' . explode(",",$product->foto)[0]) }}" alt="{{ $product->nama_stok }}" alt="Ecom"></a>
                          </div>
                          <div class="info-right"><a class="font-xs color-gray-500" href="shop-vendor-single.html">{{$product->nama_kategori}}</a><br><a class="color-brand-3 font-sm-bold" style="display: block; height: 50px; white-space: normal; href="shop-single-product-2.html">{{$product->nama_stok}}</a>
                            <div class="rating"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom"><img src="{{ asset('homepage-section/imgs/template/icons/star.svg')}}" alt="Ecom">
                                <span class="font-xs color-gray-500"> ({{$product->terjual ?? 0}}) Terjual</span></div>
                            <div class="price-info mb-10"><strong class="font-lg-bold color-brand-3 price-main">Rp{{ number_format($product->harga_jual, 0, ',', '.') }}</strong></div>
                            <div class="mt-10 box-btn-cart"><a class="btn btn-cart" href="">+ Keranjang</a></div>
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
      </div>
    </div>
  </section>
  @endsection


