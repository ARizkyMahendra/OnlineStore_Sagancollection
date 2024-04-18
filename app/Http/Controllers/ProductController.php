<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use function Laravel\Prompts\alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::paginate(10);
        return view('admin.page.product', [
            'name'  => 'Product',
            'title' => 'Admin Product',
            'data'  => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $data = new product();
        $data->sku = $request->sku;
        $data->nameProduct = $request->productName;
        $data->type = $request->type;
        $data->category = $request->category;
        $data->price = $request->price;
        $data->discount = 10 / 100;
        $data->quantity = $request->quantity;

        if ($request->hasFile('formFile')) {
            $photo = $request->file('formFile');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->image = $filename;
        }
        $data->save();

        Alert::toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = product::findOrFail($id);
        return view(
            'admin.modal.editModal',
            [
                'title' => 'Edit data product',
                'data' => $data,
            ]
        )->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product, $id) 
    {
        $data = product::findOrFail($id);

        if($request -> file('formFile')){
            $photo = $request->file('formFile');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->image = $filename;
        }else{
            $filename = $request->image;
        }

        $field = [
           'sku' => $request->sku,
           'nameProduct' => $request->productName,
           'type' => $request->type,
           'category' => $request->category,
           'price' => $request->price,
           'discount' => 10 / 100,
           'quantity' => $request->quantity,
           'isActive' => 1,
           'image' => $filename,

        ];

        $data::where('id',$id)->update($field);
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }

    public function addModal()
    {
        return view('admin.modal.addModal', [
            'title' => 'Tambah data Product',
            'sku' => 'PRD' . rand(1000, 99999),
        ]);
    }
}
