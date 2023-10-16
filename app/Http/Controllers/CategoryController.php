<?php

namespace App\Http\Controllers;

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
        $categories = Category::where('parent_id', null)->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryAddRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];

        if ($request->parent_id != null) {
            $data['parent_id'] = $request->parent_id;
        } else {
            if (Category::count() > 2) {
                return redirect()->back()->with('error', 'Main Category cannot be added. Contact Admin');
            }
        }
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category Added Successfully');
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
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $category->update($request->all());
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
            $category->delete();
            return redirect()->back()->with('success', 'Category Deleted Successfully');

    }

    public function showSubCategory(Category $category)
    {
        $categories = Category::where('parent_id', $category->id)->paginate(100);
        return view('admin.category.sub-category', compact('categories', 'category'));
    }
}
