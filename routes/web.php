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

Route::prefix('posts')->middleware('auth')->group(function() {
    Route::get("", "PostController@index")->name("posts");
    Route::get("novo", "PostController@create")->name("postsnovo");
    Route::get("{id}", "PostController@edit")->name("postsform");
    Route::post("", "PostController@store")->name("postsinsert");
    Route::put("{id}", "PostController@update")->name("postsupdate");
    Route::delete("{id}", "PostController@destroy")->name("postsdelete");
});

Route::prefix('index')->group(function() {
    Route::get("", "IndexController@index")->name("index");
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


