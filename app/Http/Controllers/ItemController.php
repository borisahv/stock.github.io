<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->get();
        return view('item.list', compact('items'));
    }

    public function create(){
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('item.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request){
        $data = $request->all();
        if(isset($data['image'])){
            $name = $data['image']->hashName();
            $data['image']->move(public_path('uploads/items'), $name);
            $data['image'] = $name;
        }

        $data['remaining_quantity'] = $data['quantity'];
        $data['entries'] = $data['quantity'];
        $data['total'] = $data['quantity'];
        $data['sales'] = 0;
        $data['finals'] = $data['quantity'];

        Item::create($data);
        return $this->index()->withErrors('Enregistrement effectué avec succès');
    }

    public function edit($id){
        $data = Item::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('item.edit', compact('data', 'categories', 'suppliers'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        if(isset($data['image'])){
            $name = $data['image']->hashName();
            $data['image']->move(public_path('uploads/items'), $name);
            $data['image'] = $name;
        }
        if(isset($data['remaining_quantity'])){
            $data['remaining_quantity'] = $data['quantity'];
            Item::find($id)->update($data);
            return $this->index()->withErrors('Modification effectuée avec succès');
        }else{
            Item::find($id)->update($data);
            return $this->inventory()->withErrors('Modification effectuée avec succès');
        }
    }

    public function delete($id){
        Item::find($id)->delete();
        return $this->index()->withErrors('Suppression effectuée avec succès');
    }

    public function inventory(){
        $items = Item::orderBy('created_at', 'desc')->get();
        return view('item.inventory', compact('items'));
    }

    public function editInventory($id){
        $data = Item::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('item.editinventory', compact('data', 'categories', 'suppliers'));
    }


}
