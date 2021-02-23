<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // category name
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $Category = Product::with('category')->select('category_id')->where('supplier_id', $supplier_id)->where('status', true)->groupBy('category_id')->get();

        return response()->json($Category);
    }

    // product name
    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $Product = Product::where('category_id', $category_id)->where('status', true)->get();

        return response()->json($Product);
    }

    // product stock
    public function getProductStock(Request $request){
        $product_id = $request->product_id;
        $Product_Stock = Product::where('id', $product_id)->first()->quantity;

        return response()->json($Product_Stock);
    }

    public function getProductPrice(Request $request){
        $product_id = $request->product_id;
        $Product_Price = Purchase::where('product_id', $product_id)->first()->unit_price;

        return response()->json($Product_Price);
    }

}