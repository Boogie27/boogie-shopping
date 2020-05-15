<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home", "mainController@home");
Route::get("/home/{category}", "mainController@home");
Route::get("/product", "mainController@product");
Route::get("/product/{category}", "mainController@product");
Route::get("/product/{category}/{sort}", "mainController@product");
Route::get("/details/{slug}", "mainController@detail_post");


//authenticate , users logged in
Route::group(["middleware" => "custom_auth"], function(){
       Route::get("/signup","userController@signup_page");
       Route::post("/signup", "userController@signup");
       Route::get("/login", "userController@login_page");
       Route::post("/login", "userController@login");
     
});

   Route::post("/oldUrl", "userController@oldUrl");

//authenicate keep guest out

Route::group(["middleware" => "custom_guest"], function(){
    Route::get("/save_for_later", "cartController@save_for_later");
    Route::get("/logout","userController@logout" );
    Route::get("/myorder", "mainController@myorder");
    Route::get("/thankyou", "mainController@thankyou");
    Route::post("/myorder/profile-detail", "mainController@profile_detail");
    Route::get("/address", "mainController@address");
    Route::post("/address", "mainController@post_adress");
   // Route::post("/cart_post", "cartController@cart_post");
});
Route::get("/cart", "cartController@cart_page");
Route::post("/add_to_cart", "cartController@add_to_cart");
Route::get("/cart/reduce/{reduce_id}", "cartController@cart_reduce");
Route::get("/cart/add/{add_id}", "cartController@cart_add");
Route::get("/cart/remove/{remove_id}", "cartController@cart_remove");
Route::get("/cart/save/{save_id}", "cartController@cart_saveforLater");
Route::get("/save/delete/{delete_id}", "cartController@cart_saveforLater_delete");
Route::get("/cart/return/{return_id}", "cartController@returnToCart");


// Laravel 5.1.17 and above
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');



//examle checkout
Route::get("/checkout", "cartController@checkout");
Route::post("/checkout_order", "cartController@postCheckout");