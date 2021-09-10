<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post_lowongan;
use App\Models\Pelamar;
use App\Models\B_inggris;
use App\Models\Psikotest;
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
                            ->paginate('10'),
                            // ->get(),
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
        $data->kualifikasi = $request->kualifikasi;
        $data->tanggal_akhir = $request->tanggal_akhir;

        $data->save();

        session()->flash("success", "Data added successfully!");
        return back()->with(['success' => 'Data added successfully!']);

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
            $data->kualifikasi = $request->kualifikasi;
            $data->tanggal_akhir = $request->tanggal_akhir;

            $data->save();

            session()->flash("success", "Data updated successfully!");
            return redirect('/post')->with(['success' => 'Data updated successfully!']);
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

            session()->flash("success", "Image Changed Successfully!");
            return redirect('/post')->with(['success' => 'Image Changed Successfully!']);
        }

    public function delete($id){
        $data = Post_lowongan::find($id);
         unlink(public_path('images/img_post').'/'.$data->image);
        $data->delete();
            session()->flash("error", "Image deleted successfully!");
            return redirect('/post')->with(['error' => 'Image deleted successfully!']);
       }

       public function applicant($id){


        $data_pelamar_acc =  DB::table('data_pelamar')
                                ->where('id_post_lowongan', $id)
                                ->where('status_accepted', Null)
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
                        // ->orderBy('id', 'DESC')
                        ->get();

        return view('pages.admin.pelamar', compact('data_pelamar', 'data_post','data_pelamar_acc','data_position'));
    }

    public function poster($id){

        $data_post =  DB::table('post_lowongan')
                    ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                    ->select('post_lowongan.*','bagian.nama_bagian')
                    ->where('post_lowongan.id', $id)
                    ->orderBy('post_lowongan.id', 'DESC')
                    ->get();

        $data_position = DB::table('position')
                    ->where('id_post_lowongan', $id)
                    // ->orderBy('id', 'DESC')
                    ->get();

        foreach ($data_post as $index=>$item){

           $id = $item->id;
           $image = $item->image;
           $judul = $item->judul;
           $nama_bagian = $item->nama_bagian;
           $kualifikasi = $item->kualifikasi;

        }



      //  $pdf = App::make('dompdf');
    	// $pdf = PDF::loadview('pages.poster.poster',['nama_bagian'=>$nama_bagian,'deskripsi'=>$deskripsi,'kualifikasi'=>$kualifikasi]);

    	//return $pdf->stream();
        // return $pdf->download();
        return view('pages.poster.poster', compact('id','image','judul','nama_bagian','kualifikasi','data_position'));
    }


    //FORMULIR


    public function acc($id){

        $data = Pelamar::find($id);
        $data->status_accepted = "acc";
        $data->save();

        session()->flash("success", "Data accepted!");
        return back()->with(['success' => 'Data accepted!']);
    }

    public function acc_detail($id){



        $data = Pelamar::find($id);
        $data->status_accepted = "acc";
        $data->save();

        session()->flash("success", "Data accepted!");
        return redirect()->action(
            [PostLowonganController::class, 'applicant'], ['id' => $data->id_post_lowongan]
        );
    }

    public function download_foto($id){

        $data = Pelamar::find($id);

        $fileName = $data->file_foto;


        $file="./images/photos/$data->file_foto";
        return response()->download($file, $fileName);

        session()->flash("success", "Download Successfully");
        return back()->with(['success' => 'Download Successfully']);
    }

    public function download_cv($id){

        $data = Pelamar::find($id);

        $fileName = $data->file_cv;


        $file="./images/cv/$data->file_cv";
        return response()->download($file, $fileName);

        session()->flash("success", "Download Successfully");
        return back()->with(['success' => 'Download Successfully']);
    }

    public function detail_applicant($id){


        //  $data = Pelamar::find($id);

         $data = DB::table('data_pelamar')
                         ->leftjoin('bagian', 'bagian.id','=','data_pelamar.id_department')
                         ->leftjoin('position', 'position.id','=','data_pelamar.id_position')
                         ->select('data_pelamar.*','bagian.nama_bagian','position.nama_posisi')
                         ->where('data_pelamar.id', $id)
                         ->orderBy('data_pelamar.id', 'DESC')
                         ->get();

        $data_post = DB::table('post_lowongan')
                        ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                        ->select('post_lowongan.*','bagian.nama_bagian')
                        ->where('post_lowongan.id', $id)
                        ->orderBy('post_lowongan.id', 'DESC')
                        ->get();

        $data_position = DB::table('position')
                        ->where('id_post_lowongan', $id)
                        ->get();


        return view('pages.admin.detail_pelamar', compact('data', 'data_post','data_position'));
    }


    public function detail_applicants($id){


        //  $data = Pelamar::find($id);

         $data = DB::table('data_pelamar')
                         ->leftjoin('bagian', 'bagian.id','=','data_pelamar.id_department')
                         ->leftjoin('position', 'position.id','=','data_pelamar.id_position')
                         ->select('data_pelamar.*','bagian.nama_bagian','position.nama_posisi')
                         ->where('data_pelamar.id', $id)
                         ->orderBy('data_pelamar.id', 'DESC')
                         ->get();

        $data_post = DB::table('post_lowongan')
                        ->leftjoin('bagian', 'bagian.id','=','post_lowongan.id_bagian')
                        ->select('post_lowongan.*','bagian.nama_bagian')
                        ->where('post_lowongan.id', $id)
                        ->orderBy('post_lowongan.id', 'DESC')
                        ->get();

        $data_position = DB::table('position')
                        ->where('id_post_lowongan', $id)
                        ->get();


        return view('pages.admin.detail_pelamar_acc', compact('data', 'data_post','data_position'));
    }

    public function print_form($id){

        $data = DB::table('data_pelamar')
                         ->leftjoin('bagian', 'bagian.id','=','data_pelamar.id_department')
                         ->leftjoin('position', 'position.id','=','data_pelamar.id_position')
                         ->select('data_pelamar.*','bagian.nama_bagian','position.nama_posisi')
                         ->where('data_pelamar.id', $id)
                         ->orderBy('data_pelamar.id', 'DESC')
                         ->get();

        // $pdf = PDF::loadview('pages.print.form',['nama_bagian'=>$nama_bagian,'deskripsi'=>$deskripsi,'kualifikasi'=>$kualifikasi]);

    	//return $pdf->stream();
        // return $pdf->download();
        return view('pages.print.form', compact('data'));

    }

    public function result_english($id){

        $data = DB::table('data_pelamar')
                         ->leftjoin('bagian', 'bagian.id','=','data_pelamar.id_department')
                         ->leftjoin('position', 'position.id','=','data_pelamar.id_position')
                         ->select('data_pelamar.*','bagian.nama_bagian','position.nama_posisi')
                         ->where('data_pelamar.id', $id)
                         ->orderBy('data_pelamar.id', 'DESC')
                         ->get();

        $data_test = DB::table('b_inggris')
                    ->leftjoin('data_pelamar', 'data_pelamar.id','=','b_inggris.id_data_pelamar')
                    ->where('b_inggris.id_data_pelamar', $id)
                    ->get();

        foreach ($data_test as $index=>$items){

            $nomor = 0;
            $jwb_1 = $items->jwb_1;
            $jwb_2 = $items->jwb_2;
            $jwb_3 = $items->jwb_3;
            $jwb_4 = $items->jwb_4;
            $jwb_5 = $items->jwb_5;
            $jwb_6 = $items->jwb_6;
            $jwb_7 = $items->jwb_7;
            $jwb_8 = $items->jwb_8;
            $jwb_9 = $items->jwb_9;
            $jwb_10 = $items->jwb_10;
            $jwb_11 = $items->jwb_11;
            $jwb_12 = $items->jwb_12;
            $jwb_13 = $items->jwb_13;
            $jwb_14 = $items->jwb_14;
            $jwb_15 = $items->jwb_15;
            $jwb_16 = $items->jwb_16;
            $jwb_17 = $items->jwb_17;
            $jwb_18 = $items->jwb_18;
            $jwb_19 = $items->jwb_19;
            $jwb_20 = $items->jwb_20;
            $jwb_21 = $items->jwb_21;
            $jwb_22 = $items->jwb_22;
            $jwb_23 = $items->jwb_23;
            $jwb_24 = $items->jwb_24;
            $jwb_25 = $items->jwb_25;
            $jwb_26 = $items->jwb_26;
            $jwb_27 = $items->jwb_27;
            $jwb_28 = $items->jwb_28;
            $jwb_29 = $items->jwb_29;
            $jwb_30 = $items->jwb_30;
            $jwb_31 = $items->jwb_31;
            $jwb_32 = $items->jwb_32;
            $jwb_33 = $items->jwb_33;
            $jwb_34 = $items->jwb_34;
            $jwb_35 = $items->jwb_35;
            $jwb_36 = $items->jwb_36;
            $jwb_37 = $items->jwb_37;
            $jwb_38 = $items->jwb_38;
            $jwb_39 = $items->jwb_39;
            $jwb_40 = $items->jwb_40;
            $jwb_41 = $items->jwb_41;
            $jwb_42 = $items->jwb_42;
            $jwb_43 = $items->jwb_43;
            $jwb_44 = $items->jwb_44;
            $jwb_45 = $items->jwb_45;
            $jwb_46 = $items->jwb_46;
            $jwb_47 = $items->jwb_47;
            $jwb_48 = $items->jwb_48;
            $jwb_49 = $items->jwb_49;
            $jwb_50 = $items->jwb_50;
            $jwb_51 = $items->jwb_51;
            $jwb_52 = $items->jwb_52;
            $jwb_53 = $items->jwb_53;
            $jwb_54 = $items->jwb_54;
            $jwb_55 = $items->jwb_55;
            $jwb_56 = $items->jwb_56;
            $jwb_57 = $items->jwb_57;
            $jwb_58 = $items->jwb_58;
            $jwb_59 = $items->jwb_59;
            $jwb_60 = $items->jwb_60;
            $jwb_61 = $items->jwb_61;
            $jwb_62 = $items->jwb_62;
            $jwb_63 = $items->jwb_63;
            $jwb_64 = $items->jwb_64;
            $jwb_65 = $items->jwb_65;
            $jwb_66 = $items->jwb_66;
            $jwb_67 = $items->jwb_67;
            $jwb_68 = $items->jwb_68;
            $jwb_69 = $items->jwb_69;
            $jwb_70 = $items->jwb_70;
            $jwb_71 = $items->jwb_71;
            $jwb_72 = $items->jwb_72;
            $jwb_73 = $items->jwb_73;
            $jwb_74 = $items->jwb_74;
            $jwb_75 = $items->jwb_75;
            $jwb_76 = $items->jwb_76;
            $jwb_77 = $items->jwb_77;
            $jwb_78 = $items->jwb_78;
            $jwb_79 = $items->jwb_79;
            $jwb_80 = $items->jwb_80;
            $jwb_81 = $items->jwb_81;
            $jwb_82 = $items->jwb_82;
            $jwb_83 = $items->jwb_83;
            $jwb_84 = $items->jwb_84;
            $jwb_85 = $items->jwb_85;
            $jwb_86 = $items->jwb_86;
            $jwb_87 = $items->jwb_87;
            $jwb_88 = $items->jwb_88;
            $jwb_89 = $items->jwb_89;
            $jwb_90 = $items->jwb_90;
            $jwb_91 = $items->jwb_91;
            $jwb_92 = $items->jwb_92;
            $jwb_93 = $items->jwb_93;
            $jwb_94 = $items->jwb_94;
            $jwb_95 = $items->jwb_95;
            $jwb_96 = $items->jwb_96;
            $jwb_97 = $items->jwb_97;
            $jwb_98 = $items->jwb_98;
            $jwb_99 = $items->jwb_99;
            $jwb_100 = $items->jwb_100;

            }


        return view('pages.print.english_test', compact('data', 'nomor', 'jwb_1', 'jwb_2', 'jwb_3', 'jwb_4', 'jwb_5', 'jwb_6', 'jwb_7', 'jwb_8', 'jwb_9', 'jwb_10', 'jwb_11', 'jwb_12', 'jwb_13', 'jwb_14', 'jwb_15', 'jwb_16', 'jwb_17', 'jwb_18', 'jwb_19', 'jwb_20', 'jwb_21', 'jwb_22', 'jwb_23', 'jwb_24', 'jwb_25', 'jwb_26', 'jwb_27', 'jwb_28', 'jwb_29', 'jwb_30', 'jwb_31', 'jwb_32', 'jwb_33', 'jwb_34', 'jwb_35', 'jwb_36', 'jwb_37', 'jwb_38', 'jwb_39', 'jwb_40', 'jwb_41', 'jwb_42', 'jwb_43', 'jwb_44', 'jwb_45', 'jwb_46', 'jwb_47', 'jwb_48', 'jwb_49', 'jwb_50', 'jwb_51', 'jwb_52', 'jwb_53', 'jwb_54', 'jwb_55', 'jwb_56', 'jwb_57', 'jwb_58', 'jwb_59', 'jwb_60', 'jwb_61', 'jwb_62', 'jwb_63', 'jwb_64', 'jwb_65', 'jwb_66', 'jwb_67', 'jwb_68', 'jwb_69', 'jwb_70', 'jwb_71', 'jwb_72', 'jwb_73', 'jwb_74', 'jwb_75', 'jwb_76', 'jwb_77', 'jwb_78', 'jwb_79', 'jwb_80', 'jwb_81', 'jwb_82', 'jwb_83', 'jwb_84', 'jwb_85', 'jwb_86', 'jwb_87', 'jwb_88', 'jwb_89', 'jwb_90', 'jwb_91', 'jwb_92', 'jwb_93', 'jwb_94', 'jwb_95', 'jwb_96', 'jwb_97', 'jwb_98', 'jwb_99','jwb_100'));
    }

    public function result_psikotest($id){

        $data = DB::table('data_pelamar')
                         ->leftjoin('bagian', 'bagian.id','=','data_pelamar.id_department')
                         ->leftjoin('position', 'position.id','=','data_pelamar.id_position')
                         ->select('data_pelamar.*','bagian.nama_bagian','position.nama_posisi')
                         ->where('data_pelamar.id', $id)
                         ->orderBy('data_pelamar.id', 'DESC')
                         ->get();

        $data_psikotest = DB::table('psikotest')
                    ->leftjoin('data_pelamar', 'data_pelamar.id','=','psikotest.id_data_pelamar')
                    ->where('psikotest.id_data_pelamar', $id)
                    ->get();

        foreach ($data_psikotest as $index=>$datas){

            $angka_1 = $datas->angka_1;
            $angka_2 = $datas->angka_2;
            $angka_3 = $datas->angka_3;
            $angka_4 = $datas->angka_4;
            $angka_5 = $datas->angka_5;
            $angka_6 = $datas->angka_6;
            $angka_7 = $datas->angka_7;
            $angka_8 = $datas->angka_8;
            $angka_9 = $datas->angka_9;
            $angka_10 = $datas->angka_10;
            $angka_11 = $datas->angka_11;
            $angka_12 = $datas->angka_12;
            $angka_13 = $datas->angka_13;
            $angka_14 = $datas->angka_14;
            $angka_15 = $datas->angka_15;
            $angka_16 = $datas->angka_16;
            $angka_17 = $datas->angka_17;
            $angka_18 = $datas->angka_18;
            $angka_19 = $datas->angka_19;
            $angka_20 = $datas->angka_20;
            $angka_21 = $datas->angka_21;
            $angka_22 = $datas->angka_22;
            $angka_23 = $datas->angka_23;
            $angka_24 = $datas->angka_24;
            $angka_25 = $datas->angka_25;
            $angka_26 = $datas->angka_26;
            $angka_27 = $datas->angka_27;
            $angka_28 = $datas->angka_28;
            $angka_29 = $datas->angka_29;
            $angka_30 = $datas->angka_30;
            $angka_31 = $datas->angka_31;
            $angka_32 = $datas->angka_32;
            $angka_33 = $datas->angka_33;
            $angka_34 = $datas->angka_34;
            $angka_35 = $datas->angka_35;
            $angka_36 = $datas->angka_36;
            $angka_37 = $datas->angka_37;
            $angka_38 = $datas->angka_38;
            $angka_39 = $datas->angka_39;
            $angka_40 = $datas->angka_40;
            $gabungan_1 = $datas->gabungan_1;
            $gabungan_2 = $datas->gabungan_2;
            $gabungan_3 = $datas->gabungan_3;
            $gabungan_4 = $datas->gabungan_4;
            $gabungan_5 = $datas->gabungan_5;
            $gabungan_6 = $datas->gabungan_6;
            $gabungan_7 = $datas->gabungan_7;
            $gabungan_8 = $datas->gabungan_8;
            $gabungan_9 = $datas->gabungan_9;
            $gabungan_10 = $datas->gabungan_10;
            $gabungan_11 = $datas->gabungan_11;
            $gabungan_12 = $datas->gabungan_12;
            $gabungan_13 = $datas->gabungan_13;
            $gabungan_14 = $datas->gabungan_14;
            $gabungan_15 = $datas->gabungan_15;
            $gabungan_16 = $datas->gabungan_16;
            $gabungan_17 = $datas->gabungan_17;
            $gabungan_18 = $datas->gabungan_18;
            $gabungan_19 = $datas->gabungan_19;
            $gabungan_20 = $datas->gabungan_20;
            $gabungan_21 = $datas->gabungan_21;
            $gabungan_22 = $datas->gabungan_22;
            $gabungan_23 = $datas->gabungan_23;
            $gabungan_24 = $datas->gabungan_24;
            $gabungan_25 = $datas->gabungan_25;
            $gabungan_26 = $datas->gabungan_26;
            $hubungan_1 = $datas->hubungan_1;
            $hubungan_2 = $datas->hubungan_2;
            $hubungan_3 = $datas->hubungan_3;
            $hubungan_4 = $datas->hubungan_4;
            $hubungan_5 = $datas->hubungan_5;
            $hubungan_6 = $datas->hubungan_6;
            $hubungan_7 = $datas->hubungan_7;
            $hubungan_8 = $datas->hubungan_8;
            $hubungan_9 = $datas->hubungan_9;
            $hubungan_10 = $datas->hubungan_10;
            $hubungan_11 = $datas->hubungan_11;
            $hubungan_12 = $datas->hubungan_12;
            $hubungan_13 = $datas->hubungan_13;
            $hubungan_14 = $datas->hubungan_14;
            $hubungan_15 = $datas->hubungan_15;
            $hubungan_16 = $datas->hubungan_16;
            $hubungan_17 = $datas->hubungan_17;
            $hubungan_18 = $datas->hubungan_18;
            $hubungan_19 = $datas->hubungan_19;
            $hubungan_20 = $datas->hubungan_20;
            $hubungan_21 = $datas->hubungan_21;
            $hubungan_22 = $datas->hubungan_22;
            $hubungan_23 = $datas->hubungan_23;
            $hubungan_24 = $datas->hubungan_24;
            $hubungan_25 = $datas->hubungan_25;
            $hubungan_26 = $datas->hubungan_26;
            $hubungan_27 = $datas->hubungan_27;
            $hubungan_28 = $datas->hubungan_28;
            $hubungan_29 = $datas->hubungan_29;
            $hubungan_30 = $datas->hubungan_30;
            $hubungan_31 = $datas->hubungan_31;
            $hubungan_32 = $datas->hubungan_32;
            $hubungan_33 = $datas->hubungan_33;
            $hubungan_34 = $datas->hubungan_34;
            $hubungan_35 = $datas->hubungan_35;
            $hubungan_36 = $datas->hubungan_36;
            $hubungan_37 = $datas->hubungan_37;
            $hubungan_38 = $datas->hubungan_38;
            $hubungan_39 = $datas->hubungan_39;
            $hubungan_40 = $datas->hubungan_40;
            $abstraksi_1 = $datas->abstraksi_1;
            $abstraksi_2 = $datas->abstraksi_2;
            $abstraksi_3 = $datas->abstraksi_3;
            $abstraksi_4 = $datas->abstraksi_4;
            $abstraksi_5 = $datas->abstraksi_5;
            $abstraksi_6 = $datas->abstraksi_6;
            $abstraksi_7 = $datas->abstraksi_7;
            $abstraksi_8 = $datas->abstraksi_8;
            $abstraksi_9 = $datas->abstraksi_9;
            $abstraksi_10 = $datas->abstraksi_10;
            $abstraksi_11 = $datas->abstraksi_11;
            $abstraksi_12 = $datas->abstraksi_12;
            $abstraksi_13 = $datas->abstraksi_13;
            $abstraksi_14 = $datas->abstraksi_14;
            $abstraksi_15 = $datas->abstraksi_15;
            $abstraksi_16 = $datas->abstraksi_16;
            $abstraksi_17 = $datas->abstraksi_17;
            $abstraksi_18 = $datas->abstraksi_18;
            $abstraksi_19 = $datas->abstraksi_19;
            $abstraksi_20 = $datas->abstraksi_20;
            $abstraksi_21 = $datas->abstraksi_21;
            $abstraksi_22 = $datas->abstraksi_22;
            $abstraksi_23 = $datas->abstraksi_23;
            $abstraksi_24 = $datas->abstraksi_24;
            $abstraksi_25 = $datas->abstraksi_25;
            $abstraksi_26 = $datas->abstraksi_26;
            $abstraksi_27 = $datas->abstraksi_27;
            $abstraksi_28 = $datas->abstraksi_28;
            $abstraksi_29 = $datas->abstraksi_29;
            $abstraksi_30 = $datas->abstraksi_30;

            }


        return view('pages.print.psikotest', compact('data', 'angka_1', 'angka_2', 'angka_3', 'angka_4', 'angka_5'
        , 'angka_6', 'angka_7', 'angka_8', 'angka_9', 'angka_10', 'angka_11', 'angka_12', 'angka_13', 'angka_14', 'angka_15', 'angka_16'
        , 'angka_17', 'angka_18', 'angka_19', 'angka_20', 'angka_21', 'angka_22', 'angka_23', 'angka_24', 'angka_25', 'angka_26', 'angka_27'
        , 'angka_28', 'angka_29', 'angka_30', 'angka_31', 'angka_32', 'angka_33', 'angka_34', 'angka_35', 'angka_36', 'angka_37', 'angka_38'
        , 'angka_39', 'angka_40', 'gabungan_1', 'gabungan_2', 'gabungan_3', 'gabungan_4', 'gabungan_5', 'gabungan_6', 'gabungan_7', 'gabungan_8'
        , 'gabungan_9', 'gabungan_10', 'gabungan_11', 'gabungan_12', 'gabungan_13', 'gabungan_14', 'gabungan_15', 'gabungan_16', 'gabungan_17'
        , 'gabungan_18', 'gabungan_19', 'gabungan_20', 'gabungan_21', 'gabungan_22', 'gabungan_23', 'gabungan_24', 'gabungan_25', 'gabungan_26'
        , 'hubungan_1', 'hubungan_2', 'hubungan_3', 'hubungan_4', 'hubungan_5', 'hubungan_6', 'hubungan_7', 'hubungan_8', 'hubungan_9'
        , 'hubungan_10', 'hubungan_11', 'hubungan_12', 'hubungan_13', 'hubungan_14', 'hubungan_15', 'hubungan_16', 'hubungan_17', 'hubungan_18'
        , 'hubungan_19', 'hubungan_20', 'hubungan_21', 'hubungan_22', 'hubungan_23', 'hubungan_24', 'hubungan_25', 'hubungan_26', 'hubungan_27'
        , 'hubungan_28', 'hubungan_29', 'hubungan_30', 'hubungan_31', 'hubungan_32', 'hubungan_33', 'hubungan_34', 'hubungan_35', 'hubungan_36'
        , 'hubungan_37', 'hubungan_38', 'hubungan_39', 'hubungan_40', 'abstraksi_1', 'abstraksi_2', 'abstraksi_3', 'abstraksi_4', 'abstraksi_5'
        , 'abstraksi_6', 'abstraksi_7', 'abstraksi_8', 'abstraksi_9', 'abstraksi_10', 'abstraksi_11', 'abstraksi_12', 'abstraksi_13', 'abstraksi_14'
        , 'abstraksi_15', 'abstraksi_16', 'abstraksi_17', 'abstraksi_18', 'abstraksi_19', 'abstraksi_20', 'abstraksi_21', 'abstraksi_22','abstraksi_23', 'abstraksi_24', 'abstraksi_25', 'abstraksi_26', 'abstraksi_27', 'abstraksi_28', 'abstraksi_29', 'abstraksi_30'));
    }

}


