<?php
	session_start();
	include_once ('../config/connection.php');


if(isset($_POST['submitQualificationsLanguage'])) 
{							

	if (!empty($_POST['name_jobPostingLanguage']))
	{

		foreach($_POST['name_jobPostingLanguage'] as $selected) 
		{
		//echo "<p>".$selected ."</p>";
		$mysqli->query("INSERT INTO tbl_job_quali SET jobPostingId='$_SESSION[ses_jobPostingID]', jobQualiDescription='$selected', jobQualiType='Language'");
		

		
	    }//for each

	}//if not empty
}//if set

$main = md5('maintenance');
header("location: ../user/client/maintenance/jobPostingAddSkills.php?token=$main");
exit();
?>