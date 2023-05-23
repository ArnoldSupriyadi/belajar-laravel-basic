<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

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

Route::get('/pzn', function(){
    return "Hello Arnold Supriyadi";
});

Route::redirect('/youtube', '/pzn');

Route::fallback(function(){
    return "404";
});

Route::get('/hello-again', function(){
    return view('hello', ['name' => 'Arnold']);
});

Route::get('products/{id}', function($productId){
    return "Products: ". $productId;
})->name('product.detail');

Route::get('products/{product}/items/{item}', function($productId, $itemId){
    return "Products: ". $productId . "Item" . $itemId ;
});

// Route Reguler Expression Constraint
Route::get('/categories/{id}', function(string $categoryId){
    return "Categories : " . $categoryId;
})->where('id', '[0-9]+');

//Optional Route Parameter
Route::get('/users/{id?}', function(string $userId = '404') {
    return "Users : ". $userId;
})->name('user.detail');

Route::get('conflict/{name}', function($name){
    return "Conflict $name";
});

Route::get('conflict/arnold', function($name){
    return "Conflict arnold";
});

Route::get('product/{id}', function($id){
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/product-redirect/{id}', function($id){
    return redirect()->route('product.detail', ['id' => $id]);
});

Route::get('/hello', [HelloController::class, 'hello']);

Route::get('/hello/request', [HelloController::class, 'request']);