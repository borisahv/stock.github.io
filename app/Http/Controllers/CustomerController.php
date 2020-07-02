<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers  = Customer::all();
        return view('customer.list', compact('customers'));
    }

    public function show($id){

    }

    public function create(){
        return view('customer.create');
    }

    public function store(Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $name = $data['photo']->hashName();
            $data['photo']->move(public_path('uploads/customers'), $name);
            $data['photo'] = $name;
        }

        Customer::create($data);
        return $this->index()->withErrors('Enregistrement effectué avec succès');
    }

    public function edit($id){
        $data = Customer::find($id);
        return view('customer.edit', compact('data'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $name = $data['photo']->hashName();
            $data['photo']->move(public_path('uploads/customers'), $name);
            $data['photo'] = $name;
        }
        Customer::find($id)->update($data);
        return $this->index()->withErrors('Modification effectuée avec succès');
    }

    public function delete($id){
        Customer::find($id)->delete();
        return $this->index()->withErrors('Suppression effectuée avec succès');
    }
}
