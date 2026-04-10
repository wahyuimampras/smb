<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productTypes = ProductType::all();
        return view('admin.product_types.index', compact('productTypes'));
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
    public function store(Request $request)
    {
        $request->validate([
            'productTypeName' => 'required',
            'productTypeDesc' => 'required',
        ]);


        $lastId = ProductType::max('id') ?? 0;
        $count= $lastId + 1;
        $code = sprintf('PT%03d', $count);

        $data = $request->all();
        $data['productTypeID'] = $code;

        ProductType::create($data);

        return redirect()->back()->with('success', 'Supplier berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $productType)
    {
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        $productType->update($data);
        return redirect()->back()->with('success', 'Product Type diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->back()->with('success', 'roduct Type dihapus!');
    }
}
