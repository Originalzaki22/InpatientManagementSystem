<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 	 
 
	 $test=$_POST['test'];
	  $staff_id=$_SESSION['staff_id'];
		$patient_id=$_SESSION['patient_id'];
		$test_no=$_SESSION['test_no'];

	$qry = "INSERT INTO  test_table(patient_id,test,staff_id,test_no) VALUES('$patient_id','$test','$staff_id','$test_no')";
	$result = @mysql_query($qry) or die(mysql_error());
	
	
	if($result) {
		 $_SESSION['regmessage']="Test Added Successifuly";
           echo header ("Location: doctors.php?p=test");
             exit;
		 
	}else {
		die("Query failed");
	}

?>