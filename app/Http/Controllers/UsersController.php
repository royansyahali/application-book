<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

    public function index(){
        
        $users = User::orderBy("created_at","desc")->get();
        return view("index-users",compact("users"));
    }

    public function create(){
        return view("form-users");
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'role' => "required|in:1,0",
            'password' => "required|min:8|confirmed",
        ]);
        $validateData['password'] = bcrypt($request['password']);
        User::create($validateData);
        Alert::success('Congrats', 'Data Berhasil Tersimpan!');
        return redirect()->route("users.index");
    }

    public function edit(User $id){
        return view("form-edit-users",compact("id"));
    }

    public function update(Request $request, User $id) {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email,'.$id->id,
            'role' => "required|in:1,0",
            'password' => "required_with:old_password|confirmed",
            'old_password' => "required_with:password",


        ]);
        if (Hash::check($request['old_password'], $id->password)){
            $validateData['password'] = bcrypt($validateData['password']);
            unset($validateData["old_password"]);
            User::where('id', $id->id)->update($validateData);
            Alert::success('Congrats', 'Data berhasil diperbaharui.', 'success');
            return redirect()->route("users.index");
        }
        if ($request["old_password"] != ""){
            Alert::warning('Error',"Kesalahan pada Password Lama Anda!");  
            return redirect()->back();
        }
        Alert::success('Congrats', 'Data berhasil diperbaharui.', 'success');
        return redirect()->route("users.index");
    }

    public function destroy(User $id)
    {
        User::destroy($id->id);
        Alert::success('Terhapus', 'Data berhasil diperbaharui.', 'success');
    }
}


