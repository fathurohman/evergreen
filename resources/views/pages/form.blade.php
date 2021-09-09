
@foreach ($data_post as $index=>$data)
@php
$status = date('Y-m-d'); @endphp

@if ($data->tanggal_akhir >= $status)


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form | {{$data->judul}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('images/evergreen_logo.png')}}" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


</head>

<body style="background: url(/images/cool-green-backgrounds-14.jpg) no-repeat center; background-size: cover;
background-attachment: fixed;" class="hold-transition login-page">
<div class="container">
  <div class="login-logo">
    <br>
      <img class="img-fluid" src="">
      {{-- <img class="img-fluid" src="{{asset('/images/img/evergreen1.png')}}"> --}}
    <a href=""><font color="white"><b>JOB APPLICATION FORM</b></font></a>
    <br><br>
    <p style="line-height: 1.0;" align="justify"><font color="white" size="5px">All the information below are rendered by me in truthfulness and factually; if such information is not in conformity with the actual situation, I accept all sanction conform to the company regulation.</font></p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      <p align="center"><font color="#DE6262" size="5px"><b>EMPLOYEE'S LIVING ENVIRONMENT</b></font></p><br>
      <h5><span class="badge badge-info">Columns marked (*) are mandatory</span></h5>

      <p><h4># Personal Condition</h4></p>
      <form method="post" enctype="multipart/form-data" action="{{ route('form.store') }}">
      @csrf
      @php
          $id_post_lowongan = request()->segment(3);
      @endphp
        <input name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">
        <input name="id_post_lowongan" type="hidden" value="{{$id_post_lowongan}}" class="form-control">

        <div class="form-group">
          <label>1. Name *</label>
          <input name="personal_name" type="text" class="form-control @error('personal_name') is-invalid @enderror" placeholder="Name *" id="personal_name" value="{{old("personal_name")}}">
            @error('personal_name')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label>2. Gender *</label>
            <select id="sex" name="sex" class="form-control @error('sex') is-invalid @enderror">
                <option value="">Choose</option>
                <option value="M" @if(old('sex') == 'M') selected @endif>Male</option>
                <option value="F" @if(old('sex') == 'F') selected @endif>Female</option>
            </select>
            @error('sex')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>2. Current address *</label>
            <input name="current_address" type="text" class="form-control @error('current_address') is-invalid @enderror" placeholder="Current address *" id="current_address" value="{{old("current_address")}}">
              @error('current_address')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>3. Phone / HP  *</label>
            <input name="phone_current_address" type="number" class="form-control @error('phone_current_address') is-invalid @enderror" placeholder="Current address *" id="phone_current_address" value="{{old("phone_current_address")}}">
              @error('phone_current_address')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>4. Permanent address *</label>
            <input name="permanent_address" type="text" class="form-control @error('permanent_address') is-invalid @enderror" placeholder=" Permanent address *" id="permanent_address" value="{{old("permanent_address")}}">
              @error('phone_current_address')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>5. Phone / HP  *</label>
            <input name="phone_permanent_address" type="number" class="form-control @error('phone_permanent_address') is-invalid @enderror" placeholder="Current address *" id="phone_permanent_address" value="{{old("phone_permanent_address")}}">
              @error('phone_permanent_address')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>5. E-mail  *</label>
            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail *" id="email" value="{{old("email")}}">
              @error('email')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>6. Place and Date of Birth  *</label>
            <input name="place_date_birth" type="text" class="form-control @error('place_date_birth') is-invalid @enderror" placeholder="Jakarta, 01-01-2000" id="place_date_birth" value="{{old("place_date_birth")}}">
              @error('place_date_birth')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>7. Age  *</label>
            <input name="age" type="number" class="form-control @error('age') is-invalid @enderror" placeholder="Age  *" value="{{old("age")}}">
              @error('age')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>8. Nationality  *</label>
            <input name="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" placeholder="Nationality  *" id="nationality" value="{{old("religion")}}">
              @error('nationality')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>


          <div class="form-group">
            <label>8. Religion / Belief  *</label>
            <input name="religion" type="text" class="form-control @error('religion') is-invalid @enderror" placeholder="Religion / Belief  *" id="religion" value="{{old("religion")}}">
              @error('religion')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>9. Ethnic Group / Origin  *</label>
            <input name="ethnic" type="text" class="form-control @error('ethnic') is-invalid @enderror" placeholder="Ethnic Group / Origin  *" id="ethnic" value="{{old("ethnic")}}">
              @error('ethnic')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <hr>
          <p><h4># Family Condition</h4></p>


          <div class="form-group">
            <label>1. Marital status *</label>
							<select id="marital_status" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror">
								<option value="">Choose</option>
								<option value="Single" @if(old('marital_status') == 'Single') selected @endif>Single</option>
								<option value="Married" @if(old('marital_status') == 'Married') selected @endif>Married</option>
								<option value="Divorced" @if(old('marital_status') == 'Divorced') selected @endif>Divorced</option>
								<option value="Widow" @if(old('marital_status') == 'Widow') selected @endif>Widow</option>
								<option value="Widower" @if(old('marital_status') == 'Widower') selected @endif>Widower</option>
							</select>
                            @error('marital_status')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>1. a. Year married *</label>
            <input name="year_married" type="text" class="form-control @error('year_married') is-invalid @enderror" placeholder="Year married *" id="year_married" value="{{old("year_married")}}">
              @error('year_married')<div class="text-danger mt-2">{{ $message }}</div>@enderror
          </div>

          <label>2. Family structure: (Wife / Husband and Children) *</label>
          <table class="table">
            <thead>
            <th></th>
            <th>Name</th>
            <th>M / F</th>
            <th>Age</th>
            <th>Education</th>
            <th>Occupation</th>
            </thead>
            <tbody>
            <tr>
            <td>Wife / Husband</td>
            <td><input name="name_wife_husband" type="text" class="form-control" value="{{old("name_wife_husband")}}"></td>
            <td><select name="sex_wife_husband" class="form-control">
                    <option value="">Choose</option>
                    <option value="M" @if(old('sex_wife_husband') == 'M') selected @endif>Male</option>
                    <option value="F" @if(old('sex_wife_husband') == 'F') selected @endif>Female</option>
                </select>
            </td>
            <td><input name="age_wife_husband" type="number" class="form-control" value="{{old("age_wife_husband")}}"></td>
            <td><input name="education_wife_husband" type="text" class="form-control" value="{{old("education_wife_husband")}}"></td>
            <td><input name="occupation_wife_husband" type="text" class="form-control" value="{{old("occupation_wife_husband")}}"></td>
            </tr>
            <tr>
            <td>1st Child</td>
            <td><input name="name_first_child" type="text" class="form-control" value="{{old("name_first_child")}}"></td>
            <td><select name="sex_first_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_first_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_first_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_first_child" type="number" class="form-control" value="{{old("age_first_child")}}"></td>
            <td><input name="education_first_child" type="text" class="form-control" value="{{old("education_first_child")}}"></td>
            <td><input name="occupation_first_child" type="text" class="form-control" value="{{old("occupation_first_child")}}"></td>
            </tr>
            <tr>
            <td>2nd Child</td>
            <td><input name="name_second_child" type="text" class="form-control" value="{{old("name_second_child")}}"></td>
            <td><select name="sex_second_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_second_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_second_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_second_child" type="number" class="form-control" value="{{old("age_second_child")}}"></td>
            <td><input name="education_second_child" type="text" class="form-control" value="{{old("education_second_child")}}"></td>
            <td><input name="occupation_second_child" type="text" class="form-control" value="{{old("occupation_second_child")}}"></td>
            </tr>
            <tr>
            <td>3rd Child</td>
            <td><input name="name_third_child" type="text" class="form-control" value="{{old("name_third_child")}}"></td>
            <td><select name="sex_third_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_third_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_third_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_third_child" type="text" class="form-control" value="{{old("age_third_child")}}"></td>
            <td><input name="education_third_child" type="text" class="form-control" value="{{old("education_third_child")}}"></td>
            <td><input name="occupation_third_child" type="text" class="form-control" value="{{old("occupation_third_child")}}"></td>
            </tr>
        </tbody>
        </table>
        <p>(if demised, mention the educational background and occupation during his/her life)</p>

        <label>3. Your Family structure: (Father / Mother, and Siblings including yourself) *</label>
        <table class="table">
            <thead>
            <tr>
            <th></th>
            <th>Name</th>
            <th>M / F</th>
            <th>Age</th>
            <th>Education</th>
            <th>Occupation</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>Father</td>
            <td><input name="name_father" type="text" class="form-control" value="{{old("name_father")}}"></td>
            <td><select name="sex_father" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_father') == 'M') selected @endif>Male</option>
            {{-- <option value="F" @if(old('sex_father') == 'F') selected @endif>Female</option> --}}
        </select></td>
            <td><input name="age_father" type="number" class="form-control" value="{{old("age_father")}}"></td>
            <td><input name="education_father" type="text" class="form-control" value="{{old("education_father")}}"></td>
            <td><input name="occupation_father" type="text" class="form-control" value="{{old("occupation_father")}}"></td>
            </tr>
            <tr>
            <td>Mother</td>
            <td><input name="name_mother" type="text" class="form-control" value="{{old("name_mother")}}"></td>
            <td><select name="sex_mother" class="form-control ">
            <option value="">Choose</option>
            {{-- <option value="M" @if(old('sex_mother') == 'M') selected @endif>Male</option> --}}
            <option value="F" @if(old('sex_mother') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_mother" type="text" class="form-control" value="{{old("age_mother")}}"></td>
            <td><input name="education_mother" type="text" class="form-control" value="{{old("education_mother")}}"></td>
            <td><input name="occupation_mother" type="text" class="form-control" value="{{old("occupation_mother")}}"></td>
            </tr>
            <tr>
            <td>1st Child</td>
            <td><input name="name_your_first_child" type="text" class="form-control" value="{{old("name_your_first_child")}}"></td>
            <td><select name="sex_your_first_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_your_first_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_your_first_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_your_first_child" type="text" class="form-control" value="{{old("age_your_first_child")}}"></td>
            <td><input name="education_your_first_child" type="text" class="form-control" value="{{old("education_your_first_child")}}"></td>
            <td><input name="occupation_your_first_child" type="text" class="form-control" value="{{old("occupation_your_first_child")}}"></td>
            </tr>
            <tr>
            <td>2nd Child</td>
            <td><input name="name_your_second_child" type="text" class="form-control" value="{{old("sex_your_second_child")}}"></td>
            <td><select name="sex_your_second_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_your_second_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_your_second_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_your_second_child" type="text" class="form-control" value="{{old("age_your_second_child")}}"></td>
            <td><input name="education_your_second_child" type="text" class="form-control" value="{{old("education_your_second_child")}}"></td>
            <td><input name="occupation_your_second_child" type="text" class="form-control" value="{{old("occupation_your_second_child")}}"></td>
            </tr>
            <tr>
            <td>3rd Child</td>
            <td><input name="name_your_third_child" type="text" class="form-control" value="{{old("name_your_third_child")}}"></td>
            <td><select name="sex_your_third_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_your_third_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_your_third_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_your_third_child" type="number" class="form-control" value="{{old("age_your_third_child")}}"></td>
            <td><input name="education_your_third_child" type="text" class="form-control" value="{{old("education_your_third_child")}}"></td>
            <td><input name="occupation_your_third_child" type="text" class="form-control" value="{{old("occupation_your_third_child")}}"></td>
            </tr>
            <tr>
            <td>4th Child</td>
            <td><input name="name_your_fourth_child" type="text" class="form-control" value="{{old("name_your_fourth_child")}}"></td>
            <td><select name="sex_your_fourth_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_your_fourth_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_your_fourth_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_your_fourth_child" type="number" class="form-control" value="{{old("age_your_fourth_child")}}"></td>
            <td><input name="education_your_fourth_child" type="text" class="form-control" value="{{old("education_your_fourth_child")}}"></td>
            <td><input name="occupation_your_fourth_child" type="text" class="form-control" value="{{old("occupation_your_fourth_child")}}"></td>
            </tr>
            <tr>
            <td>5th Child</td>
            <td><input name="name_your_fifth_child" type="text" class="form-control" value="{{old("name_your_fifth_child")}}"></td>
            <td><select name="sex_your_fifth_child" class="form-control ">
            <option value="">Choose</option>
            <option value="M" @if(old('sex_your_fifth_child') == 'M') selected @endif>Male</option>
            <option value="F" @if(old('sex_your_fifth_child') == 'F') selected @endif>Female</option>
        </select></td>
            <td><input name="age_your_fifth_child" type="number" class="form-control" value="{{old("age_your_fifth_child")}}"></td>
            <td><input name="education_your_fifth_child" type="text" class="form-control" value="{{old("education_your_fifth_child")}}"></td>
            <td><input name="occupation_your_fifth_child" type="text" class="form-control" value="{{old("occupation_your_fifth_child")}}"></td>
            </tr>
            </tbody>
        </table>
        <p>(if demised, mention the educational background and occupation during his/her life)</p>

        <hr>
        <p><h4># Education</h4></p>
        <label>1. Formal *</label>
        <table class="table">
            <thead>
            <tr>
            <th>Type of School</th>
            <th>Name of School</th>
            <th>Location of School</th>
            <th>Year Enrolled</th>
            <th>Year Graduated</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>Elementary</td>
            <td><input name="name_elementary" type="text" class="form-control" value="{{old("name_elementary")}}"></td>
            <td><input name="location_elementary" type="text" class="form-control" value="{{old("location_elementary")}}"></td>
            <td><input name="year_enrolled_elementary" type="number" class="form-control" value="{{old("year_enrolled_elementary")}}"></td>
            <td><input name="year_graduated_elementary" type="number" class="form-control" value="{{old("year_graduated_elementary")}}"></td>
            </tr>
            <tr>
            <td>Junior High School</td>
            <td><input name="name_junior" type="text" class="form-control" value="{{old("name_junior")}}"></td>
            <td><input name="location_junior" type="text" class="form-control" value="{{old("location_junior")}}"></td>
            <td><input name="year_enrolled_junior" type="number" class="form-control" value="{{old("year_enrolled_junior")}}"></td>
            <td><input name="year_graduated_junior" type="number" class="form-control" value="{{old("year_graduated_junior")}}"></td>
            </tr>
            <tr>
            <td>Senior High School</td>
            <td><input name="name_senior" type="text" class="form-control" value="{{old("name_senior")}}"></td>
            <td><input name="location_senior" type="text" class="form-control" value="{{old("location_senior")}}"></td>
            <td><input name="year_enrolled_senior" type="number" class="form-control" value="{{old("year_enrolled_senior")}}"></td>
            <td><input name="year_graduated_senior" type="number" class="form-control" value="{{old("year_graduated_senior")}}"></td>
            </tr>
            <tr>
            <td>University / Academy</td>
            <td><input name="name_university" type="text" class="form-control" value="{{old("name_university")}}"></td>
            <td><input name="location_university" type="text" class="form-control" value="{{old("location_university")}}"></td>
            <td><input name="year_enrolled_university" type="number" class="form-control" value="{{old("year_enrolled_university")}}"></td>
            <td><input name="year_graduated_university" type="number" class="form-control" value="{{old("year_graduated_university")}}"></td>
            </tr>
            <tr>
            <td>Post Graduate</td>
            <td><input name="name_graduate" type="text" class="form-control" value="{{old("name_graduate")}}"></td>
            <td><input name="location_graduate" type="text" class="form-control" value="{{old("location_graduate")}}"></td>
            <td><input name="year_enrolled_graduate" type="number" class="form-control" value="{{old("year_enrolled_graduate")}}"></td>
            <td><input name="year_graduated_graduate" type="number" class="form-control" value="{{old("year_graduated_graduate")}}"></td>
            </tr>
        </tbody>
        </table>

        <label>2. Course / Training / Upgrading *</label>
            <table class="table">
                <thead>
                <tr>
                <th>Type of Course / Training / Upgrading</th>
                <th>Year</th>
                <th>Length of Course</th>
                <th>Year</th>
                <th>Financed by</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td><input name="training_1" type="text" class="form-control" value="{{old("training_1")}}"></td>
                <td><input name="year_training_1" type="text" class="form-control" value="{{old("year_training_1")}}"></td>
                <td><input name="length_training_1" type="text" class="form-control" value="{{old("length_training_1")}}"></td>
                <td><input name="year_length_1" type="text" class="form-control" value="{{old("year_length_1")}}"></td>
                <td><input name="financed_1" type="text" class="form-control" value="{{old("financed_1")}}"></td>
                </tr>
                <tr>
                <td><input name="training_2" type="text" class="form-control" value="{{old("training_2")}}"></td>
                <td><input name="year_training_2" type="text" class="form-control" value="{{old("year_training_2")}}"></td>
                <td><input name="length_training_2" type="text" class="form-control" value="{{old("length_training_2")}}"></td>
                <td><input name="year_length_2" type="text" class="form-control" value="{{old("year_length_2")}}"></td>
                <td><input name="financed_2" type="text" class="form-control" value="{{old("financed_2")}}"></td>
                </tr>
                <tr>
                <td><input name="training_3" type="text" class="form-control" value="{{old("training_3")}}"></td>
                <td><input name="year_training_3" type="text" class="form-control" value="{{old("year_training_3")}}"></td>
                <td><input name="length_training_3" type="text" class="form-control" value="{{old("length_training_3")}}"></td>
                <td><input name="year_length_3" type="text" class="form-control" value="{{old("year_length_3")}}"></td>
                <td><input name="financed_3" type="text" class="form-control" value="{{old("financed_3")}}"></td>
                </tr>
                </tbody>
            </table>
            <label>3. Languages mastered *</label>
                <table class="table">
                    <thead>
                    <tr>
                    <th>Foreign Language</th>
                    <th>Active / Passive</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td><input name="foreign_language_1" type="text" class="form-control" value="{{old("foreign_language_1")}}"></td>
                    <td><input name="active_1" type="text" class="form-control" value="{{old("active_1")}}"></td>
                    </tr>
                    <tr>
                    <td><input name="foreign_language_2" type="text" class="form-control" value="{{old("foreign_language_2")}}"></td>
                    <td><input name="active_2" type="text" class="form-control" value="{{old("active_2")}}"></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table class="table">
                    <tr>
                    <th>Dialect</th>
                    <th>Active / Passive</th>
                    </tr>
                    <tr>
                    <td><input name="dialect_1" type="text" class="form-control" value="{{old("dialect_1")}}"></td>
                    <td><input name="active_dialect_1" type="text" class="form-control" value="{{old("active_dialect_1")}}"></td>
                    </tr>
                    <tr>
                    <td><input name="dialect_2" type="text" class="form-control" value="{{old("dialect_2")}}"></td>
                    <td><input name="active_dialect_2" type="text" class="form-control" value="{{old("active_dialect_2")}}"></td>
                    </tr>
                </table>
                <br>
                    <h4># Education and Experience</h4>
                    <label>1. Work history (as of the current occupation) *</label>
                    <br>
                    <div class="form-group">
                        <label>a. Year (from) *</label>
                        <input name="year_from_1" type="number" class="form-control @error('year_from_1') is-invalid @enderror" value="{{old("year_from_1")}}">
                        @error('year_from_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>b. Year (till)  *</label>
                        <input name="year_till_1" type="number" class="form-control @error('year_till_1') is-invalid @enderror" value="{{old("year_till_1")}}">
                        @error('year_till_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>c. Name and Address of Employer *</label>
                        <textarea name="name_address_employer_1" class="form-control @error('name_address_employer_1') is-invalid @enderror">{{old("name_address_employer_1")}}</textarea>
                        @error('name_address_employer_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>d. Phone  *</label>
                        <input name="phone_name_address_employer_1" type="text" class="form-control @error('phone_name_address_employer_1') is-invalid @enderror" value="{{old("phone_name_address_employer_1")}}">
                        @error('phone_name_address_employer_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>e. Position  *</label>
                        <input name="position_1" type="text" class="form-control @error('position_1') is-invalid @enderror" value="{{old("position_1")}}">
                        @error('position_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                    <label>f. Do you have resignation plans:  *</label>
                    <select name="resignation_plans" class="form-control @error('resignation_plans') is-invalid @enderror">
                        <option value="">Choose</option>
                        <option value="Yes" @if(old('resignation_plans') == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if(old('resignation_plans') == 'No') selected @endif>No</option>
                    </select>
                    @error('resignation_plans')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>g. If you have resignation plans, explain your reasons. *</label>
                        <textarea name="explain_reasons" class="form-control @error('explain_reasons') is-invalid @enderror">{{old("explain_reasons")}}</textarea>
                        @error('explain_reasons')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>h. Salary and allowance received: IDR  *</label>
                        <input name="salary_1" type="text" class="form-control @error('explain_reasons') is-invalid @enderror" value="{{old("salary_1")}}">
                        @error('salary_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>i. Year (from) *</label>
                        <input name="year_from_2" type="text" class="form-control @error('year_from_2') is-invalid @enderror" value="{{old("year_from_2")}}">
                        @error('year_from_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>j. Year (till)  *</label>
                        <input name="year_till_2" type="text" class="form-control @error('year_till_2') is-invalid @enderror" value="{{old("year_till_2")}}">
                        @error('year_till_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>k. Name and Address of Employer *</label>
                        <textarea name="name_address_employer_2" class="form-control @error('name_address_employer_2') is-invalid @enderror">{{old("name_address_employer_2")}}</textarea>
                        @error('name_address_employer_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                    <label>l. Phone  *</label>
                        <input name="phone_name_address_employer_2" type="text" class="form-control @error('phone_name_address_employer_2') is-invalid @enderror" value="{{old("phone_name_address_employer_2")}}">
                        @error('phone_name_address_employer_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>m. Position  *</label>
                        <input name="position_2" type="text" class="form-control @error('position_2') is-invalid @enderror" value="{{old("position_2")}}">
                        @error('position_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>n. Salary and allowance received: IDR  *</label>
                        <input name="salary_2" type="text" class="form-control @error('salary_2') is-invalid @enderror" value="{{old("salary_2")}}">
                        @error('salary_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>o. Reason for resigning:  *</label>
                        <input name="reason_resigning_1" type="text" class="form-control @error('reason_resigning_1') is-invalid @enderror" value="{{old("reason_resigning_1")}}">
                        @error('reason_resigning_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>p. Year (from) *</label>
                        <input name="year_from_3" type="text" class="form-control @error('year_from_3') is-invalid @enderror" value="{{old("year_from_3")}}">
                        @error('year_from_3')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>q. Year (till)  *</label>
                        <input name="year_till_3" type="text" class="form-control @error('year_till_3') is-invalid @enderror" value="{{old("year_till_3")}}">
                        @error('year_till_3')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>r. Name and Address of Employer *</label>
                        <textarea name="name_address_employer_3" class="form-control @error('name_address_employer_3') is-invalid @enderror">{{old("name_address_employer_3")}}</textarea>
                        @error('name_address_employer_3')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>s. Phone  *</label>
                        <input name="phone_name_address_employer_3" type="text" class="form-control @error('phone_name_address_employer_3') is-invalid @enderror" value="{{old("phone_name_address_employer_3")}}">
                        @error('phone_name_address_employer_3')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>t. Position  *</label>
                        <input name="position_3" type="text" class="form-control @error('position_3') is-invalid @enderror" value="{{old("position_3")}}">
                        @error('position_3')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>u. Salary and allowance received: IDR  *</label>
                        <input name="salary_3" type="text" class="form-control @error('salary_3') is-invalid @enderror" value="{{old("salary_3")}}">
                        @error('salary_3')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>v. Reason for resigning:  *</label>
                        <input name="reason_resigning_2" type="text" class="form-control @error('reason_resigning_2') is-invalid @enderror" value="{{old("reason_resigning_2")}}">
                        @error('reason_resigning_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>2. You applied at the department / section of *</label>
                        <select class="form-control @error('id_department') is-invalid @enderror" name="id_department">
                            <option value="{{$data->id_bagian}}" selected>{{$data->nama_bagian}}</option>
                        </select>
                        @error('id_department')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>for the position of *</label>
                        <select name="id_position" type="text" class="form-control @error('id_position') is-invalid @enderror">
                            <option value="">Choose</option>
                           @foreach ($data_position as $index=>$items)
                            <option value="{{$items->id}}" @if(old('id_position') == $items->id) selected @endif> {{$items->nama_posisi}} </option>
                            @endforeach
                        </select>
                        @error('id_position')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>3. You expect a salary of (mention the amount) *</label>
                        <input name="expect_salary" type="text" class="form-control @error('expect_salary') is-invalid @enderror" value="{{old("expect_salary")}}">
                        @error('expect_salary')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>4. You expect an allowance for (mention the type) *</label>
                        <input name="expect_allowance" type="text" class="form-control @error('expect_allowance') is-invalid @enderror" value="{{old("expect_allowance")}}">
                        @error('expect_allowance')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                    <br>

                    <hr>
                    <h4># Other Activities</h4>

                    <div class="form-group">
                        <label>1. Preference / Hobbies *</label>
                        <input name="hobbies" type="text" class="form-control @error('hobbies') is-invalid @enderror" value="{{old("hobbies")}}">
                        @error('hobbies')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>2. Organizational activities *</label>
                        <input name="organizational_activities" type="text" class="form-control @error('organizational_activities') is-invalid @enderror" value="{{old("organizational_activities")}}">
                        @error('organizational_activities')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                        <table class="table-responsive">
                            <thead>
                            <tr>
                            <th>Name of Organization</th>
                            <th>Type of Organization</th>
                            <th>Year</th>
                            <th>Position</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td><input name="name_organization_1" type="text" class="form-control" value="{{old("name_organization_1")}}"></td>
                            <td><input name="type_organization_1" type="text" class="form-control" value="{{old("type_organization_1")}}"></td>
                            <td><input name="year_organization_1" type="text" class="form-control" value="{{old("year_organization_1")}}"></td>
                            <td><input name="position_organization_1" type="text" class="form-control" value="{{old("position_organization_1")}}"></td>
                            </tr>
                            <tr>
                            <td><input name="name_organization_2" type="text" class="form-control" value="{{old("name_organization_2")}}"></td>
                            <td><input name="type_organization_2" type="text" class="form-control" value="{{old("type_organization_2")}}"></td>
                            <td><input name="year_organization_2" type="text" class="form-control" value="{{old("year_organization_2")}}"></td>
                            <td><input name="position_organization_2" type="text" class="form-control" value="{{old("position_organization_2")}}"></td>
                            </tr>
                            <tr>
                            <td><input name="name_organization_3" type="text" class="form-control" value="{{old("name_organization_3")}}"></td>
                            <td><input name="type_organization_3" type="text" class="form-control" value="{{old("type_organization_3")}}"></td>
                            <td><input name="year_organization_3" type="text" class="form-control" value="{{old("year_organization_3")}}"></td>
                            <td><input name="position_organization_3" type="text" class="form-control" value="{{old("position_organization_3")}}"></td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label>3. Experiences as leader of *</label>
                            <input name="experiences_leader_1" type="text" class="form-control @error('experiences_leader_1') is-invalid @enderror" value="{{old("experiences_leader_1")}}">
                            @error('experiences_leader_1')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <input id="name" name="experiences_leader_2" type="text" class="form-control @error('experiences_leader_2') is-invalid @enderror" value="{{old("experiences_leader_2")}}">
                            @error('experiences_leader_2')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>
                        <br>

                        <hr>
                        <h4># Other Information</h4>
                        <div class="form-group">
							<label>1. Height *</label>
							<input name="height" type="text" class="form-control @error('height') is-invalid @enderror" value="{{old("height")}}">
                            @error('height')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
							<label>2. Weight *</label>
							<input name="weight" type="text" class="form-control @error('weight') is-invalid @enderror" value="{{old("weight")}}">
                            @error('weight')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
							<label>3. Have you ever suffered any serious disease that you need to be hospitalized or suffered a long lasting disease *</label>
							<select name="hospitalized" class="form-control @error('hospitalized') is-invalid @enderror">
								<option value="">Choose</option>
								<option value="Never" @if(old('hospitalized') == 'Never') selected @endif>Never</option>
								<option value="Yes" @if(old('hospitalized') == 'Yes') selected @endif>Yes</option>
							</select>
                            @error('hospitalized')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
							<label>Which year *</label>
							<input name="which_year" type="text" class="form-control" value="{{old("which_year")}}">

                        </div>

                        <div class="form-group">
							<label>How long *</label>
							<input name="how_long" type="text" class="form-control" value="{{old("how_long")}}">

                        </div>

                        <div class="form-group">
							<label>Diagnosis *</label>
							<input name="diagnosis" type="text" class="form-control" value="{{old("diagnosis")}}">

                        </div>

                        <div class="form-group">
							<label>Hospitalized in *</label>
							<input name="hospitalized_in" type="text" class="form-control" value="{{old("hospitalized_in")}}">

                        </div>

							<label>4. Acquaintances working at our company *</label>
							<table class="table-responsive">
                                <thead>
								<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Length of Acquaintance</th>
								</tr>
                                </thead>
                                <tbody>
								<tr>
								<td><input name="name_working_1" type="text" class="form-control" value="{{old("name_working_1")}}"></td>
								<td><input name="position_working_1" type="text" class="form-control" value="{{old("position_working_1")}}"></td>
								<td><input name="office_working_1" type="text" class="form-control" value="{{old("office_working_1")}}"></td>
								<td><input name="length_working_1" type="text" class="form-control" value="{{old("length_working_1")}}"></td>
								</tr>
								<tr>
								<td><input name="name_working_2" type="text" class="form-control" value="{{old("name_working_2")}}"></td>
								<td><input name="position_working_2" type="text" class="form-control" value="{{old("position_working_2")}}"></td>
								<td><input name="office_working_2" type="text" class="form-control" value="{{old("office_working_2")}}"></td>
								<td><input name="length_working_2" type="text" class="form-control" value="{{old("length_working_2")}}"></td>
								</tr>
								<tr>
								<td><input name="name_working_3" type="text" class="form-control" value="{{old("name_working_3")}}"></td>
								<td><input name="position_working_3" type="text" class="form-control" value="{{old("position_working_3")}}"></td>
								<td><input name="office_working_3" type="text" class="form-control" value="{{old("office_working_3")}}"></td>
								<td><input name="length_working_3" type="text" class="form-control" value="{{old("length_working_3")}}"></td>
								</tr>
                                </tbody>
							</table>

                            <div class="form-group">
                                <label>5. Do you have any side jobs? *</label>
                                <select name="side_jobs" class="form-control @error('side_jobs') is-invalid @enderror">
                                    <option value="">Choose</option>
                                    <option value="Never" @if(old('side_jobs') == 'Never') selected @endif>No</option>
                                    <option value="Yes" @if(old('side_jobs') == 'Yes') selected @endif>Yes</option>
                                </select>
                                @error('side_jobs')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Working as *</label>
                                <input name="working_as" type="text" class="form-control @error('working_as') is-invalid @enderror" value="{{old("working_as")}}">
                                @error('working_as')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Remuneration *</label>
                                <input name="remuneration" type="text" class="form-control @error('remuneration') is-invalid @enderror" value="{{old("remuneration")}}">
                                @error('remuneration')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>6. Have you ever been involved in criminal case or a violation of the laws? *</label>
                                <select name="laws" class="form-control @error('laws') is-invalid @enderror">
                                    <option value="">Choose</option>
                                    <option value="Never" @if(old('laws') == 'Never') selected @endif>No</option>
                                    <option value="Yes" @if(old('laws') == 'Yes') selected @endif>Yes</option>
                                </select>
                                @error('laws')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Type of case *</label>
                                <input name="type_case" type="text" class="form-control @error('type_case') is-invalid @enderror" value="{{old("type_case")}}">
                                @error('type_case')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Sanction *</label>
                                <input name="sanction" type="text" class="form-control @error('sanction') is-invalid @enderror" value="{{old("sanction")}}">
                                @error('sanction')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>When & Where *</label>
                                <input name="when_where" type="text" class="form-control @error('when_where') is-invalid @enderror" value="{{old("when_where")}}">
                                @error('when_where')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>7. What are you aims in your future career development? (please give a short description) *</label>
                                <textarea name="career_development" class="form-control @error('career_development') is-invalid @enderror">{{old("career_development")}}</textarea>
                                @error('career_development')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                            <input name="file_photo" type="file" class="form-control @error('file_photo') is-invalid @enderror" id="file_photo" value="{{old("file_photo")}}" >
                                    @error('file_photo')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                    <div class="text-info mt-2">*file must .jpg,.jpeg,.png | max:2mb</div>
                            </div>

                        <div class="form-group">
                            <input name="file_cv" type="file" class="form-control @error('file_cv') is-invalid @enderror" id="file_cv" value="{{old("file_cv")}}">
                            <div class="text-info mt-2">*file must .pdf | max:2mb</div>
                                @error('file_cv')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>ID Card Number *</label>
							<input name="id_card_number" type="number" class="form-control @error('id_card_number') is-invalid @enderror" value="{{old("id_card_number")}}">
                            @error('id_card_number')<div class="text-danger mt-2">{{ $message }}</div>@enderror
							<p align="justify">In the event of any incorrect information given by me; herein, I am willing to resign or be imposed by a
								sanction in accordance with the prevailing regulation.<br><br>Note:<br>1. A staff accepted in particular for
								placement with a Branch / Regional Office shall be exempted from any official promotion.<br>
								2. A promotion at one's own request shall be exempted from any official promotion.
							</p>
                        </div>
                        <br>



        <div class="row">
          <div class="col-4">
            <a onclick="window.location.reload(true);" class="btn btn-danger btn-block"><font color="white">Reset</font></a>
          </div>
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br><br>
      <div class="row">
        <div class="col-lg-12">
            <p class="copyright text-center">All Rights Reserved. &copy; <?php echo date("Y"); ?> <a href="https://www.evergreen-line.com/" target="_blank">PT. Evergreen Shipping Agency Indonesia</a> Developed By:
                <a href="https://erfadigital.com" target="_blank">ERFA Digital Creative</a>
            </p>
        </div>
    </div>
      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

  <script>

    $(function(){

        @if(Session::has('warning'))
                Swal.fire({
                icon: 'error',
                title: '{{ Session::get("warning") }}',
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
        },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
    }
  })
        @endif
    });
</script>

<script>

    $(function(){

        @if(Session::has('success'))
                Swal.fire({
                icon: 'success',
                title: '{{ Session::get("success") }}',
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
        },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
    }
  })
        @endif
    });
    </script>

<script>
    $(function(){

        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
    });
    </script>
    <script>
        $(document).ready(function() {
    $('table.table').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
    });
    } );
    </script>



</body>
</html>

@else

@include('pages.closed_form')

@endif
@endforeach
