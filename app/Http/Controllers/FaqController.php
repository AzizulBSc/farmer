<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqStoreRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(20);
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request)
    {
       $faq =  Faq::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqStoreRequest $request, Faq $faq)
    {
        $faq->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('warning', 'FAQ Deleted Successfully!');
    }
}
