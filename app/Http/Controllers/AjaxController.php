<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $Category = Product::with('category')->select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->get();

        return response()->json($Category);
    }

    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $Product = Product::where('category_id', $category_id)->get();

        return response()->json($Product);
    }
}
