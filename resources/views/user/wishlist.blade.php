@include('user.includes.head')

<body>
    @include('user.includes.header')


    <div class="main_cart">
        <div class="container">
             
            <div class="row mt-5">
               
                <div class="col col-sm-12">
                    <div class="mb-3 text-center"><i class="far fa-heart icon"></i>
                        <h3 class="d-inline">المفضلة</h3>
                    </div>
                    <div class="alert alert-success text-center " id="msg_success" style="display: none" role="alert">
                        <strong>تم الغاء المنتج بنجاح</strong>
                    </div> 
                    @if (!is_null($products))
                    @foreach ($products as $product)
                    <div class="rightside wishlist{{$product->id}}">

                        <form action="" id="form_cart_{{$product->id}}" method="post">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @csrf
                            <div class="row  py-2 mb-2">
                                <div class="col-2">
                                    <img class="" src="
                                        {{ asset('assets/uploads/product/' . $product->image_ar) }}"
                                        alt="Card image cap">
                                </div>
                                <div class="col-10 wishlist-details d-flex pt-3">
                                    <table class="table text-center">
                                        <tr>
                                            <th>الاسم</th>
                                            <th>السعر</th>
                                            <th>الكمية</th>
                                            <th>اللون</th>
                                            <th>الحجم</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <p>{{ $product->name_ar }}</p>
                                            </th>
                                            <th>
                                                <p>OMR
                                                    {{ $product->orginal_price - ($product->orginal_price * $product->Selling_price) / 100 }}
                                                </p>
                                            </th>
                                            <th>
                                                <div class="">
                                                    <div>
                                                        <button type="button" class="btn btn-outline-success decrement-btn"
                                                            id="btn-minus">-</button>
            
                                                        <input type="text" name="quantity" class="qty-input text-center"
                                                            id="product-quanity" value="1">
            
                                                        <button type="button"
                                                            class="btn btn-outline-success increment-btn list-inline-item"
                                                            id="btn-plus">+</button>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="">
                                                    <select class="form-control d-inline text-center" name="product-color" id="">
                                                        @foreach ($product->color as $color)
                                                            <option value="{{ $color->color->id }}">
                                                                {{ $color->color->color }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                            </th>
                                            <th>
                                                <select class="form-control d-inline text-center" name="product-size" id="">
                                                    @foreach ($product->size as $size)
                                                        <option class="p-3" value="{{ $size->id }}">
                                                            {{ $size->size }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <button id="add_cart" class="btn btn-success addToCart" product_id="{{$product->id}}" name="submit" value="addtocard">
                                                     <i class="mx-2 fas fa-shopping-cart"></i> أضف
                                                 إلى السلة
                                                </button>
                                            
                                            </th>
                                            <th>
                                                <button class="btn btn-danger delete_product" product_id="{{$product->id}}"> <i class="fas fa-trash"></i> الغاء</button>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>

    </div>



    @section('scripts')
 @if (!is_null($products))
    <script>
            $(document).ready(function() {

                $('.decrement-btn').on('click', function(){
                    var numProduct = Number($(this).next().val());
                    if(numProduct > 0) $(this).next().val(numProduct - 1);
                });

                $('.increment-btn').on('click', function(){
                    var numProduct = Number($(this).prev().val());
                    $(this).prev().val(numProduct + 1);
                });
     
            });
        </script>
       @endif
        {{-- delete product from wishlist --}}
        <script>
            $(document).on('click','.delete_product',function(e){
               e.preventDefault();
               var product_id = $(this).attr('product_id');
               $.ajax({
                       type: 'post',
                       enctype:'multipart/form-data',
                       url: "{{route('wishlist.delete')}}",
                       data :{
                           '_token':"{{csrf_token()}}",
                           '_method':'delete',
                           'id' : product_id
                       },
                       success: function (data) {
                           if(data.status == true){
                               $('#msg_success').show();
                               $("#count_wishlist").text(data.count - 1);
                           }
                           $('.wishlist'+data.id).remove();
                       }, error: function (reject) {
                       }
                   });
            });
         
        </script>
        {{-- add to cart --}}
        <script>
             $(document).on('click','#add_cart',function(e){
                var product_id = $(this).attr('product_id');
                   e.preventDefault();
                   var formData = new FormData($('#form_cart_'+product_id)[0]);
                   $.ajax({
                           type: 'post',
                           enctype:'multipart/form-data',
                           url: "{{ route('wishlist.addcart') }}",
                           data : formData ,
                           processData: false,
                           contentType: false,
                           cache: false,
                           success: function (data) {
                               if(data.status == true){
                                   $('#msg_success').show().text(data.msg);
                                   $("#count_cart").text(function(){
                                    return(1 + Number($("#count_cart").text()));
                                });
                                $("#count_wishlist").text(data.count - 1);
                                $('.wishlist'+data.id).remove();
                               }else if(data.status == 'update')
                               {
                                $('#msg_success').show();
                               }
                           }, error: function (reject) {
                           }
                       });
                });
        </script>
    @endsection
    
    @include('user.includes.footer')

</body>

</html>
