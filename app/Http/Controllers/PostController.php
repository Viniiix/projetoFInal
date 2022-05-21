<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller {

    public function index() {
        $posts = Post::all();
        
        return view("posts", [
            "posts" => $posts
        ]);
    }

    public function create() {
        $post = new Post(); 
        $post->active=1;

        $categories = Category::all();

        return view("post", [
            "post" => $post,
            "categories" => $categories
        ]);
    }

    public function edit($id) {
        $post = Post::find($id);

        $categories = Category::all();  //Obtem todas as categorias

        return view("post", [    //retorna as informações do post e da categoria
            "post" => $post,
            "categories" => $categories
        ]);
    }

    public function store(Request $request) {

        $rules = [
            "post_date" => "required",
            "category_id" => "required|exists:categories,id",
            "title" => "required|min:5",
            "summary" => "required|min:10",
            "text" => "required|min:10"
        ];

        $messages = [
            "post_date.required" => "O campo data da postagem deve ser preenchido",
            "title.required" => "O campo título deve ser preenchido",
            "title.min" => "O campo título deve ter pelo menos 5 caracteres",
            "category_id.required" => "O campo categoria deve ser preenchido",
            "category_id.exists" => "Você deve selecionar uma categoria válida",
            "summary.required" => "O campo resumo deve ser preenchido",
            "summary.min" => "O campo resumo deve ter pelo menos 10 caracteres",
            "text.required" => "O campo texto deve ser preenchido",
            "text.min" => "O campo texto deve ter pelo menos 10 caracteres"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("postsnovo")
            ->withErrors($validator)
            ->withInput();
        }

        $post = new Post();
        $post->category_id = $request->input("category_id");
        $post->post_date = $request->input("post_date");
        $post->title = $request->input("title");
        $post->summary = $request->input("summary");
        $post->text = $request->input("text");
        $post->active = $request->input("active");
        $post->save();

        return redirect()->route("posts");
    }

    public function update($id, Request $request) {
        $rules = [
            "post_date" => "required",
            "category_id" => "required|exists:categories,id",
            "title" => "required|min:5",
            "summary" => "required|min:10",
            "text" => "required|min:10"
        ];

        $messages = [
            "post_date.required" => "O campo data da postagem deve ser preenchido",
            "title.required" => "O campo título deve ser preenchido",
            "title.min" => "O campo título deve ter pelo menos 5 caracteres",
            "category_id.required" => "O campo categoria deve ser preenchido",
            "category_id.exists" => "Você deve selecionar uma categoria válida",
            "summary.required" => "O campo resumo deve ser preenchido",
            "summary.min" => "O campo resumo deve ter pelo menos 10 caracteres",
            "text.required" => "O campo texto deve ser preenchido",
            "text.min" => "O campo texto deve ter pelo menos 10 caracteres"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("postsform", ["id" => $id])
            ->withErrors($validator)
            ->withInput();
        }

        $post = Post::find($id);
        $post->category_id = $request->input("category_id");
        $post->post_date = $request->input("post_date");
        $post->title = $request->input("title");
        $post->summary = $request->input("summary");
        $post->text = $request->input("text");
        $post->active = $request->input("active");
        $post->save();

        return redirect()->route("posts");
    }

    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route("posts");
    }
}