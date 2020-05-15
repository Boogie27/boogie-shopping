
            <div class="navigataion">
                <div class="logo">
                    <h6>Boogie Shopping</h6>
                    <div class="images">
                        @if(Auth::user())
                        <img src="{{asset('images/charles.jpg')}}" alt="profile-image">
                        @else
                        <img src="{{asset('images/profile-image.png')}}" alt="profile-image">
                        @endif
                    </div>
                </div>
                    <div class="search-bar">
                        <input type="text" name="search" value="" class="form-control" placeholder="Search for products">
                       <a href="">search</a>
                    </div>
                <div class="links">
                    <a href="/home" style="{{Request::is('home') ? 'color: yellow;': ''}}">Home</a>
                    <a href="/product" style="{{Request::is('product') ? 'color: yellow;': ''}}">Product</a>
                    <a href="/myorder" style="{{Request::is('my-order') ? 'color: yellow;': ''}}">My Order</a>
                    <a href="/cart" style="{{Request::is('cart') ? 'color: yellow;': ''}}">Cart</a>
                 @if(Auth::user())
                    <a href="/logout">logout</a>
                 @else
                    <a href="/signup"  style="{{Request::is('signup') ? 'color: yellow;': ''}}">sign up</a>
                    <a href="/login"  style="{{Request::is('login') ? 'color: yellow;': ''}}">login</a>
                @endif
                </div>
            </div> 

           @if(Request::is("home","product","myorder","product/Request()")) 
            <div class="nav-header">
                    <div class="header">
                       <h1>Boogie Best Shopping </h1>
                       <p>Our most popular products based on sales. Updated hourly.</p>
                    </div>
             </div>
            @else
  
           @endif
