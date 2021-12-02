<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service, App\Models\AdvertisementServices;

class CrudController extends Controller
{
    public function serviceList(Request $req)
    {
        $service = Service::latest('id')->get();
        return view('admin.service.list',compact('service'));
    }

    public function serviceStore(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255|string|unique:services',
        ]);
        $newService = new Service();
        $newService->title = $req->title;
        $newService->save();
        return redirect(route('admin.service.list'))->with('Success','Service Added Successfully');
    }

    public function serviceUpdate(Request $req)
    {
        $req->validate([
            'serviceId' => 'required|min:1|numeric',
            'title' => 'required|max:255|string|unique:services,title,'.$req->serviceId,
        ]);
        $newService = Service::findOrFail($req->serviceId);
        $newService->title = $req->title;
        $newService->save();
        return redirect(route('admin.service.list'))->with('Success','Service Updated Successfully');
    }

    public function serviceDelete(Request $req)
    {
        $rules = [
            'serviceId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $service = Service::where('id',$req->serviceId)->first();
            if($service){
                AdvertisementServices::where('service_name',$service->title)->delete();
                $service->delete();
                return successResponse('Service Deleted Success');
            }
            return errorResponse('Invalid Service Name');
        }
        return errorResponse($validator->errors()->first());
    }
}
