<?php

use Illuminate\Database\Seeder;
use App\userAddress;
use Carbon\Carbon;

class userAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $date = Carbon::now()->toDateTimeString();
         userAddress::insert([
             "user_id" => 1,
             "name" => "charles",
             "surname" => "anonye",
             "phone_one" => "08022700830",
             "phone_two" => "08012345667",
             "gender" => "male",
             "address" => "7/9 sunmonu alonge street",
             "state" => "lagos",
             "country" => "Nigeria",
         ]);
    }
}
