<?php
	session_start();
	include_once ('../config/connection.php');

$con = mysql_connect("$db_hostname","$db_username","$db_password");
								if (!$con)
									{
										die('Could not connect: ' . mysql_error());
									}
																	
								mysql_select_db("$db_database", $con);

	
	
if(isset($_POST['submitQualificationsQualities'])) 
{	

$resultCtr = "";
$varResult = "";
	$result = mysql_query("SELECT * 
														FROM tbl_job_quali
														WHERE jobPostingId = $_SESSION[ses_jobPostingID]
														AND (jobQualiNewlyAdded != 'Yes' 
														OR  jobQualiNewlyAdded IS NULL)
														and jobQualiType = 'Quality'
														 ");
														 
									while($row = mysql_fetch_array($result)) 
									{
									
										$varResult = $row['jobQualiPercent'];
									}
		$resultCtr = mysql_num_rows($result);	

		$totalPercent = floatval($resultCtr) * floatval($varResult);
	
$mysqli->query("DELETE FROM `tbl_job_quali` WHERE `jobPostingId` ='$_SESSION[ses_jobPostingID]' AND `jobQualiType` = 'Quality' AND (jobQualiNewlyAdded != 'Yes' 
														OR  jobQualiNewlyAdded IS NULL)");					

	if (!empty($_POST['name_jobPostingQualities']))
	{

		foreach($_POST['name_jobPostingQualities'] as $selected) 
		{
		//echo "<p>".$selected ."</p>";
		$mysqli->query("INSERT INTO tbl_job_quali SET jobPostingID='$_SESSION[ses_jobPostingID]', jobQualiDescription='$selected', jobQualiType='Quality'");
	
	    }//for each

	}//if not empty
	
	
		$perQualification = "";
	
	
	

							
	$perQualification = "";
	
	
	$resultCriteria = mysql_query("SELECT * 
														FROM tbl_job_quali
														WHERE jobPostingId = $_SESSION[ses_jobPostingID]
														AND (jobQualiNewlyAdded != 'Yes' 
														OR  jobQualiNewlyAdded IS NULL)
														and jobQualiType = 'Quality'
														 ");
														 
		$resultCtrCriteria = mysql_num_rows($resultCriteria);	

		$perQualification = floatval($totalPercent) / floatval($resultCtrCriteria);
		
		//language
			$mysqli->query("UPDATE tbl_job_quali  SET
							jobQualiPercent = '$perQualification'
							WHERE jobPostingId = $_SESSION[ses_jobPostingID]
							AND jobQualiType = 'Quality'
							AND (jobQualiNewlyAdded != 'Yes' 
								OR  jobQualiNewlyAdded IS NULL)
							");

	
}//if set


$main = md5('maintenance');
header("location: ../user/admin/maintenance/jobPostingUpdateCriteria.php?token=$main");
exit();

?>