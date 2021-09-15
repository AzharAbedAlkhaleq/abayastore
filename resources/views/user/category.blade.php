@include('user.includes.head')
<body>
  @include('user.includes.header')
    <!-- end header -->
    <div class="category_main">
        
        <div class="mainimg">
        <div class="container text-center pt-5">
            <h3 class="mt-5">التصنيفات</h3>
         
            </div>
        </div>
        
        <div class="catigoryimg container pt-5 text-center">
            <img src="{{ asset('front/images/dress.png') }}" height="30px" class="mb-5">
           
            <div class="row">
              @foreach ($categories as $category )
              <div class="col-md-4 col-sm-6 pb-4">
                <div class="box">
                      <img src="{{ asset('assets/uploads/Category_ar/'.$category->image_ar) }}" alt="عباية">
                  <a href="{{ url('view-category/'.$category->slug_ar) }}" class="btn btn-lg">{{ $category->name_ar }}</a>
                  </div>
                  </div>
              @endforeach
            
                
            </div>
            
        
        </div>
        
        
    </div>
    
  
    
   @include('user.includes.footer')
  
</body>
</html>
