<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return $this->responseSuccess(Category::where('parent_id',null)->get(), 'All Parent Category Successfully Fetched');
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
    public function store(CategoryAddRequest $request)
    {
        try{
            return $this->responseSuccess(Category::create($request->all()), 'Category Successfully Inserted');
        }
        catch(Exception $e){
           return $this->responseError($e->getMessage(), "Category Inserting Failed!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return $this->responseSuccess($category, 'Category Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        try {
            return $this->responseSuccess($category, 'Category Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return $this->responseSuccess($category, 'Category Successfully Updated');

        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), "Category Updating Failed!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return $this->responseSuccess(null, 'Category Successfully Deleted');
        }
        catch(Exception $e){
            return $this->responseError($e->getMessage(), 'Category Deleting Failed');
        }
    }
}
