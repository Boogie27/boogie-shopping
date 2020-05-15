<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Category::insert([
            ["name" => "playstation", "slug" => "playstation", "created_at"=> $now, "updated_at" => $now],
            ["name" => "men", "slug" => "men", "created_at"=> $now, "updated_at" => $now],
            ["name" => "women", "slug" => "women", "created_at"=> $now, "updated_at" => $now],
            ["name" => "men shoes", "slug" => "men-shoes", "created_at"=> $now, "updated_at" => $now],
            ["name" => "women shoes", "slug" => "women-shoes", "created_at"=> $now, "updated_at" => $now],
            ["name" => "pads", "slug" => "pads", "created_at"=> $now, "updated_at" => $now],
            ["name" => "consoles", "slug" => "consoles", "created_at"=> $now, "updated_at" => $now],
            ["name" => "laptops", "slug" => "laptops", "created_at"=> $now, "updated_at" => $now],
            ["name" => "phones", "slug" => "phones", "created_at"=> $now, "updated_at" => $now],
        ]);
    }  
}
