@include('user.includes.head')
  @include('user.includes.header')
  <div class="container">
      <form action="{{route('excel.import')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel" id="">
        <button type="submit">send</button>
    </form>
  </div>
  @include('user.includes.footer')