<?php

namespace App\Http\Controllers;

use App\userAddress;
use App\user;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use Session;

class userController extends Controller
{
    //
    public function signup_page(){
        return view("signup");
    }

    public function signup(Request $Request){
             $this->validate($Request, [
                 "email" => "required | email | unique:users",
                 "password" => "required | min:6 | max:12",
                 
             ]);

             $user = new user;
             if($Request->password_confirm != $Request->password){
                   return redirect()->back()->with("error" , "Password Does not Match Confirm Password");
             }else{

             $user->email = $Request->email;
             $user->password = bcrypt($Request->password);
             $user->remember_token = $Request->remember_token;

             $user->save();
            
             if(Session()->has("oldUrl")){
                $oldUrl = Session()->get("oldUrl");
                Session()->forget("oldUrl");
                Auth::login($user);
                return redirect()->to($oldUrl)->with("success" , "User account created Successfuly");
            }
             return redirect("login")->with("success" , "User account created Successfuly,Login");
             }
    }

    
    public function login_page(){
        return view("login");
    }
    public function login(Request $Request){
        $this->validate($Request, [
            "email" => "required | email",
            "password" => "required | min:6 | max:12"
        ]);
        $auth_user = Auth::attempt(["email" => $Request->email, "password" => $Request->password ]);
        $user = Auth::user();
      
      
          if($auth_user){
             Auth::login($user);
             if(Session()->has("oldUrl")){
                 $oldUrl = Session()->get("oldUrl");
                 Session()->forget("oldUrl");
                 return redirect()->to($oldUrl);
             }
             $user_name = userAddress::where("user_id",$user->id)->first();
        
            return redirect("home")->with("success", "Welcome ".$user_name->name);
         }
    
         return redirect()->back()->with("error", "The email or password is incorrect!");
       
    }

   public function logout(Request $Request){
        Auth::logout();
        return redirect("home");
    }
    
    public function oldUrl(Request $Request){
         $Request->Session()->put("OldUrl", $Request->url());
          return redirect("checkout");
    }
}
