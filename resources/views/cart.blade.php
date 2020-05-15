@extends("layout.app")

@section("title")
    cart
@endsection

@section("content")
<section class="cart">

@if(Auth::user())
         @if(Session::get("cart"))
         <div class="cartBanner">My Shopping Cart </div>
         @endif
 @if(Session::has("cart") || Session::has("save"))        
 <div class="containerCart">
    @if(Session::has("cart"))
           <div class="container">@include("include.alert") </div> 
           <h6 class="head">Cart items ({{Session::get("cart")->total_Quantity}})</h6> 
        @foreach($products as $product) 
           <div class="cartContainer">
                  <div class="cartItems">
                      <a href="{{URL::to('details', ['slug' => $product['items']['slug'] ])}}"><img src="{{asset($product['items']['image'])}}" alt=""></a>
                      <ul>
                          <li>{{$product['items']['name']}}</li>
                          <li>{{$product['items']['detail']}}</li>
                          <li class="text-danger"><b>&#8358;{{$product['items']['price']}}</b></li>
                          <li><b class="ratings">ratings 10/10 </b></li>
                      </ul>
                      <div class="anchor-button">
                          <ul>
                            <li> <a href="{{URL::to('cart/save', ['save_id' => $product['items']['id'] ])}}">Save for later</a></li> 
                          </ul>
                      </div>
                  </div>
                  <div class="container">
                        <div class="cart-button button-button">
                            <li class="quantity">Quantity: <b class="badge bg-warning">{{$product['quantity']}}</b></li>
                            <li class="anchor">
                                <a href="{{URL::to('cart/reduce', ['reduce_id' => $product['items']['id'] ])}}" class="reduce">Reduce</a>
                                <a href="{{URL::to('cart/add', ['add_id' => $product['items']['id'] ])}}" class="add">Add</a>
                            </li>
                            <li class="remove"><a href="{{URL::to('cart/remove', ['remove_id' => $product['items']['id'] ])}}" >Remove</a></li>
                        </div>
                  </div>            
              </div>
        @endforeach
              <div class="checkout-container">
                    <li>Total: <b>&#8358;{{Session::get("cart")->total_price}}</b></li>
                    <div class="checkout">
                        <a href="">Checkout</a>
                        <div class="payNow"><a href="/checkout">Pay Now</a></div> 
                    </div>
              </div>
        @else
        <div class="container">
            <!-- alert for mobile -->
            <div class="alert alert-warning destop_alert">
                    <li> There are no items in Cart.</li>
                    <li><a href="/product">Continue Shopping</a></li>
            </div>
        @endif
         </div>

    <!-- SAVE FOR LATER -->
         <div class="container">
         @if(Session::get("save"))
            <div class="save-for-later cartContainer line-disapear"><hr>
               <div class="header">
                    <h5>Save For Later...({{Session::get("save")->total_Quantity}} items)</h5>
                    <li>Items in save for later can not be purchased but are saved for later</li>
               </div>
                @foreach($SavedItems as $SavedItem)
                    <div class="cartItem item">
                        <a href="{{URL::to('details', ['slug' => $SavedItem['items']['slug'] ])}}"><img src="{{asset($SavedItem['items']['image'])}}" alt=""></a>
                        <ul class="detail">
                            <li>{{ $SavedItem['items']['name']}}</li>
                            <li>{{ $SavedItem['items']['detail']}}</li>
                            <li>price: <b>&#8358;{{ $SavedItem['items']['price']}}</b></li>
                            <li><b class="ratings">ratings 10/10 </b></li>
                        </ul>
                        <div class="anchor-button">
                            <ul>
                                <li> <a href="">charles</a></li> 
                            </ul>
                        </div>
                    </div>
                    <div class="button-button saveBotton">
                        <li>Quantity: <b class="badge bg-warning">{{$SavedItem['quantity']}}</b></li>
                         <li > <a href="{{URL::to('cart/return', ['return_id' => $SavedItem['items']['id'] ])}}" class="add">Add to Cart</a></li>
                         <li class="remove"><a href="{{URL::to('save/delete', ['delete_id' => $SavedItem['items']['id'] ])}}" >Remove</a></li>
                    </div>  
                @endforeach
                  <li class="total">Total: <b>&#8358;{{Session::get("save")->total_price}}</b></li>          
                </div>
        @else
              <div class="alert alert-warning ">
                     There are no items saved for later.
              </div>
        @endif
         </div>
    @else
    <div class="container alert-container">
          <div class="cart-image">
              <img src="images/cart-image.png" alt="">
              <h6>{{$user->userAddress->name}} Your Cart Is Empty!</h6>
             <div class="continue-shopping">
                <a href="/product">Continue shopping</a>
            </div>
          </div>
         
         
        <div class="alert-warning mobile-cart-alert">
            <li> There are no items in Cart.</li>
            <li>
                <a href="/product">Continue Shopping</a> 
            </li>
        </div>
    </div>
    @endif

@else
 <div class="container alert-container">
          <div class="cart-image">
              <img src="images/cart-image.png" alt="">
              <h6>Your Cart Is Empty!</h6>
              <span>Already have an account? </span>  <a href="/login">login</a> <span>to see items in Cart.</span>

             <div class="continue-shopping">
                <a href="/product">Continue shopping</a>
            </div>
          </div>
         
         
        <div class="alert-warning mobile-cart-alert">
            <li> There are no items in Cart.</li>
            <li>
                <a href="/product">Continue Shopping</a> 
            </li>
        </div>
    </div>
@endif
</section>
  @endsection





  @section("mightLike")
    
            <div class="container mightLike cart-mightLike">
                    <h3>Products you might also Like...</h3>
                        <div class="row">
                    @foreach($might_likes as $might_like)
                        <div class="mightLike_items">
                        <a href="{{URL::to('details', ['slug' => $might_like->slug])}}"><img src="{{asset($might_like->image)}}" alt=""></a>
                            <ul>
                                    <li><b>{{$might_like->name}}</b></li>
                                    <li>{{$might_like->make}}</li>
                                    <li>&#8358;{{$might_like->price}}</li>
                                    <li><b class="ratings">ratings 10/10</b></li>
                            </ul>
                        </div>
                    @endforeach
                        </div>
                </div>
        
  @endsection