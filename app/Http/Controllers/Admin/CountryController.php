<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
    }
    public function add()
    {
        return view('admin.country.add');
    }
    public function store(Request $req)
    {
        $country = new Country;
        $country->name = $req->name;
        $country->country_code = $req->country_code;
        $country->phone_code = $req->phone_code;
        $country->save();
        return redirect()->route('admin.country');
    }
    public function edit($id)
    {
        $country = Country::find(decrypt($id));
        return view('admin.country.edit', compact('country'));
    }
    public function update(Request $req)
    {
        $country = Country::find(decrypt($req->id));
        $country->name = $req->name;
        $country->country_code = $req->country_code;
        $country->phone_code = $req->phone_code;
        $country->save();
        return redirect()->route('admin.country');
    }
    public function delete($id)
    {
        $country = Country::find(decrypt($id));
        $country->delete();
        return redirect()->route('admin.country');
    }

    //get cities
    public function getCity(Request $req)
    {
        $cities = City::where('country_id', $req->country_id)->get();
        return response()->json(['error' => false, 'message' => 'City Data', 'data' => $cities]);
    }
}
