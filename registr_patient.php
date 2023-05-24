<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 
	 
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$sex=$_POST['sex'];
	$mstatus=$_POST['mstatus'];
	$address=$_POST['address'];
	
	
	$phoneno=$_POST['phoneno'];
	$nextofin=$_POST['nextofin'];
 	$phoneno2=$_POST['phoneno2'];
	$address2=$_POST['address2'];
	
 	$dates=date('m/j/Y');
	$patient_id=rand(1,999999);
	$_SESSION['patient_id']=$patient_id;
	 $staff_id=$_SESSION['staff_id'];
	$qry = "INSERT INTO  patient VALUES('$patient_id','$fname','$lname','$sex','$mstatus','$address','$phoneno','$nextofin','$phoneno2','$address2','$dates','$staff_id')";
$result = @mysql_query($qry) or die(mysql_error());

$qry = "INSERT INTO  schedule (patient_id,date,status)VALUES('$patient_id','$dates','0')";
$result = @mysql_query($qry) or die(mysql_error());

	 
 	//Check whether the query was successful or not
	if($result) {
		 $_SESSION['regmessage']="Account Create Successifuly";
           echo header ("Location: registration.php?p=print&id=".$patient_id);
             exit;
		 
	}else {
		die("Query failed");
	}

?>