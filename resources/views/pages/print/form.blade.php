<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Print Form</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('images/evergreen_logo.png')}}" rel="icon">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
   <!-- JQVMap -->
   <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
   <!-- summernote -->
   <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  </head>
  <body>

    <div class="container">
        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        @foreach ($data as $index=>$data)
        <div class="card">
          <div class="card-body">
            <p align="center"><font color="#DE6262" size="5px"><b>EMPLOYEE'S LIVING ENVIRONMENT</b></font></p><br>


            <p><h4># Personal Condition</h4></p>

            @php
                $id_post_lowongan = request()->segment(3);
            @endphp
              <input name="id" type="hidden" class="form-control-plaintext" aria-required="true" aria-invalid="false">
              <input name="id_post_lowongan" type="hidden" value="{{$id_post_lowongan}}" class="form-control-plaintext">

              <div class="form-group">
                <img src="{{asset('/images/photos')}}/{{$data->file_photo}}" style="max-width: 250px;margin-top: 10px;margin-bottom: 10px">
              </div>

              <div class="form-group">
                <label>ID Card Number</label>
                <input name="id_card_number" type="number" class="form-control-plaintext" value="{{$data->id_card_number}}">
            </div>

              <div class="form-group">
                <label>1. Name</label>
                <input type="text" class="form-control-plaintext" value="{{$data->personal_name}}" readonly>
              </div>
              @php
                $sex='';
                  if($data->sex == 'M'){
                      $sex = 'Male';
                  }else{
                      $sex = 'Female';
                  }
              @endphp
              <div class="form-group">
                  <label>2. Gender</label>
                  <input type="text" class="form-control-plaintext" value="{{$sex}}" readonly>
                </div>

                <div class="form-group">
                  <label>2. Current address</label>
                  <input type="text" class="form-control-plaintext" value="{{$data->current_address}}" readonly>
                </div>

                <div class="form-group">
                  <label>3. Phone / HP </label>
                  <input type="number" class="form-control-plaintext" value="{{$data->phone_current_address}}" readonly>
                </div>

                <div class="form-group">
                  <label>4. Permanent address</label>
                  <input type="text" class="form-control-plaintext" value="{{$data->permanent_address}}" readonly>
                </div>

                <div class="form-group">
                  <label>5. Phone / HP </label>
                  <input type="number" class="form-control-plaintext" value="{{$data->phone_permanent_address}}" readonly>
                </div>

                <div class="form-group">
                    <label>5. E-mail </label>
                    <input type="text" class="form-control-plaintext" value="{{$data->email}}" readonly>
                  </div>

                <div class="form-group">
                  <label>6. Place and Date of Birth </label>
                  <input type="text" class="form-control-plaintext" value="{{$data->place_date_birth}}" readonly>
                </div>

                <div class="form-group">
                  <label>7. Age </label>
                  <input type="number" class="form-control-plaintext" value="{{$data->age}}" readonly>

                </div>

                <div class="form-group">
                  <label>8. Nationality </label>
                  <input type="text" class="form-control-plaintext" value="{{$data->religion}}" readonly>
                </div>


                <div class="form-group">
                  <label>8. Religion / Belief </label>
                  <input type="text" class="form-control-plaintext" value="{{$data->religion}}" readonly>
                </div>

                <div class="form-group">
                  <label>9. Ethnic Group / Origin </label>
                  <input type="text" class="form-control-plaintext" value="{{$data->ethnic}}" readonly>
                </div>

                <hr>
                <p><h4># Family Condition</h4></p>

                <div class="form-group">
                  <label>1. Marital status</label>
                  <input type="text" class="form-control-plaintext" value="{{$data->marital_status}}" readonly>
                </div>

                <div class="form-group">
                  <label>1. a. Year married</label>
                  <input type="text" class="form-control-plaintext" value="{{$data->year_married}}" readonly>
                </div>

                <label>2. Family structure: (Wife / Husband and Children)</label>
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
                  <td><input name="name_wife_husband" type="text" class="form-control-plaintext" value="{{$data->name_wife_husband}}"></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_wife_husband}}" readonly>
                  </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_wife_husband}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_wife_husband}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_wife_husband}}" readonly></td>
                  </tr>
                  <tr>
                  <td>1st Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_first_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_first_child}}" readonly>
                   </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_first_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_first_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_first_child}}" readonly></td>
                  </tr>
                  <tr>
                  <td>2nd Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_second_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_second_child}}" readonly>

                  </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_second_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_second_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_second_child}}" readonly></td>
                  </tr>
                  <tr>
                  <td>3rd Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_third_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_third_child}}" readonly>
                  </td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->age_third_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_third_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_third_child}}" readonly></td>
                  </tr>
              </tbody>
              </table>
              <p>(if demised, mention the educational background and occupation during his/her life)</p>

              <label>3. Your Family structure: (Father / Mother, and Siblings including yourself)</label>
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
                  <td><input name="name_father" type="text" class="form-control-plaintext" value="{{$data->name_father}}" readonly></td>
                  <td>

                    <input type="text" class="form-control-plaintext" value="{{$data->sex_father}}" readonly>

                  </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_father}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_father}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_father}}" readonly></td>
                  </tr>
                  <tr>
                  <td>Mother</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_mother}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_mother}}" readonly>

                  </td>
                  <td><input name="age_mother" type="text" class="form-control-plaintext" value="{{$data->age_mother}}" readonly></td>
                  <td><input name="education_mother" type="text" class="form-control-plaintext" value="{{$data->education_mother}}" readonly></td>
                  <td><input name="occupation_mother" type="text" class="form-control-plaintext" value="{{$data->occupation_mother}}" readonly></td>
                  </tr>
                  <tr>
                  <td>1st Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_your_first_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_your_first_child}}" readonly>

                  </td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->age_your_first_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_your_first_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_your_first_child}}" readonly></td>
                  </tr>
                  <tr>
                  <td>2nd Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_your_second_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_your_second_child}}" readonly>
                  </td>

                  <td><input type="text" class="form-control-plaintext" value="{{$data->age_your_second_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_your_second_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_your_second_child}}" readonly></td>
                  </tr>
                  <tr>
                  <td>3rd Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_your_third_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_your_third_child}}" readonly>
                  </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_your_third_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_your_third_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_your_third_child}}" readonly></td>
                  </tr>
                  <tr>
                  <td>4th Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_your_fourth_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_your_fourth_child}}" readonly>
                  </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_your_fourth_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_your_fourth_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_your_fourth_child}}" readonly></td>
                  </tr>
                  <tr>
                  <td>5th Child</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_your_fifth_child}}" readonly></td>
                  <td>
                    <input type="text" class="form-control-plaintext" value="{{$data->sex_your_fifth_child}}" readonly>
                  </td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->age_your_fifth_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->education_your_fifth_child}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->occupation_your_fifth_child}}" readonly></td>
                  </tr>
                  </tbody>
              </table>
              <p>(if demised, mention the educational background and occupation during his/her life)</p>

              <hr>
              <p><h4># Education</h4></p>
              <label>1. Formal</label>
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
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_elementary}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->location_elementary}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_enrolled_elementary}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_graduated_elementary}}" readonly></td>
                  </tr>
                  <tr>
                  <td>Junior High School</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_junior}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->location_junior}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_enrolled_junior}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_graduated_junior}}" readonly></td>
                  </tr>
                  <tr>
                  <td>Senior High School</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_senior}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->location_senior}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_enrolled_senior}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_graduated_senior}}" readonly></td>
                  </tr>
                  <tr>
                  <td>University / Academy</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_university}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->location_university}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_enrolled_university}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_graduated_university}}" readonly></td>
                  </tr>
                  <tr>
                  <td>Post Graduate</td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->name_graduate}}" readonly></td>
                  <td><input type="text" class="form-control-plaintext" value="{{$data->location_graduate}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_enrolled_graduate}}" readonly></td>
                  <td><input type="number" class="form-control-plaintext" value="{{$data->year_graduated_graduate}}" readonly></td>
                  </tr>
              </tbody>
              </table>

              <label>2. Course / Training / Upgrading</label>
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
                      <td><input type="text" class="form-control-plaintext" value="{{$data->training_1}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->year_training_1}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->length_training_1}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->year_length_1}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->financed_1}}" readonly></td>
                      </tr>
                      <tr>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->training_2}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->year_training_2}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->length_training_2}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->year_length_2}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->financed_2}}" readonly></td>
                      </tr>
                      <tr>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->training_3}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->year_training_3}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->length_training_3}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->year_length_3}}" readonly></td>
                      <td><input type="text" class="form-control-plaintext" value="{{$data->financed_3}}" readonly></td>
                      </tr>
                      </tbody>
                  </table>
                  <label>3. Languages mastered</label>
                      <table class="table">
                          <thead>
                          <tr>
                          <th>Foreign Language</th>
                          <th>Active / Passive</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->foreign_language_1}}" readonly></td>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->active_1}}" readonly></td>
                          </tr>
                          <tr>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->foreign_language_2}}" readonly></td>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->active_2}}" readonly></td>
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
                          <td><input type="text" class="form-control-plaintext" value="{{$data->dialect_1}}" readonly></td>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->active_dialect_1}}" readonly></td>
                          </tr>
                          <tr>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->dialect_2}}" readonly></td>
                          <td><input type="text" class="form-control-plaintext" value="{{$data->active_dialect_2}}" readonly></td>
                          </tr>
                      </table>
                      <br>
                          <h4># Education and Experience</h4>
                          <label>1. Work history (as of the current occupation)</label>
                          <br>
                          <div class="form-group">
                              <label>a. Year (from)</label>
                              <input type="number" class="form-control-plaintext" value="{{$data->year_from_1}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>b. Year (till) </label>
                              <input type="number" class="form-control-plaintext" value="{{$data->year_till_1}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>c. Name and Address of Employer</label>
                              <textarea class="form-control-plaintext" readonly>{{$data->name_address_employer_1}}</textarea>
                          </div>

                          <div class="form-group">
                              <label>d. Phone </label>
                              <input type="text" class="form-control-plaintext" value="{{$data->phone_name_address_employer_1}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>e. Position </label>
                              <input type="text" class="form-control-plaintext" value="{{$data->position_1}}" readonly>
                          </div>

                          <div class="form-group">
                          <label>f. Do you have resignation plans: </label>
                          <input type="text" class="form-control-plaintext" value="{{$data->resignation_plans}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>g. If you have resignation plans, explain your reasons.</label>
                              <textarea class="form-control-plaintext" readonly>{{$data->explain_reasons}}</textarea>
                          </div>

                          <div class="form-group">
                              <label>h. Salary and allowance received: IDR </label>
                              <input type="text" class="form-control-plaintext" value="{{$data->salary_1}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>i. Year (from)</label>
                              <input type="text" class="form-control-plaintext" value="{{$data->year_from_2}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>j. Year (till) </label>
                              <input name="year_till_2" type="text" class="form-control-plaintext" value="{{$data->year_till_2}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>k. Name and Address of Employer</label>
                              <textarea name="name_address_employer_2" class="form-control-plaintext" readonly>{{$data->name_address_employer_2}}</textarea>
                          </div>

                          <div class="form-group">
                          <label>l. Phone </label>
                              <input type="text" class="form-control-plaintext" value="{{$data->phone_name_address_employer_2}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>m. Position </label>
                              <input name="position_2" type="text" class="form-control-plaintext" value="{{$data->position_2}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>n. Salary and allowance received: IDR </label>
                              <input name="salary_2" type="text" class="form-control-plaintext" value="{{$data->salary_2}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>o. Reason for resigning: </label>
                              <input name="reason_resigning_1" type="text" class="form-control-plaintext" value="{{$data->reason_resigning_1}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>p. Year (from)</label>
                              <input name="year_from_3" type="text" class="form-control-plaintext" value="{{$data->year_from_3}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>q. Year (till) </label>
                              <input name="year_till_3" type="text" class="form-control-plaintext" value="{{$data->year_till_3}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>r. Name and Address of Employer</label>
                              <textarea name="name_address_employer_3" class="form-control-plaintext" readonly>{{$data->name_address_employer_3}}</textarea>
                          </div>

                          <div class="form-group">
                              <label>s. Phone </label>
                              <input name="phone_name_address_employer_3" type="text" class="form-control-plaintext" value="{{$data->phone_name_address_employer_3}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>t. Position </label>
                              <input name="position_3" type="text" class="form-control-plaintext" value="{{$data->position_3}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>u. Salary and allowance received: IDR </label>
                              <input name="salary_3" type="text" class="form-control-plaintext" value="{{$data->salary_3}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>v. Reason for resigning: </label>
                              <input name="reason_resigning_2" type="text" class="form-control-plaintext" value="{{$data->reason_resigning_2}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>2. You applied at the department / section of</label>
                              <input name="id_department" type="text" class="form-control-plaintext" value="{{$data->nama_bagian}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>for the position of</label>
                              <input name="id_position" type="text" class="form-control-plaintext" value="{{$data->nama_posisi}}" readonly>
                          </div>
<!------------------------------------------------------->
                          <div class="form-group">
                              <label>3. You expect a salary of (mention the amount)</label>
                              <input name="expect_salary" type="text" class="form-control-plaintext" value="{{$data->expect_salary}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>4. You expect an allowance for (mention the type)</label>
                              <input name="expect_allowance" type="text" class="form-control-plaintext" value="{{$data->expect_allowance}}" readonly>
                          </div>
                          <br>

                          <hr>
                          <h4># Other Activities</h4>

                          <div class="form-group">
                              <label>1. Preference / Hobbies</label>
                              <input name="hobbies" type="text" class="form-control-plaintext" value="{{$data->hobbies}}" readonly>
                          </div>

                          <div class="form-group">
                              <label>2. Organizational activities</label>
                              <input name="organizational_activities" type="text" class="form-control-plaintext" value="{{$data->organizational_activities}}" readonly>
                          </div>

                              <table class="table">
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
                                  <td><input name="name_organization_1" type="text" class="form-control-plaintext" value="{{$data->name_organization_1}}" readonly></td>
                                  <td><input name="type_organization_1" type="text" class="form-control-plaintext" value="{{$data->type_organization_1}}" readonly></td>
                                  <td><input name="year_organization_1" type="text" class="form-control-plaintext" value="{{$data->year_organization_1}}" readonly></td>
                                  <td><input name="position_organization_1" type="text" class="form-control-plaintext" value="{{$data->position_organization_1}}" readonly></td>
                                  </tr>
                                  <tr>
                                  <td><input name="name_organization_2" type="text" class="form-control-plaintext" value="{{$data->name_organization_2}}" readonly></td>
                                  <td><input name="type_organization_2" type="text" class="form-control-plaintext" value="{{$data->type_organization_2}}" readonly></td>
                                  <td><input name="year_organization_2" type="text" class="form-control-plaintext" value="{{$data->year_organization_2}}" readonly></td>
                                  <td><input name="position_organization_2" type="text" class="form-control-plaintext" value="{{$data->position_organization_2}}" readonly></td>
                                  </tr>
                                  <tr>
                                  <td><input name="name_organization_3" type="text" class="form-control-plaintext" value="{{$data->name_organization_3}}" readonly></td>
                                  <td><input name="type_organization_3" type="text" class="form-control-plaintext" value="{{$data->type_organization_3}}" readonly></td>
                                  <td><input name="year_organization_3" type="text" class="form-control-plaintext" value="{{$data->year_organization_3}}" readonly></td>
                                  <td><input name="position_organization_3" type="text" class="form-control-plaintext" value="{{$data->position_organization_3}}" readonly></td>
                                  </tr>
                                  </tbody>
                              </table>

                              <div class="form-group">
                                  <label>3. Experiences as leader of</label>
                                  <input name="experiences_leader_1" type="text" class="form-control-plaintext" value="{{$data->experiences_leader_1}}" readonly>
                              </div>

                              <div class="form-group">
                                  <input id="name" name="experiences_leader_2" type="text" class="form-control-plaintext" value="{{$data->experiences_leader_2}}" readonly>
                              </div>
                              <br>

                              <hr>
                              <h4># Other Information</h4>
                              <div class="form-group">
                                  <label>1. Height</label>
                                  <input name="height" type="text" class="form-control-plaintext" value="{{$data->height}}" readonly>
                              </div>

                              <div class="form-group">
                                  <label>2. Weight</label>
                                  <input name="weight" type="text" class="form-control-plaintext" value="{{$data->weight}}" readonly>
                              </div>

                              <div class="form-group">
                                  <label>3. Have you ever suffered any serious disease that you need to be hospitalized or suffered a long lasting disease</label>
                                  <input name="weight" type="text" class="form-control-plaintext" value="{{$data->hospitalized}}" readonly>
                              </div>

                              <div class="form-group">
                                  <label>Which year</label>
                                  <input name="which_year" type="text" class="form-control-plaintext" value="{{$data->which_year}}" readonly>

                              </div>

                              <div class="form-group">
                                  <label>How long</label>
                                  <input name="how_long" type="text" class="form-control-plaintext" value="{{$data->how_long}}" readonly>

                              </div>

                              <div class="form-group">
                                  <label>Diagnosis</label>
                                  <input name="diagnosis" type="text" class="form-control-plaintext" value="{{$data->diagnosis}}" readonly>

                              </div>

                              <div class="form-group">
                                  <label>Hospitalized in</label>
                                  <input name="hospitalized_in" type="text" class="form-control-plaintext" value="{{$data->hospitalized_in}}" readonly>

                              </div>

                                  <label>4. Acquaintances working at our company</label>
                                  <table class="table">
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
                                      <td><input name="name_working_1" type="text" class="form-control-plaintext" value="{{$data->name_working_1}}" readonly></td>
                                      <td><input name="position_working_1" type="text" class="form-control-plaintext" value="{{$data->position_working_1}}" readonly></td>
                                      <td><input name="office_working_1" type="text" class="form-control-plaintext" value="{{$data->office_working_1}}" readonly></td>
                                      <td><input name="length_working_1" type="text" class="form-control-plaintext" value="{{$data->length_working_1}}" readonly></td>
                                      </tr>
                                      <tr>
                                      <td><input name="name_working_2" type="text" class="form-control-plaintext" value="{{$data->name_working_2}}" readonly></td>
                                      <td><input name="position_working_2" type="text" class="form-control-plaintext" value="{{$data->position_working_2}}" readonly></td>
                                      <td><input name="office_working_2" type="text" class="form-control-plaintext" value="{{$data->office_working_2}}" readonly></td>
                                      <td><input name="length_working_2" type="text" class="form-control-plaintext" value="{{$data->length_working_2}}" readonly></td>
                                      </tr>
                                      <tr>
                                      <td><input name="name_working_3" type="text" class="form-control-plaintext" value="{{$data->name_working_3}}" readonly></td>
                                      <td><input name="position_working_3" type="text" class="form-control-plaintext" value="{{$data->position_working_3}}" readonly></td>
                                      <td><input name="office_working_3" type="text" class="form-control-plaintext" value="{{$data->office_working_3}}" readonly></td>
                                      <td><input name="length_working_3" type="text" class="form-control-plaintext" value="{{$data->length_working_3}}" readonly></td>
                                      </tr>
                                      </tbody>
                                  </table>

                                  <div class="form-group">
                                      <label>5. Do you have any side jobs?</label>
                                      <input name="side_jobs" type="text" class="form-control-plaintext" value="{{$data->side_jobs}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>Working as</label>
                                      <input name="working_as" type="text" class="form-control-plaintext" value="{{$data->working_as}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>Remuneration</label>
                                      <input name="remuneration" type="text" class="form-control-plaintext" value="{{$data->remuneration}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>6. Have you ever been involved in criminal case or a violation of the laws?</label>
                                      <input name="laws" type="text" class="form-control-plaintext" value="{{$data->laws}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>Type of case</label>
                                      <input name="type_case" type="text" class="form-control-plaintext" value="{{$data->type_case}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>Sanction</label>
                                      <input name="sanction" type="text" class="form-control-plaintext" value="{{$data->sanction}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>When & Where</label>
                                      <input name="when_where" type="text" class="form-control-plaintext" value="{{$data->when_where}}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label>7. What are you aims in your future career development? (please give a short description)</label>
                                      <textarea name="career_development" class="form-control-plaintext" readonly>{{$data->career_development}}</textarea>
                                  </div>



                              <br>


                              @endforeach

          </div>
          <!-- /.login-card-body -->
        </div>
      </div>

<script type="text/javascript">
    window.print();
</script>

  </body>
</html>
