<?php 
 if(!isset($_SESSION))session_start();
  
   require_once('config/conn.php');
 	$dates=date('m/j/Y');
	$patient_id=$_POST['ptatientid'];  
	//Check for duplicate login ID
$sql="SELECT * FROM   patient WHERE patient_id='".$_POST['ptatientid']."'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count>0){
$qry = "INSERT INTO  schedule (patient_id,date,status)VALUES('$patient_id','$dates','0')";
$result = @mysql_query($qry) or die(mysql_error());

 
 $_SESSION['patient_id']=$_POST['ptatientid'];
 
$_SESSION['regmessage']="";
echo header ("Location: registration.php?p=print&id=".$patient_id);
 }else{
$_SESSION['regmessage']="Invalid Patient Id";
echo header ("Location: registration.php?p=update");
 exit;
}





 
?>