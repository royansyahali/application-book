<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    public function index(){
        
        $authors = Author::orderBy("created_at","desc")->get();
        return view("index-author",compact("authors"));
    }

    public function create(){
        return view("form-author");
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'author' => 'required|max:50',
        ]);
        Author::create($validateData);
        Alert::success('Congrats', 'Data Berhasil Tersimpan!');
        return redirect()->route("author.index");
    }

    public function edit(Author $id){
        return view("form-edit-author",compact("id"));
    }

    public function update(Request $request, Author $id) {
        $validateData = $request->validate([
            'author' => 'required|max:50',
        ]);

        Author::where('id', $id->id)->update($validateData);
        Alert::success('Congrats', 'Data berhasil diperbaharui.', 'success');
        return redirect()->route("author.index");
    }

    public function destroy(Author $id)
    {
        Author::destroy($id->id);
        Alert::success('Terhapus', 'Data berhasil diperbaharui.', 'success');
    }
}
