<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index():View
    {
        return view('admin.dashboard');
    }

    public function login():View
    {
        return view('admin.login');
    }

    public function profile():View
    {
        return view('admin.profile');
    }

    public function signIn(AdminLoginRequest $request)
    {
       $authenticatedUser = auth()->attempt($request->validated());
       if(!$authenticatedUser){
           return redirect()->back()->with('error','Invalid credentials');
       }
       return view('admin.dashboard');
    }
}
