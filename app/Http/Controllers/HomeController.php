<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    public function index()
    {

        $allpost  = DB::table('post_lowongan')
                    ->Count();


        return view('home', compact('allpost'));
    }

    public function edit(){

        return view('pages.admin.edit_pass');
    }

    public function update(){

        request()->validate([
            'old_password' => 'required',
            'password'     => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if(Hash::check($old_password, $currentPassword)){
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);

            return back()->with('success', 'You are changed your password');
        }else{

            return back()->withErrors(['old_password' => 'Make Sure You Fill Your Current Password']);
        }
    }



}
