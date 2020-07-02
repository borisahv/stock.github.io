<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers  = Supplier::all();
        return view('supplier.list', compact('suppliers'));
    }

    public function create(){
        return view('supplier.create');
    }

    public function store(Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $name = $data['photo']->hashName();
            $data['photo']->move(public_path('uploads/suppliers'), $name);
            $data['photo'] = $name;
        }

        Supplier::create($data);
        return $this->index()->withErrors('Enregistrement effectué avec succès');
    }

    public function edit($id){
        $data = Supplier::find($id);
        return view('supplier.edit', compact('data'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $name = $data['photo']->hashName();
            $data['photo']->move(public_path('uploads/suppliers'), $name);
            $data['photo'] = $name;
        }
        Supplier::find($id)->update($data);
        return $this->index()->withErrors('Modification effectuée avec succès');
    }

    public function delete($id){
        Supplier::find($id)->delete();
        return $this->index()->withErrors('Suppression effectuée avec succès');
    }

    public function createAjax(Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $name = $data['photo']->hashName();
            $data['photo']->move(public_path('uploads/suppliers'), $name);
            $data['photo'] = $name;
        }
        return Supplier::create($data);
    }
}
