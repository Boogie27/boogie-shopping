<?php

namespace App\Http\Controllers;

use App\product;
use App\product_order;
use App\user;
use App\order;
use App\cart;
use App\save_cart;
 //use Darryldecode\Cart\Facades\CartFacade as cart;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
class cartController extends Controller
{

   public function cart_page(Request $Request){
   //dd( $Request->Session()->get("cart"));
    // dd( $Request->Session()->get("save"));
   //$Request->Session()->flush();
  
        $oldcart = $Request->Session()->get("cart");
        $cart = new cart($oldcart);
        $save_cart = $Request->Session()->get("save");
        $old_save = new save_cart($save_cart);
        $user = Auth::user() ? user::find(Auth::user()->id)->first() : '';
        if($old_save){
            if($old_save->total_Quantity <= 0){
               Session()->forget("save");
               }
           }
           if($cart){
            if($cart->total_Quantity <= 0){
               Session()->forget("cart");
               }
           }
        $might_like = product::inRandomOrder()->take(6)->get();
        return view("cart", [
            "might_likes" => $might_like,
            "products" => $cart->items,
            "SavedItems" => $old_save->items,
            "user"      => $user,
            ]);
    }
           

   /*
   *
   * THIS METHOD ADDS ITEMS TO THE CART
   * 
   */

    public function add_to_cart(Request $Request){
              $product = product::find($Request->id);
              $old_cart = $Request->Session()->has("cart") ? $Request->Session()->get("cart") : null;
              $cart = new cart($old_cart);

              $cart->add($product, $product->id);
              $Request->Session()->put("cart", $cart);
              return redirect("cart")->with("success", "Item has been added to your Cart");
              
    }

   /*
   *
   * this method reduces an item by one in the cart
   * 
   */
    public function cart_reduce($id){
        $oldCart = session()->has("cart") ? session()->get("cart") : null;
        $cart = new cart($oldCart);
        $cart->reduce($id);
        Session()->put("cart", $cart);
        return redirect("cart");
       
 }

   
   /*
   *
   * this method adds an item by one in the cart
   * 
   */
   public function cart_add($id){
    $oldCart = session()->has("cart") ? session()->get("cart") : null;
    $cart = new cart($oldCart);
    $cart->increase($id);
    Session()->put("cart", $cart);
    return redirect("cart");
 }
 
   
   /*
   *
   * this method removes an item permanently from the cart
   * 
   */
   public function cart_remove($id){
       $oldCart = Session()->get("cart");
       $cart = new cart($oldCart);
       $cart->remove($id);
       Session()->put("cart", $cart);
       return redirect("cart")->with("success", "Item has been removed");
   }



  //example checkout form control
   public function checkout(){ 
     return view("checkout");
   }

   
   /*
   *
   * this method checkout payment
   * an example checkout payment function
   * 
   */
    public function postCheckout(Request $Request){
        $this->validate($Request,[
            "name" => "required | max:120",
            "address" => "required",
            "state" => "required",
            "country" => "required",
            "phone"   => "required | regex:/(0)[0-9]{10}/",
          ]);
        $billing_total = Session()->get("cart")->total_price;
        $order = order::create([
           "user_id" =>    Auth::user() ? Auth::user()->id : null,
            "name"   => $Request->name,
            "address"   => $Request->address,
            "state"   => $Request->state,
            "country"   => $Request->country,
            "phone"   => $Request->phone,
            "billing_total"   => $billing_total,
        ]);
            
            $cart_items = Session()->get("cart")->items;
            foreach($cart_items as $items){
                    $orderPorduct = new product_order();
                    $orderPorduct->order_id = $order->id;
                    $orderPorduct->product_id = $items["items"]["id"];
                    $orderPorduct->quantity = $items["quantity"];
                    $orderPorduct->save();
            }
            session()->forget("cart");
            return redirect("thankyou")->with("success", "Thank you for shopping with us!");
    }
    //end of example checkout

      

   /*
   *
   * this method adds items to save for later
   * 
   */
    public function cart_saveforLater($id){
      $oldSave = Session()->has("save") ? Session()->get("save") : null;
      $saveCart = new save_cart($oldSave);
      $saveCart->saveforlater($id);
      Session()->put("save", $saveCart);

          $oldcart = Session()->get("cart");
          $cart =  new cart($oldcart);
          $cart->updateCart($id);
          Session()->put("cart",$cart);
  
         return redirect("cart");
    }
    

   /*
   *
   * this method deletes item permanently from save for later cart
   * 
   */
    public function cart_saveforLater_delete($id){
         $oldSave = Session()->get("save");
         $saveCart = new save_cart($oldSave);
         $saveCart->delete($id);
         Session()->put("save", $saveCart);
         return redirect("cart");
    }
   

   /*
   *
   * this method returns items from the save for later back to the shopping cart
   * 
   */
    public function returnToCart($id){
       

         $oldcart = Session()->get("cart");
         $cart =  new cart($oldcart);
         $cart->returnCart($id);
         Session()->put("cart",$cart);

         $saveCart = Session()->get("save");
         $save = new save_cart($saveCart);
         $save->remove_item($id);
         Session()->put("save", $save);
 
        return redirect("cart")->with("success", "Item has been returned back to Cart!");
    }


}
