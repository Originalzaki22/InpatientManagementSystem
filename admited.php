<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 	 
 $dates=date('m/j/Y');
	 $bed=$_POST['bed'];
	  $staff_id=$_SESSION['staff_id'];
		$patient_id=$_SESSION['patient_id'];
		 

	$qry = "INSERT INTO  admission(bed_id,dates,status,staff_id,patient_id) VALUES('$bed','$dates','1','$staff_id','$patient_id')";
	$result = @mysql_query($qry) or die(mysql_error());
	
	
	if($result) {
		 $_SESSION['regmessage']="Patient Admited Successifuly";
           echo header ("Location: doctors.php?p=admit");
             exit;
		 
	}else {
		die("Query failed");
	}

?>