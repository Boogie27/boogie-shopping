@extends("layout.app")

@section("title")
  thank you
@endsection

@section("content")
    <div class="container thankyou">
         <div class="thank-you">
             <h6>Anonye Charles</h6>
             <ul>
                <div class="alertForm">@include("include.alert") </div>
                <a href="{{URL::to('home')}}" class="form-control">Continue Shopping</a>
             </ul>
         </div>
    </div>
  @endsection

