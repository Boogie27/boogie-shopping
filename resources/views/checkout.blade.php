
  @extends("layout.app") 

@section("title")
         checkout
@endsection

@section("content")

    <div class="container checkout_container">
    @include("include.alert")
         <h4>Checkout</h4>
         <div class="row">
        <div class='col-md-4'>
            <form action="{{URL::to('checkout_order')}}" method="post"  id="">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" value="" name="name">
                  <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id">
                </div>
                <div class="form-group">
                  <label for="adress">Address:</label>
                  <input type="text" class="form-control" value=""  name="address">
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="state">state:</label>
                        <input type="text" class="form-control" value=""  name="state">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="country">country:</label>
                        <input type="text" class="form-control" value=""  name="country">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">phone:</label>
                        <input type="text" class="form-control" value=""  name="phone">
                    </div>
                </div>
                <div class="form-group">
                        <label for="card" class="">Cart detail</label>
                        <li class="text-danger">An example card has been given to you</li>
                        <input type="text" class="form-control" value="4242 4242 4242 4242"  name="">
                  </div>
                <li class="text-success"><b>Payment Details</b></li>
                <div class="form-group">
                 <button class="form-control btn btn-primary" type="submit">Click</button>
                </div>
            </form>

            </div>
        </div>


@endsection





