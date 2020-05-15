@extends("layout.app")


@section("title")
    product
@endsection

@section("sidebar")
@include("include.sidebar")
@endsection

@section("content")
<section>

         <div class=" container homePageProduct">
             <div class="row">
                 <div class="col-md-2">
                    @yield("product_sidebar")
                 </div>
                 <div class="col-md-10">
                          <h5 class="content-header">{{$categoryName}}</h5> 
                             <div class="imagesContainer">
                                <div class="row float">
                                @forelse($products as $product)
                                       <div class="images col-md-4">
                                          <a href="{{URL::to('details', ['slug' => $product->slug ])}}"><img src="{{asset($product->image)}}" alt=""></a> 
                                          <div class="info">
                                                <li  class="desc">By {{$product->description}}</li>
                                                <li><b>{{$product->name}}</b></li>
                                                <li  class="make">By {{$product->make}}</li>
                                                <li><b>price: </b>&#8358;{{$product->price}}</li>
                                                <li class="text-warning"><b>ratings 10/10</b></li>
                                                <form action="{{URL::to('add_to_cart')}}" method="POST">
                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                    <button type="submit" name="cart" >add to cart</button>
                                                </form>
                                          </div>
                                       </div>
                                @endforeach
                                </div>
                                
                        @if($products->count() <= 0)
                                  <div class="alert alert-warning">There are no items available</div>

                         @endif

                        
                             </div>
                 </div>
             </div>
         </div> 

         <div class="pagination">
               <!-- {{$products->appends(Request()->input())->links()}} -->
         </div>  
</section>  

<section>
    <div class="products">
        <div class="mostOrdered">
            <h3>Most ordered items...</h3>
        @foreach($orders as $order)
            <div class="ordered-items">
               <a href="{{URL::to('details', ['slug' => $order->slug])}}"><img src="{{asset($order->image)}}" alt=""></a>
                <ul>
                    <li><b>{{$order->name}}</b></li>
                    <li class="make text-primary">By {{$order->make}}</li>
                    <li><b>price: </b>&#8358;{{$order->price}}</li>
                    <li><b class="ratings">ratings 10/10</b></li>
                </ul>
            </div>
        @endforeach
        </div>
    </div>
</section>
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
                        <li class="text-danger">&#8358;{{$might_like->price}}</li>
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

  @endsection

