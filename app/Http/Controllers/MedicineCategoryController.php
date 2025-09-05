<?php

namespace App\Http\Controllers;

use App\Models\MedicineCategory;
use Illuminate\Http\Request;

class MedicineCategoryController extends Controller
{
    // List categories
    public function index()
    {
       $categories = MedicineCategory::orderBy('id','asc')->paginate(5);
        return view('categories.index', compact('categories'));
    }

    // Show form
    public function create()
    {
        return view('categories.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        MedicineCategory::create(['name' => $request->name]);
        return redirect()->route('categories.index')->with('success', 'Category added.');
    }

    // Edit form
    public function edit($id)
    {
        $category = MedicineCategory::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category = MedicineCategory::findOrFail($id);
        $category->update(['name' => $request->name]);
        return redirect()->route('categories.index')->with('success', 'Category updated.');
    }

    // Delete
    public function destroy($id)
    {
        $category = MedicineCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
    public function show($id)
{
    $category = MedicineCategory::findOrFail($id);
    return view('categories.show', compact('category'));
}

}
