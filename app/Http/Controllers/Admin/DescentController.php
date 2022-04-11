<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Descent;

class DescentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descentes = Descent::get();
        return view('admin.descent.list', compact('descentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $descent = new Descent;
        $descent->title = $req->title;
        $descent->save();
        return redirect()->route('admin.descent.list')->with('Success', 'Descent added successfully');
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
        $descent = Descent::find($req->descentId);
        $descent->title = $req->title;
        $descent->save();
        return redirect()->route('admin.descent.list')->with('Success', 'Descent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $rules = [
            'descentId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $descent = Descent::where('id',$req->descentId)->first();
            
                $descent->delete();
                return successResponse('Descent Service Deleted Success');
           
        }
        return errorResponse($validator->errors()->first());
    }
}
