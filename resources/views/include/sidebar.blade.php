





@section("product_sidebar")
<section class="sidebar-container">
            <div class="sidebar">
                <div class="side-head">
                    <h5>Categories</h5>
               </div>
                <div class="price">
                  <b>price:</b>   
                    <a href="{{URL::to('product', ['category' => Request()->category, 'sort' => 'high_low'])}}">High to Low</a> |
                    <a href="{{URL::to('product', ['category' => Request()->category, 'sort' => 'low_high'])}}">Low to High</a>
                </div>
            </div>
            @foreach($categories as $category)
            <div class="sidebar-content">
               <li class="{{Request()->category == $category->slug ? 'bold' : ''}}"><a href="{{URL::to('product', ['category' => $category->slug])}}">{{$category->name}}</a></li>
            </div>
            @endforeach
</section>      
@endsection