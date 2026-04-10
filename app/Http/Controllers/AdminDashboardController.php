<?php

namespace App\Http\Controllers;

use App\Charts\SupplierCustomerBarChart;
use App\Charts\SupplierCustomerLineChart;
use App\Models\Customer;
use App\Models\ProductType;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SupplierCustomerBarChart $barChart)
    {   
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $product_types = ProductType::all();
        return view('admin.dashboard', [
            'barChart' => $barChart->build(),
        ], compact(['suppliers', 'customers', 'product_types']));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
