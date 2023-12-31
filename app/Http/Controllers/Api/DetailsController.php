<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DetailsAddRequest;
use App\Http\Requests\UpdateDetailsRequest;
use App\Models\Details;
use App\Traits\ResponseTrait;
use Exception;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(DetailsAddRequest $request)
    {
        try {
            return $this->responseSuccess(Details::create($request->all()), 'Details Successfully Inserted');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), "Details Inserting Failed!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Details $Details)
    {
        try {
            return $this->responseSuccess($Details, 'Details Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Details $Details)
    {
        try {
            return $this->responseSuccess($Details, 'Details Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailsRequest $request, Details $Details)
    {
        try {
            $Details->update($request->all());
            return $this->responseSuccess($Details, 'Details Successfully Updated');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), "Details Updating Failed!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Details $Details)
    {
        try {
            $Details->delete();
            return $this->responseSuccess(null, 'Details Successfully Deleted');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Details Deleting Failed');
        }
    }
}
