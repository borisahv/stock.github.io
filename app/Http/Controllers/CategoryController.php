<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories  = Category::all();
        return view('category.list', compact('categories'));
    }

    public function create(){
        $parents = Category::whereNull('parent_id')->get();
        return view('category.create', compact('parents'));
    }

    public function store(Request $request){
        Category::create($request->all());
        return $this->index()->withErrors('Enregistrement effectué avec succès');
    }

    public function edit($id){
        $data = Category::find($id);
        $parents = Category::whereNull('parent_id')->get();
        return view('category.edit', compact('data', 'parents'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Category::find($id)->update($data);
        return $this->index()->withErrors('Modification effectuée avec succès');
    }

    public function delete($id){
        Category::find($id)->delete();
        return $this->index()->withErrors('Suppression effectuée avec succès');
    }

    public function createAjax(Request $request){
        return Category::create($request->all());
    }
}
