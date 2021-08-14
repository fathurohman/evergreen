<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post_lowongan;

class PostLowonganController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('pages.admin.post',[
            'data_post' =>DB::table('post_lowongan')
                            ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                            ->select('post_lowongan.*','bagian.nama_bagian')
                            ->orderBy('id', 'DESC')
                            ->get(),
            'dd_bagian' => DB::table('bagian')
                            ->orderBy('id', 'DESC')
                            ->get(),
        ]);
    }

    public function store(Request $request){

        $data = new Post_lowongan;

        $data->id_bagian = $request->id_bagian;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->tanggal_akhir = $request->tanggal_akhir;

        $data->save();

        session()->flash("success", "Data berhasil di tambahkan");
        return back()->with(['success' => 'Data berhasil di tambahkan']);

    }

}
