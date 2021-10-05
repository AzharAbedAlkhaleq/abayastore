@include('user.includes.head')

<body>
    @include('user.includes.header')

    <div class="shoping_container">

        <!-- Open Content -->


        <div class="shoping_container product_data">

            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif

            <!-- Open Content -->
            <section class="bg-shoping">
                <div class="container pb-5">
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12 mt-5">
                            <h5><a href="{{route('category.detalis',$product->category->slug_ar)}}">{{$product->category->name_ar}}</a> / {{$product->name_ar}}</h5>
                            <div class="card mb-3">
                                @if ($product->video)
                                    <a class="video-icon" id="btn_video" href="#">
                                        <img width="30px" src="{{ asset('front/images/video-icon-1.png') }}" alt="">
                                        <span>مشاهدة الفيديو</span>
                                    </a>
                                @endif
                                <img class="card-img "
                                    src="{{ asset('assets/uploads/product/' . $product->image_ar) }}"
                                    alt="Card image cap" id="product-detail" height="400">

                            </div>
                             <!-- The Modal -->
                             <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    
                                    <video  controls src='{{ asset("assets/uploads/videos/$product->video") }}'></video>
                                </div>

                            </div>
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    @foreach ($product->images as $image)
                                        <div class="swiper-slide"> <img class="card-img "
                                                src="{{ asset('assets/uploads/product/' . $image->filename) }}"
                                                alt="Card image cap" id="product-detail"></div>

                                    @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>

                            <div class="product_rated container pt-4">
                                <h6>التقييم و المراجعات</h6>
                                <div class="row pt-3">
                                    <div class="col-4">
                                        <h5>4.5 <i class="fas fa-star"></i></h5>
                                        <p>1,344 التقييمات & 343 المراجعات</p>
                                    </div>




                                </div>
                            </div>
                           
                            <div class="reve">
                                <div>
                                    <p> جيد جدا <span class="px-2 py-1">5 <i class="fas fa-star"></i></span></p>
                                    <img src="images/womenhihab11.jpg" width="100px;" height="80px">
                                    <div class="d-flex justify-content-between mt-2">
                                        <p>العباية <i class="mr-2 fas fa-check-circle"></i> مشتري منذ ١١ شهر </p>
                                        <p><i class="fas fa-thumbs-up"></i> 17 <i class="fas fa-thumbs-down"></i> 5</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p> جيد جدا <span class="px-2 py-1">5 <i class="fas fa-star"></i></span></p>
                                    <img src="images/womenhihab11.jpg" width="100px;" height="80px">
                                    <div class="d-flex justify-content-between mt-2">
                                        <p>العباية <i class="mr-2 fas fa-check-circle"></i> مشتري منذ ١١ شهر </p>
                                        <p><i class="fas fa-thumbs-up"></i> 17 <i class="fas fa-thumbs-down"></i> 5</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 mt-5 col-sm-12 rightside">
                            <div class=" ">
                                <div class="card-body">
                                    <h1 class="h2">{{ $product->name_ar }}</h1>
                                    <p class=" py-2">
                                        @if ($product->Selling_price > 0)
                                            <del>OMR {{ $product->orginal_price }}</del> <span style="color: red">
                                                &nbsp;&nbsp;&nbsp;&nbsp; OMR
                                                {{ $product->orginal_price - ($product->orginal_price * $product->Selling_price) / 100 }}

                                                </ </p>

                                            @else
                                                OMR {{ $product->orginal_price }}
                                    </p>

                                    @endif

                                    <p>موقع عباية لوتس لبيع جميع انواع العبايات</p>



                                    <form action="{{ route('add-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product-title" value="Activewear">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="">

                                            <ul class="
                                            list-inline">
                                            <li class="list-inline-item">
                                                <h6>الالوان المتاحة :</h6>
                                            </li>
                                            <li class="list-inline-item">
                                                <select class="form-control text-center" name="product-color" id="">
                                                    @foreach ($product->color as $color)
                                                        <option value="{{ $color->color->id }}">
                                                            {{ $color->color->color }}</option>
                                                    @endforeach
                                                </select>
                                            </li>

                                            </ul>
                                            <div class=" col-auto">
                                                <ul class="list-inline pb-3">
                                                    <li class="list-inline-item">
                                                        <h6>الحجم :</h6>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <select class="form-control text-center" name="product-size"
                                                            id="">
                                                            @foreach ($product->size as $size)
                                                                <option class="p-3"
                                                                    value="{{ $size->size->id }}">
                                                                    {{ $size->size->size }}</option>
                                                            @endforeach
                                                        </select>

                                                    </li>



                                                </ul>
                                            </div>

                                        </div>

                                        <div class="row pb-3 pt-2">
                                            <div class="d-grid btn1">
                                                <button type="submit" class="btn btn-success mt-2 " name="submit"
                                                    value="buy">
                                                    <i class="mx-2 fas fa-bolt"></i> اشتري الآن </button>
                                            </div>
                                            <div class="d-grid mx-3 btn2">
                                                <button type="submit" class="btn btn-success  mt-2 addToCart"
                                                    name="submit" value="addtocard"> <i
                                                        class="mx-2 fas fa-shopping-cart"></i> إضف إلى السلة
                                                </button>
                                            </div>
                                            <div class="col-auto ">
                                                <ul class="list-inline pb-3 mt-2">
                                                    <li class="list-inline-item text-right">
                                                        {{-- <label style="font-size: 24px;mb-5"> الكمية</label>
                                                    &nbsp;&nbsp; --}}
                                                        الكمية

                                                    </li>
                                                    <button type="button" class="btn btn-outline-success decrement-btn"
                                                        id="btn-minus">-</button>

                                                    <input type="text" name="quantity" class="qty-input text-center"
                                                        id="product-quanity" value="1">
                                                        
                                                    <button type="button"
                                                        class="btn btn-outline-success increment-btn list-inline-item"
                                                        id="btn-plus">+</button>
                                                </ul>

                                            </div>
                                        </div>

                                    </form>

                                    <div class="d-flex">
                                        <p class="pt-2" style="color: #8b8109;">شارك :</p>
                                        <ul class="list-unstyled d-flex">
                                            <li class="mx-1 p-2"><a href="#"><i class="fab fa-facebook-f"
                                                        style="color: fff;border-radius: 50%;font-size:25px;"></i></a>
                                            </li>
                                            <li class="mx-1 p-2"><a href="#"><i class=" fab fa-twitter"
                                                        style="border-radius: 50%;font-size:25px;"></i></a></li>
                                            <li class="mx-1 p-2"><a href="#"><i class="fab fa-instagram"
                                                        style="color: #9b4444;border-radius: 50%;font-size:25px;"></i></a>
                                            </li>
                                            <li class="mx-1 p-2"><a href="#"><i class="fab fa-whatsapp"
                                                        style="color: #5b9b4b;border-radius: 50%;font-size:25px;"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="charg py-2 px-2">
                                        <p class="p1 py-2"><i class="px-2 fas fa-truck"></i>شحن مجاني لمدة 5 أيام
                                        </p>
                                        <p><i class="px-2 fas fa-arrow-left"></i> ارجاع مجاني لمدة 30 يوما لتغيير رأيك
                                        </p>
                                    </div>
                                    <div class="desc mt-4 px-3 py-2">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                                    aria-selected="true"> تفاصيل المنتج
                                                </a>
                                                <a class="nav-link " id="nav-profile-tab" data-toggle="tab"
                                                    href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                    aria-selected="false">الوصف</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content pt-3" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab"> {{ $product->description_ar }}
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">{{ $product->small_desc_ar }}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <video width="560" height="315" controls>
                                    <source src="{{ asset('assets/uploads/videos/'.$product->video) }}" type="video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                  </video>

                                <iframe class="mt-5" width="" height="315" src="https://www.youtube.com/embed/fMPEx0zJl7g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                                </div>
                            </div>
                        </div>





                    </div>
                </div>

            </section>

            <div class="relatedproduct pt-4 pb-5">
                <div class=" container ">
                    <h4 class="py-4">قد يعجبك أيضا</h4>
                    <div class="row">
                        @foreach ($related_products as $related_product)
                            <div class="col-md-3 col-sm-6">
                                <div class="box px-3 text-center">
                                    <img src="{{ asset('assets/uploads/product/' . $related_product->image_ar) }}"
                                        alt="women">
                                    <h5 class="pt-4 "> <a style="text-decoration: none; color:black"
                                            href="{{ route('shopping', $related_product->id) }}">{{ $related_product->name_ar }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Close Content -->

        </div>




        @section('scripts')
            <script>
                $(document).ready(function() {


                    //-----------------------make increment for the product quantity------------------------------

                    $('.increment-btn').click(function(e) {
                        e.preventDefault();
                        var inc_value = $('.qty-input').val();
                        var value = parseInt(inc_value, 10);
                        value = isNaN(value) ? 0 : value;
                        if (value < {{ $product->quantity }}) {
                            value++;
                            $('.qty-input').val(value);
                        }
                    });

                    //------------------------------decreament the quantity-----------------------------
                    $('.decrement-btn').click(function(e) {
                        e.preventDefault();
                        var dec_value = $('.qty-input').val();
                        var value = parseInt(dec_value, 10);
                        value = isNaN(value) ? 0 : value;
                        if (value < {{ $product->quantity }} && value > 1) {
                            value--;
                            $('.qty-input').val(value);
                        }

                    });

                    //--------------------addToCart------------------------------------
                    /* $('.addToCart').click(function(e) {
                        e.preventDefault();
                        var product_id = $(this).closest('.product_data').find('.prod_id').val();
                        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                        alert();
                    }); */

                    //-------------------------btn video---------------------

                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("btn_video");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                });
            </script>
        @endsection
        @include('user.includes.footer')
