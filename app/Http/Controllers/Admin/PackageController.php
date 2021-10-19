<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }
    public function add()
    {
        return view('admin.package.add');
    }
    public function store(Request $req)
    {
        $package = new Package;
        $package->name = $req->name;
        $package->price = $req->price;
        if($req->offer_price != '') {
            $package->offer_price = $req->offer_price;
        }
        $package->coin = $req->coin;
        $package->description = $req->description;
        $package->status = 1;
        $package->save();
        return redirect()->route('admin.package');
    }
    public function edit($id)
    {
        $package = Package::find(decrypt($id));
        return view('admin.package.edit', compact('package'));
    }
    public function update(Request $req)
    {
        $package = Package::find(decrypt($req->id));
        $package->name = $req->name;
        $package->price = $req->price;
        if($req->offer_price != '') {
            $package->offer_price = $req->offer_price;
        } else {
            $package->offer_price = '';
        }
        $package->coin = $req->coin;
        $package->description = $req->description;
        $package->save();
        return redirect()->route('admin.package');
    }
    public function delete($id)
    {
        $package = Package::find(decrypt($id));
        $package->delete();
        return redirect()->route('admin.package');
    }
}
