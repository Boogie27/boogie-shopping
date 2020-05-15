@extends("layout.app")

@section("title")
    Address
@endsection

@section("content")
        <div class="container-detail addressDetails">  
            <div class="banner addressHeader">
                <h6>Address details</h6>
            </div>
             <div class="container account-details">
             <div class="alertForm">@include("include.alert") </div> 
                <form action="{{URL::to('address')}}" method="post" class="address_form">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control"  name="name" value="{{$user_details != '' ? $user_details->name : 'Enter name'}}" required>
                        </div>
                        <div class="form-group">
                            <label for="surnamee">Surname:</label>
                            <input type="text" class="form-control" name="surname" value="{{$user_details != '' ? $user_details->surname : 'Enter surname'}}" required>
                        </div>
                        <div class="form-group">
                            <label for="surnamee">email:</label>
                            <li>{{Auth::user()->email}}</li>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="phone one">
                                    <label for="phone">Phone one:</label>
                                    <input type="text" class="form-control" name="phone_one" value="{{$user_details != '' ? $user_details->phone_one : 'Phone one'}}" required>
                                </div>
                                <div class="phone two">
                                    <label for="phone">Phone two:</label>
                                    <input type="text" class="form-control" name="phone_two" value="{{$user_details != '' && $user_details->phone_two != '' ? $user_details->phone_two : 'Phone two'}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" style="color: orange">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="{{$user_details->gender}}">{{$user_details != '' ? $user_details->gender : 'Select gender'}}</option>
                                <option value="male" >Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">address:</label>
                            <input type="text" class="form-control" name="address" value="{{$user_details != '' ? $user_details->address : 'Enter address'}}" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="state">
                                    <label for="state">State:</label>
                                    <input type="text" class="form-control" name="state" value="{{$user_details != '' ? $user_details->state : 'State'}}" required>
                                </div>
                                <div class="country">
                                    <label for="country">Country:</label>
                                    <input type="text" class="form-control" name="country" value="{{$user_details != '' ? $user_details->country : 'Country'}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="submit" class="form-control btn {{!Request()->is('address') ? 'btn-info' : ''}}">Save</button>
                        <input type='hidden' name='remember_token' value='{{csrf_token()}}'>
                        </div>
                </form>
        </div>

        

             

  @endsection


  
 
