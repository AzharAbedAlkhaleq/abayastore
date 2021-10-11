<header>
    <div class="main">

        <a class="px-5" href="#">
            <div class="navbar-brand">
                <img style="margin-top:30px" src="{{ asset('front/images/logo.jpeg') }}" class="brand">
            </div>
        </a>
        <nav class="navbar navbar-expand-lg  ">
            <div class="nav-container">

                <button style=" background-color:#fff ;color: #fff;" class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #fff;"></span>
                </button>

                <div class="collapse navbar-collapse   justify-content-between" id="navbarSupportedContent">
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link " href="{{ url('/') }}">الرئيسية <span
                                        class="sr-only"></span></a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ url('user/categories') }}">الأقسام <span
                                        class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('arrival') }}">العبايات الجديدة <span
                                        class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('aboutUs') }}">من نحن <span
                                        class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('contact') }}">تواصل معنا <span
                                        class="sr-only"></span></a>
                            </li>


                        </ul>
                    </div>
                    <div class="lgside d-flex justify-content-end">

                        @if (\Illuminate\Support\Facades\Auth::check())
                            <div class="dropdown">
                                <li class="nav-item dropdown list-unstyled">

                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <img src=" {{ \Illuminate\Support\Facades\Auth::user()->picture }} "
                                            class="rounded-circle" alt="...">
                                    </a>
                                    <div class="dropdown-menu li" aria-labelledby="navbarDropdown">
                                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                        <a class="q" href="#"
                                            onclick="document.getElementById('logout').submit()"> تسجيل الخروج </a>
                                        <form id="logout" class="d-none" action="{{-- route('logout') --}}"
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


                        <form class="search">
                            <div class="search__wrapper">
                                <input type="text" name="" placeholder="Search" class="search__field">
                                <button type="submit" class="fa fa-search search__icon"></button>
                            </div>
                    </div>
                </div>
            </div>
        </nav>


    </div>
</header>
