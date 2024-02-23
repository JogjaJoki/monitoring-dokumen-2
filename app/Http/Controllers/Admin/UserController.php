<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::where('role', 'user')->get();

        return view('admin.user.index', compact(['user']));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function create(Request $req){
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role' => 'user'
        ]);

        return redirect()->route('admin.user.index');
    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact(['user']));
    }

    public function update(Request $req){
        $user = User::findOrFail($req->id);

        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);

        $user->save();

        return redirect()->route('admin.user.index');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('admin.user.index');
    }
}
