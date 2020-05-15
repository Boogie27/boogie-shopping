

  @extends("layout.app")

@section("title")
         signup
@endsection

@section("content")
    <section>
            <div class="container">
                   <div class="MyForm">
                           <div class="alertForm">@include("include.alert") </div>
                           <form action="{{URL::to('signup')}}" method="post" class="form">
                                <h5 >Signup form</h5>
                                <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type='email' name='email' id='email' class='form-control' value=''>
                                </div>
                                <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type='password' name='password' id='password' class='form-control' value=''>
                                </div>
                                <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type='password' name='password_confirm' id='password_confirm' class='form-control' value=''>
                                        <input type='hidden' name='remember_token' value='{{csrf_token()}}'>
                                </div>
                                <div class="form-group">
                                        <button type="submit" name="signup">Signup</button>
                                </div>
                                <p class='text-right'><a href='{{url("home")}}' >Visit site</a></p>
                           </form>
                   </div>
            </div>
    </section>
  @endsection


 