<style>

  .alert {
    padding: 20px;
    background-color: #ffffff;
    color: #000000;
    font-size: 20px;
  }
  
  .closebtn {
    margin-left: 15px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    position: relative;
    bottom: 70px;
  }
  
  .closebtn:hover {
    color: rgb(29, 28, 28);
  }
  .welcome {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 9999;
    background: #000000c2;
}
  .msg{
    position:absolute !important;
    left: 20%;
    top: 40%;
    width: 50%;
    text-align: center;
    border: 2px solid #b3adad !important;
    padding: 5.75rem 1.25rem !important;
}

  }
  </style>
@include('user.includes.head')
<body>

  <div class="welcome d-none">
    <div class="alert msg animate__animated  animate__wobble">
      <span class="closebtn">&times;</span> 
      <div class="">
        <span class="d-block">مرحباً عزيزي الزائر</span>
        <strong>أهلاً وسهلاً بك في متجر عباية لوتس</strong> 
      </div>
    </div>
  </div>

 
  @include('user.includes.header')
    <!-- end header -->
    {{-- success payment --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>{{session()->get('success')}}</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

@include('user.includes.slider')
    @include('user.includes.bar')
    <!-- end bar -->
    @include('user.includes.products')
    <div class="slider container my-3">
        <!-- Swiper -->

       @include('user.includes.swipper')
        <!-- end slider -->

    @include('user.includes.banner')
    <!-- end adv -->
  @include('user.includes.category')
    <!-- end category -->

   @include('user.includes.footer')

 <script type="module" src="{{asset('front/js/js.cookie.min.js')}}"></script>
<script type="module">
 
      $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {

      data = data.trim().split('\n').reduce(function(obj, pair) {
        pair = pair.split('=');
        return obj[pair[0]] = pair[1], obj;
      }, {});
      
    var  ip = data.ip;

    Cookies.set('coustomerIp',ip);
      
    });

    var cookie = Cookies.get('coustomerIp')
    if (cookie) {
      $(".aaa").removeClass("d-none");
    }
    
    else{

      $(".welcome").removeClass("d-none");
      $(".closebtn").click(function(){
    
      $(".welcome").addClass("d-none");
      $(".aaa").removeClass("d-none");


    });
    }
</script>

