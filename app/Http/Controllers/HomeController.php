<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //verify rol user and redirect at specifuc dashboard
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->hasRole('admin')){
                return redirect()->route('admin.dashboard');
            }

            if($user->hasRole('editor')){
                return redirect()->route('editor.dashboard');
            }
            return view('home');

            }
            return redirect('login');
    }
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    public function editorDashboard()
    {
        return view('editor.dashboard');
    }
}
