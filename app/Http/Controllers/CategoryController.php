<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::orderBy("created_at","desc")->get();
        return view("index-category",compact("categories"));
    }

    public function create(){
        return view("form-category");
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'category' => 'required|max:50',
        ]);
        Category::create($validateData);
        Alert::success('Congrats', 'Data Berhasil Tersimpan!');
        return redirect()->route("category.index");
    }

    public function edit(Category $id){
        return view("form-edit-category",compact("id"));
    }

    public function update(Request $request, Category $id) {
        $validateData = $request->validate([
            'category' => 'required|max:50',
        ]);

        Category::where('id', $id->id)->update($validateData);
        Alert::success('Congrats', 'Data berhasil diperbaharui.', 'success');
        return redirect()->route("category.index");
    }

    public function destroy(Category $id)
    {
        Category::destroy($id->id);
        Alert::success('Terhapus', 'Data berhasil diperbaharui.', 'success');
    }
}
