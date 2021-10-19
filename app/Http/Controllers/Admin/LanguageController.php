<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::get();
        return view('admin.extras.languages', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $language = new Language;
        $language->name = $req->name;
        $language->save();
        return redirect()->route('admin.language.list')->with('Success', 'Language added successfully');
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
        $language = Language::find($req->languageId);
        $language->name = $req->name;
        $language->save();
        return redirect()->route('admin.language.list')->with('Success', 'Language updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $language = Language::find($id);
        $language->delete();
        return redirect()->route('admin.language.list')->with('Success', 'Language deleted successfully');
    }
}
