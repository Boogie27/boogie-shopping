@extends("layout.app")

@section("title")
    home
@endsection

@section("sidebar")
  @include("include.sidebar")
@endsection

@section("content")
        <div class="container category-container">
            <div class="alertForm">@include("include.alert") </div>
            <h6 id="header">Main Products</h6>
        @foreach($categories as $category)
             <div class="category">
                <div class="category-head">
                    <h6>{{$category->name}} <span><a href="{{URL::to('product', ['category' => $category->slug])}}">show more</a></span></h6>
                </div>
                <div class="category-body">
                    <div class="row">
                    @foreach($category->product as $items)
                        <div class="items">
                          <a href="{{URL::to('details', ['slug' => $items->slug])}}"><img src="{{asset($items->image)}}" alt="{{$items->name}}"></a>
                           <ul>
                                <li><b>{{$items->name}}</b></li>
                                <li>{{$items->detail}}</li>
                                <li class="text-danger">&#8358;{{$items->price}}</li>
                           </ul>
                        </div>
                  @endforeach
                    </div>
                </div>
             </div>
        @endforeach
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

  @endsection
