<?php
	//session_start();
	$root = realpath(dirname(__FILE__) . '/../../..');
	include($root . '/include/header.php');
	include($root . '/config/connection.php');
	include ('../clientNav.php'); // native to admin
	include('../clientNotifModal.php');
	
	if(isset($_SESSION['stat']))
	{
		echo $_SESSION['stat'];
		unset($_SESSION['stat']);
	}else 
	{ 
		
	}
?>

	<div class='container-fluid content'>
		<ul class="breadcrumb">
			<li>Transactions</li>&nbsp;&nbsp;&nbsp;<span class="divider">&raquo;</span>&nbsp;&nbsp;&nbsp;
			<li class="active">Report an Employee</li>
		</ul>
	</div>


	<div class="container-fluid">
		<div class="col-md-12 wrapper-background">
		
				<nav class="navbar nav2 nav navbar-nav">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
						<li><h3><a href="sendEmpRep.php?token=<?php echo $tran?>" style="margin-left:.5em;">Report an Employee</a></h3></li>
					</ul>
			  	</div>

			</nav>
			<br /><br /><br /><br />
				<h4 class="alert-info well-lg">Report an Employee.</h4>
				<br /><br />
				
			
				<form method="POST" action="insertRep.php">
					<div class="col-md-3">
						<label>Select Employee</label>
						<select class="form-control" id="employee" name="employee">
						<option value="">Name</option>
						<?php

						$con = mysql_connect("$db_hostname","$db_username","$db_password");
						if (!$con)
						{
							die('Could not connect: ' . mysql_error());
						}
						$CID=$_SESSION['login_userId'];
						mysql_select_db("$db_database", $con);
						$result = mysql_query("SELECT * FROM tbl_employee a, tbl_job_posting b, tbl_client c WHERE a.jobPostingId = b.jobPostingId AND b.clientId = b.clientId AND c.clientId = $CID");
						while($row = mysql_fetch_array($result))
						{
							$EID = $row['employeeId'];
							$result2 = mysql_query("SELECT * FROM tbl_contract a, tbl_employee b, tbl_applicant c, tbl_basic_info d WHERE c.basicId = d.basicId AND b.applicantId=c.applicantId AND a.employeeId = $EID");
							while($row2 = mysql_fetch_array($result2))
							{
								echo"<option value='" . $row2['employeeId'] . "'> " . $row2['basicFirstName'] . " " . $row2['basicLastName'] . " </option>";
							}
						}

						?>			
						</select>
					</div>
					<div class="col-md-8">
						<textarea class="form-control" type="submit"  rows="8" value="" name="report" cols="50"></textarea>
					</div>
					
					<div class="col-md-1">
						<input class="btn btn-default" style="margin-top:10em;" type="submit" name="submit" value="Submit">
					</div>
				</form>
		</div>
	</div>
	
<?php
	include ('../footer.php');
?>


