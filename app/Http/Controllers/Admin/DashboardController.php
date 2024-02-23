<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $petugas = User::where('role', 'petugas')->get();
        $user = User::where('role', 'user')->get();
        $category = Category::all();
        $document = Document::all();

        $user = Auth::user();

        return view('admin.index', compact(['petugas', 'user', 'category', 'document']));
    }
}
