<div class="product container">
    <div class="alert alert-success text-center " id="msg_success" style="display: none" role="alert">
        <strong id="text_msg">تم اضافة المنتج بنجاح</strong>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 pt-2">
            <div class="boxblc ">

                <i class="fire fas fa-fire-alt"></i>
                <h5>العبائات الرائجة</h5>
                <a style="text-decoration: none;" href="{{ route('moreProduct') }}"> المزيد من العبايات <i
                        class="fas fa-arrow-left"></i></a>
            </div>
        </div>

        @foreach ($products as $product)
            <div class="col-md-3 col-sm-6 pt-2">
                <div class="box p-3">
                    @if ($product->Selling_price > 0)
                        <div class="offer">
                            <p>{{ $product->Selling_price }}% <br>OFF </p>
                        </div>
                    @endif
                    
                        <img id="myImg" class="my_img" src="{{ asset('assets/uploads/product/' . $product->image_ar) }}">
                                                    <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>
                            
                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img01">
                            
                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                            </div>
                            <a style="text-decoration: none;color:black; text-align:right;"
                        href="{{ route('shopping', $product->id) }}">
                        <div class="text-right">
                            <div class="d-flex justify-content-between mt-3">
                                <h5>{{ $product->name_ar }}</h5>
                                <a class="heart-icon" href="" product_id="{{$product->id}}"><i
                                        class="far fa-heart icon "></i></a>
                            </div>
                           
                    </a>
                    <p class=" py-2" style="text-align: right;">
                        @if ($product->Selling_price > 0)
                            <del>OMR {{ $product->orginal_price }}</del> <span style="color: red;text-align:right; ">
                                &nbsp;&nbsp;&nbsp;&nbsp; OMR
                                {{ $product->orginal_price - ($product->orginal_price * $product->Selling_price) / 100 }}
                            </span>
                    </p>

                @else
                    OMR {{ $product->orginal_price }} </p>

        @endif

    </div>

</div>
</div>
@if ($loop->iteration == 4)
    <div class="col-md-9 col-sm-12 pt-2 wow tada data-wow-duration=3s animate__delay-4s">

        <div class="imgadv">
            <?php
            $banners = App\Models\Banner::where('location', 'top')
                ->latest()
                ->first();
            ?>

            <a href="{{ $banners->link }}" target="_blanket"> <img
                    src="{{ asset('assets/uploads/banners/' . $banners->banner_image) }}"
                    class=""></a>
                    </div>




                </div>

                @endif


        @endforeach

                               </div>
             <div class="
                    more text-center py-3">
                <a style="text-decoration: none" href="{{ route('moreProduct') }}" class="">    <i class=" pt-1 fas
                    fa-sync"></i> تحميل المزيد</a>
        </div>
    </div>

    </div>
    </div>
    <!-- end product -->
@section('scripts')
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