
@include('user.includes.head')
<body>
  @include('user.includes.header')


  <div class="paymentpage">
    <div class="mt-5">
   
    <div class="card-body">
        
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="paymentimg mb-3  pb-4  d-flex ">
                        <span class="header">Payment</span>
                        <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                    </div>
                    <form class="mt-5"> <span>Cardholder's name:</span> 
                        <input placeholder="Linda Williams"> <span>Card Number:</span> <input placeholder="0125 6780 4567 9909">
                        <div class="row CVV">
                            <div class="col-4"><span>Expiry date:</span> <input placeholder="YY/MM"> </div>
                            <div class="col-4"><span>CVV:</span> <input id="cvv"> </div>
                        </div> 
                        <button class="btn">Pay</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5 mt-2">
                <div class="right border">
                
                    <div class="row px-4 item d-flex justify-content-between">
                        <h4>الكمية</h4>
                        <p>0894 OMR</p>
                    </div> 
                    <hr>
                    <div class="lower px-2 d-flex justify-content-between">
                        <div class="">المجموع</div>
                        <div class="">$ 46.98</div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div> </div>
</div>
    
    </div>

  @include('user.includes.footer')
  
</body>
</html>
