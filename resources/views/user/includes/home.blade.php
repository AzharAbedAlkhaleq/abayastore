@include('user.includes.head')
<body>
  @include('user.includes.header')
    <!-- end header -->
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

</body>
</html>
