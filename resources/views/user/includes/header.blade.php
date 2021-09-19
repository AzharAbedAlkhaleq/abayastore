<header>
    <div class="main">
        <a class="navbar-brand px-5 " href="#"><img  style="margin-top:30px"   src="{{ asset('front/images/logo.jpeg') }}" class="brand"></a>
        <nav class="navbar navbar-expand-lg  ">
            <div class="">

                <button style="background-color:#fff ;color: #fff;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #fff;"></span>
                </button>

                <div class="collapse navbar-collapse   justify-content-between" id="navbarSupportedContent">
                   <div>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link " href="{{ url('/') }}">الرئيسية <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('shopping') }}">التسوق <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ url('user/categories') }}">الفئات <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('arrival') }}">العبايات الجديدة <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('aboutUs') }}">من نحن <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link mx-1" href="{{ route('contact') }}">تواصل معنا <span class="sr-only"></span></a>
                            </li>


                        </ul>
                   </div>
                    <div class="lgside d-flex justify-content-end">
                        
                        @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="dropdown">
                        <li class="nav-item dropdown list-unstyled">
                           
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <img src="{{\Illuminate\Support\Facades\Auth::user()->picture}}" class="rounded-circle" alt="...">
                            </a>
                            <div class="dropdown-menu li" aria-labelledby="navbarDropdown">
                                {{\Illuminate\Support\Facades\Auth::user()->name}}
                                <a class="q" href="#" onclick="document.getElementById('logout').submit()"> تسجيل الخروج </a>
                                <form id="logout" class="d-none" action="{{-- route('logout') --}}" method="post">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </div>
                    @else
                    
                        <a class="px-2" href="{{ route('login') }}">تسجيل دخول</a>
                        @endif
                        <div class="lang">
                            <select class="px-2 py-1">
                                <option value="en" selected>العربية</option>
                                <option value="ar">English</option>
                            </select>
                        </div>
                        <a href="{{ route('cart') }}">
                            <img src="{{ asset('front/images/shopping-bag.ico') }}" class="mx-2">

                        </a>
                    <div class="hart px-2">    <i class="far fa-heart" ></i></div>
                        <i class="pt-1 fas fa-search"></i>
                    </div>
                </div>
            </div>
        </nav>
      

    </div>
</header>
