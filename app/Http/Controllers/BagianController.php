<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\bagian;

class BagianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('pages.admin.bagian',[
            'data_bagian' =>DB::table('bagian')
                            ->orderBy('id', 'DESC')
                            ->get(),
        ]);
    }
}
