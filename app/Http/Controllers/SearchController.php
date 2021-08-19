<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post_lowongan;
use App\Models\Pelamar;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        return view('pages.admin.search');
    }

    public function search(Request $request){

        $search = $request->search;

        $data = DB::table('data_pelamar')
                ->where('nik', 'like',"%".$search."%")
                ->get();

        return view('pages.admin.search',[
                'data' => $data,


        ]);

    }
}
