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
                    @foreach ($product as $item)
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
            </div>

        </div>

    </div>




    @include('user.includes.footer')

</body>

</html>
