<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    public function index(){
        
        $books = Book::orderBy("created_at","desc")->get();
        return view("index-book",compact("books"));
    }

    public function create(){
        
        $authors = Author::orderBy("created_at","desc")->get();
        $categories = Category::orderBy("created_at","desc")->get();
        return view("form-book",compact(["categories","authors"]));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required|max:50',
            'pages' => 'required',
            'id_author' => 'required',
            'id_category' => 'required',
        ]);
        // dd($validateData);
        Book::create($validateData);
        Alert::success('Congrats', 'Data Berhasil Tersimpan!');
        return redirect()->route("book.index");
    }

    public function edit(Book $id){
        $authors = Author::orderBy("created_at","desc")->get();
        $categories = Category::orderBy("created_at","desc")->get();
        return view("form-edit-book",compact(["categories","authors","id"]));
    }

    public function update(Request $request, Book $id) {
        $validateData = $request->validate([
            'title' => 'required|max:50',
            'pages' => 'required',
            'id_author' => 'required',
            'id_category' => 'required',
        ]);
        Book::where('id', $id->id)->update($validateData);
        Alert::success('Congrats', 'Data berhasil diperbaharui.', 'success');
        return redirect()->route("book.index");
    }

    public function destroy(Book $id)
    {
        Book::destroy($id->id);
        Alert::success('Terhapus', 'Data berhasil diperbaharui.', 'success');
    }
}
