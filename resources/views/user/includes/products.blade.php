<div class="product container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="boxblc ">

                <i class="fire fas fa-fire-alt"></i>
                <h5>العبائات الرائجة</h5>
                <a href="#"> المزيد من العبايات <i class="fas fa-arrow-left"></i></a>
            </div>
        </div>

     @foreach ($products as $product )
     <div class="col-md-3 col-sm-6 pt-2">
        <div class="box p-3">
            @if($product->Selling_price > 0)
            <div class="offer">
                <p>{{ $product->Selling_price }}% <br>OFF </p>
            </div>   
            @endif
            
            <img src="{{  asset('assets/uploads/product/'.$product->image_ar)}}">
            <div class="text-right">
                <a style="text-decoration: none;color:black; text-align:center;" href="{{ route('shopping',$product->id) }}"> <h5>{{ $product->name_ar}}</h5></a>
                @if($product->Selling_price > 0)
                <del> <span style="color: red" class="float-end">{{ $product->orginal_price }} OMR</span></del>

                        @else
                        <span style="color: red" class="float-end">{{ $product->orginal_price }} OMR</span>

                        @endif
            </div>

        </div>
    </div>
    @if($loop->iteration == 4)
    <div class="col-md-9 col-sm-12 pt-2">

            <div class="imgadv">
                <?php
                       $banners=App\Models\Banner::where('location','top')->latest()->first();
                ?>

<a href="{{ $banners->link }}" target="_blanket">   <img src="{{ asset('assets/uploads/banners/'.$banners->banner_image)}}" class=""></a>
        </div>




    </div>

    @endif


     @endforeach



                               </div>
             <div class="more text-center py-3">
                <a href="#" class="">    <i class="pt-1 fas fa-sync"></i> تحميل المزيد</a>
                </div>
            </div>

    </div>
</div>
<!-- end product -->
