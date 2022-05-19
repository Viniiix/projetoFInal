<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function index() {
        $posts = Post::all();
        $categories = Category::all();  //Obtem todas as categorias

        return view("index", [    //retorna as informações do post e da categoria
            "posts" => $posts,
            "categories" => $categories
        ]);
    }

    public function postagem($id) {

        $postid = Post::find($id);
        
        return view("postid", [    //retorna as informações do post e da categoria
            "postid" => $postid
        ]);
        
    }

}