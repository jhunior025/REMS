<?php
	$root = realpath(dirname(__FILE__) . '/../../..');
	include($root . '/include/header.php');
	include($root . '/config/connection.php');
	include ('../adminNav.php'); // native to admin
	include('../adminNotifModal.php');
?>

	<script type="text/javascript">  
	 
	function doCalc(form) {  
	   
			  form.criteria_percentageLeft.value = "100";
			  
			  form.criteria_gender.value = form.criteria_gender.value.replace('%','');
			  form.criteria_age.value = form.criteria_age.value.replace('%','');
			  form.criteria_civilStatus.value = form.criteria_civilStatus.value.replace('%','');
			  form.criteria_expectedSalary.value = form.criteria_expectedSalary.value.replace('%','');
			  form.criteria_religion.value = form.criteria_religion.value.replace('%','');
			  form.criteria_nationality.value = form.criteria_nationality.value.replace('%','');
			  form.criteria_height.value = form.criteria_height.value.replace('%','');
			  form.criteria_weight.value = form.criteria_weight.value.replace('%','');
			  form.criteria_language.value = form.criteria_language.value.replace('%','');
			  form.criteria_quality.value = form.criteria_quality.value.replace('%','');
			  
			 
			  //gender
			  if (!isNaN(form.criteria_gender.value) && (form.criteria_gender.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_gender.value);  
				form.criteria_gender.value = form.criteria_gender.value +"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for gender.");
			  }
			  
			  //age
			  if (!isNaN(form.criteria_age.value) && (form.criteria_age.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_age.value);  
				form.criteria_age.value = form.criteria_age.value +"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for age.");
			  }
			  
			  
			  //civil status
			  if (!isNaN(form.criteria_civilStatus.value) && (form.criteria_civilStatus.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_civilStatus.value);  
				form.criteria_civilStatus.value = form.criteria_civilStatus.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for civil status.");
			  }
			  
			  //expected salary
			  if (!isNaN(form.criteria_expectedSalary.value) && (form.criteria_expectedSalary.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_expectedSalary.value);  
				form.criteria_expectedSalary.value = form.criteria_expectedSalary.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for expected salary.");
			  }
			  
			  //religion
			  if (!isNaN(form.criteria_religion.value) && (form.criteria_religion.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_religion.value);  
				form.criteria_religion.value = form.criteria_religion.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for religion.");
			  }
			  
			  //nationality
			  if (!isNaN(form.criteria_nationality.value) && (form.criteria_nationality.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_nationality.value); 
				form.criteria_nationality.value = form.criteria_nationality.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for nationality.");
			  }
			  
			  //height
			  if (!isNaN(form.criteria_height.value) && (form.criteria_height.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_height.value);  
				form.criteria_height.value = form.criteria_height.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for height.");
			  }
			  
			  //weight
			  if (!isNaN(form.criteria_weight.value) && (form.criteria_weight.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_weight.value); 
				form.criteria_weight.value= form.criteria_weight.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for weight.");
			  }
			  
			  
			  //language
			  if (!isNaN(form.criteria_language.value) && (form.criteria_language.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_language.value); 
				form.criteria_language.value = form.criteria_language.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for language.");
			  }
			  
			  //quality
			  if (!isNaN(form.criteria_quality.value) && (form.criteria_quality.value!=""))
			  {
				form.criteria_percentageLeft.value = parseFloat(form.criteria_percentageLeft.value) - parseFloat(form.criteria_quality.value);
				form.criteria_quality.value = form.criteria_quality.value+"%";
			  }
			  else
			  {
				alert("Please enter a valid percentage for quality.");
			  }
			  
			  form.criteria_percentageLeft.value = form.criteria_percentageLeft.value+"%";
	}//function  
	
	function validation() {

		if (document.getElementById('criteria_percentageLeft').value != "0%")
		{
			alert("Please allocate all the percentage properly.");
			return false;
		}
		
		
	}// validation

	</script>  

	<div class='container-fluid content'>
		<ul class="breadcrumb">
		    <li>Maintenace</li>
		    <li><a href="#">Job Posting</a></li>
		    <li class="active">Add Job</li>
		</ul>
	</div>

	
	<?php
	$con = mysql_connect("$db_hostname","$db_username","$db_password");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error()); 
				}
				//for the jobs
	mysql_select_db("$db_database", $con);
	
	//declaration
	$jobAgeFrom = "";
	$jobAgeTo = "";
	$jobGender = "-";
	$jobCivilStatus = "-";
	$jobHeight = "-";
	$jobHeightFrom = "";
	$jobHeightTo = "";
	$jobWeight = "-";
	$jobWeightFrom = "";
	$jobWeightTo = "";
	$jobReligion = "-";
	$jobNationality = "-";
	$jobExpectedSalary = "";
	
	
	
	$jobAgeToPercent = "0";
	$jobGenderPercent = "0";
	$jobCivilStatusPercent = "0";
	$jobHeightPercent = "0";
	$jobWeightPercent = "0";
	$jobReligionPercent = "0";
	$jobNationalityPercent = "0";
	$jobExpectedSalaryPercent = "0";
	
	$jobLanguages = array();
	$jobQualities = array();
	
	$totalJobLanguages = 0;
	$totalJobQualities = 0;
	$percentageLeft = 100;
	
	$totalPercentLanguage = "";
	$totalPercentQuality  = "";
	
	//-------------------- Job Qualifications ---------------------
		if (isset($_SESSION['ses_jobPostingID']))
		{
		
			$resultCtr = "";
			$varResult = "";
			$result = mysql_query("SELECT * 
														FROM tbl_job_quali
														WHERE jobPostingId = $_SESSION[ses_jobPostingID]
														AND (jobQualiNewlyAdded != 'Yes' 
														OR  jobQualiNewlyAdded IS NULL)
														and jobQualiType = 'Language'
														 ");
														 
									while($row = mysql_fetch_array($result)) 
									{
									
										$varResult = $row['jobQualiPercent'];
									}
			$resultCtr = mysql_num_rows($result);	

			echo" ctr: $resultCtr varResult: $varResult";
			$totalPercentLanguage = floatval($resultCtr) * floatval($varResult);
			$totalPercentLanguage = round(floatval($totalPercentLanguage));
			echo" total: $totalPercentLanguage";
			
		
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

			$totalPercentQuality = floatval($resultCtr) * floatval($varResult);
			$totalPercentQuality = round(floatval($totalPercentQuality));
				
		
			$resultJob = mysql_query("SELECT *
									  FROM  tbl_job_quali
									  WHERE jobPostingId = $_SESSION[ses_jobPostingID]
									");
													
			while($rowJob = mysql_fetch_array($resultJob)) 
			{
				//age
				if ($rowJob['jobQualiType']=='Age From')
				$jobAgeFrom = $rowJob['jobQualiDescription'];
				
				if ($rowJob['jobQualiType']=='Age To')
				{
				$jobAgeTo = $rowJob['jobQualiDescription'];
				$jobAgeToPercent = $rowJob['jobQualiPercent'];
				}
				
				if ($rowJob['jobQualiType']=='Gender')
				{
				$jobGender = $rowJob['jobQualiDescription'];
				$jobGenderPercent =  $rowJob['jobQualiPercent'];
				}
				
				if ($rowJob['jobQualiType']=='Civil Status')
				{
				$jobCivilStatus = $rowJob['jobQualiDescription'];
				$jobCivilStatusPercent =  $rowJob['jobQualiPercent'];
				}
				
				if ($rowJob['jobQualiType']=='Height')
				{
				$jobHeight =  $rowJob['jobQualiDescription'];
				$jobHeightPercent =  $rowJob['jobQualiPercent'];
				}
				
				if ($rowJob['jobQualiType']=='Height From')
				$jobHeightFrom =  $rowJob['jobQualiDescription'];
				
				if ($rowJob['jobQualiType']=='Height To')
				$jobHeightTo =  $rowJob['jobQualiDescription'];
				
				if ($rowJob['jobQualiType']=='Weight')
				{
				$jobWeight =  $rowJob['jobQualiDescription'];
				$jobWeightPercent =  $rowJob['jobQualiPercent'];
				}
				
				if ($rowJob['jobQualiType']=='Weight From')
				$jobWeightFrom =  $rowJob['jobQualiDescription'];
				
				if ($rowJob['jobQualiType']=='Weight To')
				$jobWeightTo =  $rowJob['jobQualiDescription'];
				
				if ($rowJob['jobQualiType']=='Religion')
				{
				$jobReligion = $rowJob['jobQualiDescription'];
				$jobReligionPercent =  $rowJob['jobQualiPercent'];
				}
				
				if ($rowJob['jobQualiType']=='Nationality')
				{
				$jobNationality = $rowJob['jobQualiDescription'];
				$jobNationalityPercent =  $rowJob['jobQualiPercent'];
				}
				
				if($rowJob['jobQualiType']=='Expected Salary')
				{
				$jobExpectedSalary = $rowJob['jobQualiDescription'];
				$jobExpectedSalaryPercent = $rowJob['jobQualiPercent'];
				}
				
			}//while
			// ------------------------------------------------------------
		
		}//if	
			
	?>
<div class="container-fluid">
	<form method="POST" action="../../../config/updateJobCriteria.php" onSubmit="return validation();">
		<div class="col-md-12" style="background-color: #f0f0f0; margin-bottom: 8em; margin-top: 3em; padding:1em;">
		
			<h2>Set the Criteria for Pairing</h2>
			
			
			<br />
			
			
				<div class="form-group col-md-12">
				
				<div class="form-group col-md-7">
				<!--empty-->
				</div>
				
				
				<div class="form-group col-md-3">
					<h4>Percentage to be Allocated:</h4>
					<input type="text" 
						class="form-control" 
						name="criteria_percentageLeft" 
						id="criteria_percentageLeft"
						value='0%'
						maxlength="5" 
						placeholder="Percentage"
						disabled
					/>
				</div>
				
				<div class="form-group col-md-2">
				<!--empty-->
				</div>
				
			</div>
			
			<div class="form-group col-md-12">
				
			</div>
			
			<div class="form-group col-md-12">
				
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Gender:</label>
					<h5><?php echo"$jobGender"; ?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Gender:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_gender" 
						id="criteria_gender"
						value="<?php echo $jobGenderPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			<div class="form-group col-md-12">
			
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Age:</label>
					<h5><?php echo"$jobAgeFrom yrs. old - $jobAgeTo yrs. old "; ?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Age:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_age" 
						id="criteria_age"
						value="<?php echo $jobAgeToPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			
			<div class="form-group col-md-12">
				
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Civil Status:</label>
					<h5><?php echo"$jobCivilStatus"; ?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Civil Status:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_civilStatus" 
						id="criteria_civilStatus"
						value="<?php echo $jobCivilStatusPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			<div class="form-group col-md-12">
				
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Expected Monthly Salary:</label>
					<h5><?php echo"$jobExpectedSalary"; ?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Expected Salary:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_expectedSalary" 
						id="criteria_expectedSalary"
						value="<?php echo $jobExpectedSalaryPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			<div class="form-group col-md-12">
				
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Religion:</label>
					<h5><?php echo"$jobReligion"; ?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Religion:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_religion" 
						id="criteria_religion"
						value="<?php echo $jobReligionPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			<div class="form-group col-md-12">
				
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Nationality:</label>
					<h5><?php echo"$jobNationality"; ?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Nationality:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_nationality" 
						id="criteria_nationality"
						value="<?php echo $jobNationalityPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			<div class="form-group col-md-12">
			
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Height:</label>
					<h5><?php 
						if($jobHeight=='any') 
						{		
							echo"Any";
						}
						else
						{
							echo"$jobHeightFrom cm - $jobHeightTo cm ";
						}
						?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Height:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_height" 
						id="criteria_height"
						value="<?php echo $jobHeightPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
				
			</div>
			
			
			<div class="form-group col-md-12">
			
				<div class="form-group col-md-1">
				<!--empty-->
				</div>
				
				<div class="form-group col-md-6">
					<label>Weight:</label>
					<h5><?php 
						if($jobWeight=='any') 
						{		
							echo"Any";
						}
						else
						{
							echo"$jobWeightFrom kg - $jobWeightTo kg";
						}
						?></h5>
				</div>
				
				<div class="form-group col-md-2">
					<label>Percentage for Weight:</label>
					<input type="text" 
						class="form-control" 
						onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
						name="criteria_weight" 
						id="criteria_weight"
						value="<?php echo $jobWeightPercent.'%'; ?>"
						maxlength="5" 
						placeholder="Percentage"
						onkeyup="doCalc(this.form)"
					/>
				</div>
				
				<div class="form-group col-md-3">
				<!--empty-->
				</div>
			</div>
			
			<?php
				if (isset($_SESSION['ses_jobPostingID']))
				{
				//language	
					$resultJobLanguages = mysql_query("SELECT *
														FROM  tbl_job_quali 
														WHERE jobQualiType = 'Language'
														AND (jobQualiNewlyAdded != 'yes' 
														OR  jobQualiNewlyAdded IS NULL)
														AND jobPostingId = $_SESSION[ses_jobPostingID]
														");
						
								
							$ctr=0; 	// counter
							
							while($rowJobLanguages = mysql_fetch_array($resultJobLanguages)) 
							{
								$jobLanguages[$ctr] = $rowJobLanguages['jobQualiDescription'];
								$ctr++;
							}
											
							$ctr--;
							$totalJobLanguages = $ctr;  // counting starts at 0
							
							$ctr=0; 
							echo"
							<div class='form-group col-md-12'>
				
								<div class='form-group col-md-1'>
								</div>
										
								<div class='form-group col-md-6'>
									<label>Language/s:</label> 
									";
									while ($ctr <= $totalJobLanguages)
									{
										echo"<h5>$jobLanguages[$ctr]</h5>";
										$ctr++; 
									}//while
			?>
								</div>
										
								<div class='form-group col-md-2'>
											<label>Percentage for Language:</label>
											<input type='text' 
												class='form-control'
												onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"												
												name='criteria_language' 
												id='criteria_language'
												value="<?php echo $totalPercentLanguage."%"; ?>"
												maxlength='5' 
												placeholder='Percentage'
												onkeyup='doCalc(this.form)'
											/>
								</div>
										
								<div class='form-group col-md-3'>
										
								</div>
							</div>
							
								
								
								
								
							
			<?php	

				//qualities
					$resultJobQualities = mysql_query("SELECT *
														FROM  tbl_job_quali
														WHERE jobQualiType = 'quality'
														AND (jobQualiNewlyAdded != 'yes' 
														OR  jobQualiNewlyAdded IS NULL)
														AND jobPostingId = $_SESSION[ses_jobPostingID]
														");
						
								
							$ctr=0; 	// counter
							
							while($rowJobQualities = mysql_fetch_array($resultJobQualities)) 
							{
								$jobQualities[$ctr] = $rowJobQualities['jobQualiDescription'];
								$ctr++;
							}
											
							$ctr--;
							$totalJobQualities = $ctr;  // counting starts at 0
							
							
							$ctr=0; 
							echo"
							<div class='form-group col-md-12'>
				
								<div class='form-group col-md-1'>
								</div>
										
								<div class='form-group col-md-6'>
									<label>Qualities:</label> 
									";
									while ($ctr <= $totalJobQualities)
									{
										echo"<h5>$jobQualities[$ctr]</h5>";
										$ctr++; 
									}//while
			?>						
								</div>
										
								<div class='form-group col-md-2'>
											<label>Percentage for Quality:</label>
											<input type='text' 
												class='form-control' 
												onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
												name='criteria_quality' 
												id='criteria_quality'
												value="<?php echo $totalPercentQuality."%"; ?>"
												maxlength='5' 
												placeholder='Percentage'
												onkeyup='doCalc(this.form)'
											/>
								</div>
										
								<div class='form-group col-md-3'>
										
								</div>
							</div>
							
			<?php
				}//if 
				else
				{
					echo"
					<div class='form-group col-md-12'>
				
						<div class='form-group col-md-1'>
						</div>
						
						<div class='form-group col-md-6'>
							<label>Languages:</label>
							<h5>-</h5>
						</div>
			";
			?>
						<div class='form-group col-md-2'>
							<label>Percentage for Languages:</label>
							<input type='text' 
								class='form-control' 
								onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
								name='criteria_language' 
								id='criteria_language'
								
								placeholder='Percentage'
								onkeyup='doCalc(this.form)'
							/>
						</div>
						
						<div class='form-group col-md-3'>
						</div>
					</div>
			<?php
					echo"
					<div class='form-group col-md-12'>
				
						<div class='form-group col-md-1'>
						</div>
						
						<div class='form-group col-md-6'>
							<label>Qualities:</label>
							<h5>-</h5>
						</div>
			";
			?>
						<div class='form-group col-md-2'>
							<label>Percentage for Qualities:</label>
							<input type='text' 
								class='form-control' 
								onfocus="javascript:this.value=''" onblur="javascript: if(this.value==''){this.value='0%';}"
								name='criteria_quality' 
								id='criteria_quality'
								value="<?php echo $totalPercentQuality.'%'; ?>"
								maxlength='5' 
								placeholder='Percentage'
								onkeyup='doCalc(this.form)'
							/>
						</div>
						
						<div class='form-group col-md-3'>
						</div>
					</div>
			<?php		
				}//else
			?>
					<div class="form-group col-md-12">
						
						<div class='form-group col-md-9'>
						</div>
						
							<div class="form-group col-md-2">
							<input class="btn btn-primary glyphicon glyphicon-search form-control"  type="submit" name = "submitForm" id = "submitForm" value="Submit" style="margin-top: 2em;" />
							</div>
							
							
						<div class='form-group col-md-1'>
						</div>
							
						
						
							
						
					</div>
		</div>
		
	</form> 
</div>
		

<?php
	include ('../footer.php');
?>