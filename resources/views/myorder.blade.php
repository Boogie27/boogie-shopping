@extends("layout.app")

@section("title")
    my order
@endsection

@section("content")
        <div class="container-order">   
            <div class="banner orderHeader">
                <h6>Welcome, {{Auth::user()->email}}</h6>
            </div>
      
            <div class="content-head">
               <h6>My Orders</h6>
               @if($product_order->count() > 0)
                    @foreach($product_order as $product)
                            <div class="content-body">
                                <div class="inner">
                                    <img src="{{$product->product->image}}" alt="{{$product->product->name}}">
                                    <ul>
                                        <li><b>{{$product->product->name}}</b></li>
                                        <li class="desc">{{$product->product->detail}}</li>
                                        <li >{{$product->product->description}}</li>
                                    </ul>
                               </div>
                            </div>
                    @endforeach
                @else
                    <div class="alert alert-warning ">
                      You have no Orders Yet!
                    </div>
                @endif
            </div>
        </div>  
        <div class="containerDetail">  
            <div class="banner">
                <h6 onclick="showAccount()" class="banner-header">Account Details</h6>
            </div>
             <div class="container account-details">
             <span onclick="closeAccount()">x</span>
             <div class="alertForm">@include("include.alert") </div> 
                <form action="{{URL::to('myorder/profile-detail')}}" method="post">
                       
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control"  name="name" value="{{$user->userAddress != '' ? $user->userAddress->name : 'Enter name'}}">
                        </div>
                        <div class="form-group">
                            <label for="surnamee">Surname:</label>
                            <input type="text" class="form-control" name="surname" value="{{$user->userAddress != '' ? $user->userAddress->surname : 'Enter surname'}}">
                        </div>
                        <div class="form-group">
                            <label for="surnamee">email:</label>
                            <li>{{Auth::user()->email}}</li>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone_one" value="{{$user->userAddress != '' ? $user->userAddress->phone_one : 'Phone'}}">
                        </div>
                        <div class="form-group">
                            <label for="gender" style="color: orange">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="{{$user->userAddress != '' ? $user->userAddress->gender : ''}}" >{{$user->userAddress != '' ? $user->userAddress->gender : 'Select gender'}}</option>
                                <option value="male" >Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="submit" class="form-control btn btn-info">Save</button>
                        </div>
                </form>
        </div>

         <div class="container-address">
                <div class="banner addressBar">
                    <h6>Address</h6>
                </div>
               
                    @if($user->userAddress != "")
                    <div class="container address-details">
                        <h5>{{$user->userAddress->surname}} {{$user->userAddress->name}}</h5>
                        <p>Address: {{$user->userAddress->address}}</p>
                        <ul>
                            <li>phone: {{$user->userAddress->phone_one}} / {{$user->userAddress->phone_two}}</li>
                        </ul>
                        <div class="container-default">
                            <li>default Address</li>
                        <a href="/address">Edit..</a>
                        </div>
                    @else
                        <div class="container-default">
                            <li>Add default Address</li>
                        <a href="/address">Edit..</a>
                        </div> 
                    @endif
                </div>
               @if($address_order->count() > 0)
                    <div class="container itemOrder_address">
                        <h6>Address on Order</h6>
                
                    @foreach($address_order as $address)
                       <div class="address">
                            <h5>{{$address->name}}</h5>
                            <p>{{$address->address}},{{$address->state}}, {{$address->country}}.</p>
                            <li class="edit"><a href="">Edit..</a></li> 
                        </div>
                    @endforeach
                    </div>
               @endif
            
        </div>

             

  @endsection


  
 
