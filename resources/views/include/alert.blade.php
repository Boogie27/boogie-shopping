

   @if(count($errors) > 0)
        @foreach($errors->all() as $error)
              <div class="eloquent_error text-danger">
                   {{$error}}
              </div>
        @endforeach
   @endif

   @if(session("success"))
           <div class="success-alert text-success alertFormdiv">
            {{session("success")}}
           </div>
   @endif

   
   
   @if(session("error"))
           <div class="error-alert text-danger alertFormdiv">
             {{session("error")}}
           </div>
   @endif