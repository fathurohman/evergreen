<!DOCTYPE html>
<html lang="en">
<head>
<title>Job Application Form - PT. Evergreen Shipping Agency Indonesia</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="html.design">
<!-- description -->
<meta name="description" content="Wizard Form with Validation - Responsive">
<link rel="icon" type="image/png" sizes="32x32" href="resources/question/assets/img/favicon/evergreen_logo.png">
<link rel="icon" type="image/png" sizes="16x16" href="resources/question/assets/img/favicon/evergreen_logo.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="resources/css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet"> 
<!-- Reset CSS -->
<link rel="stylesheet" href="resources/css/reset.css">
<!-- Style CSS -->
<link rel="stylesheet" href="resources/css/style.css">
<!-- Responsive  CSS -->
<link rel="stylesheet" href="resources/css/responsive.css">

<style>
      table {
        border: solid 1px #aaa999;
      }
      table tr th {
        border: solid 1px #aaa999;
      }
      table tr td {
        border: solid 1px #aaa999;
      }
    </style>
</head>
<body>

<div class="wizard-main">
	<div id="particles-js"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="title-wb">JOB APPLICATION FORM</h2>
				<p class="title-web">All the information below are rendered by me in truthfulness and factually; if such information is
					not in conformity with the actual situation, I accept all sanction conform to the company regulation.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="login-sec">
				<div class="login-sec-bg">
					<h2 class="text-center">EMPLOYEE'S LIVING ENVIRONMENT</h2>
					<form method="POST" id="example-advanced-form" action="input_registration" style="display: none;" enctype="multipart/form-data">
						<h3>Columns marked (*) are mandatory</h3>
						<fieldset class="form-input">
							<h4># Personal Condition</h4>
							<label for="name">1. Name *</label>
							<input id="name" name="personal_name" type="text" class="form-control required">
							<label for="age">2. Gender  *</label>
							<select id="age" name="sex" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
							<br>
							<label for="current_address">2. Current address *</label>
							<input id="current_address" name="current_address" type="text" class="form-control required">
							<label for="current_hp">3. Phone / HP  *</label>
							<input id="current_hp" name="phone_current_address" type="text" class="form-control required">
							<label for="permanent_address">4. Permanent address *</label>
							<input id="permanent_address" name="permanent_address" type="text" class="form-control required">
							<label for="permanent_hp">5. Phone / HP  *</label>
							<input id="permanent_hp" name="phone_permanent_address" type="text" class="form-control required">
							<label for="place_date_birth">6. Place and Date of Birth  *</label>
							<input id="place_date_birth" name="place_date_birth" type="text" class="form-control required">
							<label for="age">7. Age  *</label>
							<input id="age" name="age" type="text" class="form-control required">
							<label for="nationality">8. Religion / Belief  *</label>
							<input id="nationality" name="religion" type="text" class="form-control required">
							<label for="nationality">8. Nationality  *</label>
							<input id="nationality" name="nationality" type="text" class="form-control required">
							<label for="ethnic">9. Ethnic Group / Origin  *</label>
							<input id="ethnic" name="ethnic" type="text" class="form-control required">
							<br>
							<h4># Family Condition</h4>
							<label for="name">1. Marital status *</label>
							<select id="age" name="marital_status" class="form-control required">
								<option value="">Choose</option>
								<option value="Single">Single</option>
								<option value="Married">Married</option>
								<option value="Divorced">Divorced</option>
								<option value="Widow">Widow</option>
								<option value="Widower">Widower</option>
							</select>
							<br>
							<label for="surname">1. a. Year married *</label>
							<input id="surname" name="year_married" type="text" class="form-control required">
							<label for="email">2. Family structure: (Wife / Husband and Children) *</label>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th></th>
								<th>Name</th>
								<th>M / F</th>
								<th>Age</th>
								<th>Education</th>
								<th>Occupation</th>
								</tr>
								<tr>
								<td>Wife / Husband</td>
								<td><input id="address" name="name_wife_husband" type="text" class="form-control"></td>
								<td><select id="age" name="sex_wife_husband" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_wife_husband" type="text" class="form-control"></td>
								<td><input id="address" name="education_wife_husband" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_wife_husband" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>1st Child</td>
								<td><input id="address" name="name_first_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_first_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_first_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_first_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_first_child" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>2nd Child</td>
								<td><input id="address" name="name_second_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_second_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_second_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_second_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_second_child" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>3rd Child</td>
								<td><input id="address" name="name_third_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_third_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_third_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_third_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_third_child" type="text" class="form-control"></td>
								</tr>
							</table>
							<p>(if demised, mention the educational background and occupation during his/her life)</p>
							<label for="email">3. Your Family structure: (Father / Mother, and Siblings including yourself) *</label>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th></th>
								<th>Name</th>
								<th>M / F</th>
								<th>Age</th>
								<th>Education</th>
								<th>Occupation</th>
								</tr>
								<tr>
								<td>Father</td>
								<td><input id="address" name="name_father" type="text" class="form-control"></td>
								<td><select id="age" name="sex_father" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_father" type="text" class="form-control"></td>
								<td><input id="address" name="education_father" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_father" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>Mother</td>
								<td><input id="address" name="name_mother" type="text" class="form-control"></td>
								<td><select id="age" name="sex_mother" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_mother" type="text" class="form-control"></td>
								<td><input id="address" name="education_mother" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_mother" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>1st Child</td>
								<td><input id="address" name="name_your_first_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_your_first_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_your_first_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_your_first_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_your_first_child" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>2nd Child</td>
								<td><input id="address" name="name_your_second_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_name_your_second_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_your_second_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_your_second_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_your_second_child" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>3rd Child</td>
								<td><input id="address" name="name_your_third_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_your_third_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_your_third_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_your_third_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_your_third_child" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>4th Child</td>
								<td><input id="address" name="name_your_fourth_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_your_fourth_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_your_fourth_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_your_fourth_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_your_fourth_child" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>5th Child</td>
								<td><input id="address" name="name_your_fifth_child" type="text" class="form-control"></td>
								<td><select id="age" name="sex_fifth_child" class="form-control required">
								<option value="">Choose</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select></td>
								<td><input id="address" name="age_your_fifth_child" type="text" class="form-control"></td>
								<td><input id="address" name="education_your_fifth_child" type="text" class="form-control"></td>
								<td><input id="address" name="occupation_your_fifth_child" type="text" class="form-control"></td>
								</tr>
							</table>
							<p>(if demised, mention the educational background and occupation during his/her life)</p>
							<br>
							<h4># Education</h4>
							<label for="email">1. Formal *</label>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th>Type of School</th>
								<th>Name of School</th>
								<th>Location of School</th>
								<th>Year Enrolled</th>
								<th>Year Graduated</th>
								</tr>
								<tr>
								<td>Elementary</td>
								<td><input id="address" name="name_elementary" type="text" class="form-control"></td>
								<td><input id="address" name="location_elementary" type="text" class="form-control"></td>
								<td><input id="address" name="year_enrolled_elementary" type="text" class="form-control"></td>
								<td><input id="address" name="year_graduated_elementary" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>Junior High School</td>
								<td><input id="address" name="name_junior" type="text" class="form-control"></td>
								<td><input id="address" name="location_junior" type="text" class="form-control"></td>
								<td><input id="address" name="year_enrolled_junior" type="text" class="form-control"></td>
								<td><input id="address" name="year_graduated_junior" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>Senior High School</td>
								<td><input id="address" name="name_senior" type="text" class="form-control"></td>
								<td><input id="address" name="location_senior" type="text" class="form-control"></td>
								<td><input id="address" name="year_enrolled_senior" type="text" class="form-control"></td>
								<td><input id="address" name="year_graduated_senior" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>University / Academy</td>
								<td><input id="address" name="name_university" type="text" class="form-control"></td>
								<td><input id="address" name="location_university" type="text" class="form-control"></td>
								<td><input id="address" name="year_enrolled_university" type="text" class="form-control"></td>
								<td><input id="address" name="year_graduated_university" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td>Post Graduate</td>
								<td><input id="address" name="name_graduate" type="text" class="form-control"></td>
								<td><input id="address" name="location_graduate" type="text" class="form-control"></td>
								<td><input id="address" name="year_enrolled_graduate" type="text" class="form-control"></td>
								<td><input id="address" name="year_graduated_graduate" type="text" class="form-control"></td>
								</tr>
							</table>
							<label for="email">2. Course / Training / Upgrading *</label>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th>Type of Course / Training / Upgrading</th>
								<th>Year</th>
								<th>Length of Course</th>
								<th>Year</th>
								<th>Financed by</th>
								</tr>
								<tr>
								<td><input id="address" name="training_1" type="text" class="form-control"></td>
								<td><input id="address" name="year_training_1" type="text" class="form-control"></td>
								<td><input id="address" name="length_training_1" type="text" class="form-control"></td>
								<td><input id="address" name="year_length_1" type="text" class="form-control"></td>
								<td><input id="address" name="financed_1" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="training_2" type="text" class="form-control"></td>
								<td><input id="address" name="year_training_2" type="text" class="form-control"></td>
								<td><input id="address" name="length_training_2" type="text" class="form-control"></td>
								<td><input id="address" name="year_length_2" type="text" class="form-control"></td>
								<td><input id="address" name="financed_2" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="training_3" type="text" class="form-control"></td>
								<td><input id="address" name="year_training_3" type="text" class="form-control"></td>
								<td><input id="address" name="length_training_3" type="text" class="form-control"></td>
								<td><input id="address" name="year_length_3" type="text" class="form-control"></td>
								<td><input id="address" name="financed_3" type="text" class="form-control"></td>
								</tr>
							</table>
							<label for="email">3. Languages mastered *</label>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th>Foreign Language</th>
								<th>Active / Passive</th>
								</tr>
								<tr>
								<td><input id="address" name="foreign_language_1" type="text" class="form-control"></td>
								<td><input id="address" name="active_1" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="foreign_language_2" type="text" class="form-control"></td>
								<td><input id="address" name="active_2" type="text" class="form-control"></td>
								</tr>
							</table>
							<br>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th>Dialect</th>
								<th>Active / Passive</th>
								</tr>
								<tr>
								<td><input id="address" name="dialect_1" type="text" class="form-control"></td>
								<td><input id="address" name="active_dialect_1" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="dialect_2" type="text" class="form-control"></td>
								<td><input id="address" name="active_dialect_2" type="text" class="form-control"></td>
								</tr>
							</table>
							<br>
							<h4># Education and Experience</h4>
							<label for="name">1. Work history (as of the current occupation) *</label>
							<br>
							<label for="current_address">a. Year (from) *</label>
							<input id="current_address" name="year_from_1" type="text" class="form-control required">
							<label for="current_hp">b. Year (till)  *</label>
							<input id="current_hp" name="year_till_1" type="text" class="form-control required">
							<label for="permanent_address">c. Name and Address of Employer *</label>
							<textarea id="permanent_address" name="name_address_employer_1" class="form-control required"></textarea>
							<label for="permanent_hp">d. Phone  *</label>
							<input id="permanent_hp" name="phone_name_address_employer_1" type="text" class="form-control required">
							<label for="place_date_birth">e. Position  *</label>
							<input id="place_date_birth" name="position_1" type="text" class="form-control required">
							<label for="age">f. Do you have resignation plans:  *</label>
							<select id="age" name="resignation_plans" class="form-control required">
								<option value="">Choose</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
							<br>
							<label for="nationality">g. If you have resignation plans, explain your reasons. *</label>
							<textarea id="nationality" name="explain_reasons" class="form-control required"></textarea>
							<br>
							<label for="ethnic">h. Salary and allowance received: IDR  *</label>
							<input id="ethnic" name="salary_1" type="text" class="form-control required">
							<label for="current_address">i. Year (from) *</label>
							<input id="current_address" name="year_from_2" type="text" class="form-control required">
							<label for="current_hp">j. Year (till)  *</label>
							<input id="current_hp" name="year_till_2" type="text" class="form-control required">
							<label for="permanent_address">k. Name and Address of Employer *</label>
							<textarea id="permanent_address" name="name_address_employer_2" class="form-control required"></textarea>
							<label for="permanent_hp">l. Phone  *</label>
							<input id="permanent_hp" name="phone_name_address_employer_2" type="text" class="form-control required">
							<label for="place_date_birth">m. Position  *</label>
							<input id="place_date_birth" name="position_2" type="text" class="form-control required">
							<label for="ethnic">n. Salary and allowance received: IDR  *</label>
							<input id="ethnic" name="salary_2" type="text" class="form-control required">
							<label for="ethnic">o. Reason for resigning:  *</label>
							<input id="ethnic" name="reason_resigning_1" type="text" class="form-control required">
							<label for="current_address">p. Year (from) *</label>
							<input id="current_address" name="year_from_3" type="text" class="form-control required">
							<label for="current_hp">q. Year (till)  *</label>
							<input id="current_hp" name="year_till_3" type="text" class="form-control required">
							<label for="permanent_address">r. Name and Address of Employer *</label>
							<textarea id="permanent_address" name="name_address_employer_3" class="form-control required"></textarea>
							<label for="permanent_hp">s. Phone  *</label>
							<input id="permanent_hp" name="phone_name_address_employer_3" type="text" class="form-control required">
							<label for="place_date_birth">t. Position  *</label>
							<input id="place_date_birth" name="position_3" type="text" class="form-control required">
							<label for="ethnic">u. Salary and allowance received: IDR  *</label>
							<input id="ethnic" name="salary_3" type="text" class="form-control required">
							<label for="ethnic">v. Reason for resigning:  *</label>
							<input id="ethnic" name="reason_resigning_2" type="text" class="form-control required">
							<label for="permanent_hp">2. You applied at the department / section of *</label>
							<select class="form-control required" name="id_bagian">
                                <option value="">Choose</option>
                                    <?php
										$koneksi = mysqli_connect("localhost","root","","evergreen"); 
                                        $sql=mysqli_query($koneksi, "SELECT * FROM bagian");
                                        while ($data=mysqli_fetch_array($sql)) {
                                    ?>
                                <option value="<?=$data['id']?>"><?=$data['nama_bagian']?></option> 
                                <?php
                                    }
                                ?>
                                </select>
							<label for="place_date_birth">for the position of *</label>
							<input id="place_date_birth" name="position" type="text" class="form-control required">
							<label for="ethnic">3. You expect a salary of (mention the amount) *</label>
							<input id="ethnic" name="expect_salary" type="text" class="form-control required">
							<label for="ethnic">4. You expect an allowance for (mention the type) *</label>
							<input id="ethnic" name="expect_allowance" type="text" class="form-control required">
							<br>
							<h4># Other Activities</h4>
							<label for="name">1. Preference / Hobbies *</label>
							<input id="name" name="hobbies" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<label for="surname">2. Organizational activities *</label>
							<input id="surname" name="organizational_activities" type="text" class="form-control required">
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th>Name of Organization</th>
								<th>Type of Organization</th>
								<th>Year</th>
								<th>Position</th>
								</tr>
								<tr>
								<td><input id="address" name="name_organization_1" type="text" class="form-control"></td>
								<td><input id="address" name="type_organization_1" type="text" class="form-control"></td>
								<td><input id="address" name="year_organization_1" type="text" class="form-control"></td>
								<td><input id="address" name="position_organization_1" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="name_organization_2" type="text" class="form-control"></td>
								<td><input id="address" name="type_organization_2" type="text" class="form-control"></td>
								<td><input id="address" name="year_organization_2" type="text" class="form-control"></td>
								<td><input id="address" name="position_organization_2" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="name_organization_3" type="text" class="form-control"></td>
								<td><input id="address" name="type_organization_3" type="text" class="form-control"></td>
								<td><input id="address" name="year_organization_3" type="text" class="form-control"></td>
								<td><input id="address" name="position_organization_3" type="text" class="form-control"></td>
								</tr>
							</table>
							<label for="name">3. Experiences as leader of *</label>
							<input id="name" name="experiences_leader_1" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<input id="name" name="experiences_leader_2" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<br>
							<h4># Other Information</h4>
							<label for="name">1. Height *</label>
							<input id="name" name="height" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<label for="surname">2. Weight *</label>
							<input id="surname" name="weight" type="text" class="form-control required">
							<label for="age">3. Have you ever suffered any serious disease that you need to be hospitalized or suffered a long lasting disease *</label>
							<select id="age" name="hospitalized" class="form-control required">
								<option value="">Choose</option>
								<option value="Never">Never</option>
								<option value="Yes">Yes</option>
							</select>
							<label for="name">Which year *</label>
							<input id="name" name="which_year" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<label for="surname">How long *</label>
							<input id="surname" name="how_long" type="text" class="form-control required">
							<label for="name">Diagnosis *</label>
							<input id="name" name="diagnosis" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<label for="surname">Hospitalized in *</label>
							<input id="surname" name="hospitalized_in" type="text" class="form-control required">
							<label for="surname">4. Acquaintances working at our company *</label>
							<table style="border-collapse: collapse; border-spacing: 0;">
								<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Length of Acquaintance</th>
								</tr>
								<tr>
								<td><input id="address" name="name_working_1" type="text" class="form-control"></td>
								<td><input id="address" name="position_working_1" type="text" class="form-control"></td>
								<td><input id="address" name="office_working_1" type="text" class="form-control"></td>
								<td><input id="address" name="length_working_1" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="name_working_2" type="text" class="form-control"></td>
								<td><input id="address" name="position_working_2" type="text" class="form-control"></td>
								<td><input id="address" name="office_working_2" type="text" class="form-control"></td>
								<td><input id="address" name="length_working_2" type="text" class="form-control"></td>
								</tr>
								<tr>
								<td><input id="address" name="name_working_3" type="text" class="form-control"></td>
								<td><input id="address" name="position_working_3" type="text" class="form-control"></td>
								<td><input id="address" name="office_working_3" type="text" class="form-control"></td>
								<td><input id="address" name="length_working_3" type="text" class="form-control"></td>
								</tr>
							</table>
							<label for="age">5. Do you have any side jobs? *</label>
							<select id="age" name="side_jobs" class="form-control required">
								<option value="">Choose</option>
								<option value="Never">No</option>
								<option value="Yes">Yes</option>
							</select>
							<label for="name">Working as *</label>
							<input id="name" name="working_as" type="text" class="form-control required" placeholder="Single / Married / Divorced / Widow / Widower">
							<label for="surname">Remuneration *</label>
							<input id="surname" name="remuneration" type="text" class="form-control required">
							<label for="age">6. Have you ever been involved in criminal case or a violation of the laws? *</label>
							<select id="age" name="laws" class="form-control required">
								<option value="">Choose</option>
								<option value="Never">No</option>
								<option value="Yes">Yes</option>
							</select>
							<label for="surname">Type of case *</label>
							<input id="surname" name="type_case" type="text" class="form-control required">
							<label for="surname">Sanction *</label>
							<input id="surname" name="sanction" type="text" class="form-control required">
							<label for="surname">When & Where *</label>
							<input id="surname" name="when_where" type="text" class="form-control required">
							<label for="surname">7. What are you aims in your future career development? (please give a short description) *</label>
							<textarea id="surname" name="career_development" class="form-control required"></textarea>
							<label for="surname">Upload your photo *</label>
							<input id="surname" name="file_photo" type="file" class="form-control required">
							<label for="surname">Upload CV *</label>
							<input id="surname" name="file_cv" type="file" class="form-control required">
							<label for="surname">ID Card Number *</label>
							<input id="surname" name="id_card_number" type="text" class="form-control required">
							<p align="justify">In the event of any incorrect information given by me; herein, I am willing to resign or be imposed by a
								sanction in accordance with the prevailing regulation.<br><br>Note:<br>1. A staff accepted in particular for
								placement with a Branch / Regional Office shall be exempted from any official promotion.<br>
								2. A promotion at one's own request shall be exempted from any official promotion.
							</p>
							<input type="submit" name="submit" class="btn btn-primary" value="Submit"/>
						</fieldset>
					</form>			
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p class="copyright text-center">All Rights Reserved. &copy; <?php echo date("Y"); ?> <a href="https://www.evergreen-line.com/" target="_blank">PT. Evergreen Shipping Agency Indonesia</a> Developed By: 
					<a href="https://erfadigital.com" target="_blank">ERFA Digital</a>
				</p>
			</div>
		</div>
	</div>
</div>

<!-- jquery latest version -->
<script src="resources/js/jquery.min.js"></script>
<!-- popper.min.js -->
<script src="resources/js/popper.min.js"></script>    
<!-- bootstrap js -->
<script src="resources/js/bootstrap.min.js"></script>
<!-- jquery.steps js -->
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src="resources/js/jquery.steps.js"></script>
<!-- particles js -->
<script src="resources/js/particles.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		particlesJS("particles-js", 
			{
			  "particles": {
				"number": {
				  "value": 160,
				  "density": {
					"enable": true,
					"value_area": 800
				  }
				},
				"color": {
				  "value": "#ffffff"
				},
				"shape": {
				  "type": "circle",
				  "stroke": {
					"width": 0,
					"color": "#000000"
				  },
				  "polygon": {
					"nb_sides": 5
				  },
				  "image": {
					"src": "img/github.svg",
					"width": 100,
					"height": 100
				  }
				},
				"opacity": {
				  "value": 1,
				  "random": true,
				  "anim": {
					"enable": true,
					"speed": 1,
					"opacity_min": 0,
					"sync": false
				  }
				},
				"size": {
				  "value": 3,
				  "random": true,
				  "anim": {
					"enable": false,
					"speed": 4,
					"size_min": 0.3,
					"sync": false
				  }
				},
				"line_linked": {
				  "enable": false,
				  "distance": 150,
				  "color": "#ffffff",
				  "opacity": 0.4,
				  "width": 1
				},
				"move": {
				  "enable": true,
				  "speed": 1,
				  "direction": "none",
				  "random": true,
				  "straight": false,
				  "out_mode": "out",
				  "bounce": false,
				  "attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 600
				  }
				}
			  },
			  "interactivity": {
				"detect_on": "canvas",
				"events": {
				  "onhover": {
					"enable": true,
					"mode": "bubble"
				  },
				  "onclick": {
					"enable": true,
					"mode": "repulse"
				  },
				  "resize": true
				},
				"modes": {
				  "grab": {
					"distance": 400,
					"line_linked": {
					  "opacity": 1
					}
				  },
				  "bubble": {
					"distance": 250,
					"size": 0,
					"duration": 2,
					"opacity": 0,
					"speed": 3
				  },
				  "repulse": {
					"distance": 400,
					"duration": 0.4
				  },
				  "push": {
					"particles_nb": 4
				  },
				  "remove": {
					"particles_nb": 2
				  }
				}
			  },
			  "retina_detect": true
			}
    	);
	});
</script>

<script>
	var form = $("#example-advanced-form").show();

	form.steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
			// Allways allow previous action even if the current form is not valid!
			if (currentIndex > newIndex)
			{
				return true;
			}
			// Forbid next action on "Warning" step if the user is to young
			if (newIndex === 3 && Number($("#age").val()) < 18)
			{
				return false;
			}
			// Needed in some cases if the user went back (clean up)
			if (currentIndex < newIndex)
			{
				// To remove error styles
				form.find(".body:eq(" + newIndex + ") label.error").remove();
				form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
			// Used to skip the "Warning" step if the user is old enough.
			if (currentIndex === 2 && Number($("#age").val()) >= 18)
			{
				form.steps("next");
			}
			// Used to skip the "Warning" step if the user is old enough and wants to the previous step.
			if (currentIndex === 2 && priorIndex === 3)
			{
				form.steps("previous");
			}
		},
		onFinishing: function (event, currentIndex)
		{
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			alert("Submitted!");
		}
	}).validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
			confirm: {
				equalTo: "#password"
			}
		}
	});
</script>

</body>
</html>