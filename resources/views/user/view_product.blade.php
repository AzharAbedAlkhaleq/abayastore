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
            <div class="row">
                <div class="col-md-4 col-sm-12 rightside py-3">
                    <form action="{{ route('category.detalis', $category->slug_ar) }}" method="get">

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-filter col-3">فلتر</button>
                        </div>

                        <p class="d-flex justify-content-between">الفئات</p>
                        <select style=" font-size:20px" class="form-select form-control" name="slug_ar">
                            <option value="">{{ trans('admin.Select the Category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug_ar }}">{{ $category->name_ar }}</option>
                            @endforeach
                        </select>
                        <div>

                            <p class="d-flex justify-content-between m"> السعر </p>
                            <hr class="mb-5" >
                            <div class="d-flex align-items-center  ">
                             @if ($min_price && $max_price)
                             
                            <div class="rangeslider">
                                <input class="min" name="min_range" type="range" min="{{$min_price->orginal_price}}" max="{{$max_price->orginal_price}}"
                                    value="10" />
                                <input class="max" name="max_range" type="range" min="1" max="{{$max_price->orginal_price}}"
                                    value="90" />
                                   
                                     <span class="range_min light right">الأدنى:  {{$min_price->orginal_price}} OMR </span>
                                      <span class="range_max light left">الأعلى:  {{$max_price->orginal_price}} OMR</span>
                            </div>
                            @endif   
                        </div>
                          {{--   <div class="d-flex justify-content-between">
                                <p class="d-inline m-0 p-0 text-end range_min light left "><span>الأدني : </span> OMR 200</p>
                                <p class="d-inline m-0 p-0 range_max light right"><span>الأعلي : </span> OMR500</p>
                            </div> --}}

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
                                <a style="text-decoration: none; color:black;"
                                    href="{{ route('shopping', $prod->id) }}">

                                    <img src="{{ asset('assets/uploads/product/' . $prod->image_ar) }}" alt="women">

                                    {{-- </a> --}}
                                    <h6 class="pt-3 pb-2">


                                        {{ $prod->name_ar }}

                                </a>
                                </h6>
                                <p><a href="#" class="px-2"><i class="far fa-heart"></i></a> OMR
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
                        <div class="col-md-3 col-sm-12">
                            <img src="{{ asset('front/images/womenadv.jpeg') }}">
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="pp">
                                        <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                        <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i
                                                    class="fas fa-star"></i></span>
                                            <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                        </div>
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
                                        <div class="px-2">
                                            <p>220 ريال عمال 50%</p>
                                            <p>النوع : عباية</p>
                                            <p>اللون : رمادي</p>
                                            <p> الحجم L </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pp">
                                        <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                        <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i
                                                    class="fas fa-star"></i></span>
                                            <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                        </div>
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
                                        <div class="px-2">
                                            <p>220 ريال عمال 50%</p>
                                            <p>النوع : عباية</p>
                                            <p>اللون : رمادي</p>
                                            <p> الحجم L </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pp">
                                        <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                        <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i
                                                    class="fas fa-star"></i></span>
                                            <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                        </div>
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
                                        <div class="px-2">
                                            <p>220 ريال عمال 50%</p>
                                            <p>النوع : عباية</p>
                                            <p>اللون : رمادي</p>
                                            <p> الحجم L </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rated pt-5">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <img src="{{ asset('front/images/womenadv.jpeg') }}">
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="pp">
                                        <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                        <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i
                                                    class="fas fa-star"></i></span>
                                            <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                        </div>
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
                                        <div class="px-2">
                                            <p>220 ريال عمال 50%</p>
                                            <p>النوع : عباية</p>
                                            <p>اللون : رمادي</p>
                                            <p> الحجم L </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pp">
                                        <h6>سويت شيرت بطبعة نجمة لندن</h6>
                                        <div class="d-flex starr"> <span class="px-2 mx-2 mt-2"> 3.6 <i
                                                    class="fas fa-star"></i></span>
                                            <p class="pt-2">15 تقييمات 4 مراجعات</p>
                                        </div>
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
                                        <div class="px-2">
                                            <p>220 ريال عمال 50%</p>
                                            <p>النوع : عباية</p>
                                            <p>اللون : رمادي</p>
                                            <p> الحجم L </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
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
    @endsection
    @include('user.includes.footer')

</body>

</html>
