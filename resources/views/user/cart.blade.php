@include('user.includes.head')

<body>
    @include('user.includes.header')


    <div class="main_cart">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success mt-5">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger mt-5">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="row mt-5">

                <div class="col-md-5 col-sm-12">
                    <p><i class="fas fa-shopping-cart"></i> سلتي </p>
                    @foreach ($cart as $item)
                        <div class="rightside">
                            <div class="row py-2 mb-2">
                                <div class="col-5">
                                    {{-- <img src="{{ asset('front/images/women.jpeg') }}"> --}}
                                    <img class=""
                                    src="
                                        {{ asset('assets/uploads/product/' . $item->product->image_ar) }}"
                                        alt="Card image cap">
                                </div>
                                <div class="col-7 pt-3">
                                    <p>{{ $item->product->name_ar }} ({{ $item->colors->color }})</p>
                                    <p>OMR
                                        {{ $item->product->orginal_price - ($item->product->orginal_price * $item->product->Selling_price) / 100 }}
                                    </p>
                                    <div>
                                        <p class="d-inline">الكمية : {{ $item->quantity }}</p>
                                        <p class="px-4 d-inline">الحجم : {{ $item->sizes->size }} </p>
                                        <form class="d-block mt-2" action="{{ route('delete-cart', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger">الغاء</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="col-md-7 leftside  col-sm-12">
                    <div class="up brd  py-3">
                        <div class="h4 py-1">
                            <h4>تفاصيل الاسعار</h4>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>المجموع الفرعي</h6>
                            <h6>OMR 454</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>الخصم</h6>
                            <h6>OMR 454</h6>
                        </div>
                    </div>
                    <div class="meddle py-3 brd">
                        <div class="d-flex justify-content-between">
                            @if (!session()->has('new total'))
                            <form action="{{ route('apply-coupon') }}" method="POST">
                                @csrf
                                <h6>رمز الخصم</h6>
                                <input type="text" name="code" placeholder="كود الخصم">
                                <input type="hidden" name="total" value="{{ $total }}" placeholder="كود الخصم">
                                <button type="submit" class="btn btn-dark">تطبيق الخصم</button>
                            </form>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h6>المبلغ بعد الخصم</h6>
                            <h6>OMR {{ session()->get('new total') ?? 0 }}</h6>

                        </div>
                        @if (session()->has('new total'))
                            <form action="{{ route('delete-coupon') }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">الغاء الخصم</button>
                            </form>
                        @endif
                    </div>
                    <div class="brd py-3">
                        <div class="d-flex justify-content-between">
                            <h6> نسبة بيبال</h6>
                            <h6>OMR 454</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>رسوم الشحن</h6>
                            <h6>OMR 454</h6>
                        </div>

                    </div>
                    <div class=" py-3 ">
                        <div class="d-flex justify-content-between">
                            <h6> المبلغ الكلي</h6>
                            <h6>OMR {{ $total }}</h6>
                        </div>

                    </div>
                    <a href="#" class="btn " style="background-color: #e85079;color: #fff;width: 100% ">أمر
                        الطلب</a>
                </div>
            </div>

        </div>

    </div>




    @include('user.includes.footer')

</body>

</html>
