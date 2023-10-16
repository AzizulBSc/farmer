<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailsAddRequest;
use App\Http\Requests\UpdateDetailsRequest;
use App\Models\Details;
use App\Traits\ResponseTrait;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Category;

class DetailsController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Details::all();
        return view('admin.details.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Category::whereNotNull('parent_id')->get();
        return view('admin.details.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetailsAddRequest $request)
    {
        $details = Details::create($request->all());
        return redirect()->route('details.index')->with('success', 'Details Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $details = Details::find($id);
        return view('admin.details.show', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $details = Details::find($id);
        $subcategories = Category::all();
        return view('admin.details.edit', compact('details', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailsRequest $request, $id)
    {
        $details = Details::find($id);
        $details->update($request->all());
        return redirect()->route('details.index')->with('success', 'Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $details = Details::find($id);
        $details->delete();
        return redirect()->route('details.index')->with('success', 'Details Successfully Deleted');
    }
}
