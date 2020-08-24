@extends('frontend.master.master')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          <h1 class="mb-0 bread">My Cart</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-cart">
          <div class="container">
              <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="cart-list">
                      <table class="table">
                          <thead class="thead-primary">
                            <tr class="text-center">
                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                              <th>Product name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                        
                        @if (Session::has('cart') != null)
                        @forelse (Session::get('cart')->items as $item)
                        <tr class="text-center">
                          <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
                          
                          <td class="image-prod"><div class="img" style="background-image:url({{ 'storage/'.$item['product']->img }});"></div></td>
                          
                          <td class="product-name">
                              <h3>{{ $item['product']->name }}</h3>
                              {{-- <p>Far far away, behind the word mountains, far from the countries</p> --}}
                          </td>
                          
                          <td class="price">{{ $item['product']->price }}</td>
                          
                          <td class="quantity">
                              <div class="input-group mb-3">
                              <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $item['quantity'] }}" min="1" max="100">
                            </div>
                          </td>
                            
                          <td class="total">{{ $item['price']}}</td>
                        
                        </tr><!-- END TR-->
                    @empty
                        <tr>
                          <td>No Data</td>
                        </tr>
                    @endforelse
                        @endif


    
                          </tbody>
                        </table>
                    </div>
              </div>
          </div>
          <div class="row justify-content-end">
              <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Cart Totals</h3>
                      <hr>
                      <p class="d-flex total-price">
                          <span>Total</span>
                          <span>
                            {{ Session::get('cart')? Session::get('cart')->totalPrice : 0 }}
                          </span>
                      </p>
                  </div>
                  <p><a href="{{ route('cart.confirm') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
              </div>
          </div>
          </div>
      </section>

      <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
            <span>Get e-mail updates about our latest shops and special offers</span>
        </div>
        <div class="col-md-6 d-flex align-items-center">
          <form action="#" class="subscribe-form">
            <div class="form-group d-flex">
              <input type="text" class="form-control" placeholder="Enter email address">
              <input type="submit" value="Subscribe" class="submit px-3">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  
{{-- {{ dd(Session::get('cart')) }} --}}

<!-- loader -->
{{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

<script>
      $(document).ready(function(){

      var quantitiy=0;
         $('.quantity-right-plus').click(function(e){
              
              // Stop acting like a button
              e.preventDefault();
              // Get the field name
              var quantity = parseInt($('#quantity').val());
              
              // If is not undefined
                  
                  $('#quantity').val(quantity + 1);

                
                  // Increment
              
          });

           $('.quantity-left-minus').click(function(e){
              // Stop acting like a button
              e.preventDefault();
              // Get the field name
              var quantity = parseInt($('#quantity').val());
              
              // If is not undefined
            
                  // Increment
                  if(quantity>0){
                  $('#quantity').val(quantity - 1);
                  }
          });
          
      });
  </script>
   --}}

@endsection
  