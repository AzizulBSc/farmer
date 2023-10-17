<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdTechStoreRequest;
use App\Models\Category;
use App\Models\ProductionTech;
use Illuminate\Http\Request;

class ProductionTechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodtechs = ProductionTech::latest()->paginate(20);
        return view('admin.prodtech.index', compact('prodtechs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::where('parent_id', null)->get();
        $prodtechs = ProductionTech::where('parent_id', null)->get();
        return view('admin.prodtech.create',compact('categories', 'prodtechs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdTechStoreRequest $request)
    {
        $prodtech =  ProductionTech::create($request->all());
        return redirect()->route('prodtech.index')->with('success', 'উৎপাদন প্রযুক্তি added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductionTech $prodtech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductionTech $prodtech)
    {
        $categories = Category::where('parent_id', null)->get();
        $prodtechs = ProductionTech::where('parent_id', null)->get();
        return view('admin.prodtech.edit', compact('prodtech', 'categories', 'prodtechs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdTechStoreRequest $request, ProductionTech $prodtech)
    {
        $prodtech->update($request->all());
        return redirect()->route('prodtech.index')->with('success', 'উৎপাদন প্রযুক্তি Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductionTech $prodtech)
    {
        $prodtech->delete();
        return redirect()->route('prodtech.index')->with('warning', 'উৎপাদন প্রযুক্তি Deleted Successfully!');
    }
}
