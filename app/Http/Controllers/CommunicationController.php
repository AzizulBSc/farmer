<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communication = Communication::first();
        return view('admin.communication.index', compact('communication'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.communication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = Communication::create($request->all());
        return redirect()->route('communication.index')->with('success', 'Communication Data Inserted Successfully!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Communication $communication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Communication $communication)
    {
        return view('admin.communication.edit',compact('communication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Communication $communication)
    {
        $res = $communication->update($request->all());
        return redirect()->route('communication.index')->with('success', 'Communication Data Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communication $communication)
    {
        //
    }
}
