
<?php

include_once 'db.php';

class insert extends dbconnect
{



	//function date validates input against special character
	public function input_validation($input)
	{
		return htmlentities(htmlspecialchars(stripcslashes(trim($input))));
	}
	
	//function that registers members
	public function registerindividualMember($case)
	{
			if(isset($_POST['signup'])):
				 //$admin_status = "main admin";
				 $individual_id = 'STHC'.'/'.'AB'.'/'.rand(0,1000);
				// $member_status = "fully ";
				 $title = $this->input_validation($_POST["title"]);
				 $fname = $this->input_validation($_POST['fullname']);
				 $country = $this->input_validation($_POST['country']);
				 $state = $this->input_validation($_POST['state']);
				 $city = $this->input_validation($_POST['city']);
				 $lga = $this->input_validation($_POST['lga']);
				 $gender = $this->input_validation($_POST['gender']);
				 $dob = $this->input_validation(date("jS".' - '."F".' - '."Y",strtotime($_POST['dob'])));
				 $email = $this->input_validation($_POST['email']);
				 $password = $this->input_validation($_POST['password']);
				 $phone = $this->input_validation($_POST['phone']);
				  $address = $this->input_validation($_POST['address']);
				  $newpass = password_hash($password , PASSWORD_DEFAULT);

				  $queryForSelect = "SELECT 1 FROM registered_individual WHERE individual_email = :email";
				  $sqlForSelect = $this->conn->prepare($queryForSelect);
				  $sqlForSelect->execute([':email' => $email ]);


				  if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
				  }else{
				  	$query = "
				  			INSERT INTO registered_individual(individual_id, individual_title, individual_fullname, individual_country, individual_state, individual_lga, individual_dob, individual_gender, individual_address, individual_city, individual_phone, individual_email, individual_password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
					 $sql = $this->conn->prepare($query);
					 $feedback = $sql->execute([$individual_id,$title,$fname,$country,$state,$lga,$dob,$gender,$address,$city,$phone,$email,$newpass]);
					 if ( $feedback) {

					 	if ($case != "") {
					 			
					 			$q_case = "
					 						INSERT INTO defendants(case_defending_id, member_id) VALUES (?,?);

					 					";
					 			$sql_case = $this->conn->prepare($q_case);

					 			$feedback = $sql_case->execute([$case,$individual_id]);
					 				
					 		}
					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }

				  }
				
			endif;
			 
	}


//function that registers members
	public function  registeredOrganizationMember($case)
	{
			if(isset($_POST['signup'])):
				 //$admin_status = "main admin";
				 $organization_id = 'STHC'.'/'.'AB'.'/'.rand(0,1000);
				// $member_status = "fully ";
				
				 $name = $this->input_validation($_POST['name']);
				 $country = $this->input_validation($_POST['country']);
				 $state = $this->input_validation($_POST['state']);
				 $city = $this->input_validation($_POST['city']);
				 $lga = $this->input_validation($_POST['lga']);
				$organization_type = $this->input_validation($_POST['organization']);
				// $dob = $this->input_validation(date("jS".' - '."F".' - '."Y",strtotime($_POST['dob'])));
				 $email = $this->input_validation($_POST['email']);
				 $password = $this->input_validation($_POST['password']);
				 $phone = $this->input_validation($_POST['phone']);
				  $address = $this->input_validation($_POST['address']);
				  $newpass = password_hash($password , PASSWORD_DEFAULT);

				  $queryForSelect = "SELECT 1 FROM registered_organization WHERE organization_email = :email AND organization_name = :name";
				  $sqlForSelect = $this->conn->prepare($queryForSelect);
				  $sqlForSelect->execute([':email' => $email,':name' => $name]);
				  if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
				  }else{
				  	$query = "
				  			INSERT INTO registered_organization(organization_id, organization_name, organization_country, organization_state, organization_city, organization_lga,organization_type, organization_address, organization_phone, organization_email, organization_password) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
					 $sql = $this->conn->prepare($query);
					 $feedback = $sql->execute([$organization_id,$name,$country,$state,$city,$lga,$organization_type,$address,$phone,$email,$newpass]);
					 if ( $feedback) {

					 		if ($case != "") {
					 			
					 			$q_case = "
					 						INSERT INTO defendants(case_defending_id, member_id) VALUES (?,?);

					 					";
					 			$sql_case = $this->conn->prepare($q_case);

					 			$feedback = $sql_case->execute([$case,$organization_id]);
					 				
					 		}
					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }

				  }
				
			endif;
			 
	}


	public function file_a_case($member_id){

				if (isset($_POST['file_case'])) {

					$file_case_id = 'STHC'.'/'.'AB'.'/'.'CASE'.'/'.rand(0,1000);

					$name_of_division = $_POST['division'];

					$name_of_plaintiff = $_POST['ab'];

					$amount = $_POST['amount'];

					$add_of_plaintiff = $_POST['add_of_plain'];

					$name_of_defendants = $_POST['cd'];

					$add_of_defendants = $_POST['add_of_def'];

					$cat_of_defendants = $_POST['def_cat'];

					$name_of_practitioner = $_POST['name_of_practioner'];

					//$countFiles = count($_FILES['claims']['name']);

				
			
					//file name
					  $member_claim_document_name =  $_FILES['claims']['name'];

						// 	print_r($member_claim_document_name);

					$member_claim_document_size = 0; //$_FILES['claims']['size'];

					 $member_claim_document_tmp = $_FILES['claims']['tmp_name'];
					
					 $target_file = "./member_claim_documents/".$member_claim_document_name;


					 if($member_claim_document_size == 1):

						return ['message'=>'too_large'];

					  	else:

					  		$query = "
						  			INSERT INTO file_case(file_case_id, name_of_division, name_of_plaintiff, add_of_plaintiff, name_of_defendants, add_of_defendants,cat_of_defendants,claims_document,claims_amount, name_of_practitioner,member_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
					  								  					
					  		$sql = $this->conn->prepare($query);
							 $feedback = $sql->execute([$file_case_id,$name_of_division,$name_of_plaintiff,$add_of_plaintiff,$name_of_defendants,$add_of_defendants,$cat_of_defendants,$member_claim_document_name,$amount,$name_of_practitioner,$member_id]);


							 if ( $feedback) {

							 	move_uploaded_file($member_claim_document_tmp,$target_file);

							 	$select_query = "SELECT * FROM file_case WHERE file_case_id = ?";
							 	$select_sql = $this->conn->prepare($select_query);
							 	$select_sql->execute([$file_case_id]);
							 	$select_res  = $select_sql->fetchAll(PDO::FETCH_ASSOC);
							 	

							 	return ['message'=>'success', 'res' => $select_res];

							 }else{

						
							 	return ['message' => 'failed to upload'];

									
								 }

							//}

					  
								
						// $sql = $this->conn->prepare($query);
						// 	 $feedback = $sql->execute([$file_case_id,$name_of_division,$name_of_plaintiff,$add_of_plaintiff,$name_of_defendants,$add_of_defendants,$cat_of_defendants,$value,$name_of_practitioner,$member_id]);


						// 	 if ( $sql) {

						// 	 	move_uploaded_file($_FILES['claims']['tmp_name'][$i], "./member_claim_documents/".$value);

						// 	 	$select_query = "SELECT * FROM file_case WHERE file_case_id = ?";
						// 	 	$select_sql = $this->conn->prepare($select_query);
						// 	 	$select_sql->execute([$file_case_id]);
						// 	 	$select_res  = $select_sql->fetchAll(PDO::FETCH_ASSOC);
							 	

						// 	 	return ['message'=>'success', 'res' => $select_res];

						// 	 }else{

						
						// 	 	return ['message' => 'failed to upload'];

									
						// 		 }

					

				endif;
							  		
				 }
	}


	public function defendant_claims($c)
	{
		if (isset($_POST['send'])) {

			$status = "completed"; 

			$file_name = $_FILES['claims']['name'];

			$target_file = "./defendant_claim_documents/".$file_name;

			
			$sql = "UPDATE defendants SET defendant_claim = '$file_name', case_defending_status = '$status' WHERE case_defending_id = '$c'";

			//$sql_r = "UPDATE file_case SET case_status = '$status' WHERE file_case_id = '$c'";

			$query = $this->conn->prepare($sql);

			//$query_r = $this->conn->prepare($sql);
					
			if ($query->execute()) {
					
					move_uploaded_file($_FILES['claims']['tmp_name'], $target_file);

						return 'success';
				}else{

						return 'nope';
						//return 'nope';

				}

			//}

			// $file_name = $_FILES['claims']['name'];

			// foreach ($file_name as $key ) {
				
			// 	$file_name = $key.$_FILES['claims']['name'][$key];

			// 	$file_tmp =   $_FILES['claims']['tmp_name'][$key];

			// 	$file_size = $_FILES['claims']['size'][$key];

			// 	$target_file = "member/defendant_claim_documents/".$file_name;

			// 	if ($file_size > 2097152) {
					
			// 		return "file is too large";
			// 	}else{

			// 		$upload = move_uploaded_file($file_name, $target_file);

			// 		if ($upload) {
						
			// 			$query->execute([$file_name,$status,$case_id]);

			// 			return 'uploaded';
			// 		}

			// 	}

					
		}
	}


	public function send_complaint($member_id)
	{
			if(isset($_POST['send'])):

				 $message_status = 'new';
				 
				 $complaint_subject = $this->input_validation($_POST["complaint_subject"]);
				 $complaint_message = $this->input_validation($_POST['complaint_message']);

				 
				  	$query = "INSERT INTO complaints(complaint_subject, complaint_message,status, member_id) VALUES(?,?,?,?)";

					 $sql = $this->conn->prepare($query);
					 $feedback = $sql->execute([$complaint_subject,$complaint_message,$message_status,$member_id]);
					 if ( $feedback) {
					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }
			endif;
			 
	}



public function add_preceeding($case_id,$member_id)
	{
			if(isset($_POST['send'])):

				$preceeding_note = $this->input_validation($_POST["preceeding"]);

				$status = 'new';

				//file name
					$proceeding_document_name =  $_FILES['pro_doc']['name'];

				 
				
					
					 $target_file = "./preceeding_document/".$proceeding_document_name;

				if (!empty($preceeding_note)) {
				 
				  	$query = "INSERT INTO preceedings(preceeding,proceeding_document,status,case_id,member_id) VALUES (?,?,?,?,?)";

					 $sql = $this->conn->prepare($query);
					 $feedback = $sql->execute([$preceeding_note,$proceeding_document_name,$status,$case_id,$member_id]);
					 if ( $feedback) {

					 	move_uploaded_file($_FILES['pro_doc']['tmp_name'], $target_file);

					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }

				}else{

					return "empty";
				}
			endif;
			 
	}


public function ResetPassword()
	{
		if (isset($_POST['send_link'])):
		
		$m_email = $_POST['m_email'];	

		$queryForSelect = "SELECT 1 FROM registered_individual WHERE individual_email  = ?";

		$queryForSelect_r = "SELECT 1 FROM registered_organization WHERE organization_email  = ?";

		  $sqlForSelect = $this->conn->prepare($queryForSelect);

		   $sqlForSelect_r = $this->conn->prepare($queryForSelect_r);

		  $sqlForSelect->execute([$m_email]);	

		  $sqlForSelect_r->execute([$m_email]);	

		  $res = $sqlForSelect->fetchColumn();	  

		  $res_r = $sqlForSelect_r->fetchColumn();	  

			if ($res || $res_r):

				$link = '';

				if ($res = '') {
					
					//$link = '<a href="changepassword.php?change=$res_r["organization_email"]">change password</a>';

				}elseif ($res_r = '') {

					//$link = '<a href="changepassword.php?change=$res["individual_email"]">change password</a>';
				}
				

				// $emailfrom = "sthcab@gmail.com";
				// 	$EmailTo = $member_email;
				// 	$Subject = "STHCAB SYSTEM";
				//	$message = "Click the link to reset your password ".$link;
				// 	// prepare email body text
				// 	$Body = "";
				// 	$Body .= "\n";
				// 	$Body .= "Email: ";
				// 	$Body .= $emailfrom;
				// 	$Body .= "\n";
				// 	$Body .= "Subject: ";
				// 	$Body .= $Subject;
				// 	$Body .= "\n";
				// 	$Body .= "Message: ";
				// 	$Body .= $message;
				// 	$Body .= "\n";

				 //mail($EmailTo, $Subject, $Body, "From:".$emailfrom);
				
				return "user_registered";

		  	else:

		  		return "not_registered"; 
		  		
		  	endif;

		 endif;
	}



public function send_message()
{

	if (isset($_POST['send_message'])) {


 		$name = $_POST['full_name'];

 		$email = $_POST['email'];

 		$message = $_POST['message'];
 		
 		$sql = "INSERT INTO message(full_name, email, message) VALUES (?,?,?)";
 		$query = $this->conn->prepare($sql);
 		$res = $query->execute([$name,$email,$message]);

 		if ($res):
 			return 'sent';
 		else:
 			return "failed";
 		endif;
 		
 	}
	

}

public function judgement($case)
	{
			if(isset($_POST['send'])):

				
				 
				 $judgement = $this->input_validation($_POST["judgement"]);


				 $judgement_document_name =  $_FILES['judge_doc']['name'];

				 
				
					
				$target_file = "./judgement_document/".$judgement_document_name;

				 
				if (empty($judgement)) {

					return "empty";


				 }else{

				 	$queryForSelect = "SELECT 1 FROM judgement WHERE case_id = :case_id";

				  	$sqlForSelect = $this->conn->prepare($queryForSelect);
				  	$sqlForSelect->execute([':case_id' => $case ]);

				  	if ($sqlForSelect->fetchColumn()) {
				  		
				  		return "case_concluded";
				  	}else{

				  		$query = "INSERT INTO judgement(judgement_note, judgement_document, case_id) VALUES (?,?,?)";

						 $sql = $this->conn->prepare($query);

						 $feedback = $sql->execute([$judgement,$judgement_document_name,$case]);
						 if ( $feedback) {

						 	move_uploaded_file($_FILES['judge_doc']['tmp_name'], $target_file);

					 		return 'success';
					 		}else{		

					 		return 'nope';
						 }
				  	}

				  }


			endif;
			 
	}


	public function admin_reg()
	{
			if(isset($_POST['signup'])):
				 
				 $name = $this->input_validation($_POST['name']);
				 $email = $this->input_validation($_POST['email']);
				 $password = $this->input_validation($_POST['password']);
				 $phone = $this->input_validation($_POST['phone']);
				  $newpass = password_hash($password , PASSWORD_DEFAULT);

				  $queryForSelect = "SELECT 1 FROM registered_admin WHERE admin_email = :email";
				  $sqlForSelect = $this->conn->prepare($queryForSelect);
				  $sqlForSelect->execute([':email' => $email ]);

				 if (str_word_count($name) > 1) {
				  if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
				  }else{

				  	$sql = "INSERT INTO registered_admin(admin_name, admin_email, admin_password, admin_phone) VALUES (?,?,?,?)";

				  	 $sql = $this->conn->prepare($sql);
					 $feedback = $sql->execute([$name,$email,$newpass,$phone]);
					 if ( $feedback) {
					 	return 'success';
					 	}else{		

					 	return 'nope';
					 }
				  }
				}else{
					return 'name_not_complete';
				}
			endif;
			 
	}


	public function message_seen_by_admin($complaint_id){

		if (isset($_POST['send'])) {

			$status = 'seen';

			$complaint_message_reply = $_POST['complaint_message'];

			$sql = "UPDATE complaints SET complaint_message_reply = '$complaint_message_reply', status = '$status' WHERE complaint_id = '$complaint_id'";

			$query = $this->conn->prepare($sql);

			if($query->execute()){

				return "success";
			}else{

				return "nope";
			}


		}

	}


	public function	changebadgecount(){

		if (isset($_POST['seen'])) {

			$status = 'seen';

			$sql = "UPDATE complaints SET status = '$status'";
			$query = $this->conn->prepare($sql);
			 $query->execute();
			
		}
	}

	//function that checks if user exit and  send a reset link to the user email to change password
	// public function ResetPassword()
	// {
	// 	if (isset($_POST['reset'])):
		
	// 	$member_email = $_POST['member_email'];	

	// 	$queryForSelect = "SELECT 1 FROM registered_members WHERE member_email  = ?";
	// 	  $sqlForSelect = $this->conn->prepare($queryForSelect);
	// 	  $sqlForSelect->execute([$member_email]);	
	// 	  $res = $sqlForSelect->fetchColumn();	  
	// 		if ($res):

	// 			//$link = '<a href="changepassword.php?change=$res["member_id"]">change password</a>';

	// 			// $emailfrom = "FunaiCoop@gmail.com";
	// 			// 	$EmailTo = $member_email;
	// 			// 	$Subject = "FUNAI COOP PLATFORM";
	// 			//	$message = "Click the link to reset your password ".$link;
	// 			// 	// prepare email body text
	// 			// 	$Body = "";
	// 			// 	$Body .= "Identification: ";
	// 			// 	$Body .= $res[member_id];
	// 			// 	$Body .= "\n";
	// 			// 	$Body .= "Email: ";
	// 			// 	$Body .= $emailfrom;
	// 			// 	$Body .= "\n";
	// 			// 	$Body .= "Subject: ";
	// 			// 	$Body .= $Subject;
	// 			// 	$Body .= "\n";
	// 			// 	$Body .= "Message: ";
	// 			// 	$Body .= $message;
	// 			// 	$Body .= "\n";

	// 			 //mail($EmailTo, $Subject, $Body, "From:".$emailfrom);
				
	// 			return "user_registered";

	// 	  	else:

	// 	  		return "not_registered"; 
		  		
	// 	  	endif;

	// 	 endif;
	// }


	//function that updates user password
	public function	newPassword($id){

		if (isset($_POST['new_pass'])) {

			$newpass = $_POST['new_password'];

			 $newpassword = password_hash($newpass , PASSWORD_DEFAULT);

			$sql = "UPDATE registered_members SET member_password = '$newpassword' WHERE member_id = '$id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'success';
			}else{

				return 'failed';
				echo error();
			}
		}
	}



	//funtion that allows users to apply for mandate

	public function mandate_form()
	{

		if (isset($_POST['submit_mandate_form'])):

		$member_name = $_POST['member_name'];

		$member_id = $_POST['member_id'];

		$member_department = $_POST['member_department'];

		$member_dof_joining =$_POST['member_dof_joining'];

		$member_salary_grade_level = $_POST['member_grade_level'];

		$member_paying_subs_load = $_POST['member_subs_load'];

		$member_balance = $_POST['member_balance'];

		$member_prev_deduction = $_POST['member_prev_deduction'];

		$member_new_mandate = $_POST['member_new_mandate'];

		$member_signature = $_POST['member_signature'];

		$status = 'Pending';


			
		$query = "INSERT INTO mandate_form(member_name, member_id, member_department, member_dof_joining, member_salary_grade_level, member_paying_subs_load, member_balance, member_prev_deduction, member_new_mandate, member_signature,mandate_status)VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		 $sql = $this->conn->prepare($query);
		 $feedback = $sql->execute([$member_name,$member_id,$member_department,$member_dof_joining,$member_salary_grade_level,$member_paying_subs_load,$member_balance,$member_prev_deduction,$member_new_mandate,$member_signature,$status]);

		 if ($feedback) {
		 	
		 	return 'success';
		 }else{
		 	return 'nope';
		 	echo error();
		 }

		endif;
	}


	//funtion that allows users to apply for thrift form
	public function submit_thrift_form()
	{

		if (isset($_POST['submit_thrift_form'])):

		$member_name = $_POST['member_name'];

		$member_department = $_POST['member_department'];

		$member_phone = $_POST['member_phone'];

		$member_category = $_POST['member_category'];

		$member_designation = $_POST['member_designation'];

		$member_next_of_kin_name = $_POST['member_nof_kin_name'];

		$member_next_of_kin_add = $_POST['member_nof_kin_add'];

		$member_next_of_kin_phone = $_POST['member_nof_kin_phone'];

		$member_date_of_joining = $_POST['dof_of_joining'];

		$member_id = $_POST['member_id'];

		$member_salary_scale = $_POST['member_salary_scale'];

		$member_salary_scale_level = $_POST['member_salary_scale_level'];

		$member_salary_scale_step = $_POST['member_salary_scale_step'];

		$member_monthly_contribute = $_POST['member_monthly_contribute'];

		$member_month_to_start_contribution = $_POST['member_month_to_start_contribution'];

		$member_signnature = $_POST['member_sign'];


		$query = "INSERT INTO thrift_form(	member_name,member_department, member_phone, member_category, member_designation, member_next_of_kin_name, member_next_of_kin_add, member_next_of_kin_phone, member_date_of_joining, member_id, member_salary_scale, member_salary_scale_level, member_salary_scale_step, member_monthly_contribute, member_month_to_start_contribution, member_signnature) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		 $sql = $this->conn->prepare($query);
		 $feedback = $sql->execute([$member_name,$member_department,$member_phone,$member_category,$member_designation,$member_next_of_kin_name,$member_next_of_kin_add,$member_next_of_kin_phone,$member_date_of_joining,$member_id,$member_salary_scale,$member_salary_scale_level,$member_salary_scale_step,$member_monthly_contribute,$member_month_to_start_contribution,$member_signnature]);

		  if ($feedback) {
		 	
		 	return 'success';
		 }else{
		 	return 'nope';
		 	echo error();
		 }

		endif;
	}

   
	// function that allows admin to credit user account 
	public function credit_account($member_id,$member_email)
	{
		
		if (isset($_POST['credit'])):

		 $queryForSelect = "SELECT 1 FROM member_account  WHERE member_id  = ?";
					  $sqlForSelect = $this->conn->prepare($queryForSelect);
					  $sqlForSelect->execute([$member_id]);
		if ($sqlForSelect->fetchColumn()) {
				  	return "userfound";
		}else{

			$date_of_credit = date("Y".'-'."d".'-'."w");
		
			$amount = $_POST['amount'];
			$sql = "INSERT INTO member_account(member_id, amount_credited, date_of_credit) VALUES (?,?,?) ";
			$query = $this->conn->prepare($sql);
			$feedback = $query->execute([$member_id,$amount,$date_of_credit]);

			if ($feedback) {

			

			$sql = "UPDATE fully_regitered_members SET last_date_of_credit = ?";
			$query = $this->conn->prepare($sql);
			$query->execute([$date_of_credit]);


				// $emailfrom = "FunaiCoop@gmail.com";
				// 	$EmailTo = $member_email;
				// 	$Subject = "FUNAI COOP PLATFORM";
				// 	$message = "Credit alert, ".$member_id." Account Is Credited with ".$amount;
				// 	// prepare email body text
				// 	$Body = "";
				// 	$Body .= "Identification: ";
				// 	$Body .= $member_id;
				// 	$Body .= "\n";
				// 	$Body .= "Email: ";
				// 	$Body .= $emailfrom;
				// 	$Body .= "\n";
				// 	$Body .= "Subject: ";
				// 	$Body .= $Subject;
				// 	$Body .= "\n";
				// 	$Body .= "Message: ";
				// 	$Body .= $message;
				// 	$Body .= "\n";

				// mail($EmailTo, $Subject, $Body, "From:".$emailfrom);
				
				
				return 'success';
			}else{

				return 'nope';
			}
		}
		
		
		endif;

	}


	//function that allow users to apply for loan

	public function submit_loan_form($member_id,$member_signature)
	{

		if (isset($_POST['submit_loan_form'])):

			$member_new_mandate = $_POST['member_new_mandate'];

			$member_load_amount = $_POST['member_load_amount'];

			$member_load_repayment_plan = $_POST['member_load_repayment_plan'];

			$member_load_repayment_month = date("F".' - '."Y",strtotime($_POST['member_load_repayment_month']));

			$member_bank_name = $_POST['member_bank_name'];

			$member_bank_branch = $_POST['member_bank_branch'];


			$member_acc_name = $_POST['member_acc_name'];

			$member_acc_num = $_POST['member_acc_num'];

			//$member_signature = $_POST['member_signature'];

			$name_of_mem_first_guarantor = $_POST['name_of_mem_first_guarantor'];

			$sign_of_mem_first_guarantor = $_POST['sign_of_mem_first_guarantor'];

			$phone_of_mem_first_guarantor = $_POST['phone_of_mem_first_guarantor'];

			$name_of_mem_sec_guarantor = $_POST['name_of_mem_sec_guarantor'];

			$sign_of_mem_sec_guarantor = $_POST['sign_of_mem_sec_guarantor'];

			$phone_of_mem_sec_guarantor = $_POST['phone_of_mem_sec_guarantor'];

			$member_loan_satus = "Pending";




			
		$sql = "INSERT INTO loan_form(member_new_mandate, member_load_amount, member_load_repayment_plan, member_load_repayment_month, member_bank_name, member_bank_branch, member_acc_name, member_acc_num, member_signature, name_of_mem_first_guarantor, sign_of_mem_first_guarantor, phone_of_mem_first_guarantor, name_of_mem_sec_guarantor, sign_of_mem_sec_guarantor, phone_of_mem_sec_guarantor, member_loan_satus, member_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$query = $this->conn->prepare($sql);

				        $feedback = $query->execute([$member_new_mandate,$member_load_amount,$member_load_repayment_plan,$member_load_repayment_month,$member_bank_name,$member_bank_branch,$member_acc_name,$member_acc_num,$member_signature,$name_of_mem_first_guarantor,$sign_of_mem_first_guarantor,$phone_of_mem_first_guarantor,$name_of_mem_sec_guarantor,$sign_of_mem_sec_guarantor,$phone_of_mem_sec_guarantor,$member_loan_satus,$member_id]);

						if ($feedback):
							
						  	return "success";
						else:

						
							return "nope";


			
						endif;

		endif;
	}

	
	//function that allows admin to approve loan for user
	public function	LoanIsApproved($l_id){

		if (isset($_POST['approve'])) {

			$status = 'Approved';

			$sql = "UPDATE loan_form SET member_loan_satus = '$status' WHERE id = '$l_id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'successful';
			}
		}
	}

//function that allows admin to approve loan for user
	public function	changebadge($member_id){

		if (isset($_POST['changebadge'])) {

			$status = 'seen_by_member';

			$sql = "UPDATE message SET status = '$status' WHERE member_id = '$member_id'";
			$query = $this->conn->prepare($sql);
			 $query->execute();
			
		}
	}


//function that allows admin to approve mandate from for user
	public function	MandateIsApproved($id){

		if (isset($_POST['approve'])) {

			$status = 'Approved';

			$sql = "UPDATE mandate_form SET mandate_status = '$status' WHERE id = '$id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'success';
			}else{
				return 'nope';
			}
		}
	}

//function that allows admin to delete User
public function	Delete_user($id){

		if (isset($_POST['delete'])) {

			$sql = "DELETE FROM fully_regitered_members WHERE member_id='$id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'success';
			}else{
				return 'nope';
			}
		}
	}

//function that allow admin to decline a loan
public function	LoanIsDecline($l_id){

		if (isset($_POST['decline'])) {

			$status = 'Decline';

			$sql = "UPDATE loan_form SET member_loan_satus = '$status' WHERE id = '$l_id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'decline';
			}
		}
	}

//function that allow admin to reply message
	public function	AdminReply($m_id){

		if (isset($_POST['reply'])) {

			$message = $_POST['message'];

			$status = 'seen';

			$sql = "UPDATE message SET admin_reply = '$message', status = '$status' WHERE id = '$m_id'";
			$query = $this->conn->prepare($sql);
			$res = $query->execute();
			if ($res) {
				return 'successful';
			}else{
				return 'nope';
			}
		}
	}


	

//funtion that allows users to send message to admin
 public function messageAdmin($member_id,$member_name)
 {
 	if (isset($_POST['message'])) {

 		$status = 'new';

 		$member_message = $_POST['member_message'];

 		$Subject = $_POST['subject'];
 		
 		$sql = "INSERT INTO message(member_name, message_subject, member_message, status, member_id) VALUES (?,?,?,?,?)";
 		$query = $this->conn->prepare($sql);
 		$res = $query->execute([$member_name,$Subject,$member_message,$status,$member_id]);

 		if ($res):
 			return 'sent';
 		else:
 			return "failed";
 		endif;
 		
 	}
 }


	


}


?>