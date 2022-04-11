<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CitiesImport;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('country')->get();
        return view('admin.city.index', compact('cities'));
    }
    public function add()
    {
        return view('admin.city.add');
    }
    public function store(Request $req)
    {
        $this->validate($req,[
            'name' => 'required_without:file',
            'file' => 'required_without:name|mimes:xlsx',
            'country_id' => 'required',
        ],[
            'country_id.required' => 'This field is required'
        ]);
        $city = new City;
        if ($req->name) {
            $city->name = $req->name;
            $city->country_id = $req->country_id;
            $city->save();
        }else{
            Excel::import(new CitiesImport($req->country_id), $req->file('file')->store('temp'));
        }
        return redirect()->route('admin.city');
    }
    public function edit($id)
    {
        $city = City::find(decrypt($id));
        return view('admin.city.edit', compact('city'));
    }
    public function update(Request $req)
    {
        $city = City::where('id', decrypt($req->id))->with('country')->first();
        $city->name = $req->name;
        $city->country_id = $req->country_id;
        $city->save();
        return redirect()->route('admin.city');
    }
    public function delete($id)
    {
        $city = City::find(decrypt($id));
        $city->delete();
        return redirect()->route('admin.city');
    }

    public function getCountry(Request $req)
    {
        $countries = Country::all();
        return response()->json(['error'=>false, 'message'=>'Country Data', 'data'=>$countries]);
    }
}
