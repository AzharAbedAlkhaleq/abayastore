<header>
    <div class="main">

        <a class="px-5" href="#">
            <div class="navbar-brand">
                <img style="margin-top:30px" src="{{ asset('front/images/logo.png') }}" class="brand">
            </div>
        </a>
        <nav class="navbar navbar-expand-lg  ">
            <div class="nav-container">

                <button style=" background-color:#fff ;color: #fff;" class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #fff;">
                    </span>
                </button>

                <div class="collapse navbar-collapse   justify-content-between" id="navbarSupportedContent">
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link " href="{{ url('/') }}">{{__('Main')}} <span
                                        class="sr-only"></span></a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ url('user/categories') }}">{{__('Categories')}} <span
                                        class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('arrival') }}">@lang('New Arrival') <span
                                        class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('aboutUs') }}"> {{__('About us')}} <span
                                        class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('contact') }}">{{__('Contact Us')}} <span
                                        class="sr-only"></span></a>
                            </li>


                        </ul>
                    </div>
                    <div class="lgside d-flex justify-content-end">

                        @if (Auth::check())
                            <div class="dropdown">
                                <li class="nav-item dropdown list-unstyled">

                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <img src="{{Auth::user()->picture}}"
                                            class="rounded-circle" alt="...">
                                    </a>
                                    <div class="dropdown-menu li text-center" aria-labelledby="navbarDropdown">
                                        {{Auth::user()->name }}
                                        <a class="btn btn-outline-light btn-sm d-block" style="color:#000" href="{{route('order.index')}}">الطلبات</a>
                                        <a class="btn btn-outline-light btn-sm d-block" style="color:#000" href="#"
                                            onclick="document.getElementById('logout').submit()"> تسجيل الخروج </a>
                                             <form id="logout" class="d-none" action="{{route('user.logout')}}"
                                                method="post">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>
                        @else






                            <a class="px-2" href="{{ route('login') }}">تسجيل دخول</a>
                        @endif
                        <div class="lang">
                            <select onchange="window.location=this.value">
                                {{-- @foreach (LaravelLocalization::getSupportedLocales() as $code => $locale)
                                <option value="{{ LaravelLocalization::getLocalizedURL($code) }}" @if ($code == app()->getLocale())selected @endif>{{ $locale['native'] }}</option>
                                @endforeach --}}
                                <option value="">العربية</option>
                                <option>English</option>
                            </select>
                        </div>
                        <a href="{{ route('cart') }}">
                            @php
                                $cart = App\Models\Cart::with('product')
                                    ->where('cart_id', App::make('cart.id'))
                                    ->get();
                                
                                $id = Cookie::get('id_product');
                                $id = json_decode($id);
                                if (is_array($id)) {
                                    # code...
                                    $count = count($id);
                                }
                            @endphp
                            <i class="fas fa-shopping-bag icon mx-2"></i>
                        </a>
                        <div id="count_cart" class="count_cart">{{ $cart->count() }}</div>

                        <div class="hart px-2"><a href="{{ route('wishlist.index') }}"><i
                                    class="far fa-heart icon"></i></a></div>
                        <div id="count_wishlist" class="count_cart">{{ $count ?? 0 }}</div>
                        {{-- <div class="searchbar">
                                        <input class="search" type="text" name="" placeholder="">
                                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                                      </div> --}}


                        <form class="search" method="get" action="{{route('user.search')}}">
                            <div class="search__wrapper">
                                <input type="text" name="search" placeholder="Search" class="search__field">
                                <button type="submit" class="fa fa-search search__icon"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


    </div>
</header>
