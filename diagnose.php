<?php 
 if(!isset($_SESSION))session_start();
  
   require_once('config/conn.php');
 	$dates=date('m/j/Y');
	  
	//Check for duplicate login ID
 
$qry = "INSERT INTO  diagnose (patient_id,diagnose,date,staff_id) VALUES('".$_SESSION['patient_id']."','".$_POST['diagnose']."','$dates','".$_SESSION['staff_id']."')";
$result = @mysql_query($qry) or die(mysql_error());

 
 
$_SESSION['regmessage']="Saved";
echo header ("Location: doctors.php");
 
 




 
?>