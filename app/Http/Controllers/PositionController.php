<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post_lowongan;
use App\Models\Position;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function position($id){


        return view('pages.admin.posisi',[
            'data_position' =>DB::table('position')
                            ->where('id_post_lowongan', $id)
                            // ->orderBy('id', 'DESC')
                            ->get(),
            'data_post' => DB::table('post_lowongan')
                            ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                            ->select('post_lowongan.*','bagian.nama_bagian')
                            ->where('post_lowongan.id', $id)
                            ->orderBy('post_lowongan.id', 'DESC')
                            ->get()

        ]);

    }

    public function store(Request $request){

        $data = new Position;
        $data->id_post_lowongan = $request->id_post_lowongan;
        $data->nama_posisi = $request->nama_posisi;
        $data->save();

        session()->flash("success", "Data added successfully!");
        return back()->with(['success' => 'Data added successfully!']);

    }

    public function edit($id){

        $data = Position::find($id);
        $data2 = DB::table('post_lowongan')
                ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                ->select('post_lowongan.*','bagian.nama_bagian')
                ->orderBy('id', 'DESC')
                ->get();


        return view('pages.admin.edit.edit_posisi', compact('data','data2'));
    }

    public function update(Request $request) {

        $id_post_lowongan = $request->id_post_lowongan;

        $data = Position::find($request->id);
        $data->id_post_lowongan = $request->id_post_lowongan;
        $data->nama_posisi = $request->nama_posisi;

        $data->save();

        session()->flash("success", "Data saved successfully!");
        return redirect()->action(
            [PositionController::class, 'position'], ['id' => $id_post_lowongan]
        );
    }

    public function delete($id){
        $data = Position::find($id);
        $data->delete();
            session()->flash("success", "Data deleted successfully!");
            return back()->with(['success' => 'Data deleted successfully!']);
       }

}
