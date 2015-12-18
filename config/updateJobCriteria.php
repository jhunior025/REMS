<?php
	session_start();
	include_once ('../config/connection.php');
	$con = mysql_connect("$db_hostname","$db_username","$db_password");
								if (!$con)
									{
										die('Could not connect: ' . mysql_error());
									}
																	
								mysql_select_db("$db_database", $con);
								
		$gender = "";
		$age = "";
		$civilStatus = "";
		$expectedSalary = "";
		$religion = "";
		$nationality = "";
		$height = "";
		$weight = "";
		$language = "";
		$quality = "";		
		$qualitiesCtr =	"";	
		$languageCtr = "";
		$perLanguage = "";
		$perQuality = "";
								
		
		$gender = str_replace('%', '', $_POST['criteria_gender']);
		$age = str_replace('%', '', $_POST['criteria_age']);
		$civilStatus = str_replace('%', '', $_POST['criteria_civilStatus']);
		$expectedSalary = str_replace('%', '', $_POST['criteria_expectedSalary']);
		$religion = str_replace('%', '', $_POST['criteria_religion']);
		$nationality = str_replace('%', '', $_POST['criteria_nationality']);
		$height = str_replace('%', '', $_POST['criteria_height']);
		$weight = str_replace('%', '', $_POST['criteria_weight']);
		$language = str_replace('%', '', $_POST['criteria_language']);
		$quality = str_replace('%', '', $_POST['criteria_quality']);

				
			$resultLanguages = mysql_query("SELECT *
											FROM  tbl_job_quali
											WHERE (jobQualiNewlyAdded != 'Yes' 
												OR  jobQualiNewlyAdded IS NULL)
											AND jobQualiType = 'Language'
											AND jobPostingId = $_SESSION[ses_jobPostingID]
											");
			$languageCtr = mysql_num_rows($resultLanguages);	
				
				
			$resultQualities = mysql_query("SELECT *
											FROM  tbl_job_quali
											WHERE jobQualiType = 'Quality'
											AND (jobQualiNewlyAdded != 'Yes' 
												OR  jobQualiNewlyAdded IS NULL)
											AND jobPostingId = $_SESSION[ses_jobPostingID]
											");
			$qualitiesCtr = mysql_num_rows($resultQualities);
			
			$perLanguage = intval($language) / intval($languageCtr);
			$perQuality = intval($quality) / intval($qualitiesCtr);
	
			//gender
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$gender'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Gender'
							");
			
			//age
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$age'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Age To'
							");
			
			//civil status
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$civilStatus'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Civil Status'
							");
			
			//expected salary
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$expectedSalary'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Expected Salary'
							");
			
			
			//religion
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$religion'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Religion'
							");
			
			
			//nationality
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$nationality'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Nationality'
							");
			
			
			//height
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$height'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Height'
							");
			
			
			//weight
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$weight'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Weight'
							");
			
			
			//language
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$perLanguage'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Language'
							");
			
			
			//quality
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$perQuality'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Quality'
							");
			
$main = md5('maintenance');
header("location: ../user/admin/maintenance/jobPostingUpdateDone.php?token=$main");
exit();
?>