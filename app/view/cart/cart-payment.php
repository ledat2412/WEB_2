<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh Toán Bằng Thẻ</title>
  <link rel="stylesheet" href="/WEB_2/public/assets/css/card-payment.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="icon" href="/WEB_2/public/img/logo_compact.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="payment">
          
          <div class="card">
            
            <div class="card__visa">
                <svg class="visa" enable-background="new 0 0 291.764 291.764" version="1.1" viewbox="5 70 290 200" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                    <path class="svgcolor" d="m119.26 100.23l-14.643 91.122h23.405l14.634-91.122h-23.396zm70.598 37.118c-8.179-4.039-13.193-6.765-13.193-10.896 0.1-3.756 4.24-7.604 13.485-7.604 7.604-0.191 13.193 1.596 17.433 3.374l2.124 0.948 3.182-19.065c-4.623-1.787-11.953-3.756-21.007-3.756-23.113 0-39.388 12.017-39.489 29.204-0.191 12.683 11.652 19.721 20.515 23.943 9.054 4.331 12.136 7.139 12.136 10.987-0.1 5.908-7.321 8.634-14.059 8.634-9.336 0-14.351-1.404-21.964-4.696l-3.082-1.404-3.273 19.813c5.498 2.444 15.609 4.595 26.104 4.705 24.563 0 40.546-11.835 40.747-30.152 0.08-10.048-6.165-17.744-19.659-24.035zm83.034-36.836h-18.108c-5.58 0-9.82 1.605-12.236 7.331l-34.766 83.509h24.563l6.765-18.08h27.481l3.51 18.153h21.664l-18.873-90.913zm-26.97 54.514c0.474 0.046 9.428-29.514 9.428-29.514l7.13 29.514h-16.558zm-160.86-54.796l-22.931 61.909-2.498-12.209c-4.24-14.087-17.533-29.395-32.368-36.999l20.998 78.33h24.764l36.799-91.021h-24.764v-0.01z" fill="#FFFFFF"></path>
                    <path class="svgtipcolor" d="m51.916 111.98c-1.787-6.948-7.486-11.634-15.226-11.734h-36.316l-0.374 1.686c28.329 6.984 52.107 28.474 59.821 48.688l-7.905-38.64z" fill="#FFFFFF"></path>
                </svg>
            </div>
            
            <div class="card__number">0000&nbsp;0000&nbsp;0000&nbsp;0000</div>

            <div class="card__name">
                <h3>Card Holder</h3>
                <p id="card-name">Your name</p>
            </div>
            
            <div class="card__expiry">
                <h3>Valid Thru</h3>
                <p>
                    <span id="month">MM</span>/<span id="year">YY</span>
                </p>
            </div>

        </div>
          
        <form class="form">

            <h2>Payment Details</h2>
          
            <div class="form__name form__detail">
                <label for="name">Cardholder Name</label>
                <ion-icon><i class="fa-regular fa-user"></i></ion-icon>
                <input type="text" placeholder="Your name" id="name" maxlength="24">
                <div class="alert" id="alert-1">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                </svg>
                Full name required</div>
            </div>

            <div class="form__number form__detail">
                <label for="number">Card Number</label>
                <ion-icon><i class="fa-regular fa-credit-card"></i></ion-icon>
                <input type="text" placeholder="0000 0000 0000 0000" id="number" onkeypress="return isNumeric(event)">
                <div class="alert" id="alert-2">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                </svg>
                Invalid card number</div>
            </div>
          
            <div class="form__expiry form__detail">
                <label for="date">Exp Date</label>
                <ion-icon><i class="fa-regular fa-calendar-days"></i></ion-icon>
                <input type="text" placeholder="MM/YY" id="date" onkeypress="return isNumeric(event)" >
                <div class="alert" id="alert-3">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                </svg>
                Invalid date</div>
            </div>
          
            <div class="form__cvv form__detail">
                <label for="cvv">CVV</label>
                <ion-icon><i class="fa-solid fa-lock"></i></ion-icon>
                <input type="password" placeholder="0000" id="cvv" maxlength="4" onkeypress="return isNumeric(event)" >
                <div class="alert" id="alert-4">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                </svg>
                Invalid CVV</div>
            </div>


            <a href="/web/shopcart/shopcart-withcreditcard.html" class="form__btn" type ="submit">Confirm</a>  

        </form> 
        <a href="/web/shopcart/shopcart.html" class="top-right-box">x</a>       
    </div>
    <script src="/WEB_2/public/assets/js/card_payment.js"></script>
</body>
</html>
