<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bagian;

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

    public function store(Request $request){

        $user = new Bagian;

        $user->nama_bagian = $request->nama_bagian;

        $user->save();

        session()->flash("success", "Data berhasil di tambahkan");
        return back()->with(['success' => 'Data berhasil di tambahkan']);

    }

    public function edit($id){


        $data = Bagian::find($id);

        return view('pages.admin.edit.edit_bagian', compact('data'));
    }

    public function update(Request $request){

        $data = Bagian::find($request->id);
        $data->nama_bagian = $request->nama_bagian;

        $data->save();

        session()->flash("success", "Data berhasil di update");
        return redirect("/bagian")->with('success', 'Data berhasil di update');
    }

}
