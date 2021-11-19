@section('css')
    <style>
        input[type='range'] {
            width: 100%;
            height: 30px;
            overflow: hidden;
            cursor: pointer;
            outline: none;
        }

        input[type='range'],
        input[type='range']::-webkit-slider-runnable-track,
        input[type='range']::-webkit-slider-thumb {
            -webkit-appearance: none;
            background: none;
        }

        input[type='range']::-webkit-slider-runnable-track {
            width: 200px;
            height: 1px;
            background: #003D7C;
        }

        input[type='range']:nth-child(2)::-webkit-slider-runnable-track {
            background: none;
        }

        input[type='range']::-webkit-slider-thumb {
            position: relative;
            height: 15px;
            width: 15px;
            margin-top: -7px;
            background: #fff;
            border: 1px solid #003D7C;
            border-radius: 25px;
            z-index: 1;
        }


        input[type='range']:nth-child(1)::-webkit-slider-thumb {
            z-index: 2;
        }

        .rangeslider {
            position: relative;
            height: 60px;
            width: 80%;
            display: inline-block;
            margin-top: -5px;
            margin-left: 20px;
        }

        .rangeslider input {
            position: absolute;
        }

        .rangeslider {
            position: absolute;
        }

        .rangeslider span {
            position: absolute;
            margin-top: 30px;
            left: 0;
        }

        .rangeslider .right {
            position: relative;
            float: right;
            margin-right: -5px;
        }


        /* Proof of concept for Firefox */
        @-moz-document url-prefix() {
            .rangeslider::before {
                content: '';
                width: 100%;
                height: 2px;
                background: #003D7C;
                display: block;
                position: relative;
                top: 16px;
            }

            input[type='range']:nth-child(1) {
                position: absolute;
                top: 35px !important;
                overflow: visible !important;
                height: 0;
            }

            input[type='range']:nth-child(2) {
                position: absolute;
                top: 35px !important;
                overflow: visible !important;
                height: 0;
            }

            input[type='range']::-moz-range-thumb {
                position: relative;
                height: 15px;
                width: 15px;
                margin-top: -7px;
                background: #fff;
                border: 1px solid #003D7C;
                border-radius: 25px;
                z-index: 1;
            }

            input[type='range']:nth-child(1)::-moz-range-thumb {
                transform: translateY(-20px);
            }

            input[type='range']:nth-child(2)::-moz-range-thumb {
                transform: translateY(-20px);
            }
        }

    </style>
@endsection
@include('user.includes.head')

<body>
    @include('user.includes.header')

    <div class="products_main">

        <div class="mainimg">
            <div class="container text-center pt-5">
                <h3 class="mt-5">{{ $category->name_ar }}</h3>

            </div>
        </div>
        
        <div class="products container mt-3">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('user')}}">الرئيسية</a></li>
                <span class="breadcrumb-chevron">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <li class="breadcrumb-item"><a href="{{route('user.categories')}}">الأقسام</a></li>
                <span class="breadcrumb-chevron">
                    <i class="fas fa-chevron-left"></i>
                </span>
    
                <li class="breadcrumb-item active" aria-current="page">{{$category->name_ar}}</li>
                </ol>
            </nav>
            <div class="alert alert-success text-center " id="msg_success" style="display: none" role="alert">
                <strong id="text_msg">تم اضافة المنتج بنجاح</strong>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 rightside py-3">
                    <form action="{{ route('category.detalis', $category->slug_ar) }}" method="get">

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-filter col-3">فلتر</button>
                        </div>

                        <p class="d-flex justify-content-between">الفئات</p>
                        <select id="filter_category" style=" font-size:20px" class="form-select form-control" name="slug_ar">
                            <option value="">{{ trans('admin.Select the Category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug_ar }}">{{ $category->name_ar }}</option>
                            @endforeach
                        </select>
                        <div>

                        

                            <div class="filter">

                                <div class="marka mt-4">
                                    <p class="btn2 d-flex justify-content-between">تقيمات العملاء <i
                                            class="fas fa-angle-down"></i></p>
                                    <div class="checkboxs2">
                                        <div class="form-check mb-2">
                                            <input class="mt-2" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                استديو اصلاح التوب
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="" type=" checkbox" value="" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                استديو اصلاح التوب
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="marka mt-4">
                                    <p class="btn3 d-flex justify-content-between"> حجم <i
                                            class="fas fa-angle-down"></i></p>
                                    @foreach ($sizes as $size)
                                        <div class="checkboxs3">
                                            <div class="form-check mb-2">
                                                <input class="mt-2" type="checkbox" name="size[]"
                                                    value="{{ $size->id }}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $size->size }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="marka mt-4">
                                    <p class="btn4 d-flex justify-content-between"> عروض و خصم <i
                                            class="fas fa-angle-down"></i></p>
                                    <div class="checkboxs4">
                                        <div class="form-check mb-2">
                                            <input class="mt-2" type="checkbox" name="saling_price"
                                                value="saling_price" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                عروض وخصوم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="marka mt-4">
                        <p class="btn5 d-flex justify-content-between"> الفئة <i class="fas fa-angle-down"></i></p>
                        <div class="checkboxs5">
                            <div class="form-check mb-2">
                                <input class="mt-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="" type="checkbox" value="" id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                   استديو اصلاح التوب 
                                </label>
                            </div>
                        </div>
                    </div> --}}
                            </div>
                            <hr>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-secondary btn-filter col-3">فلتر</button>
                            </div>
                        </div>
                    </form>
                </div><!-- end rightside -->
                <div class="col-md-8 col-sm-12 leftside">
                    <p>عرض 17 2-1 of من 3.398 نتيجة ل "abaya"</p>
                    <div class="d-flex list">
                        <h6>رتب حسب : </h6>
                        <ul class="list-unstyled d-flex listss">
                            <a href="{{ URL::current() . '?sort=popularity' }}" style="text-decoration: none">
                                <li class="px-3 mx-2">الأكثر طلبا</li>
                            </a>
                            <a href="{{ URL::current() . '?sort=price_asc' }}" style="text-decoration: none">
                                <li class="px-3 mx-2">السعر من الاقل الي الاعلي</li>
                            </a>
                            <a href="{{ URL::current() . '?sort=price_desc' }}" style="text-decoration: none">
                                <li class="px-3 mx-2">السعر من الاعلي الي الاقل</li>
                            </a>
                            <a href="{{ URL::current() . '?sort=newest' }}" style="text-decoration: none">
                                <li class="px-3 mx-2">الاحدث اولا </li>
                            </a>
                        </ul>
                    </div>

                    <div class="product row pt-2">
                        
                        @foreach ($category_products as $prod)

                            <div class="col-md-4 col-sm-2 text-center">
                                {{-- <a href="{{ url('category/'.$category->slug_ar.'/'.$prod->slug_ar) }}"> --}}
                                

                                    <img id="myImg" class="my_img" src="{{ asset('assets/uploads/product/' . $prod->image_ar) }}" alt="women">
                                    <div id="myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close">&times;</span>
                                    
                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img01">
                                    
                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption"></div>
                                    </div>
                                    {{-- </a> --}}
                                    <h6 class="pt-3 pb-2">
                                        <a style="text-decoration: none; color:black;"
                                    href="{{ route('shopping', $prod->id) }}">

                                        {{ $prod->name_ar }}

                                </a>
                                </h6>
                                <p><a class="heart-icon" href="" product_id="{{$prod->id}}"><i
                                    class="far fa-heart icon "></i></a> OMR
                                    {{ $prod->orginal_price }} </p>
                            </div>


                        @endforeach
                           

                    </div>
                    
                </div><!-- end leftside -->

            </div>

        </div>


        <div class="rates mt-5">
            <div class="container py-3">
                <h5 class="pb-3 pt-2">مراجعات للعبايات الشعبية </h5>
                <div class="rated">
                    <div class="row">
                       
                        @foreach ($reviews_products as $products)
                   
                        <div class="col-md-4 col-sm-12">
    
                            <div class="row">
                               <div class="col-md-7 col-sm-12">
                                <img src="{{ asset('assets/uploads/product/'.$products->image_ar)}}">
                                  </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pp">
                                        <h6>{{$products->name_ar}}</h6>
                                      
                                        
                                        
                                        <p class="pt-2">  تقييمات ({{$products->reviews->count()}})</p>
                                       {{--  <p class="pt-2">  {{$products->reviews_avg}} تقييمات  مراجعات</p> --}}
                                       <div class="d-flex starr"> 
                                           <span class="px-2 mx-2 mt-2"> {{$products->reviews->avg('rate')}} <i class="fas fa-star"></i></span>
                                        </div>
                                       @foreach ($products->reviews as $review)
                                       @endforeach
                                     
                                        <div class="px-2 mt-2">
                                            <p>{{$products->price}} ريال خصم {{$products->Selling_price}}%</p>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
              
            </div>
        </div>


    </div>
    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>
            (function() {

                function addSeparator(nStr) {
                    nStr += '';
                    var x = nStr.split('.');
                    var x1 = x[0];
                    var x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + '.' + '$2');
                    }
                    return x1 + x2;
                }

                function rangeInputChangeEventHandler(e) {
                    var rangeGroup = $(this).attr('name'),
                        minBtn = $(this).parent().children('.min'),
                        maxBtn = $(this).parent().children('.max'),
                        range_min = $(this).parent().children('.range_min'),
                        range_max = $(this).parent().children('.range_max'),
                        minVal = parseInt($(minBtn).val()),
                        maxVal = parseInt($(maxBtn).val()),
                        origin = $(this).context.className;

                    if (origin === 'min' && minVal > maxVal - 5) {
                        $(minBtn).val(maxVal - 5);
                    }
                    var minVal = parseInt($(minBtn).val());
                    $(range_min).html('الأدنى :' + addSeparator(minVal * 1000) + 'OMR');


                    if (origin === 'max' && maxVal - 5 < minVal) {
                        $(maxBtn).val(5 + minVal);
                    }
                    var maxVal = parseInt($(maxBtn).val());
                    $(range_max).html('الأعلى :' + addSeparator(maxVal * 1000) + ' OMR');
                }

                $('input[type="range"]').on('input', rangeInputChangeEventHandler);
            })();
        </script>

<script>
    $(document).on('click','.heart-icon',function(e){
       e.preventDefault();
       var product_id = $(this).attr('product_id');
       $(this).children().toggleClass("fill");
       $.ajax({
               type: 'post',
               enctype:'multipart/form-data',
               url: "{{route('wishlist.store')}}",
               data :{
                   '_token':"{{csrf_token()}}",
                   'id' : product_id
               },
               success: function (data) {
                   if(data.status == true){
                       $('#msg_success').show();
                       $('#text_msg').text(data.msg);
                       $("#count_wishlist").text(1 + data.count);
                      


                   }
                   $('.offerRow'+data.id).remove();
               }, error: function (reject) {
               }
           });
    });
 
</script>
<script>
    var modal = document.getElementById("myModal");
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    $(".my_img").on("click",function(){
        modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    });  


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

</script>
    @endsection


    @include('user.includes.footer')

</body>

</html>
