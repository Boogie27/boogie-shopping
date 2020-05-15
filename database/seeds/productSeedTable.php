<?php

use Illuminate\Database\Seeder;

use App\category;
use App\product;

class productSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 

         for($i =1; $i < 30; $i++){
            product::create([
                "name" => "men shirt".$i,
                "slug" => "men".$i,
                "make" => "levis",
                "image" => "images/handsome-man.jpg",
                "detail" => "asuit for men",
                "price" => "8000".$i,
                "description" => "suit for men ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(2);
         }
         for($i =1; $i < 25; $i++){
            product::create([
                "name" => "women dress".$i,
                "slug" => "women".$i,
                "make" => "gucci",
                "image" => "images/women4.jpg",
                "detail" => "awesome dark blue",
                "price" => "8000".$i,
                "description" => "awesome dark blue  ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(3);
         }

         

         for($i =1; $i < 15; $i++){
            product::create([
                "name" => "pad".$i,
                "slug" => "pad".$i,
                "make" => "playstation",
                "image" => "images/pad_3.jpg",
                "detail" => "black and red pad",
                "price" => "3500".$i,
                "description" => "black and red ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(6);
         }
         for($i =1; $i < 30; $i++){
            product::create([
                "name" => "playStation console".$i,
                "slug" => "console".$i,
                "make" => "playstation",
                "image" => "images/console_1.jpg",
                "detail" => "black console",
                "price" => "120000".$i,
                "description" => "black console ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(7);
         }

         for($i =1; $i < 30; $i++){
            product::create([
                "name" => "socom".$i,
                "slug" => "socom".$i,
                "make" => "playstation",
                "image" => "images/socom.jpg",
                "detail" => "black console",
                "price" => "15000".$i,
                "description" => "socom ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(1);
         }

         for($i =1; $i < 15; $i++){
            product::create([
                "name" => "men shoe".$i,
                "slug" => "men-shoes".$i,
                "make" => "levis",
                "image" => "images/levis-shoe2.jpg",
                "detail" => "men shoes black",
                "price" => "4500".$i,
                "description" => "Men shoes ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(4);
         }


         for($i =1; $i < 15; $i++){
            product::create([
                "name" => "women shoe".$i,
                "slug" => "women-shoes".$i,
                "make" => "shantel",
                "image" => "images/women_shoe.jpg",
                "detail" => "men shoes red",
                "price" => "3000".$i,
                "description" => "Men shoes ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(5);
         }

         for($i =1; $i < 15; $i++){
            product::create([
                "name" => "laptop".$i,
                "slug" => "laptop".$i,
                "make" => "hp laptop",
                "image" => "images/laptop.jpg",
                "detail" => "black laptop",
                "price" => "120000".$i,
                "description" => "black 15inches laptop ".$i." Eligibility for Shipping to Nigeria"
            ])->category()->attach(8);
            }

            for($i =1; $i < 15; $i++){
                product::create([
                    "name" => "phone".$i,
                    "slug" => "phone".$i,
                    "make" => "hp laptop",
                    "image" => "images/phone.jpg",
                    "detail" => "white infinix phone",
                    "price" => "64000".$i,
                    "description" => "white infinix phone ".$i." Eligibility for Shipping to Nigeria"
                ])->category()->attach(9);
            }


        // end of product seeder
    }
}
