<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service, App\Models\AdvertisementServices;

class CrudController extends Controller
{
    public function serviceList(Request $req)
    {
        $service = Service::latest('id')->orderBy('popularity')->get();
        return view('admin.service.list',compact('service'));
    }

    public function serviceStore(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255|string|unique:services',
            'popularity' => 'nullable|string|in:0,1'
        ]);
        $newService = new Service();
        $newService->title = $req->title;
        $newService->popularity = numberCheck($req->popularity);
        $newService->save();
        return redirect(route('admin.service.list'))->with('Success','Service Added Successfully');
    }

    public function serviceUpdate(Request $req)
    {
        $req->validate([
            'serviceId' => 'required|min:1|numeric',
            'title' => 'required|max:255|string|unique:services,title,'.$req->serviceId,
            'popularity' => 'nullable|string|in:0,1'
        ]);
        $updateService = Service::findOrFail($req->serviceId);
        $updateService->title = $req->title;
        $updateService->popularity = numberCheck($req->popularity);
        $updateService->save();
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
