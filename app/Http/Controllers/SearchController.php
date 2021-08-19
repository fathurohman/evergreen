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


        return view('pages.admin.searchindex',[
            'data' => 'blank',

        ]);
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

    public function delete($id){
        $data = Pelamar::find($id);
        //  unlink(public_path('images/img_post').'/'.$data->image);
        $data->delete();
            session()->flash("error", "Data berhasil di Dihapus");
            return redirect('/search')->with(['error' => 'Data Berhasil Dihapus!']);
       }

}
