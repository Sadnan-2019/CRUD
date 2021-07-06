<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Route::get('/add-brand/',[

    'as'=>'add-brand',
 'uses'=>'BrandController@index',

]);*/




Route::get('/',[FrontController::class , 'index'])->name('/');





Route::get('/category/{id}',[FrontController::class , 'Viewcategory'])->name('category');




Route::get('/product-details/{id}/{name}',[FrontController::class , 'Productdetails'])->name('product-details');




Route::post('/add-to-cart',[CartController::class , 'AddToCart'])->name('add-to-cart');



Route::get('/show-cart',[CartController::class , 'Showcart'])->name('show-cart');



Route::get('/delete-cart{rowId}',[CartController::class , 'Deletecart'])->name('delete-cart');




Route::post('/update-cart',[CartController::class , 'Updatecart'])->name('update-cart');






Route::get('/checkout',[CheckoutController::class , 'index'])->name('checkout');




Route::post('/new-customer-signup',[CheckoutController::class , 'CustomerSignup'])->name('new-customer');





Route::get('/mail-confirmation',[CheckoutController::class , 'confirmAccount'])->name('mail-confirmation');




Route::get('/checkout/shipping',[CheckoutController::class , 'shippingForm'])->name('/checkout-shipping');




Route::post('/shipping-save',[CheckoutController::class , 'SaveshippingInfo'])->name('new-shipping');




Route::get( 'checkout/payment',[CheckoutController::class , 'PaymentForm'])->name('checkout/payment');





Route::post( '/new-order',[CheckoutController::class , 'Neworder'])->name('new-order');




Route::get( '/complete/order',[CheckoutController::class , 'Completeorder'])->name('/complete/order');



Route::post( '/customer/login',[CheckoutController::class , 'CustomerLogin'])->name('customer-login');





Route::post( '/customer/logout',[CheckoutController::class , 'CustomerLogout'])->name('customer-logout');





Route::get( '/newcustomer/login',[CustomerController::class , 'NewCustomerLogin'])->name('new-customer-login');




Route::post( '/onlycustomer/login',[CustomerController::class , 'onlyCustomerLogin'])->name('only-customer-login');




Route::get( '/register-page',[CustomerController::class , 'Register'])->name('register-page');




Route::post( '/new-register-customer',[CustomerController::class , 'NewRegisterCustomer'])->name('new-register-customer');




/*Route::post( '/new-register-customer',[CustomerController::class , 'NewRegisterCustomer'])->name('new-register-customer');*/


/*Route::get( '/change-password',[CustomerController::class , 'CustomerId'])->name('change-password');*/



Route::get( '/change-password',[CustomerController::class , 'PasswordForm'])->name('change-password');


/*Route::get( '/profile/{customerId}',[CustomerController::class , 'Profile'])->name('profile');*/


Route::post( '/update-password/',[CustomerController::class , 'UpdatePassword'])->name('update-password');











/*<h1>ADMIN WORK<h1>*/




Route::get('/add-brand/',[BrandController::class , 'index'])->name('add-brand');


Route::post('/save-brand/',[BrandController::class , 'SaveBrand'])->name('save-brand');


Route::get('/manage-brand/',[BrandController::class , 'ManageBrand'])->name('manage-brand');



Route::get('/edit-brand/{id}',[BrandController::class , 'EditBrand'])->name('edit-brand');




Route::post('/update-brand/',[BrandController::class , 'UpdateBrand'])->name('update-brand');



Route::get('/delete-brand/{id}',[BrandController::class , 'DeleteBrand'])->name('delete-brand');


Route::get('/unpublish-brand/{id}',[BrandController::class , 'UnpublishedBrand'])->name('unpublish-brand');


Route::get('/publish-brand/{id}',[BrandController::class , 'PublishedBrand'])->name('published-brand');


Route::get('/add-category/',[CategoryController::class , 'index'])->name('add-category');



Route::post('/save-category/',[CategoryController::class , 'SaveCategory'])->name('save-category');



Route::get('/manage-category/',[CategoryController::class , 'ManageCategory'])->name('manage-category');



Route::get('/unpublished-category/{id}',[CategoryController::class , 'UnpublishedCategory'])->name('unpublished-category');




Route::get('/published-category/{id}',[CategoryController::class , 'PublishedCategory'])->name('published-category');




Route::get('/delete-category/{id}',[CategoryController::class , 'DeleteCategory'])->name('delete-category');





Route::get('/edit-category/{id}',[CategoryController::class , 'EditCategory'])->name('edit-category');




Route::post('/update-category/',[CategoryController::class , 'UpdateCategory'])->name('update-category');




Route::get('/add-product/',[ProductController::class , 'index'])->name('add-product');




Route::post('/save-product/',[ProductController::class , 'SaveProduct'])->name('save-product');



Route::get('/manage-product/',[ProductController::class , 'ManageProduct'])->name('manage-product');




Route::get('/unpublish-product/{id}',[ProductController::class , 'UnpublishProduct'])->name('unpublish-product');




Route::get('/publish-product/{id}',[ProductController::class , 'PublishProduct'])->name('publish-product');




Route::get('/delete-product/{id}',[ProductController::class , 'DeleteProduct'])->name('delete-product');





Route::get('/edit-product/{id}',[ProductController::class , 'EditProduct'])->name('edit-product');





Route::post('/update-product/',[ProductController::class , 'UpdateProduct'])->name('update-product');




Route::get('order/manage-order',[OrderController::class , 'MangeOrder'])->name('manage-order');




Route::get('view-orders-details/{id}',[OrderController::class , 'ViewOrderDetails'])->name('view-orders-details');



Route::get('view-order-invoice/{id}',[OrderController::class , 'ViewOrderInvoice'])->name('view-order-invoice');





Route::get('/download-invoice/{id}',[OrderController::class , 'DownloadOrderInvoice'])->name('download-invoice');







