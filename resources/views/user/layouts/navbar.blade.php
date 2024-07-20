<header class="header sticky-bar">
    <div class="container">
      <div class="main-header">
        <div class="header-left">
          <div class="header-logo"><a class="d-flex" href="{{'/delcraft'}}"><img alt="Ecom" src="{{ asset('homepage-section/imgs/template/logo-1.png')}}" style="padding-right: 10px;"></a></div>
          <div class="header-search">
            <div class="box-header-search">
                <form class="form-search" method="get" action="{{ route('shop.grid') }}">
                    <div class="box-keysearch">
                        <input class="form-control font-xs" type="text" name="search" value="{{ request('search') }}" placeholder="Cari di Delcraft">
                    </div>
                </form>
            </div>
          </div>
          {{-- <div class="header-nav">
            <nav class="nav-main-menu d-none d-xl-block">
              <ul class="main-menu">
                <li><a class="active" href="{{'/delcraft'}}">Home</a>
                </li>
                <li><a href="{{route('shop.grid')}}">Shop</a>
                </li>
                <li class="has-children"><a href="#">Pages</a>
                  <ul class="sub-menu">
                    <li><a href="page-about-us.html">About Us</a></li>
                    <li><a href="page-contact.html">Contact Us</a></li>
                    <li><a href="page-careers.html">Careers</a></li>
                    <li><a href="page-term.html">Term and Condition</a></li>
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-login.html">Login</a></li>
                    <li><a href="page-404.html">Error 404</a></li>
                  </ul>
                </li>
                <li><a href="page-contact.html">Contact Us</a></li>
              </ul>
            </nav>
            <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
          </div> --}}
          <div class="header-shop">
            <div class="d-inline-block box-dropdown-cart"><span class="font-lg icon-list icon-account"><span>Account</span></span>
              <div class="dropdown-account">
                <ul>
                  <li><a href="{{route('profile.edit')}}">Pengaturan Akun</a></li>
                  <li><a href="{{'/orders'}}">Pesanan Saya</a></li>
                  @guest
                  <li><a href="{{ route('login') }}">Sign in</a></li>
                  @endguest
                  @auth
                  @if (Auth::user()->role === 'admin')
                  <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                   @endif
                  <li><form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
                    </form>
                </li>
                  @endauth
                </ul>
              </div>
            </div>
            <div class="d-inline-block box-dropdown-cart">
                <a href="{{route('show.cart')}}" class="font-lg icon-list icon-cart" ><span>Cart</span>
                <span class="number-item font-xs">{{ $cartCount ?? 0}}</span>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
