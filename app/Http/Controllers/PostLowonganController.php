<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post_lowongan;
use App\Models\Pelamar;
use PDF;
use App;

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

        $img                    = $request->file('file');
        $imageName              = time(). '.' .$img->extension();
        $img->move(public_path('images/img_post'),$imageName);

        $data = new Post_lowongan;
        $data->id_bagian = $request->id_bagian;
        $data->judul = $request->judul;
        $data->image = $imageName;
        $data->deskripsi = $request->deskripsi;
        $data->kualifikasi = $request->kualifikasi;
        $data->tanggal_akhir = $request->tanggal_akhir;

        $data->save();

        session()->flash("success", "Data berhasil di tambahkan");
        return back()->with(['success' => 'Data berhasil di tambahkan']);

    }

    public function edit($id){

        $data = Post_lowongan::find($id);
        $data2 = DB::table('post_lowongan')
                ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                ->select('post_lowongan.*','bagian.nama_bagian')
                ->orderBy('id', 'DESC')
                ->get();
        $dd_bagian = DB::table('bagian')->orderBy('id', 'DESC')->get();

        return view('pages.admin.edit.edit_post', compact('data','dd_bagian','data2'));
    }

    public function update(Request $request) {

            $data = Post_lowongan::find($request->id);
            $data->id_bagian = $request->id_bagian;
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->kualifikasi = $request->kualifikasi;
            $data->tanggal_akhir = $request->tanggal_akhir;

            $data->save();

            session()->flash("success", "Data Berhasil Disimpan!");
            return redirect('/post')->with(['success' => 'Data Berhasil Disimpan!']);
        }

    public function editimage($id){

        $data = Post_lowongan::find($id);
        return view('pages.admin.edit.edit_imagepost', compact('data'));
    }

    public function updateimage(Request $request) {

        $datas = Post_lowongan::find($request->id);
        unlink(public_path('images/img_post').'/'.$datas->image);
        $img           = $request->file('file');
        $imageName     = time(). '.' .$img->extension();
        $img->move(public_path('images/img_post'),$imageName);

        $data = Post_lowongan::find($request->id);
        $data->image       = $imageName;
        $data->save();

            session()->flash("success", "Image Berhasil Diubah!");
            return redirect('/post')->with(['success' => 'Image Berhasil Diubah!']);
        }

    public function delete($id){
        $data = Post_lowongan::find($id);
         unlink(public_path('images/img_post').'/'.$data->image);
        $data->delete();
            session()->flash("error", "Data berhasil di Dihapus");
            return redirect('/post')->with(['error' => 'Data Berhasil Dihapus!']);
       }

       public function pelamar($id){


        $data_pelamar_acc =  DB::table('data_pelamar')
                                ->where('id_post_lowongan', $id)
                                ->where('status', Null)
                                ->get();

        $data_pelamar =  DB::table('data_pelamar')
                                ->where('id_post_lowongan', $id)
                                ->where('status', Null)
                                ->get();
        $data_post = DB::table('post_lowongan')
                        ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                        ->select('post_lowongan.*','bagian.nama_bagian')
                        ->where('post_lowongan.id', $id)
                        ->orderBy('post_lowongan.id', 'DESC')
                        ->get();

        return view('pages.admin.pelamar', compact('data_pelamar', 'data_post','data_pelamar_acc'));
    }

    public function poster($id){

        $data_post =  DB::table('post_lowongan')
                    ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                    ->select('post_lowongan.*','bagian.nama_bagian')
                    ->where('post_lowongan.id', $id)
                    ->orderBy('post_lowongan.id', 'DESC')
                    ->get();

        foreach ($data_post as $index=>$item){

           $id = $item->id;
           $image = $item->image;
           $judul = $item->judul;
           $nama_bagian = $item->nama_bagian;
           $deskripsi = $item->deskripsi;
           $kualifikasi = $item->kualifikasi;

        }

      //  $pdf = App::make('dompdf');
    	// $pdf = PDF::loadview('pages.poster.poster',['nama_bagian'=>$nama_bagian,'deskripsi'=>$deskripsi,'kualifikasi'=>$kualifikasi]);

    	//return $pdf->stream();
        // return $pdf->download();
        return view('pages.poster.poster', compact('id','image','judul','nama_bagian', 'deskripsi','kualifikasi'));
    }


    //FORMULIR

    public function formindex($id){

        $data_post = DB::table('post_lowongan')
                        ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                        ->select('post_lowongan.*','bagian.nama_bagian')
                        ->where('post_lowongan.id', $id)
                        ->orderBy('post_lowongan.id', 'DESC')
                        ->get();


        return view('pages.form', compact('data_post'));


    }

    public function formstore(Request $request){

        //  $this->validate($request,[
        //      'id_post_lowongan' => 'required',
        //      'bagian' => 'required',
        //      'nik' => 'required',
        //      'nama' => 'required',
        //      'umur' => 'required',
        //      'foto_ktp.*' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        //      'cv.*' => 'required|file|mimes:pdf|max:2048',
        //  ]);

         $request->validate([
            'id_post_lowongan' => 'required',
             'bagian' => 'required',
             'nik' => 'required|unique:data_pelamar,nik',
             'nama' => 'required',
             'umur' => 'required',
             'ktp' => 'required|file|mimes:jpg,png,jpeg|max:2048',
             'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $niks = $request->nik;
        $names = $request->nama;
        $bagians = $request->bagian;

        $ktp                   = $request->file('ktp');
        $imageKtp              = $bagians. '_' .$names. '_' .$niks. '.' .$ktp->getClientOriginalExtension();
        $ktp->move(public_path('images/foto_ktp'),$imageKtp);

        $cv                   = $request->file('cv');
        $imageCv              = $bagians. '_' .$names.'_'.$niks. '.' .$cv->getClientOriginalExtension();
        $cv->move(public_path('images/cv'),$imageCv);

        $data = new Pelamar;
        $data->id_post_lowongan = $request->id_post_lowongan;
        $data->bagian = $request->bagian;
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->umur = $request->umur;
        $data->foto_ktp = $imageKtp;
        $data->cv = $imageCv;

        $data->save();

        session()->flash("success", "Daftar Berhasil!");
        return back()->with(['success' => 'Daftar Berhasil!']);


    }

    public function acc($id){

        $data = Pelamar::find($id);
        $data->status = "acc";
        $data->save();

        session()->flash("success", "Data diacc!");
        return back()->with(['success' => 'Data diacc!']);
    }

    public function download_foto($id){

        $data = Pelamar::find($id);

        $fileName = $data->foto_ktp;


        $file="./images/foto_ktp/$data->foto_ktp";
        return response()->download($file, $fileName);

        session()->flash("success", "Download berhasil");
        return back()->with(['success' => 'Download berhasil']);
    }

    public function download_cv($id){

        $data = Pelamar::find($id);

        $fileName = $data->cv;


        $file="./images/cv/$data->cv";
        return response()->download($file, $fileName);

        session()->flash("success", "Download berhasil");
        return back()->with(['success' => 'Download berhasil']);
    }


}
