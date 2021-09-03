<?php
    $koneksi = mysqli_connect("localhost","root","","evergreen");
    error_reporting(0);
    if ($_POST['submit'] == "Submit") {
    $nik			  =$_POST['id_card_number'];
    $personal_name	  =$_POST['personal_name'];
    $sex			  =$_POST['sex'];
    $current_address			  =$_POST['current_address'];
    $phone_current_address			  =$_POST['phone_current_address'];
    $permanent_address	  =$_POST['permanent_address'];
    $phone_permanent_address		  =$_POST['phone_permanent_address'];
    $place_date_birth			  =$_POST['place_date_birth'];
    $age	  =$_POST['age'];
    $religion			  =$_POST['religion'];
    $nationality			  =$_POST['nationality'];
    $ethnic			  =$_POST['ethnic'];
    $marital_status	  =$_POST['marital_status'];
    $year_married		  =$_POST['year_married'];
    $name_wife_husband		  =$_POST['name_wife_husband'];
    $sex_wife_husband		  =$_POST['sex_wife_husband'];
    $age_wife_husband		  =$_POST['age_wife_husband'];
    $education_wife_husband		  =$_POST['education_wife_husband'];
    $occupation_wife_husband		  =$_POST['occupation_wife_husband'];
    $name_first_child		  =$_POST['name_first_child'];
    $sex_first_child		  =$_POST['sex_first_child'];
    $age_first_child		  =$_POST['age_first_child'];
    $education_first_child		  =$_POST['education_first_child'];
    $occupation_first_child		  =$_POST['occupation_first_child'];
    $name_second_child		  =$_POST['name_second_child'];
    $sex_second_child		  =$_POST['sex_second_child'];
    $age_second_child		  =$_POST['age_second_child'];
    $education_second_child		  =$_POST['education_second_child'];
    $occupation_second_child		  =$_POST['occupation_second_child'];
    $name_third_child		  =$_POST['name_third_child'];
    $sex_third_child		  =$_POST['sex_third_child'];
    $age_third_child		  =$_POST['age_third_child'];
    $education_third_child		  =$_POST['education_third_child'];
    $occupation_third_child		  =$_POST['occupation_third_child'];
    $name_father		  =$_POST['name_father'];
    $sex_father		  =$_POST['sex_father'];
    $age_father		  =$_POST['age_father'];
    $education_father		  =$_POST['education_father'];
    $occupation_father		  =$_POST['occupation_father'];
    $name_mother		  =$_POST['name_mother'];
    $sex_mother		  =$_POST['sex_mother'];
    $age_mother		  =$_POST['age_mother'];
    $education_mother		  =$_POST['education_mother'];
    $occupation_mother		  =$_POST['occupation_mother'];
    $name_your_first_child		  =$_POST['name_your_first_child'];
    $sex_your_first_child		  =$_POST['sex_your_first_child'];
    $age_your_first_child		  =$_POST['age_your_first_child'];
    $education_your_first_child		  =$_POST['education_your_first_child'];
    $occupation_your_first_child		  =$_POST['occupation_your_first_child'];
    $name_your_second_child		  =$_POST['name_your_second_child'];
    $sex_your_second_child		  =$_POST['sex_your_second_child'];
    $age_your_second_child		  =$_POST['age_your_second_child'];
    $education_your_second_child		  =$_POST['education_your_second_child'];
    $occupation_your_second_child		  =$_POST['occupation_your_second_child'];
    $name_your_third_child		  =$_POST['name_your_third_child'];
    $sex_your_third_child		  =$_POST['sex_your_third_child'];
    $age_your_third_child		  =$_POST['age_your_third_child'];
    $education_your_third_child		  =$_POST['education_your_third_child'];
    $occupation_your_third_child		  =$_POST['occupation_your_third_child'];
    $name_your_fourth_child		  =$_POST['name_your_fourth_child'];
    $sex_your_fourth_child		  =$_POST['sex_your_fourth_child'];
    $age_your_fourth_child		  =$_POST['age_your_fourth_child'];
    $education_your_fourth_child		  =$_POST['education_your_fourth_child'];
    $occupation_your_fourth_child		  =$_POST['occupation_your_fourth_child'];
    $name_your_fifth_child		  =$_POST['name_your_fifth_child'];
    $sex_your_fifth_child		  =$_POST['sex_your_fifth_child'];
    $age_your_fifth_child		  =$_POST['age_your_fifth_child'];
    $education_your_fifth_child		  =$_POST['education_your_fifth_child'];
    $occupation_your_fifth_child		  =$_POST['occupation_your_fifth_child'];
    $name_elementary		  =$_POST['name_elementary'];
    $location_elementary		  =$_POST['location_elementary'];
    $year_enrolled_elementary		  =$_POST['year_enrolled_elementary'];
    $year_graduated_elementary		  =$_POST['year_graduated_elementary'];
    $name_junior		  =$_POST['name_junior'];
    $location_junior		  =$_POST['location_junior'];
    $year_enrolled_junior		  =$_POST['year_enrolled_junior'];
    $year_graduated_junior		  =$_POST['year_graduated_junior'];
    $name_senior		  =$_POST['name_senior'];
    $location_senior		  =$_POST['location_senior'];
    $year_enrolled_senior		  =$_POST['year_enrolled_senior'];
    $year_graduated_senior		  =$_POST['year_graduated_senior'];
    $name_university		  =$_POST['name_university'];
    $location_university		  =$_POST['location_university'];
    $year_enrolled_university		  =$_POST['year_enrolled_university'];
    $year_graduated_university		  =$_POST['year_graduated_university'];
    $name_graduate		  =$_POST['name_graduate'];
    $location_graduate		  =$_POST['location_graduate'];
    $year_enrolled_graduate		  =$_POST['year_enrolled_graduate'];
    $year_graduated_graduate		  =$_POST['year_graduated_graduate'];
    $training_1		  =$_POST['training_1'];
    $year_training_1		  =$_POST['year_training_1'];
    $length_training_1		  =$_POST['length_training_1'];
    $year_length_1		  =$_POST['year_length_1'];
    $financed_1		  =$_POST['financed_1'];
    $training_2		  =$_POST['training_2'];
    $year_training_2		  =$_POST['year_training_2'];
    $length_training_2		  =$_POST['length_training_2'];
    $year_length_2		  =$_POST['year_length_2'];
    $financed_2		  =$_POST['financed_2'];
    $training_3		  =$_POST['training_3'];
    $year_training_3		  =$_POST['year_training_3'];
    $length_training_3		  =$_POST['length_training_3'];
    $year_length_3		  =$_POST['year_length_3'];
    $financed_3		  =$_POST['financed_3'];
    $foreign_language_1		  =$_POST['foreign_language_1'];
    $active_1		  =$_POST['active_1'];
    $foreign_language_2		  =$_POST['foreign_language_2'];
    $active_2		  =$_POST['active_2'];
    $dialect_1		  =$_POST['dialect_1'];
    $active_dialect_1		  =$_POST['active_dialect_1'];
    $dialect_2		  =$_POST['dialect_2'];
    $active_dialect_2		  =$_POST['active_dialect_2'];
    $year_from_1		  =$_POST['year_from_1'];
    $year_till_1		  =$_POST['year_till_1'];
    $name_address_employer_1		  =$_POST['name_address_employer_1'];
    $phone_name_address_employer_1		  =$_POST['phone_name_address_employer_1'];
    $position_1		  =$_POST['position_1'];
    $resignation_plans		  =$_POST['resignation_plans'];
    $explain_reasons		  =$_POST['explain_reasons'];
    $salary_1		  =$_POST['salary_1'];
    $year_from_2		  =$_POST['year_from_2'];
    $year_till_2		  =$_POST['year_till_2'];
    $name_address_employer_2		  =$_POST['name_address_employer_2'];
    $phone_name_address_employer_2		  =$_POST['phone_name_address_employer_2'];
    $position_2		  =$_POST['position_2'];
    $salary_2		  =$_POST['salary_2'];
    $reason_resigning_1		  =$_POST['reason_resigning_1'];
    $year_from_3		  =$_POST['year_from_3'];
    $year_till_3		  =$_POST['year_till_3'];
    $name_address_employer_3		  =$_POST['name_address_employer_3'];
    $phone_name_address_employer_3		  =$_POST['phone_name_address_employer_3'];
    $position_3		  =$_POST['position_3'];
    $salary_3		  =$_POST['salary_3'];
    $reason_resigning_2		  =$_POST['reason_resigning_2'];
    $id_bagian		  =$_POST['id_bagian'];
    $position		  =$_POST['position'];
    $expect_salary		  =$_POST['expect_salary'];
    $expect_allowance		  =$_POST['expect_allowance'];
    $hobbies		  =$_POST['hobbies'];
    $organizational_activities		  =$_POST['organizational_activities'];
    $name_organization_1		  =$_POST['name_organization_1'];
    $type_organization_1		  =$_POST['type_organization_1'];
    $year_organization_1		  =$_POST['year_organization_1'];
    $position_organization_1		  =$_POST['position_organization_1'];
    $name_organization_2		  =$_POST['name_organization_2'];
    $type_organization_2		  =$_POST['type_organization_2'];
    $year_organization_2		  =$_POST['year_organization_2'];
    $position_organization_2		  =$_POST['position_organization_2'];
    $name_organization_3		  =$_POST['name_organization_3'];
    $type_organization_3		  =$_POST['type_organization_3'];
    $year_organization_3		  =$_POST['year_organization_3'];
    $position_organization_3		  =$_POST['position_organization_3'];
    $experiences_leader_1		  =$_POST['experiences_leader_1'];
    $experiences_leader_2		  =$_POST['experiences_leader_2'];
    $height		  =$_POST['height'];
    $weight		  =$_POST['weight'];
    $hospitalized		  =$_POST['hospitalized'];
    $which_year		  =$_POST['which_year'];
    $how_long		  =$_POST['how_long'];
    $diagnosis		  =$_POST['diagnosis'];
    $hospitalized_in		  =$_POST['hospitalized_in'];
    $name_working_1		  =$_POST['name_working_1'];
    $position_working_1		  =$_POST['position_working_1'];
    $office_working_1		  =$_POST['office_working_1'];
    $length_working_1		  =$_POST['length_working_1'];
    $name_working_2		  =$_POST['name_working_2'];
    $position_working_2		  =$_POST['position_working_2'];
    $office_working_2		  =$_POST['office_working_2'];
    $length_working_2		  =$_POST['length_working_2'];
    $name_working_3		  =$_POST['name_working_3'];
    $position_working_3		  =$_POST['position_working_3'];
    $office_working_3		  =$_POST['office_working_3'];
    $length_working_3		  =$_POST['length_working_3'];
    $side_jobs		  =$_POST['side_jobs'];
    $working_as		  =$_POST['working_as'];
    $remuneration		  =$_POST['remuneration'];
    $laws		  =$_POST['laws'];
    $type_case		  =$_POST['type_case'];
    $sanction		  =$_POST['sanction'];
    $when_where		  =$_POST['when_where'];
    $career_development		  =$_POST['career_development'];
	$file_foto        =$_FILES['file_foto']['name'];
    $size_foto        =$_FILES['file_foto']['size'];
    $file_cv          =$_FILES['file_cv']['name'];
    $size_cv          =$_FILES['file_cv']['size'];
    $created_at       =date("Y-m-d H:i:s");
    $updated_at       =date("Y-m-d H:i:s");
    
    $max_size_foto    = 512000;
    $ext_foto         = strtolower(end(explode('.', $_FILES['file_foto']['name'])));
	$max_size_cv    = 512000;
    $ext_cv         = strtolower(end(explode('.', $_FILES['file_cv']['name'])));
    
    $timename    =date("His");
    $new_name    ="F-"."$timename".".$ext_foto";

	$ekstensi_foto    =array("jpg", "jpeg", "png");
	$ekstensi_ok_foto    =in_array($ekstensi_foto, $ext_foto);
	$ekstensi_cv    =array("pdf");
	$ekstensi_ok_cv    =in_array($ekstensi_cv, $ext_cv);

	$query = mysqli_query($koneksi, "SELECT * FROM data_pelamar WHERE id_card_number = '$nik'"); 
    
        if ($size_foto > $max_size_foto){
            ?>
                <script language="JavaScript">
                alert('Oops! Ukuran foto melebihi ketentuan ...');
                document.location='applicant';
                </script>
            <?php
        }
        elseif ($size_cv > $max_size_cv){
            ?>
                <script language="JavaScript">
                alert('Oops! Ukuran cv melebihi ketentuan ...');
                document.location='applicant';
                </script>
            <?php
        }
        elseif ($age > 28){
            ?>
                <script language="JavaScript">
                alert('Oops! Usia Anda melebihi 28 tahun ...');
                document.location='applicant';
                </script>
            <?php
        }
        elseif ($query->num_rows > 0){
            ?>
                <script language="JavaScript">
                alert('Anda sudah pernah mendaftar ...');
                document.location='applicant';
                </script>
            <?php
        }
        elseif(!($ekstensi_ok_foto)){
            ?>
                <script language="JavaScript">
                alert('Ekstensi foto tidak diijinkan ...');
                document.location='applicant';
                </script>
            <?php
        }
        elseif(!($ekstensi_ok_cv)){
            ?>
                <script language="JavaScript">
                alert('Ekstensi CV tidak diijinkan ...');
                document.location='applicant';
                </script>
            <?php
        }
        else{
            $insert =mysqli_query($koneksi, "INSERT INTO data_pelamar (id_data_pelamar, nik, personal_name, sex, current_address, phone_current_address, permanent_address,
			phone_permanent_address, place_date_birth, age, religion, nationality, ethnic, marital_status, year_married,
			name_wife_husband, sex_wife_husband, age_wife_husband, education_wife_husband, occupation_wife_husband,
			name_first_child, sex_first_child, age_first_child, education_first_child, occupation_first_child,
			name_second_child, sex_second_child, age_second_child, education_second_child, occupation_second_child,
			name_third_child, sex_third_child, age_third_child, education_third_child, occupation_third_child,
			name_father, sex_father, age_father, education_father, occupation_father, name_mother, sex_mother, age_mother,
			education_mother, occupation_mother, name_your_first_child, sex_your_first_child, age_your_first_child, education_your_first_child,
			occupation_your_first_child, name_your_second_child, sex_your_second_child, age_your_second_child, education_your_second_child,
			occupation_your_second_child, name_your_third_child, sex_your_third_child, age_your_third_child, education_your_third_child, occupation_your_third_child,
			name_your_fourth_child, sex_your_fourth_child, age_your_fourth_child, education_your_fourth_child, occupation_your_fourth_child,
			name_your_fifth_child, sex_your_fifth_child, age_your_fifth_child, education_your_fifth_child, occupation_your_fifth_child, name_elementary,
			location_elementary, year_enrolled_elementary, year_graduated_elementary, name_junior, location_junior,
			year_enrolled_junior, year_graduated_junior, name_senior, location_senior, year_enrolled_senior,
			year_graduated_senior, name_university, location_university, year_enrolled_university, year_graduated_university,
			name_graduate, location_graduate, year_enrolled_graduate, year_graduated_graduate, training_1, year_training_1,
			length_training_1, year_length_1, financed_1, training_2, year_training_2, length_training_2, year_length_2,
			financed_2, training_3, year_training_3, length_training_3, year_length_3, financed_3, foreign_language_1, active_1,
			foreign_language_2, active_2, dialect_1, active_dialect_1, dialect_2, active_dialect_2, year_from_1, year_till_1,
			name_address_employer_1, phone_name_address_employer_1, position_1, resignation_plans, explain_reasons, salary_1,
			year_from_2, year_till_2, name_address_employer_2, phone_name_address_employer_2, position_2, salary_2,
			reason_resigning_1, year_from_3, year_till_3, name_address_employer_3, phone_name_address_employer_3, position_3,
			sallary_3, reason_resigning_2, id_bagian, position, expect_salary, expect_allowance, hobbies, organizational_activities,
			name_organization_1, type_organization_1, year_organization_1, position_organization_1, name_organization_2,
			type_organization_2, year_organization_2, position_organization_2, name_organization3, type_organization_3,
			year_organization_3, position_organization_3, experiences_leader_1, experiences_leader_2, height, weight, hospitalized,
			which_year, how_long, diagnosis, hospitalized_in, name_working_1, position_working_1, office_working_1, length_working_1,
			name_working_2, position_working_2, office_working_2, length_working_2, name_working_3, position_working_3,
			office_working_3, length_working_3, side_jobs, working_as, remuneration, laws, type_case, sanction, when_where,
			career_development, file_photo, file_cv, status_accepted, created_at, updated_at) VALUES (NULL,'$nik','$personal_name','$sex',
			'$current_address','$phone_current_address','$permanent_address','$phone_permanent_address','$place_date_birth','$age','$religion','$nationality',
			'$ethnic','$marital_status','$year_married','$name_wife_husband','$sex_wife_husband','$age_wife_husband','$education_wife_husband','$occupation_wife_husband','$name_first_child','$sex_first_child'
			,'$age_first_child','$education_first_child','$occupation_first_child','$name_second_child','$sex_second_child','$age_second_child','$education_second_child','$occupation_second_child','$name_third_child','$sex_third_child'
			,'$age_third_child','$education_third_child','$occupation_third_child','$name_father','$sex_father','$age_father','$education_father','$occupation_father','$name_mother','$sex_mother'
			,'$age_mother','$education_mother','$occupation_mother','$name_your_first_child','$sex_your_first_child','$age_your_first_child','$education_your_first_child','$occupation_your_first_child','$name_your_second_child','$sex_your_second_child'
			,'$age_your_second_child','$education_your_second_child','$occupation_your_second_child','$name_your_third_child','$sex_your_third_child','$age_your_third_child','$education_your_third_child','$occupation_your_third_child','$name_your_fourth_child','$sex_your_fourth_child'
			,'$age_your_fourth_child','$education_your_fourth_child','$occupation_your_fourth_child','$name_your_fifth_child','$sex_your_fifth_child','$age_your_fifth_child','$education_your_fifth_child','$occupation_your_fifth_child','$name_elementary','$location_elementary'
			,'$year_enrolled_elementary','$year_graduated_elementary','$name_junior','$location_junior','$year_enrolled_junior','$year_graduated_junior','$name_senior','$location_senior','$year_enrolled_senior','$year_graduated_senior'
			,'$name_university','$location_university','$year_enrolled_university','$year_graduated_university','$name_graduate','$location_graduate','$year_enrolled_graduate','$year_graduated_graduate','$training_1','$year_training_1'
			,'$length_training_1','$year_length_1','$financed_1','$training_2','$year_training_2','$length_training_2','$year_length_2','$financed_2','$training_3','$year_training_3'
			,'$length_training_3','$year_length_3','$financed_3','$foreign_language_1','$active_1','$foreign_language_2','$active_2','$dialect_1','$active_dialect_1','$dialect_2'
			,'$active_dialect_2','$year_from_1','$year_till_1','$name_address_employer_1','$phone_name_address_employer_1','$position_1','$resignation_plans','$explain_reasons','$salary_1','$year_from_2'
			,'$year_till_2','$name_address_employer_2','$phone_name_address_employer_2','$position_2','$salary_2','$reason_resigning_1','$year_from_3','$year_till_3','$name_address_employer_3','$phone_name_address_employer_3'
			,'$position_3','$salary_3','$reason_resigning_2','$id_bagian','$position','$expect_salary','$expect_allowance','$hobbies','$organizational_activities','$name_organization_1'
			,'$type_organization_1','$year_organization_1','$position_organization_1','$name_organization_2','$type_organization_2','$year_organization_2','$position_organization_2','$name_organization_3','$type_organization_3','$year_organization_3'
			,'$position_organization_3','$experiences_leader_1','$experiences_leader_2','$height','$weight','$hospitalized','$which_year','$how_long','$diagnosis','$hospitalized_in'
			,'$name_working_1','$position_working_1','$office_working_1','$length_working_1','$name_working_2','$position_working_2','$length_working_2','$name_working_3','$position_working_3','$office_working_3'
			,'$length_working_3','$side_jobs','$working_as','$remuneration','$laws','$type_case','$sanction','$when_where','$career_development','$file_photo'
			,'$file_cv',NULL,'$created_at','$updated_at')");
            if($insert){
                ?>
                    <script language="JavaScript">
                    alert('Good! Upload file success ...');
                    document.location='applicant';
                    </script>
                <?php
            }
            else {
                echo mysqli_error($koneksi);
                //echo "<b>Oops!</b> 404 Error Server.";
            }
            if (strlen($file_foto)>0 && strlen($file_cv)>0) {
                if (is_uploaded_file($_FILES['file_foto']['tmp_name'])&&($_FILES['file_cv']['tmp_name'])) {
                    move_uploaded_file ($_FILES['file_foto']['tmp_name'], "public/documents/foto_pelamar/".$file_foto);
                    move_uploaded_file ($_FILES['file_cv']['tmp_name'], "public/documents/cv_pelamar/".$file_cv);
                }
            }
        }
    }
?>