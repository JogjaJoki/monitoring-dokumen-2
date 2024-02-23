<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(){
        $petugas = User::where('role', 'petugas')->get();

        return view('admin.petugas.index', compact(['petugas']));
    }

    public function add(){
        return view('admin.petugas.add');
    }

    public function create(Request $req){
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role' => 'petugas'
        ]);

        return redirect()->route('admin.petugas.index');
    }

    public function edit($id){
        $petugas = User::findOrFail($id);

        return view('admin.petugas.edit', compact(['petugas']));
    }

    public function update(Request $req){
        $petugas = User::findOrFail($req->id);

        $petugas->name = $req->name;
        $petugas->email = $req->email;
        $petugas->password = Hash::make($req->password);

        $petugas->save();

        return redirect()->route('admin.petugas.index');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('admin.petugas.index');
    }
}
