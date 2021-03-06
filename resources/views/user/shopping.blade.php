
@section('css')
    <style>
        
        .container_product{
            position: relative;
        }
       img {
            vertical-align: middle;
            }
        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            left: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(39, 39, 39, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            /* width: 16.66%; */
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

    </style>

    <style>
        
        .img-zoom-container {
          position: relative;
        }
        
        .img-zoom-lens {
          position: absolute;
          border: 1px solid #d4d4d4;
          /*set the size of the lens:*/
          width: 40px;
          height: 40px;
        }
        
        .img-zoom-result {
            border: 1px solid #d4d4d4; 
            width: 455px;
            height: 355px ;
            z-index: 99;
            position: absolute;
            top: 0;
            right: 480px;
        }
        </style>

@endsection

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
                    <div class="alert alert-success text-center " id="msg_success" style="display: none" role="alert">
                        <strong>???? ?????????? ???????????? ??????????</strong>
                    </div>

                  
                    <div class="row">

                        <div class="slider_product col-md-5">
              
              
                    <nav class="breadcrumb-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user')}}">????????????????</a></li>
                        <span class="breadcrumb-chevron">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <li class="breadcrumb-item"><a href="{{route('user.categories')}}">??????????????</a></li>
                        <span class="breadcrumb-chevron">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <li class="breadcrumb-item"><a href="{{route('category.detalis',$product->category->slug_ar)}}">{{$product->category->name_ar}}</a></li>
                        <span class="breadcrumb-chevron">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->name_ar}}</li>
                        </ol>
                    </nav>
                         
                            <div class="container_product">
                                <div class="card mb-3">
                                    @if ($product->video)
                                    <a class="video-icon" id="btn_video" href="#">
                                        <img width="30px" src="{{ asset('front/images/video-icon-1.png') }}" alt="">
                                        <span>???????????? ??????????????</span>
                                    </a>
                                    @endif
                                    
                            
                                </div> 
                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                            
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                            
                                        <video controls src='{{ asset("assets/uploads/videos/$product->video") }}'></video>
                                    </div>
                            
                                </div>
                                
                                <div class="mySlides img-zoom-container">
                                    <img class="myimage" src="{{ asset('assets/uploads/product/' . $product->image_ar) }}" style="width:100%; height:540px">
                                
                                </div>

                                @foreach ($product->images as $image)
                                <div class="mySlides img-zoom-container">
                                    <img class="myimage" src="{{ asset('assets/uploads/product/' . $image->filename) }}" style="width:100%; height:540px">
                                </div>
                                @endforeach
                                 
                                
                                <a class="prev" onclick="plusSlides(-1)">???</a>
                                <a class="next" onclick="plusSlides(1)">???</a>

                             
                               
                                <div class="row mt-3 text-center">
                                   
                                    @php
                                       $i = 2; 
                                    @endphp
                                    <div class="swiper mySwiper2">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"> 
                                                <div class="column">
                                                    <img class="demo cursor" src="{{ asset('assets/uploads/product/' . $product->image_ar) }}"{{--  style="width:100%" --}}
                                                        onclick="currentSlide(1)" width="90px" height="90px" alt="Cinque Terre">
                                                </div>
                                            </div>
                                            @foreach ($product->images as $image)
                                            <div class="swiper-slide"> 
                                                <div class="column">
                                                    <img class="demo cursor mx-2" src="{{ asset('assets/uploads/product/' . $image->filename) }}"{{--  style="width:100%" --}}
                                                        onclick="currentSlide({{$i++}})" width="90px" height="90px" alt="The Woods">
                                                </div>                                            
                                            </div>
                                            @endforeach

                                          {{--   
                                            <div class="swiper-slide"> <img class="card-img " src="images/women.jpeg" alt="Card image cap" id="product-detail"></div> --}}
            
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                     
                        <div class="product_rated container pt-4">
                            <h6>?????????????? ?? ??????????????????</h6>
                            <div class="row pt-3">
                                <div class="">
                                    <h5>4.5 <i class="fas fa-star"></i></h5>
                                    <p>?????????????????? & ?????????????????? ({{$product->reviews->count()}})</p>
                                </div>




                            </div>
                        </div>

                        <div class="reve">
                            @foreach ($product->reviews as $review)
                                
                            <div class="mt-4">
                                <span>{{$review->user->name}}</span>
                                <p>  <span class="px-2 py-1">{{$review->rate}} <i class="fas fa-star"></i></span></p>
                                {{$review->notes}}
                                <div class="d-flex justify-content-between mt-2">
                                    <p>?????????????? <i class="mr-2 fas fa-check-circle"></i> ??????????  {{$review->created_at->diffForHumans()}}  </p>
                                    {{-- <p><i class="fas fa-thumbs-up"></i> 17 <i class="fas fa-thumbs-down"></i> 5</p> --}}
                                </div>
                            </div>
                            <hr style="background: #fff">
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-6 mt-5 col-sm-12 rightside">
                        <div class=" ">
                            <div class="card-body">
                                <div class="product_name">
                                    <h1 class="h2">{{ $product->name_ar }} </h1>
                                    @if ($product->quantity > 0)
                                        <p class="available_product">??????????</p>
                                    @else
                                        <p class="unavailable_product">?????? ??????????</p>
                                    @endif

                                </div>

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


                                <form id="form_cart" action="" method="post">
                                    @csrf
                                    <input type="hidden" name="product-title" value="Activewear">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="d-flex">

                                        <ul class="
                                            list-inline">
                                            <li class="list-inline-item">
                                                <p>?????????????? ?????????????? :</p>
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
                                                    <p>???????????? :</p>
                                                </li>
                                                <li class="list-inline-item">
                                                    <select class="form-control text-center" name="product-size" id="">
                                                        @foreach ($product->size as $size)
                                                            <option class="p-3" value="{{ $size->id }}">
                                                                {{ $size->size }}</option>
                                                        @endforeach
                                                    </select>

                                                </li>



                                            </ul>
                                        </div>

                                    </div>

                                    <div class="row pb-3 pt-2">
                                        <div class="d-grid btn1">
                                            <a  class="btn btn-success mt-2" href="{{route('login')}}"
                                               >
                                                <i class="mx-2 fas fa-bolt"></i> ?????????? ???????? </a>
                                        </div>
                                        <div class="d-grid mx-3 btn2">
                                            <button id="add_cart" type="submit" class="btn btn-success  mt-2 addToCart"
                                                name="submit" value="addtocard"> <i
                                                    class="mx-2 fas fa-shopping-cart"></i> ?????? ?????? ??????????
                                            </button>
                                        </div>
                                        <div class="col-auto ">
                                            <ul class="list-inline pb-3 mt-2">
                                                <li class="list-inline-item text-right">
                                                    {{-- <label style="font-size: 24px;mb-5"> ????????????</label>
                                                    &nbsp;&nbsp; --}}
                                                    ????????????

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
                                        <div class="alert alert-danger text-center " id="msg_error_login" style="display: none" role="alert"></div>

                                    </div>

                                </form>
                                <div class="d-flex">
                                    <p class="pt-2" style="color: #8b8109;">???????? :</p>
                                    {{-- start share package --}}
                                    {!! $shareComponent!!}
                                    {{-- End share package --}}
                                   
                                   {{--  <ul class="list-unstyled d-flex">
                                        <li class=""><a href="#"></a>
                                        </li>
                                        <li class="mx-1 p-2"><a href="#"><i class=" fab fa-twitter"
                                                    style="border-radius: 50%;font-size:25px;"></i></a></li>
                                        <li class="mx-1 p-2"><a href="#"><i class="fab fa-instagram"
                                                    style="color: #9b4444;border-radius: 50%;font-size:25px;"></i></a>
                                        </li>
                                        <li class="mx-1 p-2"><a href="#"><i class="fab fa-whatsapp"
                                                    style="color: #5b9b4b;border-radius: 50%;font-size:25px;"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>

                                <div class="charg py-2 px-2">
                                    <p class="p1 py-2"><i class="px-2 fas fa-truck"></i>?????? ?????????? ???????? 5 ????????
                                    </p>
                                    <p><i class="px-2 fas fa-arrow-left"></i> ?????????? ?????????? ???????? 30 ???????? ???????????? ????????
                                    </p>
                                </div>
                                <div class="desc mt-4 px-3 py-2">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true"> ???????????? ????????????
                                            </a>
                                            <a class="nav-link " id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">??????????</a>
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
                            @auth
                                
                            
                            @if (Auth::user()->customer->order->where('status','completed')->first())
                          
                            @if ($product->order->product_id = $product->id && $product_id->product_id = $product->id ) 
                           
                            <form action="{{route('stroe.review')}}" method="post">
                                @csrf
                                <h3>?????? ????????????</h3>
                                <h4 >??????????????</h4>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>

                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>

                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>

                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>

                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                                <textarea name="notes" class="form-control review-area mt-3" id="" placeholder="??????????????" rows="3"></textarea>
                                <button class="btn btn-success mt-3">????????</button>
                            </form>

                            @endif

                            @endif
                            @endauth
                        </div>
                    </div>

                </div>



                </div>
        </div>

        </section>

        <div class="relatedproduct pt-4 pb-5">
            <div class=" container ">
                <h4 class="py-4">???? ?????????? ????????</h4>
                <div class="row">
                    @foreach ($related_products as $related_product)
                        <a style="text-decoration: none;color:black; text-align:right;"
                            href="{{ route('shopping', $related_product->id) }}">

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
        <script src="{{asset('front/js/jquery.zoom.min.js')}}"></script>
        <script>
         $(document).ready(function(){
        $('.zoomImg')
            
            .css('display', 'block')
            .css('width', '100%')
            .parent()
            .zoom();
        });
        </script>
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
        <script>
            $(document).on('click', '#add_cart', function(e) {
                e.preventDefault();
                var formData = new FormData($('#form_cart')[0]);
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{ route('add-cart') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if (data.status == true) {
                            $('#msg_success').show();
                            $("#count_cart").text(function() {
                                return (1 + Number($("#count_cart").text()));
                            });
                        } else if (data.status == 'update') {
                            $('#msg_success').show();
                        }else if (data.status == 'login') {
                            // window.location = "{{route('login')}}";
                            $('#msg_error_login').show();
                            $('#msg_error_login').append("<strong>"+ "??????  <a target='_blank' href='{{route('login')}}'>?????????? ????????????"+"</a>"+" ???????????? ???? ?????????? ???????????????? ?????????? "+"</strong>")
                        }
                    },
                    error: function(reject) {
                       var errorsArray = reject.responseJSON.errors.quantity;
                       console.log(errorsArray.length);
                        $('#msg_error').show();
                       for(var i = 0; errorsArray.length  > i ; i++){
                        $('#msg_error').append("<li><strong>"+ errorsArray[i]+"</strong></li>");
                       
                       }
        
                    }
                });
            });
        </script>

        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }
        </script>
       <script>
     $(document).ready(function(){
        $('.myimage')
          
            .css('display', 'block')
            .parent()
            .zoom();
        });
       </script>
    @endsection
    @include('user.includes.footer')
