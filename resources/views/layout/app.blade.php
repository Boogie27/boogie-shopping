
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <title>Boogies shopping</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
 
 <!-- <link href="{{ asset('bootstrap_3.0.3/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css"> 
<script src="{{asset('bootstrap_3.0.3/js/bootstrap.min.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

     @yield("stripe_js")
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- @yield("stripe-js") -->
  </head>
  <body>
        <div class="preloader"></div>
        <div class="page-content">
                <section>
                      @include("include.navigation")
                </section>
              
                <section>
                    @include("include.main")
                </section>     
                    
                <section> 
                    @yield("content")
                    @yield("mightLike") 
              </section>
                
              
              <footer>
                  <div class="backToTop"><p>Back To Top</p></div>
                  <div class='footer'>
                    <p>charles shopping place &copy; 2019, Alright Reserved</p>
                  </div>
              </footer>
       </div>
       <script src="{{ asset('js/javascript.js') }}"></script>
   </body>
   </html>
