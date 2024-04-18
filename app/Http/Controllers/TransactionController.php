<?php

namespace App\Http\Controllers;

use App\Models\tblCart;
use App\Models\transaction;
use App\Http\Requests\StoretransactionRequest;
use App\Http\Requests\UpdatetransactionRequest;
use App\Models\product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $best = product::where('quantityOut', '>=' ,5)->get();
        $data = product::all();
        $CartCount = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('costumer.page.home',[
            'title' => 'Home',
            'data' => $data,
            'best' => $best,
            'count' => $CartCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addToCart(Request $request)
    {
        $idProduct = $request->input('idProduct');

        $db = new tblCart;
        $product = product::find($idProduct);
        $field = [
            'idUser' => 'guest123',
            'id_sku' => $idProduct,
            'qty' => 1,
            'price' => $product->price,
        ];

        $db::create($field);
        return redirect('/');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransactionRequest $request, transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
