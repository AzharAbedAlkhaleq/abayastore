<div class="adv container">
    <div class="row pb-5 mb-2">
        <div class="col-md-6 col-sm-12 pt-2">
            <div class="">
                <?php
                $banners=App\Models\Banner::where('location','right')->latest()->first();
         ?>
@if($banners)
<a href="{{ $banners->link }}" target="_blanket">
    <img src="{{ asset('assets/uploads/banners/'.$banners->banner_image)}}" width="543px" height="243px">
</a>
                    @else
                        <a href="#" target="_blanket">
                            <img src="{{ asset('dashboard/1631697847.jpg')}}" width="543px" height="243px">
                        </a>
                @endif
</div>
        </div>

        <div class="col-md-6 col-sm-12 pt-2">
            <div class="">
                <?php
                $banners=App\Models\Banner::where('location','left ')->latest()->first();
                ?>
                @if($banners)
<a href="{{ $banners->link }}" target="_blanket">
<img src="{{ asset('assets/uploads/banners/'.$banners->banner_image)}}" class="" width="543px" height="243px">
</a>
                    @else
                        <a href="#" target="_blanket">
                            <img src="{{ asset('dashboard/1631697847.jpg')}}" width="543px" height="243px">
                        </a>
                @endif

</div>
        </div>
    </div>
</div>
