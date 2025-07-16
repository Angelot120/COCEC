<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function blogs()
    {

        $blogs = Blog::all();

        return view('admin.blog.index', ['blogs' => $blogs]);
    }
}
