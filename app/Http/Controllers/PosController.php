<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MedicineCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        // Categories
        $categories = MedicineCategory::orderBy('id', 'asc')->get();

        // Products
        $products = Product::with('medicineCategory')->get();

        // Customers (same as CustomerController@index)
        $customers = Customer::orderBy('created_at','desc')->paginate(10);

        return view('pos.index', compact('categories', 'products', 'customers'));
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
