@include('user.includes.head')
<body>
  @include('user.includes.header')
    <!-- end header -->
    <div class="category_main">
        
        <div class="mainimg">
        <div class="container text-center pt-5">
            <h3 class="mt-5">الأقسام</h3>
            </div>
        </div>
        
        <div class="catigoryimg container pt-5 text-center">
          <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('user')}}">الرئيسية</a></li>
            <span class="breadcrumb-chevron">
                <i class="fas fa-chevron-left"></i>
            </span>
            <li class="breadcrumb-item active" aria-current="page">الأقسام</li>
            </ol>
        </nav>
            <img src="{{ asset('front/images/dress.png') }}" height="30px" class="mb-5">
           
            <div class="row">
              @foreach ($categories as $category )
              <div class="col-md-4 col-sm-6 pb-4">
                <div class="box">
                      <img src="{{ asset('assets/uploads/Category_ar/'.$category->image_ar) }}" alt="عباية">
                  <a href="{{route('category.detalis',$category->slug_ar) }}" class="btn btn-lg">{{ $category->name_ar }}</a>
                  </div>
                  </div>
              @endforeach
            
                
            </div>
            <div class=" paginate d-flex justify-content-center">
              {{$categories->links()}}
            </div>
        </div>
        
        
    </div>
    
  
    
   @include('user.includes.footer')
  
</body>
</html>
