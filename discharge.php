<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 	 
 $dates=date('m/j/Y');
	 
	  $staff_id=$_SESSION['staff_id'];
		$patient_id=$_SESSION['patient_id'];
		 
$query=mysql_query("SELECT * FROM admission WHERE patient_id='".$_SESSION['patient_id']."' AND status='1'");
	$count=mysql_num_rows($query);
	$row=mysql_fetch_array($query);
	
	
	$query=mysql_query("UPDATE  admission SET status='0' WHERE patient_id='".$_SESSION['patient_id']."'");
	
		$qry = "INSERT INTO  discharge(staff_id,admission_id) VALUES('$staff_id','".$row['admission_id']."')";
	$result = @mysql_query($qry) or die(mysql_error());
	
	
	if($result) {
		 $_SESSION['regmessage']="Patient Admited Successifuly";
           echo header ("Location: doctors.php?p=diagnose");
             exit;
		 
	}else {
		die("Query failed");
	}

?>