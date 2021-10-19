<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function store(Request $req)
    {
        $category = new Category;
        $category->name = $req->name;
        $category->description = $req->description;
        $category->save();
        return redirect()->route('admin.category');
    }
    public function edit($id)
    {
        $category = Category::find(decrypt($id));
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $req)
    {
        $category = Category::find(decrypt($req->id));
        $category->name = $req->name;
        $category->description = $req->description;
        $category->save();
        return redirect()->route('admin.category');
    }
    public function delete($id)
    {
        $category = Category::find(decrypt($id));
        $category->delete();
        return redirect()->route('admin.category');
    }
}
