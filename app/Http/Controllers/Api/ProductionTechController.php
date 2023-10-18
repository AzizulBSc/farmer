<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Models\ProductionTech;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;

class ProductionTechController extends Controller
{
    use ResponseTrait;

    public function show(ProductionTech $prodtech)
    {
        try {
            return $this->responseSuccess($prodtech, 'Single Production Technologies Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }

    public function getParentProdTech($category_id)
    {
        try {
            $prodtech = ProductionTech::where('category_id', $category_id)->where('parent_id', null)->get();
            return $this->responseSuccess($prodtech, 'All Parent Production Technologies for Single Category Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }
    public function getSubProdTech(Request $request)
    {
        try {
            $prodtech = ProductionTech::where('category_id', $request->category_id)->where('parent_id', $request->parent_id)->get();
            return $this->responseSuccess($prodtech, 'All  Sub Production Technologies Successfully Fetched');
        } catch (Exception $e) {
            return $this->responseError($e->getMessage(), 'Something Went Wrong');
        }
    }
}
