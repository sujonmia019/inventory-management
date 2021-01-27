<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Units = Unit::with('user')->latest()->paginate(10);
        return view('pages.units.index', compact('Units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.units.create');
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
            'unit_name'  =>  'required|max:5'
        ]);

        if (isset($request->publish) != NULL) {
            $publish = true;
        }
        else{
            $publish = false;
        }

        $CreateUnit = Unit::create([
            'name'  =>  $request->unit_name,
            'status'    =>  $publish,
            'created_by'    =>  Auth::user()->id
        ]);

        if ($CreateUnit) {
            $notification = array(
                'message'   =>  'Unit created successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('units.index')->with($notification);
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
        $Edit = Unit::findOrFail($id);
        return view('pages.units.edit', compact('Edit'));
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
            'unit_name'  =>  'required|max:5'
        ]);

        if (isset($request->publish) != NULL) {
            $publish = true;
        }
        else{
            $publish = false;
        }

        $CreateUnit = Unit::findOrFail($id)->update([
            'name'  =>  $request->unit_name,
            'status'    =>  $publish,
            'created_by'    =>  Auth::user()->id
        ]);

        if ($CreateUnit) {
            $notification = array(
                'message'   =>  'Unit updated successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('units.index')->with($notification);
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
        $Deleted = Unit::findOrFail($id)->delete();
        if ($Deleted) {
            $notification = array(
                'message'   =>  'Unit deleted successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('units.index')->with($notification);
        }
    }
}
