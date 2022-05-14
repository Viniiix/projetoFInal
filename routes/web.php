<?php

//Route::get("categorias", "CategoryController@index");

Route::prefix('categorias')->middleware('auth')->group(function() {
    Route::get("", "CategoryController@index")->name("categorias");
    Route::get("novo", "CategoryController@create")->name("categoriasnovo");
    Route::get("{id}", "CategoryController@edit")->name("categoriasform");
    Route::post("", "CategoryController@store")->name("categoriasinsert");
    Route::put("{id}", "CategoryController@update")->name("categoriasupdate");
    Route::delete("{id}", "CategoryController@destroy")->name("categoriasdelete");
});

Route::prefix('produtos')->middleware('auth')->group(function() {
    Route::get("", "ProductController@index")->name("produtos");
    Route::get("novo", "ProductController@create")->name("produtosnovo");
    Route::get("{id}", "ProductController@edit")->name("produtosform");
    Route::post("", "ProductController@store")->name("produtosinsert");
    Route::put("{id}", "ProductController@update")->name("produtosupdate");
    Route::delete("{id}", "ProductController@destroy")->name("produtosdelete");
});

Route::prefix('usuarios')->middleware('auth')->group(function() {
    Route::get("", "UserController@index")->name("usuarios");
    Route::get("novo", "UserController@create")->name("usuariosnovo");
    Route::get("{id}", "UserController@edit")->name("usuariosform");
    Route::post("", "UserController@store")->name("usuariosinsert");
    Route::put("{id}", "UserController@update")->name("usuariosupdate");
    Route::delete("{id}", "UserController@destroy")->name("usuariosdelete");
});
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
