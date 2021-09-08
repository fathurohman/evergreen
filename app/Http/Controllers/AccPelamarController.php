<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post_lowongan;
use App\Models\Pelamar;

class AccPelamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('pages.admin.accpelamar',[
            'data_post' =>DB::table('post_lowongan')
                            ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                            ->select('post_lowongan.*','bagian.nama_bagian')
                            ->orderBy('id', 'DESC')
                            ->get(),
            'data_pelamars' => DB::table('data_pelamar')
                            ->where('status_accepted' , "acc")
                            ->orderBy('id', 'DESC')
                            ->get(),

        ]);

    }

    public function applicant_acc($id){


        $data_pelamar_acc =  DB::table('data_pelamar')
                                ->where('id_post_lowongan', $id)
                                ->where('status_accepted', 'acc')
                                ->get();

        $data_pelamar =  DB::table('data_pelamar')
                                ->where('id_post_lowongan', $id)
                                ->where('status_accepted', Null)
                                ->paginate('20');

        $data_post = DB::table('post_lowongan')
                        ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                        ->select('post_lowongan.*','bagian.nama_bagian')
                        ->where('post_lowongan.id', $id)
                        ->orderBy('post_lowongan.id', 'DESC')
                        ->get();
        $data_position = DB::table('position')
                        ->where('id_post_lowongan', $id)
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('pages.admin.pelamaracc', compact('data_pelamar', 'data_post','data_pelamar_acc','data_position'));
    }

    public function cancel_acc($id){

        $data = Pelamar::find($id);
        $data->status_accepted = Null;
        $data->save();

        session()->flash("success", "Data Canceled!");
        return redirect()->action(
            [AccPelamarController::class, 'applicant_acc'], ['id' => $data->id_post_lowongan]
        );
    }

    public function cancel_acc1($id){

        $data = Pelamar::find($id);
        $data->status_accepted = Null;
        $data->save();

        session()->flash("success", "Data Canceled!");
        return back()->with(['success' => 'Data Canceled!']);
    }


}
