<?php
	$root = realpath(dirname(__FILE__) . '/../../..');
	include($root . '/include/header.php');
	include($root . '/config/connection.php');
	include ('../adminNav.php'); // native to admin
	include('../adminNotifModal.php');

$connection = mysql_connect("$db_hostname","$db_username","$db_password");
				if (!$connection)
				{
					die ("No connection Established error at: " .mysql_error());
				}
				mysql_select_db($db_database,$connection);
?>

		<div class="container-fluid">
	
	<div class="col-md-12" style="background-color: #f0f0f0; margin-bottom: 8em; margin-top: 3em; padding:1em;">
	
			
			Reports from client<br />
		
			<?php
			$result2 = mysql_query("SELECT * FROM tbl_emp_reports WHERE reportStat = 'to be examined'");
			echo"
				<table class='table table-hover'>
					<thead class='tablehead'>
						<tr>
							<td>Employee Name</td>&nbsp
							<td>Description</td>&nbsp	
							<td>Client </td>&nbsp	
							<td>Reported date</td>&nbsp
							<td>Status</td>	&nbsp
							<td>Decision</td>&nbsp
							
						</tr>
					</thead>";
					while($row = mysql_fetch_array($result2)) 
					{
						$result3 = mysql_query("SELECT * FROM tbl_employee a, tbl_applicant b, tbl_basic_info c WHERE a.applicantId = b.applicantId And b.basicId = c.basicId And a.employeeId = $row[employeeId] ");
						while($row2 = mysql_fetch_array($result3)) 
						{
							$name= $row2['basicLastName']." ".$row2['basicFirstName'];
						}
						$result4 = mysql_query("SELECT * FROM tbl_client a WHERE clientId = $row[clientId] ");
						while($row3 = mysql_fetch_array($result4)) 
						{
							$cname= $row3['clientName'];
						}
						$tran = md5('transaction');
						echo "<tr>";
						echo "<td>".$name."</td>&nbsp";
						echo "<td>".$row['reportDesc']."</td>&nbsp";
						echo "<td>".$cname."</td>&nbsp";
						echo "<td>".$row['reportDate']."</td>&nbsp";	
						echo "<td>".$row['reportStat']."</td>&nbsp";	
						echo "<td><a href='Decide.php?des=y&ID=".$row['employeeId']."'>Terminate</a>
								<a href='Decide.php?des=n&ID=".$row['employeeId']."'>Void</a>
							  </td>";
						echo "</tr>";
						
						
					}

					echo "</table>";
			
					
					echo"Examined Reports From Client:";
					
					$query2 = mysql_query("SELECT * FROM tbl_emp_reports WHERE reportStat = 'examined'");
					echo"
						<table class='table table-hover'>
						<thead class='tablehead'>
						<tr>
							<td>Employee Name</td>&nbsp
							<td>Description</td>&nbsp	
							<td>Client </td>&nbsp	
							<td>Reported date</td>&nbsp
							<td>Status</td>	&nbsp
							<td>Admin Decision</td>&nbsp
							
						</tr>
					</thead>";
					
					
					while($arow = mysql_fetch_array($query2)) 
					{
						$query3 = mysql_query("SELECT * FROM tbl_employee a, tbl_applicant b, tbl_basic_info c WHERE a.applicantId = b.applicantId And b.basicId = c.basicId And a.employeeId = $arow[employeeId] ");
						while($arow2 = mysql_fetch_array($query3)) 
						{
							$name= $arow2['basicLastName']." ".$arow2['basicFirstName'];
						}
						$query4 = mysql_query("SELECT * FROM tbl_client a WHERE clientId = $arow[clientId] ");
						while($arow3 = mysql_fetch_array($query4)) 
						{
							$cname= $arow3['clientName'];
						}
						$tran = md5('transaction');
						echo "<tr>";
						echo "<td>".$name."</td>&nbsp";
						echo "<td>".$row['reportDesc']."</td>&nbsp";
						echo "<td>".$cname."</td>&nbsp";
						echo "<td>".$arow['reportDate']."</td>&nbsp";	
						echo "<td>".$arow['reportStat']."</td>&nbsp";	
						echo "<td>".$arow['adminDes']."</td>&nbsp";
						echo "</tr>";
						
						
					}

					echo "</table>";
			?>			

		</div>
		</div>

<?php
	include ('../footer.php');
?>