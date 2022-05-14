<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public function index() {
        $products = Product::all();
        
        return view("products", [
            "products" => $products
        ]);
    }

    public function create() {
        $product = new Product(); 
        $product->active=1;
        $product->featured=1;

        $categories = Category::all();

        return view("product", [
            "product" => $product,
            "categories" => $categories
        ]);
    }

    public function edit($id) {
        $product = Product::find($id);

        $categories = Category::all();  //Obtem todas as categorias

        return view("product", [    //retorna as informações do produto e da categoria
            "product" => $product,
            "categories" => $categories
        ]);
    }

    public function store(Request $request) {

        $rules = [
            "category_id" => "required|exists:categories,id",
            "name" => "required|min:2",
            "price" => "required|numeric",
            "minimum_quantity" => "required|integer",
            "description" => "required"
        ];

        $messages = [
            "name.required" => "O campo nome deve ser preenchido",
            "name.min" => "O campo nome deve ter pelo menos 2 caracteres",
            "category_id.required" => "O campo categoria deve ser preenchido",
            "category_id.exists" => "Você deve selecionar uma categoria válida",
            "price.required" => "O campo preço deve ser preenchido com um valor maior que zero",
            "price.numeric" => "O campo preço deve ser númerico",
            "minimum_quantity.required" => "O campo quantidade mínima para compra deve ser preenchido",
            "minimum_quantity.integer" => "O campo quantidade mínima para compra deve ser um número inteiro",
            "description.required" => "O campo descrição deve ser preenchido"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("produtosnovo")
            ->withErrors($validator)
            ->withInput();
        }


        $product = new Product();
        $product->category_id = $request->input("category_id");
        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->minimum_quantity = $request->input("minimum_quantity");
        $product->description = $request->input("description");
        $product->instructions = $request->input("instructions");
        $product->link_file = $request->input("link_file");
        $product->active = $request->input("active");
        $product->featured = $request->input("featured");
        $product->url_image = "";
        $product->save();

        return redirect()->route("produtos");
    }

    public function update($id, Request $request) {
        $rules = [
            "category_id" => "required|exists:categories,id",
            "name" => "required|min:2",
            "price" => "required|numeric",
            "minimum_quantity" => "required|integer",
            "description" => "required"
        ];

        $messages = [
            "name.required" => "O campo nome deve ser preenchido",
            "name.min" => "O campo nome deve ter pelo menos 2 caracteres",
            "category_id.required" => "O campo categoria deve ser preenchido",
            "category_id.exists" => "Você deve selecionar uma categoria válida",
            "price.required" => "O campo preço deve ser preenchido com um valor maior que zero",
            "price.numeric" => "O campo preço deve ser númerico",
            "minimum_quantity.required" => "O campo quantidade mínima para compra deve ser preenchido",
            "minimum_quantity.integer" => "O campo quantidade mínima para compra deve ser um número inteiro",
            "description.required" => "O campo descrição deve ser preenchido"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->route("produtosform", ["id" => $id])
            ->withErrors($validator)
            ->withInput();
        }

        $product = Product::find($id);
        $product->category_id = $request->input("category_id");
        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->minimum_quantity = $request->input("minimum_quantity");
        $product->description = $request->input("description");
        $product->instructions = $request->input("instructions");
        $product->link_file = $request->input("link_file");
        $product->active = $request->input("active");
        $product->featured = $request->input("featured");
        $product->url_image = "";
        $product->save();

        return redirect()->route("produtos");
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route("produtos");
    }
}