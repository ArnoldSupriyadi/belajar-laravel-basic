<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputContoller;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\In;
use Symfony\Component\Console\Input\Input;

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

Route::prefix('/response/type')->group(function (){
    Route::get('/view', [ResponseController::class, 'responseView']);
    Route::get('/json', [ResponseController::class, 'responseJson']);
    Route::get('/file', [ResponseController::class, 'responseFile']);
    Route::get('/view', [ResponseController::class, 'responseView']);
    Route::get('/download', [ResponseController::class, 'responseDownload']);
});

Route::get('/hello', [HelloController::class, 'hello']);

Route::get('/hello/request', [HelloController::class, 'request']);

Route::get('/input/hello', [InputContoller::class, 'hello']);

Route::post('/input/hello', [InputContoller::class, 'hello']);

Route::post('/input/hello/first', [InputContoller::class, 'hello']);

Route::post('/input/hello/input', [InputContoller::class, 'helloInput']);

Route::post('/input/filter/only', [InputContoller::class, 'filterOnly']);

Route::post('/input/filter/except', [InputContoller::class, 'filterExcept']);

Route::post('file/upload', [FileController::class, 'upload']);

Route::controller(CookieController::class)->group(function(){
    Route::get('/cookie/set', 'createCookie');

    Route::get('/cookie/gets', 'getCookie');

    Route::get('/cookie/clear', 'clearCookie');
});


Route::get('redirect/from', [RedirectController::class, 'redirectFrom']);

Route::get('redirect/to', [RedirectController::class, 'redirectTo']);

Route::get('/redirect/name', [RedirectController::class, 'redirectName']);

Route::get('/redirect/name/{name}', [RedirectController::class, 'redirectHello'])->name('redirect-hello');
Route::get('/redirect/named', function(){
    // return route('redirect-hello', ['name' => 'Eko']);
    // return url()->route('redirect-hello', ['name' => 'Eko']);
    return URL::route('redirect-hello', ['name' => 'Eko']);
});

Route::get('/redirect/action', [RedirectController::class, 'redirectAction']);

Route::get('/redirect/away', [RedirectController::class, 'redirectAway']);

Route::middleware(['contoth:PZN,401'])->prefix('middleware')->group(function(){
    Route::get('/api', function(){
        return "OK";
    });
    Route::get('/group', function(){
        return "GROUP";
    });
});

Route::get('/form', [FormController::class, 'form']);
Route::post('/form', [FormController::class, 'submitForm']);

Route::get('url/current', function(){
    return \Illuminate\Support\Facades\URL::full();
});

Route::get('url/action', function(){
    return action(FormController::class, 'form');
});