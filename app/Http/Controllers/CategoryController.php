<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::latest()->paginate(10);
        return view('pages.category.index', compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' =>  'required|max:50'
        ]);

        if (isset($request->publish) != NULL) {
            $publish = true;
        }
        else{
            $publish = false;
        }

        $CreateCategory = Category::create([
            'name'  =>  $request->category_name,
            'status'    =>  $publish,
            'created_by'    =>  Auth::user()->id
        ]);

        if ($CreateCategory) {
            $notification = array(
                'message'   =>  'Category created successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('category.index')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edit = Category::findOrFail($id);
        return view('pages.category.edit', compact('Edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'  =>  'required|max:50'
        ]);

        if (isset($request->publish) != NULL) {
            $publish = true;
        }
        else{
            $publish = false;
        }

        $UpdateCategory = Category::findOrFail($id)->update([
            'name'  =>  $request->category_name,
            'status'    =>  $publish,
            'created_by'    =>  Auth::user()->id
        ]);

        if ($UpdateCategory) {
            $notification = array(
                'message'   =>  'Category updated successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('category.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Deleted = Category::findOrFail($id)->delete();
        if ($Deleted) {
            $notification = array(
                'message'   =>  'Category deleted successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('category.index')->with($notification);
        }
    }
}
