<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();

        return view('admin.category.index', compact(['category']));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function create(Request $req){
        Category::create([
            'id' => Category::generateCadId(),
            'nama' => $req->nama
        ]);

        return redirect()->route('admin.category.index');
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact(['category']));
    }

    public function update(Request $req){
        $category = Category::findOrFail($req->id);

        $category->nama = $req->nama;

        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function delete($id){
        Category::destroy($id);

        return redirect()->route('admin.category.index');
    }
}
