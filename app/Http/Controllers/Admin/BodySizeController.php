<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BodySize;

class BodySizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodySizes = BodySize::get();
        return view('admin.extras.body', compact('bodySizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $bodySize = new BodySize;
        $bodySize->size = $req->size;
        $bodySize->save();
        return redirect()->route('admin.body.list')->with('Success', 'Body size added successfully');
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
        $bodySize = BodySize::find($req->bodySizeId);
        $bodySize->size = $req->size;
        $bodySize->save();
        return redirect()->route('admin.body.list')->with('Success', 'Body size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $bodySize = BodySize::find($id);
        $bodySize->delete();
        return redirect()->route('admin.body.list')->with('Success', 'body size deleted successfully');
    }
}
