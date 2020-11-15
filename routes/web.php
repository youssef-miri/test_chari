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
//=====================================================
Route::get('/','OrderController@Boutique')->name('boutique');
Route::get('cart','OrderController@Cart')->name('cart');
Route::get('checkout','OrderController@checkout')->name('checkout');
//=====================================================
Route::post('produit/add','ArticleController@AddproduitPost')->name('addproduit.post');
Route::get('produit/add','ArticleController@Addproduit')->name('addproduit');
Route::get('produit/{id}/del','ArticleController@delproduit')->name('delproduit');
Route::get('produits','ArticleController@Listproduit')->name('listproduit');
Route::get('produit/cart/add','ArticleController@addtocart')->name('addtocart');
Route::get('produit/cart/{id}/del','ArticleController@delfromcart')->name('delfromcart');
//=====================================================
Route::post('cat/add','CategorieController@AddCatPost')->name('addcat.post');
Route::get('cat/add','CategorieController@AddCat')->name('addcat');
Route::get('cat/{id}/del','CategorieController@delCat')->name('delcat');
Route::get('cat','CategorieController@ListCat')->name('listcat');
//=====================================================
Route::post('prom/add','PromoController@AddPromPost')->name('addprom.post');
Route::get('prom/add','PromoController@AddProm')->name('addprom');
Route::get('prom/{id}/del','PromoController@delProm')->name('delprom');
Route::get('prom/{id}/detail','PromoController@detailProm')->name('detailprom');
Route::get('prom','PromoController@ListProm')->name('listprom');
//=====================================================
Route::post('promproduit/add','PromoproduitController@AddPromproduitPost')->name('Addpromproduit.post');
Route::get('promproduit/{id}/del','PromoproduitController@delPromproduit')->name('delpromproduit');
//=====================================================
Route::post('comd/add','CommandeController@addcomdpost')->name('addcomdpost.post');
Route::get('comd/{idCl}/detail','CommandeController@DetailComd')->name('admin.home');
