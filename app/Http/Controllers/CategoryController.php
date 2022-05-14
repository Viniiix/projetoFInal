<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::all();
        
        return view("categories", [
            "categories" => $categories
        ]);
    }

    public function create() {
        $category = new Category();

        return view("category", [
            "category" => $category
        ]);
    }

    public function edit($id) {
        $category = Category::find($id);

        return view("category", [
            "category" => $category
        ]);
    }

    public function store(Request $request) {

        $rules = [
            "title" => "required|min:2"
        ];

        $messages = [
            "title.required" => "O campo título deve ser preenchido",
            "title.min" => "O campo título deve ter pelo menos 2 caracteres"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("categoriasnovo")
            ->withErrors($validator)
            ->withInput();
        }


        $category = new Category();
        $category->title = $request->input("title");
        $category->save();

        return redirect()->route("categorias");
    }

    public function update($id, Request $request) {
        $rules = [
            "title" => "required|min:2"
        ];

        $messages = [
            "title.required" => "O campo título deve ser preenchido",
            "title.min" => "O campo título deve ter pelo menos 2 caracteres"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("categoriasform", ["id" => $id])
            ->withErrors($validator)
            ->withInput();
        }

        $category = Category::find($id);
        $category->title = $request->input("title");
        $category->save();

        return redirect()->route("categorias");
    }

    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route("categorias");
    }
}