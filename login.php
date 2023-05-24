<?php 
 if(!isset($_SESSION))session_start();
  
   require_once('config/conn.php');
 
$username=$_POST['username'];
  $password=$_POST['password'];
	  
	//Check for duplicate login ID
$sql="SELECT * FROM   login_details WHERE username='$username' and password='".md5($_POST['password'])."'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count>0){
if($row = mysql_fetch_array($result)){
$_SESSION['userLogin']=$row['login_type'];
  $_SESSION['staff_id']=$row['staff_id'];
  
 if($_SESSION['userLogin']==1){
  echo header ("Location: administration.php");
 exit;
 }elseif($_SESSION['userLogin']==2){
  echo header ("Location: doctors.php");
 exit;
 }elseif($_SESSION['userLogin']==3){
  echo header ("Location: nurse.php");
 exit;
 }elseif($_SESSION['userLogin']==4){
  echo header ("Location: registration.php");
 exit;
 }elseif($_SESSION['userLogin']==5){
  echo header ("Location: Laboratory.php");
 exit;
 }
 
 
 
 
 
}
}else{
$_SESSION['errors']="Invalid Username Or Password";
echo header ("Location: index.php");
 exit;
}





 
?>