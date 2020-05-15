<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Session;
class cart 
{
    //extends Model
   
     public $items = null;
     public $total_Quantity = 0;
     public $total_price = 0;
    

     public function __construct($old_cart){
       if($old_cart){
          $this->items          = $old_cart->items;
          $this->total_Quantity = $old_cart->total_Quantity;
          $this->total_price    = $old_cart->total_price;
       }
     }


   /*
   *
   * this method adds items into the cart
   * 
   */
     public function add($product, $id){
             $stored_Item = ["quantity" => 0, "price" => $product->price , "items" => $product];
            if($this->items){
                if(array_key_exists($id, $this->items)){
                  $stored_Item = $this->items[$id];
                } 
             }
            $stored_Item["quantity"]++;
            $stored_Item["price"] =  $stored_Item["quantity"] * $product->price;
            $this->items[$id] = $stored_Item;
            $this->total_Quantity++;
            $this->total_price += $product->price; 
                 
     }


   /*
   *
   * this method reduces and item by one the cart
   * 
   */
     public function reduce($id){
      $this->items[$id]["quantity"]--;
      $this->items[$id]["price"] -= $this->items[$id]["items"]["price"];
      $this->total_Quantity--;
     $this->total_price -= $this->items[$id]["items"]["price"];
     if($this->items[$id]["quantity"] <= 0){
             unset($this->items[$id]);
     }
  }


   /*
   *
   * this method increases an item by one the cart
   * 
   */
   public function increase($id){
      $this->items[$id]["quantity"]++;
      $this->items[$id]["price"] += $this->items[$id]["items"]["price"];
      $this->total_Quantity++;
      $this->total_price += $this->items[$id]["items"]["price"];
   }



   /*
   *
   * this method remove an item entirely from the cart
   * 
   */
    public function remove($id){
      $this->total_Quantity -= $this->items[$id]["quantity"];
      $this->total_price -= $this->items[$id]["price"];
      if($this->items){
        if(array_key_exists($id, $this->items)){
          unset($this->items[$id]);
        }
      }
      $this->items;
    }  
   
   /*
   *
   * this method removes and Item from the cart
   * 
   */
   public function updateCart($id){
        
        $this->total_Quantity -= $this->items[$id]["quantity"];
        $this->total_price    -= $this->items[$id]["price"];
        if($this->items){
          if(array_key_exists($id, $this->items)){
              unset($this->items[$id]);
          }
        }
        $this->items;
   }
  
 
   /*
   *
   * this method returns items from save for later and the cart
   * 
   */
   public function returnCart($id){
      $oldSave = Session()->get("save")->items;
        if($oldSave){
              if(array_key_exists($id, $oldSave)){
                   $savedItem = $oldSave[$id];
              }
        }
        $this->items[$id]     = $savedItem;
        $this->total_Quantity += $savedItem["quantity"];
        $this->total_price    += $savedItem["price"];
   }


}
