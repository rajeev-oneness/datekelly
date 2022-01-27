<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClubService;

class ClubServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubservices = ClubService::get();
        return view('admin.club-service.list', compact('clubservices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $clubservice = new ClubService;
        $clubservice->title = $req->title;
        $clubservice->save();
        return redirect()->route('admin.club.list')->with('Success', 'Club Service added successfully');
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
        $clubservice = ClubService::find($req->clubserviceId);
        $clubservice->title = $req->title;
        $clubservice->save();
        return redirect()->route('admin.club.list')->with('Success', 'Club Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        // $clubservice = ClubService::find($id);
        // $clubservice->delete();
        // return redirect()->route('admin.club.list')->with('Success', 'Club Service deleted successfully');


        $rules = [
            'clubserviceId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $clubService = ClubService::where('id',$req->clubserviceId)->first();
            
                $clubService->delete();
                return successResponse('Club Service Deleted Success');
           
        }
        return errorResponse($validator->errors()->first());
    }
}
