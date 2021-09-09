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
                ->where('id_card_number', 'like',"%".$search."%")
                ->get();

        return view('pages.admin.search',[
                'data' => $data,


        ]);

    }

    public function delete($id){
        $data = Pelamar::find($id);
        if($data->file_photo){
            unlink(public_path('images/photos').'/'.$data->file_photo);
         }
         if($data->file_cv){
            unlink(public_path('images/cv').'/'.$data->file_cv);
         }
        $data->delete();
            session()->flash("success", "Data deleted successfully!");
            return redirect('/search')->with(['success' => 'Data deleted successfully!']);
       }

}
