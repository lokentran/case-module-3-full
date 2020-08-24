@extends('frontend.master.master')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 ftco-animate">
                <form action="{{ route('cart.payment') }}" class="billing-form" method="POST">
                    @csrf
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Full Name</label>
                                <input name="name" type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="w-100"></div>
                        <div class="col-md-12">
                            {{-- <div class="form-group">
                                <label for="country">State / Country</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">France</option>
                                        <option value="">Italy</option>
                                        <option value="">Philippines</option>
                                        <option value="">South Korea</option>
                                        <option value="">Hongkong</option>
                                        <option value="">Japan</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>

                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" name="address" class="form-control"
                                    placeholder="House number and street name">
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="Appartment, suite, unit etc: (optional)">
                            </div>
                        </div> --}}
                        <div class="w-100"></div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Town / City</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div> --}}

                        <div class="w-100"></div>
                        {{-- <div class="col-md-12">
                            <div class="form-group mt-4">
                                <div class="radio">
                                    <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
                                    <label><input type="radio" name="optradio"> Ship to different address</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>

            </div>
            <div class="col-xl-6">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Confirm Cart</h3>
                            <table class="table table-striped  text-left">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if (Session::has('cart') != null)
                                        @forelse (Session::get('cart')->items as $item)
                                        <tr class="text-left">
                                            <td>{{ $item['product']->name }}</td>
                                            <td>{{ $item['product']->price }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['price'] }}</td>
                                        </tr>
                                        @empty
                                    @endforelse
                                    @endif



                                </tbody>

                            </table>
                           
                            <p class="d-flex total-price">
                                <span>Total: {{ Session::get('cart') ? Session::get('cart')->totalPrice : 0 }}</span>
                            </p>
                            <p><button class="btn btn-primary py-3 px-4">Place an order</button></p>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Direct Bank
                                            Tranfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" class="mr-2"> I have read and accept the
                                            terms and conditions</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> --}}
                </div>
            </div> <!-- .col-md-8 -->
            </form>
        </div>
    </div>
</section> <!-- .section -->

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
@endsection
