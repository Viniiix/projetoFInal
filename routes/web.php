<?php

//Route::get("categorias", "CategoryController@index");

Route::prefix('categorias')->group(function() {
    Route::get("", "CategoryController@index")->name("categorias");
    Route::get("novo", "CategoryController@create")->name("categoriasnovo");
    Route::get("{id}", "CategoryController@edit")->name("categoriasform");
    Route::post("", "CategoryController@store")->name("categoriasinsert");
    Route::put("{id}", "CategoryController@update")->name("categoriasupdate");
    Route::delete("{id}", "CategoryController@destroy")->name("categoriasdelete");
});

Route::prefix('posts')->group(function() {
    Route::get("", "ProductController@index")->name("posts");
    Route::get("novo", "ProductController@create")->name("postsnovo");
    Route::get("{id}", "ProductController@edit")->name("postsform");
    Route::post("", "ProductController@store")->name("postsinsert");
    Route::put("{id}", "ProductController@update")->name("postsupdate");
    Route::delete("{id}", "ProductController@destroy")->name("postsdelete");
});

// Route::prefix('usuarios')->middleware('auth')->group(function() {
//     Route::get("", "UserController@index")->name("usuarios");
//     Route::get("novo", "UserController@create")->name("usuariosnovo");
//     Route::get("{id}", "UserController@edit")->name("usuariosform");
//     Route::post("", "UserController@store")->name("usuariosinsert");
//     Route::put("{id}", "UserController@update")->name("usuariosupdate");
//     Route::delete("{id}", "UserController@destroy")->name("usuariosdelete");
// });
// Auth::routes();

// Route::get('logout', 'Auth\LoginController@logout')->name('logout');
