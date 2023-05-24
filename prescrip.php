<?php 
 if(!isset($_SESSION))session_start();
  
   require_once('config/conn.php');
 	$dates=date('m/j/Y');
	  $pres=rand(1,99999);
	 $_SESSION['prid']= $pres;
	//Check for duplicate login ID
	$patient_id=$_POST['search2'];
 $query = mysql_query("SELECT * FROM diagnose WHERE patient_id='$patient_id' ORDER BY diagnose_id DESC");
 $row=mysql_fetch_array($query);
 $did=$row['diagnose_id'];
 $_SESSION['prid']= $did;
$qry = "INSERT INTO  prescription(patient_id,date,staff_id,diagnose_id)VALUES ('$patient_id','$dates','".$_SESSION['staff_id']."','$did')";
$result = @mysql_query($qry) or die(mysql_error());
$_SESSION['patient_id']=$patient_id;
 $query = mysql_query("SELECT * FROM prescription WHERE diagnose_id='$did' ORDER BY prescription_id  DESC");
 $row=mysql_fetch_array($query);
 $prescription_id=$row['prescription_id'];

 for($i=1; $i<=10; $i++){
 $drug="drug".$i;
 
 $strienght="strienght".$i;
 $dose="dose".$i;
 
 $drugs=$_POST[$drug];
 
 $strienghts=$_POST[$strienght];
  $doses=$_POST[$dose];
 if(!empty($_POST[$drug])){
 $qry = "INSERT INTO  drug(prescription_id,drugs,Strength,dosage)  VALUES('$prescription_id','$drugs','$strienghts','$doses')";
$result = @mysql_query($qry) or die(mysql_error());
 
}
 }
 $_SESSION['prescription_id']=$prescription_id;
 
$_SESSION['regmessage']="";
echo header ("Location: print_presc.php");
 
 




 
?>