<?php

namespace App;
use Session;
class save_cart
{
    
    



     public $items = null;
     public $total_Quantity = 0;
     public $total_price = 0;

     public function __construct($oldSave){
         if($oldSave){
            $this->items          = $oldSave->items;
            $this->total_Quantity = $oldSave->total_Quantity;
            $this->total_price    = $oldSave->total_price;
         }
     }

      
   /*
   *
   * this method saves an Item for later in the Cart
   * 
   */
     public function saveForLater($id){
        $oldCart = Session()->get("cart")->items;
          if($oldCart){
            $savedItems = $oldCart[$id];
            if($this->items){
              if(array_key_exists($id, $this->items)){
                  return redirect("cart")->with("error", "item already exists in Save For Later");
              }
            }
          }
          $this->items[$id] = $savedItems;
          $this->total_Quantity +=  $this->items[$id]["quantity"];
          $this->total_price    +=  $this->items[$id]["price"];
     }

     
   /*
   *
   * this method removes items permanently form the save for later;
   * 
   */
     public function delete($id){
      $this->total_Quantity -=  $this->items[$id]["quantity"];
      $this->total_price    -=  $this->items[$id]["price"];
      unset($this->items[$id]);
     }

          
   /*
   *
   * this method removes items from save for later;
   * it needs the Cart class  method return_to_cart to function fully
   * 
   */
     public function remove_item($id){
        if($this->items){
            $this->items[$id];
        }
        $this->total_Quantity -=  $this->items[$id]["quantity"];
        $this->total_price    -=  $this->items[$id]["price"];
        unset($this->items[$id]);
     }

        
}
