<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Origin;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origins = Origin::get();
        return view('admin.extras.origins', compact('origins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $origin = new Origin;
        $origin->origin_name = $req->origin_name;
        $origin->save();
        return redirect()->route('admin.origin.list')->with('Success', 'origin added successfully');
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
        $origin = Origin::find($req->originId);
        $origin->origin_name = $req->origin_name;
        $origin->save();
        return redirect()->route('admin.origin.list')->with('Success', 'Origin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $origin = Origin::find($id);
        $origin->delete();
        return redirect()->route('admin.origin.list')->with('Success', 'Origin deleted successfully');
    }
}
