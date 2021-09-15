@include('user.includes.head')
<body>
  @include('user.includes.header')

    
  <div class="main_cart">
    <div class="container">
    
       <div class="row mt-5">
           
                            <div class="col-md-5 col-sm-12">
                                <p><i class="fas fa-shopping-cart"></i> سلتي </p>
                                <div class="rightside">
                                    <div class="row py-2 mb-2">
                                        <div class="col-5"><img src="{{ asset('front/images/women.jpeg') }}"></div>
                                        <div class="col-7 pt-3">
                                            <p>HIZAB (BULE)</p>
                                            <p>OMR 7112.00</p>
                                         <div class="d-flex">
                                               <p>الكمية <select class="form-select" aria-label="Default select example">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select></p>
                                             <p class="px-4">الحجم : XXl </p>
                                             <a href="#" class="px-2" style="color: red">الغاء</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-7 leftside  col-sm-12">
                                <div class="up brd  py-3">
                                    <div class="h4 py-1"><h4 >تفاصيل الاسعار</h4></div>
                                    <div class="d-flex justify-content-between">
                                        <h6>المجموع الفرعي</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6>الخصم</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                </div>
                                <div class="meddle py-3 brd">
                                    <div class="d-flex justify-content-between">
                                        <h6>رمز الخصم</h6> <input type="text" placeholder="كود الخصم">
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <h6>VAT</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                </div>
                                <div class="brd py-3">
                                    <div class="d-flex justify-content-between">
                                        <h6> نسبة بيبال</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6>رسوم الشحن</h6>
                                        <h6>OMR 454</h6>
                                    </div>

                                </div>
                                <div class=" py-3 ">
                                    <div class="d-flex justify-content-between">
                                        <h6> المبلغ الكلي</h6>
                                        <h6>OMR 454</h6>
                                    </div>
                               
                                </div>
                                <a href="#" class="btn " style="background-color: #e85079;color: #fff;width: 100% ">أمر الطلب</a>
                            </div>
                        </div>

    </div>

</div>




  @include('user.includes.footer')
  
</body>
</html>