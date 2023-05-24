<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 
	 $staffid=$_POST['staffid'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	
	$phoneno=$_POST['phoneno'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$title=$_POST['title'];
	$department=$_POST['department'];
	$sex=$_POST['sex'];
	 $logintype=$_POST['logintype'];
	 $sql="SELECT * FROM   login_details WHERE username='$username'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==0){
	


	$qry = "INSERT INTO  staff_details VALUES('$staffid','$title','$lname','$fname','$sex','$address','$phoneno','$department')";
	$result = @mysql_query($qry) or die(mysql_error());
	
	
	$qry = "INSERT INTO  login_details(username,password,login_type,staff_id) VALUES('$username','".md5($_POST['password'])."','$logintype','$staffid')";
$result = @mysql_query($qry) or die(mysql_error());


	}else{
	$_SESSION['regmessage']="Username Exit";
           echo header ("Location: administration.php?p=news");
             exit;
	
	}
	 
 	//Check whether the query was successful or not
	if($result) {
		 $_SESSION['regmessage']="Account Create Successifuly";
           echo header ("Location: administration.php?p=news");
             exit;
		 
	}else {
		die("Query failed");
	}

?>