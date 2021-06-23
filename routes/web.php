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


Route::get('/homepage', 'homeController@index');
Route::get('/product-details', 'homeController@product');
Route::get('/checkout', 'homeController@checkout');
Route::get('/cart', 'homeController@cart');
Route::get('/accountlogin', 'homeController@login');
Route::get('/contactus', 'homeController@contact');
Route::get('/shop', 'homeController@shop');
Route::get('/blog', 'homeController@blog');
Route::get('/blog-single', 'homeController@blogSingle');
///Admin
Route::get('/dashboard', 'adminController@index');
Route::get('/login', 'adminController@showLogin');
///////////// categories 
Route::get('/add-category', 'categoryController@add_category')->name('categories.add');
Route::get('/edit-cateogry/{id}','categoryController@edit')->name('categories.edit');
Route::post('/edit-cateogry-post/{id}','categoryController@update')->name('categories.edit_post');
Route::post('/add-category-post', 'categoryController@create')->name('categories.add_post');
Route::get('/all-category', 'categoryController@index')->name('categories.index');

Route::delete('/delete-category/{id}', 'categoryController@destroy')->name('categories.delete');
Route::get('/add-category', 'categoryController@add_category')->name('categories.add');
///////////////// manufacture
Route::get('/add-manufacture', 'manufacturController@addBrand')->name('brands.add');
Route::post('/add-manufacture-post', 'manufacturController@create')->name('brands.add-post');
Route::get('/all-manufacture', 'manufacturController@allBrand')->name('brands.index');

Route::get('/edit-manufacture/{id}','manufacturController@edit')->name('brands.edit');
Route::post('/edit-manufacture-post/{id}','manufacturController@update')->name('brands.edit_post');

Route::delete('/delete-manufacture/{id}', 'manufacturController@destroy')->name('brands.delete');

///////////////// product
Route::get('/add-product', 'productController@addProduct')->name('products.add');
Route::post('/add-product-post','productController@create')->name('products.add-post');
Route::get('/all-products', 'productController@allProducts')->name('products.index');

Route::get('/edit-product/{id}','productController@edit')->name('product.edit');
Route::post('/edit-product-post/{id}','productController@update')->name('product.edit_post');
Route::delete('/delete-product/{id}', 'productController@destroy')->name('product.delete');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
