<?php

namespace App\Http\Controllers;

use App\user;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\DB;
use App\product;
use App\product_order;
use App\userAddress;
use App\category;
use App\order;
use Illuminate\Http\Request;

class MainController extends Controller
{
       public function home(){
       // dd(Session()->get("oldUrl"));
           $category = category::where("feautured", false)->get();
           $might_like = product::inRandomOrder()->take(6)->get();

           return view("home")->with([
            "might_likes" => $might_like,
             "categories" => $category,
            ]);
       }


       public function product(){
        //dd(Session()->get("oldUrl"));
        if(Request()->category){
          $products = product::with("category")->whereHas("category", function($query){
            $query->where("slug", Request()->category);
          });
          $category = category::all();
          $categoryName = $category->where("slug",  Request()->category)->first()->name; 
        }else{
            $products = product::inRandomOrder()->take(15);
            $category = category::all();
            $categoryName = "Feautured Products";
        }

        if(Request()->sort == "high_low"){
          $products = $products->orderBy("price", "Desc")->paginate(15);  
        }else if(Request()->sort == "low_high"){
          $products = $products->orderBy("price")->paginate(15);
        }else{
          $products = $products->paginate(15);
        }
        $might_like2 = product::inRandomOrder()->take(8)->get();
        $might_like = product::inRandomOrder()->take(6)->get();
        $order = product::inRandomOrder()->take(4)->get();
            return view("product", [
                "products" => $products, 
                "might_likes" => $might_like,
                "orders" => $order,
                "might_like2"  => $might_like2,
                "categories" => $category,
                "categoryName" => $categoryName
                ]);
       }

       public function detail_post($slug){
              $detail = product::where("slug",$slug)->firstorfail();
              $might_like = product::inRandomOrder()->take(6)->get();
              $might_like2 = product::inRandomOrder()->take(8)->get();
              return view("details", ["might_likes" => $might_like,
                                      "might_like2"  => $might_like2,
                                     "details" => $detail]);
       }
 
       public function myorder(){
          
        $order_product = product_order::all();
        $order_address = order::all();
         $might_like = product::inRandomOrder()->take(6)->get();
         $user_id = Auth::user()->id;
         $user = user::where("id", $user_id)->firstorFail();
       
         return view("myorder", [
          "might_likes" => $might_like,
          "product_order" => $order_product,
          "address_order" => $order_address,
          "user"         =>  $user,
          ]);
       }

        public function profile_detail(Request $Request){
               $user = Auth::user();
               $this->validate($Request,[
                 "name" => "required | max:120",
                 "surname" => "required | max:120",
                 "phone_one"   => "required | regex:/(0)[0-9]{10}/",
                 "gender"  => "required",
               ]);
              

               $addressUpdate = userAddress::where("user_id",$user->id)->first();

               if($addressUpdate){ 
                  $addressUpdate->name = $Request->name;
                  $addressUpdate->surname = $Request->surname;
                  $addressUpdate->phone_one = $Request->phone_one;
                  $addressUpdate->gender = $Request->gender;
                    
                  $addressUpdate->update();
              }else{
            
                  $user_address = new userAddress;
                  $user_address->user_id = $user->id;
                  $user_address->name = $Request->name;
                  $user_address->surname = $Request->surname;
                  $user_address->phone_one = $Request->phone_one;
                  $user_address->gender = $Request->gender;
                  $user_address->address = "";
                  $user_address->save();
              }

               return redirect("myorder")->with("success", "Updated successfuly!");
        }
        
        public function post_adress(Request $Request){
                $user = Auth::user();
                $this->validate($Request, [
                  "name" => "required | max:120",
                  "phone_one" => "required | regex:/(0)[0-9]{10}/",
                  "address"   => "required",
                ]);
                 
                $userAddress = userAddress::where("user_id", $user->id)->first();
                $add_Address = new userAddress;
                $add_detail = $userAddress ? $userAddress : $add_Address;
               
                $add_detail->user_id = $user->id;
                $add_detail->name = $Request->name;
                $add_detail->surname = $Request->surname;
                $add_detail->phone_one = $Request->phone_one;
                $add_detail->phone_two = $Request->phone_two;
                $add_detail->gender = $Request->gender;
                $add_detail->address = $Request->address;
                $add_detail->state = $Request->state;
                $add_detail->country = $Request->country;

                if($userAddress){
                  $add_detail->update();
                }else{
                  $add_detail->save();
                }
                
                 return redirect("address")->with("success", "confirmed successful!");
        }

     

       public function address(){
        $user = Auth::user();
        $user_details = userAddress::where("user_id", $user->id)->first();

         return view("address", [
           "user_details" => $user_details,
         ]);
       }




       public function thankyou(){
        return view("thankyou");
      }
        
}
