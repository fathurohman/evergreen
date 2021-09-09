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

    public function formindex($id){

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

        return view('pages.form', compact('data_post', 'data_position'));


    }

    public function formstore(Request $request){

         $request->validate([
             'id_post_lowongan' => 'required',
             'id_department' => 'required',
             'id_position' => 'required',
             'id_card_number' => 'required|unique:data_pelamar,id_card_number',
             'personal_name' => 'required',
             'sex' => 'required',
             'current_address' => 'required',
             'phone_current_address' => 'required',
             'permanent_address' => 'required',
             'phone_permanent_address' => 'required',
             'email' => 'required|email',
             'place_date_birth' => 'required',
             'age' => 'required',
             'religion' => 'required',
             'nationality' => 'required',
             'ethnic' => 'required',
             'marital_status' => 'required',
             'year_married' => 'required',


             'year_from_1'=> 'required',
             'year_till_1' => 'required',
             'name_address_employer_1' => 'required',
             'phone_name_address_employer_1' => 'required',
             'position_1' => 'required',
             'resignation_plans' => 'required',
             'explain_reasons' => 'required',
             'salary_1' => 'required',
             'year_from_2' => 'required',
             'year_till_2' => 'required',
             'name_address_employer_2' => 'required',
             'phone_name_address_employer_2' => 'required',
             'position_2' => 'required',
             'salary_2' => 'required',
             'reason_resigning_1' => 'required',
             'year_from_3' => 'required',
             'year_till_3' => 'required',
             'name_address_employer_3' => 'required',
             'phone_name_address_employer_3' => 'required',
             'position_3' => 'required',
             'salary_3' => 'required',
             'reason_resigning_2' => 'required',
             'expect_salary' => 'required',
             'expect_allowance' => 'required',
             'hobbies' => 'required',
             'organizational_activities' => 'required',

             'experiences_leader_1' => 'required',
             'experiences_leader_2' => 'required',

             'height' => 'required',
             'weight' => 'required',
             'hospitalized' => 'required',
            //  'which_year' => 'required',
            //  'how_long' => 'required',
            //  'diagnosis' => 'required',
            //  'hospitalized_in' => 'required',

            'side_jobs' => 'required',
            'laws' => 'required',



             'file_photo' => 'required|file|mimes:jpg,png,jpeg|max:1024',
             'file_cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $niks = $request->id_card_number;
        $names = $request->personal_name;

        $photo                   = $request->file('file_photo');
        $imagePhoto              = $names. '_' .$niks. '.' .$photo->getClientOriginalExtension();
        $photo->move(public_path('images/photos'),$imagePhoto);

        $cv                   = $request->file('file_cv');
        $imageCv              = $names.'_'.$niks. '.' .$cv->getClientOriginalExtension();
        $cv->move(public_path('images/cv'),$imageCv);

        $data = new Pelamar;
        $data->id_post_lowongan = $request->id_post_lowongan;
        $data->id_card_number =$request->id_card_number;
        $data->personal_name	            =$request->personal_name;
        $data->sex			            =$request->sex;
        $data->current_address			=$request->current_address;
        $data->phone_current_address	    =$request->phone_current_address;
        $data->permanent_address	        =$request->permanent_address;
        $data->phone_permanent_address    =$request->phone_permanent_address;
        $data->email                    =$request->email;
        $data->place_date_birth			=$request->place_date_birth;
        $data->age	                    =$request->age;
        $data->religion			        =$request->religion;
        $data->nationality			    =$request->nationality;
        $data->ethnic			            =$request->ethnic;
        $data->marital_status	            =$request->marital_status;
        $data->year_married		        =$request->year_married;
        $data->name_wife_husband		    =$request->name_wife_husband;
        $data->sex_wife_husband		    =$request->sex_wife_husband;
        $data->age_wife_husband		    =$request->age_wife_husband;
        $data->education_wife_husband		=$request->education_wife_husband;
        $data->occupation_wife_husband    =$request->occupation_wife_husband;
        $data->name_first_child		    =$request->name_first_child;
        $data->sex_first_child		    =$request->sex_first_child;
        $data->age_first_child		    =$request->age_first_child;
        $data->education_first_child		=$request->education_first_child;
        $data->occupation_first_child		=$request->occupation_first_child;
        $data->name_second_child		    =$request->name_second_child;
        $data->sex_second_child		    =$request->sex_second_child;
        $data->age_second_child		    =$request->age_second_child;
        $data->education_second_child		=$request->education_second_child;
        $data->occupation_second_child    =$request->occupation_second_child;
        $data->name_third_child		    =$request->name_third_child;
        $data->sex_third_child		    =$request->sex_third_child;
        $data->age_third_child		    =$request->age_third_child;
        $data->education_third_child		=$request->education_third_child;
        $data->occupation_third_child		=$request->occupation_third_child;
        $data->name_father		        =$request->name_father;
        $data->sex_father		            =$request->sex_father;
        $data->age_father		            =$request->age_father;
        $data->education_father		    =$request->education_father;
        $data->occupation_father		    =$request->occupation_father;
        $data->name_mother		        =$request->name_mother;
        $data->sex_mother		            =$request->sex_mother;
        $data->age_mother		            =$request->age_mother;
        $data->education_mother		    =$request->education_mother;
        $data->occupation_mother		    =$request->occupation_mother;
        $data->name_your_first_child		  =$request->name_your_first_child;
        $data->sex_your_first_child		  =$request->sex_your_first_child;
        $data->age_your_first_child		  =$request->age_your_first_child;
        $data->education_your_first_child	  =$request->education_your_first_child;
        $data->occupation_your_first_child  =$request->occupation_your_first_child;
        $data->name_your_second_child		  =$request->name_your_second_child;
        $data->sex_your_second_child		  =$request->sex_your_second_child;
        $data->age_your_second_child		  =$request->age_your_second_child;
        $data->education_your_second_child     =$request->education_your_second_child;
        $data->occupation_your_second_child	 =$request->occupation_your_second_child;
        $data->name_your_third_child		     =$request->name_your_third_child;
        $data->sex_your_third_child		     =$request->sex_your_third_child;
        $data->age_your_third_child		     =$request->age_your_third_child;
        $data->education_your_third_child		 =$request->education_your_third_child;
        $data->occupation_your_third_child     =$request->occupation_your_third_child;
        $data->name_your_fourth_child		     =$request->name_your_fourth_child;
        $data->sex_your_fourth_child		     =$request->sex_your_fourth_child;
        $data->age_your_fourth_child		     =$request->age_your_fourth_child;
        $data->education_your_fourth_child	 =$request->education_your_fourth_child;
        $data->occupation_your_fourth_child	 =$request->occupation_your_fourth_child;
        $data->name_your_fifth_child		     =$request->name_your_fifth_child;
        $data->sex_your_fifth_child		     =$request->sex_your_fifth_child;
        $data->age_your_fifth_child		     =$request->age_your_fifth_child;
        $data->education_your_fifth_child		 =$request->education_your_fifth_child;
        $data->occupation_your_fifth_child	 =$request->occupation_your_fifth_child;
        $data->name_elementary		         =$request->name_elementary;
        $data->location_elementary		     =$request->location_elementary;
        $data->year_enrolled_elementary		 =$request->year_enrolled_elementary;
        $data->year_graduated_elementary		 =$request->year_graduated_elementary;
        $data->name_junior		             =$request->name_junior;
        $data->location_junior		         =$request->location_junior;
        $data->year_enrolled_junior		     =$request->year_enrolled_junior;
        $data->year_graduated_junior		     =$request->year_graduated_junior;
        $data->name_senior		             =$request->name_senior;
        $data->location_senior		         =$request->location_senior;
        $data->year_enrolled_senior		     =$request->year_enrolled_senior;
        $data->year_graduated_senior		     =$request->year_graduated_senior;
        $data->name_university		         =$request->name_university;
        $data->location_university		     =$request->location_university;
        $data->year_enrolled_university		 =$request->year_enrolled_university;
        $data->year_graduated_university		 =$request->year_graduated_university;
        $data->name_graduate		             =$request->name_graduate;
        $data->location_graduate		         =$request->location_graduate;
        $data->year_enrolled_graduate		     =$request->year_enrolled_graduate;
        $data->year_graduated_graduate		 =$request->year_graduated_graduate;
        $data->training_1		                 =$request->training_1;
        $data->year_training_1		         =$request->year_training_1;
        $data->length_training_1		         =$request->length_training_1;
        $data->year_length_1		             =$request->year_length_1;
        $data->financed_1		                 =$request->financed_1;
        $data->training_2		                 =$request->training_2;
        $data->year_training_2		         = $request->year_training_2;
        $data->length_training_2		         = $request->length_training_2;
        $data->year_length_2		             =$request->year_length_2;
        $data->financed_2		                 =$request->financed_2;
        $data->training_3		                 =$request->training_3;
        $data->year_training_3		         =$request->year_training_3;
        $data->length_training_3		         =$request->length_training_3;
        $data->year_length_3		             =$request->year_length_3;
        $data->financed_3		                 =$request->financed_3;
        $data->foreign_language_1		         =$request->foreign_language_1;
        $data->active_1		                 =$request->active_1;
        $data->foreign_language_2		         =$request->foreign_language_2;
        $data->active_2		                 =$request->active_2;
        $data->dialect_1		                 =$request->dialect_1;
        $data->active_dialect_1		         =$request->active_dialect_1;
        $data->dialect_2		                 =$request->dialect_2;
        $data->active_dialect_2		         =$request->active_dialect_2;
        $data->year_from_1		             =$request->year_from_1;
        $data->year_till_1		             =$request->year_till_1;
        $data->name_address_employer_1		 =$request->name_address_employer_1;
        $data->phone_name_address_employer_1  =$request->phone_name_address_employer_1;
        $data->position_1		                =$request->position_1;
        $data->resignation_plans		        =$request->resignation_plans;
        $data->explain_reasons		        =$request->explain_reasons;
        $data->salary_1		                =$request->salary_1;
        $data->year_from_2		            =$request->year_from_2;
        $data->year_till_2		            =$request->year_till_2;
        $data->name_address_employer_2		  =$request->name_address_employer_2;
        $data->phone_name_address_employer_2	  =$request->phone_name_address_employer_2;
        $data->position_2		                  =$request->position_2;
        $data->salary_2		                  =$request->salary_2;
        $data->reason_resigning_1		          =$request->reason_resigning_1;
        $data->year_from_3		              =$request->year_from_3;
        $data->year_till_3		              =$request->year_till_3;
        $data->name_address_employer_3		  =$request->name_address_employer_3;
        $data->phone_name_address_employer_3	  =$request->phone_name_address_employer_3;
        $data->position_3		                  =$request->position_3;
        $data->salary_3		                  =$request->salary_3;
        $data->reason_resigning_2		          =$request->reason_resigning_2;
        $data->id_department		                  =$request->id_department;
        $data->id_position		                  =$request->id_position;
        $data->expect_salary		              =$request->expect_salary;
        $data->expect_allowance		          =$request->expect_allowance;
        $data->hobbies		                  =$request->hobbies;
        $data->organizational_activities		  =$request->organizational_activities;
        $data->name_organization_1		      =$request->name_organization_1;
        $data->type_organization_1		      =$request->type_organization_1;
        $data->year_organization_1		      =$request->year_organization_1;
        $data->position_organization_1		  =$request->position_organization_1;
        $data->name_organization_2		      =$request->name_organization_2;
        $data->type_organization_2		      =$request->type_organization_2;
        $data->year_organization_2		      =$request->year_organization_2;
        $data->position_organization_2		  =$request->position_organization_2;
        $data->name_organization_3		      =$request->name_organization_3;
        $data->type_organization_3		      =$request->type_organization_3;
        $data->year_organization_3		      =$request->year_organization_3;
        $data->position_organization_3		  =$request->position_organization_3;
        $data->experiences_leader_1		      =$request->experiences_leader_1;
        $data->experiences_leader_2		      =$request->experiences_leader_2;
        $data->height		                      =$request->height;
        $data->weight		                      =$request->weight;
        $data->hospitalized		              =$request->hospitalized;
        $data->which_year		                  =$request->which_year;
        $data->how_long		                  =$request->how_long;
        $data->diagnosis		                  =$request->diagnosis;
        $data->hospitalized_in		          =$request->hospitalized_in;
        $data->name_working_1		              =$request->name_working_1;
        $data->position_working_1		          =$request->position_working_1;
        $data->office_working_1		          =$request->office_working_1;
        $data->length_working_1		          =$request->length_working_1;
        $data->name_working_2		              =$request->name_working_2;
        $data->position_working_2		          =$request->position_working_2;
        $data->office_working_2		          =$request->office_working_2;
        $data->length_working_2		          =$request->length_working_2;
        $data->name_working_3		              =$request->name_working_3;
        $data->position_working_3		          =$request->position_working_3;
        $data->office_working_3		          =$request->office_working_3;
        $data->length_working_3		          =$request->length_working_3;
        $data->side_jobs		                  =$request->side_jobs;
        $data->working_as		                  =$request->working_as;
        $data->remuneration		              =$request->remuneration;
        $data->laws		                      =$request->laws;
        $data->type_case		                  =$request->type_case;
        $data->sanction		                  =$request->sanction;
        $data->when_where		                  =$request->when_where;
        $data->career_development		          =$request->career_development;
        $data->file_photo                        = $imagePhoto;
        $data->file_cv                          = $imageCv;

        if($request->age >= 28 ){

            session()->flash("warning", "failed to register because you are over 28 years old!");
             return back()->with(['warning' => 'failed to register because you are over 28 years old!']);

        }else{

            $data->save();
            session()->flash("success", "successfully registered!");
            return back()->with(['success' => 'successfully registered!']);

        }

    }

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

    }


}
