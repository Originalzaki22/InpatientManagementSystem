<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 	 
 
	 $testid=$_POST['teste'];
	 $result=$_POST['result'];
	  $staff_id=$_SESSION['staff_id'];
		$patient_id=$_SESSION['patient_id'];
		$test_no=$_SESSION['test_no'];

$querys=mysql_query("SELECT * FROM test_result  where test_id='".$testid."'");
	$count=mysql_num_rows($querys);
	if($count>0){
		$qry = "UPDATE  test_result SET result= '$result' where test_id='".$testid."'";
	$result = @mysql_query($qry) or die(mysql_error());
	}else{
		$qry = "INSERT INTO test_result(test_id,result,staff_id) VALUES('$testid','$result','$staff_id')";
	$result = @mysql_query($qry) or die(mysql_error());
	}
	//$rowr=mysql_fetch_array($querys);

	
	
	
	if($result) {
		 $_SESSION['regmessage']="Test Added Successifuly";
           echo header ("Location: Laboratory.php?p=result&tid=".$test_no);
             exit;
		 
	}else {
		die("Query failed");
	}

?>