<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Models\Communication;
use App\Models\Faq;
use App\Traits\ResponseTrait;
use Exception;

class FaqController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->responseSuccess(Faq::get(), 'All Faq Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
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
    public function store(FaqStoreRequest $request)
    {
        try {
            return $this->responseSuccess(Faq::create($request->except('ans')), 'Faq Successfully Inserted');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), "Faq Inserting Failed!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $Faq)
    {
        try {
            return $this->responseSuccess($Faq, 'Faq Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $Faq)
    {
        try {
            return $this->responseSuccess($Faq, 'Faq Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqStoreRequest $request, Faq $Faq)
    {
        try {
            // $Faq->update($request->all());
            return $this->responseSuccess($Faq, 'Faq Successfully Updated');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), "Faq Updating Failed!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $Faq)
    {
        try {
            // $Faq->delete();
            return $this->responseSuccess(null, 'Faq Successfully Deleted');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Faq Deleting Failed');
        }
    }
    public function getCommunication()
    {
        try {
            return $this->responseSuccess(Communication::first(), 'Communication Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }
}
