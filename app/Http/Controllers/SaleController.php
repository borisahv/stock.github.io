<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Command;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){
        $sales = Sale::orderBy('created_at', 'desc')->get();
        return view('sale.list', compact('sales'));
    }

    public function show($id){
        $sale = Sale::find($id);
        return view('sale.show', compact('sale'));
    }

    public function create($id = null){
        $items = Item::all();
        $customers = Customer::all();
        $customerOnly = null;
        if($id){
            $customerOnly = Customer::find($id);
        }
        return view('sale.create', compact('items', 'customers', 'customerOnly'));
    }

    public function store(Request $request){
        $data = $request->all();
        $data['total'] = 0;
        $data['paid'] = 0;
        $sale = Sale::create($data);
        $i = 0;
        $total = 0;
        foreach($data['item_id'] as $item){
            Command::create([
                'item_id' => $item,
                'quantity' => $data['quantity'][$i],
                'sale_id' => $sale->id,
                'customer_id' => $data['customer_id']
            ]);

            $obj = Item::find($item);
            if($data['quantity'][$i] >= $obj['big_quantity']){
                $total += $obj->wholesale_price * $data['quantity'][$i];
            }
            else{
                $total += $obj->retail_price * $data['quantity'][$i];
            }

            $obj->remaining_quantity -= $data['quantity'][$i];
            $obj->sales = $obj->quantity - $obj->remaining_quantity;
            $obj->save();

            $i++;
        }
        Sale::find($sale->id)->update(['total' => $total]);
        $sale = Sale::find($sale->id);
        return view('sale.show', compact('sale'))->withErrors('Enregistrement effectué avec succès');
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }

    public function print($id, Request $request){
        $sale = Sale::find($id);
        if($request->get('paid')){
            $sale->paid = 1;
            $sale->save();
        }
        return view('sale.print', compact('sale'));
    }

    public function togglePaid(Request $request){
        $sale = Sale::find($request->get('id'));
        $sale->paid = !$sale->paid;
        $sale->save();
        return $sale;
    }

    public function search(Request $request){
        if($request->get('start') or $request->get('end')){
            $start = $request->get('start');
            $end = $request->get('end');
//            dd($start.' '.$end);
            $sales = Sale::orderBy('created_at', 'desc')->whereBetween('created_at', [$start, $end])->get();
            return view('search.search', compact('sales'));
        }
        $sales = Sale::orderBy('created_at', 'desc')->get();
        return view('search.search', compact('sales'));
    }
}
