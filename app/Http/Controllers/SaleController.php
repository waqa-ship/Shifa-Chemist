<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;




class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('items')->latest()->get();
        return view('sales.index', compact('sales'));
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
    $data = $request->validate([
        'customer_id' => 'nullable|integer',
        'customer_name' => 'nullable|string',
        'cart' => 'required|array|min:1',
        'cart.*.name' => 'required|string',
        'cart.*.mrp' => 'required|numeric',
        'cart.*.qty' => 'required|integer|min:1',
        'cart.*.rate' => 'required|numeric',
        'cart.*.total' => 'required|numeric',
        'cart.*.disc' => 'nullable|numeric',
        'cart.*.taxAmt' => 'nullable|numeric',
        'cart.*.cgst' => 'nullable|numeric',
        'cart.*.sgst' => 'nullable|numeric',
        'cart.*.totalAmt' => 'required|numeric',
    ]);

    DB::beginTransaction();
    try {
        $grandTotal = collect($data['cart'])->sum('totalAmt');

        // create sale
        $sale = Sale::create([
            'customer_id' => $request->customer_id,
            'customer_name' => $request->customer_name,
            'grand_total' => $grandTotal,
        ]);

        // insert sale items
        foreach ($data['cart'] as $item) {
            $sale->items()->create([
                'name' => $item['name'],
                'mrp' => $item['mrp'],
                'qty' => $item['qty'],
                'rate' => $item['rate'],
                'total' => $item['total'],
                'disc' => $item['disc'] ?? 0,
                'tax_amt' => $item['taxAmt'] ?? null,
                'cgst' => $item['cgst'] ?? null,
                'sgst' => $item['sgst'] ?? null,
                'total_amt' => $item['totalAmt'],
            ]);
        }

        DB::commit();

        return response()->json(['status' => 'success', 'sale_id' => $sale->id], 201);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $sale = Sale::with('items')->findOrFail($id);
        return view('sales.show', compact('sale'));
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
