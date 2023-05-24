 <?php if(!isset($_SESSION))session_start();
   
  require_once('config/conn.php');
  if(!isset($_SESSION['regmessage'])){
   $_SESSION['regmessage']="";
  
  }
  include('header.php');
  
  ?>
  <style type="text/css">
<!--
.style1 {
	color: #FF3300;
	font-style: italic;
}
-->
</style>

  
  <div id="container"> 
<hr style="border-color:#FF9933;" />     
  
  

<div id="adminframe" align="center">
<?php if(!isset($_GET['p'])){ ?>


<div id="adminframe" align="center">


<form id="form1" name="form1" method="post" action="">
  <table width="40%">
    <tr>
      <td><div align="center"><strong>Search Patient </strong></div></td>
      </tr>
    <tr>
      <td><label></label>        <label>
        <div align="center">
          <input type="text" name="search" />
          <input type="submit" name="Submit" value="Submit" />
        </div>
      </label>
      <div align="center" class="style1"><?php echo $_SESSION['regmessage']; $_SESSION['regmessage']=""; ?></div>
      </td>
      </tr>
  </table>
  
</form>
<?php 
if(isset($_POST['Submit'])){
$patient_id=$_POST['search'];
$_SESSION['patient_id']=$patient_id;
$test_no=rand(1,9999);
$_SESSION['test_no']=$test_no;
  $sql="SELECT * FROM  patient  where patient_id='$patient_id'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
 if($count>0){
	 header('location: doctors.php?p=diagnose');
 }else{
	 echo '<div align="center" class="style1">'.$_SESSION['regmessage']; $_SESSION['regmessage']="".'</div>';
	 
 }
}

?>

</div>



<?php

}else{
	$p=$_GET['p'];
if($p=="diagnose"){?>
 <?php 
 $sql="SELECT * FROM  patient  where patient_id='".$_SESSION['patient_id']."'";
$result=mysql_query($sql);
$n=0;
$row=mysql_fetch_array($result);

?>
<table width="44%" align="center">
    <tr>
      <td colspan="2" bgcolor="#336666"><div align="center" style="font-weight: bold; color: #FF3300; font-size: 24px">SPECIALIST HOSPITAL SOKOTO </div></td>
      </tr>
    <tr>
      <td>First Name </td>
      <td><?php echo $row['fname']; ?></td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td><?php echo $row['lname']; ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $row['sex']; ?></td>
    </tr>
    <tr>
      <td>phone no </td>
      <td><?php echo $row['phoneno']; ?></td>
    </tr>
    <tr>
      <td>Patien ID </td>
      <td><?php echo $row['patient_id']; ?></td>
    </tr>
    <tr>
      <td>Date</td>
      <td><?php echo $row['dates']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  
  <form id="form2" name="form2" method="post" action="diagnose.php">
    <table width="40%">
      <tr>
        <td colspan="2" bgcolor="#339966"><div align="center">DIAGNOSES</div></td>
        </tr>
      <tr>
        <td>Diagnose</td>
        <td><label>
          <textarea name="diagnose" cols="40" rows="20" id="diagnose"></textarea>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="Submit2" value="Save" />
          <input type="reset" name="Submit22" value="Reset" />
        </label></td>
      </tr>
    </table>
    </form>
   

<?php }elseif($p=="discharge"){
	
	
	?>
Click<a href="discharge.php?p=<?php echo $_SESSION['patient_id']; ?>">  HERE </a>To Discharge Patient
<?php }elseif($p=="Prescriptionss"){?>
<form id="form3" name="form3" method="post" action="prescrip.php">
  <table width="54%" border="1" bgcolor="#FFFFCC">
    <tr>
      <td colspan="4"><div align="center">PRESCRIPTIONS</div></td>
      </tr>
    <tr>
      <td>Sn</td>
      <td>DRUGS</td>
      <td>Stienght</td>
      <td>DOSAGE</td>
    </tr>
    <tr>
      <td width="6%">1</td>
      <td width="47%"><label>
        <input name="drug1" type="text" id="drug1" size="47" />
      </label></td>
      <td width="24%"><label>
        <input name="strienght1" type="text" id="strienght1" size="10" />
      </label></td>
      <td width="23%"><input name="dose1" type="text" id="dose1" size="10" /></td>
    </tr>
    <tr>
      <td>2</td>
      <td><input name="drug2" type="text" id="drug2" size="47" /></td>
      <td><input name="strienght2" type="text" id="strienght2" size="10" /></td>
      <td><input name="dose2" type="text" id="dose2" size="10" /></td>
    </tr>
    <tr>
      <td>3</td>
      <td><input name="drug3" type="text" id="drug3" size="47" /></td>
      <td><input name="strienght3" type="text" id="strienght3" size="10" /></td>
      <td><input name="dose3" type="text" id="dose3" size="10" /></td>
    </tr>
    <tr>
      <td>4</td>
      <td><input name="drug4" type="text" id="drug4" size="47" /></td>
      <td><input name="strienght4" type="text" id="strienght4" size="10" /></td>
      <td><input name="dose4" type="text" id="dose4" size="10" /></td>
    </tr>
    <tr>
      <td>5</td>
      <td><input name="drug5" type="text" id="drug5" size="47" /></td>
      <td><input name="strienght5" type="text" id="strienght5" size="10" /></td>
      <td><input name="dose5" type="text" id="dose5" size="10" /></td>
    </tr>
    <tr>
      <td>6</td>
      <td><input name="drug6" type="text" id="drug6" size="47" /></td>
      <td><input name="strienght6" type="text" id="strienght6" size="10" /></td>
      <td><input name="dose6" type="text" id="dose6" size="10" /></td>
    </tr>
    <tr>
      <td>7</td>
      <td><input name="drug7" type="text" id="drug7" size="47" /></td>
      <td><input name="strienght7" type="text" id="strienght7" size="10" /></td>
      <td><input name="dose7" type="text" id="dose7" size="10" /></td>
    </tr>
    <tr>
      <td>8</td>
      <td><input name="drug8" type="text" id="drug8" size="47" /></td>
      <td><input name="strienght8" type="text" id="strienght8" size="10" /></td>
      <td><input name="dose8" type="text" id="dose8" size="10" /></td>
    </tr>
    <tr>
      <td>9</td>
      <td><input name="drug9" type="text" id="drug9" size="47" /></td>
      <td><input name="strienght9" type="text" id="strienght9" size="10" /></td>
      <td><input name="dose9" type="text" id="dose9" size="10" /></td>
    </tr>
    <tr>
      <td>10</td>
      <td><input name="drug10" type="text" id="drug10" size="47" /></td>
      <td><input name="strienght10" type="text" id="strienght10" size="10" /></td>
      <td><input name="dose10" type="text" id="dose10" size="10" /></td>
    </tr>
    <tr>
      <td></td>
      <td><div align="center"><strong>Patient </strong><input type="text" name="search2" required="required" pattern="[0-9]*" /></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <div align="right">
          <input type="submit" name="Submit3" value="Submit" />
          <input type="reset" name="Submit4" value="Reset" />
          </div>
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php }elseif($p=="record"){
	$patient_id=$_SESSION['patient_id'];
   ?>
	<table width="643" border="0">
  <tr>
    <td width="80"></td>
    <td width="553"> </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="2">
    
   
    
    </td>
  </tr>
 
  <tr>
    <td colspan="2">
    
    <table width="90%" border="1">
      <tr>
        <td width="13%">SN</td>
        <td width="44%">DRUGS</td>
        <td width="22%">Strength</td>
        <td width="21%">Dosage</td>
        <td width="21%">Date</td>
      </tr>
        <?php 
		$sn=0;
  $sql="SELECT * FROM  diagnose INNER JOIN prescription ON(diagnose.diagnose_id=prescription.diagnose_id) INNER JOIN drug ON(prescription.prescription_id=drug.prescription_id) where diagnose.patient_id ='".$patient_id."'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count>0 ){
     
while($row2=mysql_fetch_array($result)){
$sn+=1;


?>
      <tr>
        <td><?php echo $sn; ?></td>
        <td><?php echo $row2['drugs']; ?></td>
        <td><?php echo $row2['Strength']; ?></td>
        <td><?php echo $row2['dosage'] ;?></td>
         <td><?php echo $row2['date'] ;?></td>
      </tr>
      
     <?php }


}?>
    </table></td>
    </tr>
</table>

    
    <?php
	}elseif($p=="test"){
		
		?>
    <form id="form4" name="form4" method="post" action="test.php">
      <table width="300" border="0">
            <tr>
              <td><label for="test"></label>
              <textarea name="test" id="test" cols="45" rows="5" required="required"></textarea></td>
              <td><input type="submit" name="button" id="button" value="Add" /></td>
            </tr>
    </table>
        </form>
<?php
if(isset($_SESSION['test_no'])){
	$test_no=$_SESSION['test_no'];
}else{
	$test_no="";
}
$query=mysql_query("SELECT * FROM test_table where test_no='$test_no' ");
$count=mysql_num_rows($query);
if($count>0){
	$sn=0;
	
	?>
	<table width="300" border="1">
  <tr>
    <td>SM</td>
    <td>Test</td>
    <td>&nbsp;</td>
  </tr>
  <?php while($rows=mysql_fetch_array($query)){$sn+=1;?>
  <tr>
    <td><?php echo $sn; ?></td>
    <td><?php echo $rows['test']; ?></td>
    <td>&nbsp;</td>
  </tr>
 <?php } ?>
 <tr>
 <td colspan="3" align="center"><a href="print_test.php?p=<?php echo $test_no; ?>" target="_blank" >Print</a></td>
 </tr>
</table>
<?php
}
	}elseif($p=="result"){
		$query=mysql_query("SELECT * FROM test_table INNER JOIN test_result ON(test_table.test_id=test_result.test_id) where patient_id='".$_SESSION['patient_id']."'");
			$count=mysql_num_rows($query);
			$sn=0;
			echo'			<table width="700" border="1">
  <tr>
    <td>SN</td>
    <td>TEST</td>
    <td>RESULT</td>
  </tr>';
			while($rows=mysql_fetch_array($query)){
	$sn+=1;
echo '  <tr>
    <td>'.$sn.'</td>
    <td>'.$rows['test'].'</td>
    <td>'.$rows['result'].'</td>
  </tr>';}
echo '</table>';

			
		
		}elseif($p=="admit"){
			?>
            
            <form action="admited.php" method="post" name="formad">
            <table width="300" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><label for="select"></label>
      <select name="sex" id="gender" required="required">
        <option value="">---------select-------</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select></td>
  </tr>
  <tr>
    <td>Word</td>
    <td><select name="word" id="word" required="required">
    <option value=""></option>
    </select></td>
  </tr>
  <tr>
    <td>Bed</td>
    <td><select name="bed" id="bed" required="required">
    <option value=""></option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button2" id="button2" value="Submit" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <div align="center" class="style1"><?php echo $_SESSION['regmessage']; $_SESSION['regmessage']=""; ?></div>
</table>

            </form>
            <?php
			
			}else{}



 }?>
</div>
 












</div>
</body>
</html>
