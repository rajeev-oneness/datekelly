<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CupSize;

class CupSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cups = CupSize::get();
        return view('admin.extras.cups', compact('cups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $cup = new CupSize;
        $cup->size = $req->size;
        $cup->save();
        return redirect()->route('admin.cup.list')->with('Success', 'Cup size added successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $cup = CupSize::find($req->cupId);
        $cup->size = $req->size;
        $cup->save();
        return redirect()->route('admin.cup.list')->with('Success', 'Cup size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cup = CupSize::find($id);
        $cup->delete();
        return redirect()->route('admin.cup.list')->with('Success', 'Cup size deleted successfully');
    }
}
