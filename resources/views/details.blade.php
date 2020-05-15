@extends("layout.app")

@section("title")
    details
@endsection

@section("content")

      <div class="container ">
           <div class="details-container">
                <div class="detail-heading">
                    <div class="header">
                        <h6>{{$details->name}}</h6>
                        <li>ratings: 10/10</li>
                    </div>
                    <div class="details">
                        <li> {{$details->description}}</li>
                    </div>
                    <div class="logo">
                        <span class="detailLogo">Boogie's <span class="text-warning">choice</span></span>
                        <span class="detail-here">for "{{$details->detail}}"</span>
                    </div>
                </div>
            
             <div class="detail-image">
                 <div class="image">
                    <img src="{{asset($details->image)}}" alt="">
                     <ul class="detail-mobile">
                        <li>price: <b>&#8358;{{$details->price}}</b></li>
                        <li>Quantity instock: <b>1</b></li>
                        <div class="button">
                            <form action="{{URL::to('add_to_cart')}}" method="POST">
                                <input type="hidden" name="id" value="{{$details->id}}">
                                <button type="submit" name="cart">Add to Cart</button>
                            </form>
                            <li>
                                <a href="">Buy Now</a>
                            </li>
                        </div>
                     </ul>
                 </div>
            </div>

                 <div class="detail-description">
                    <div class="header">
                        <h6>{{$details->name}}</h6>
                        <li>ratings: 10/10</li>
                    </div>
                    <div class="details">
                        <li> {{$details->description}}
                    </li>
                    </div>
                    <div class="logo">
                        <span class="detailLogo">Boogie's <span class="text-warning">choice</span></span>
                        <span class="detail-here">for "{{$details->detail}}"</span>
                    </div>
                </div>
            
                  <div class="detail-desktop">
                     <li>price: <b>&#8358;{{$details->price}}</b></li>
                     <li>{{$details->description}}</li>
                     <li><b class="text-danger">only 12 left in stock.</b></li>
                     <li>Quantity instock: <b class="badge bg-warning">1</b></li>
                     <div class="button">
                        <form action="{{URL::to('add_to_cart')}}" method="POST">
                            <input type="hidden" name="id" value="{{$details->id}}">
                            <button type="submit" name="cart">Add to Cart</button>
                        </form>
                        <li class="buyNow">
                                <a href="">Buy Now</a>
                        </li>
                        <div class="price-footer">
                         <li>price: <b>&#8358;{{$details->price}}</b></li>
                        </div>
                     </div>
                 
             </div>
             <div class="question">
                 <h6>Have a question?</h6>
             </div>
           </div>
      </div>
  @endsection

 @section("mightLike")
 <div class="container mightLike">
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

       <!-- might like for desktop -->
       <div class="container mightLike_destop">
           <h3>Products you might also Like...</h3>
            <div class="row">
        @foreach($might_like2 as $might_like)
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

<!-- Question section  -->
            <div class="question">
          <h6>Have a question?</h6>
            <form action="">
                <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="" required>
                </div>

                <div class="form-group">
                    <label for="name">Message:</label>
                    <textarea name="message" id="message" class="form-control"cols="30" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Question</button>
                </div>

            </form>
       </div>
  @endsection

