 <?php if(!isset($_SESSION))session_start();
  include('header.php'); 
  require_once('config/conn.php');
  if(!isset($_SESSION['regmessage'])){
   $_SESSION['regmessage']="";
  
  }?>
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

<?php if(!isset($_GET['p'])){ echo '
<img src="images/001.jpg" align="middle" height="98%" width="98%"  />';
}else{
 $p=$_GET['p'];
 
 if($p=="record"){ 
 ?>
<style type="text/css">
table,tr,td{border:1px solid #FF6600;}
</style>
<table width="98%">
  <tr>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Sno</span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Patient Id </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">First Name </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Last Name  </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Phone No </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Date</span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Date</span></div></td>
    </tr>
  <?php $sql="SELECT * FROM  patient";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count>0){
$n=0;
while($row=mysql_fetch_array($result)){


?>
  <tr>
    <td><?php echo $n=$n+1; ?></td>
    <td><?php echo $row['patient_id']; ?></td>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['lname']; ?></td>
    <td><?php echo $row['phoneno']; ?></td>
    <td><?php echo $row['dates']; ?></td>
    <td><?php //echo $row['username']; ?></td>
    </tr>
  <?php }

}else{echo "No record found";}
?>
  <tr>
    <td colspan="7" bgcolor="#FF6600"><a href="registration.php?p=news">Add New User </a></td>
    </tr>
</table>
<?php }elseif($p=="news"){?>

<form id="form1" name="form1" method="post" action="registr_patient.php">
  <table width="53%" align="center">
    <tr>
      <td colspan="2"><div align="center" style="font-weight: bold">Patient Registration Form</div></td>
      </tr>
    <tr>
      <td>Firts Name </td>
      <td><input name="fname" type="text" id="fname" required="required" /></td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td><input name="lname" type="text" id="lname" required="required" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label>
        <select name="sex" id="sex">
          <option value=""></option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td> Marital Status </td>
      <td><select name="mstatus" id="mstatus">
          <option value="Single">Single</option>
          <option value="Married">Married</option>
        </select></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <textarea name="address" cols="40" id="address" required="required"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Phone No </td>
      <td><input name="phoneno" type="text" id="phoneno" required="required" /></td>
    </tr>
    <tr>
      <td>Next of kin </td>
      <td><input name="nextofin" type="text" id="nextofin" required="required" /></td>
    </tr>
    <tr>
      <td>Phone No </td>
      <td><input name="phoneno2" type="text" id="phoneno2" required="required" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input name="address2" type="text" id="address2" required="required" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
      <div align="center" class="style1"><?php echo $_SESSION['regmessage']; $_SESSION['regmessage']=""; ?></div></td>
      </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center">
          <input type="submit" name="Submit" value="Submit" />
          <input type="reset" name="Submit2" value="Reset" />
          </div>
      </label></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<?php }elseif($p=="update"){
?>
<form id="form2" name="form2" method="post" action="search.php">
  <table width="40%">
    <tr>
      <td colspan="2"><div align="center">Update Registration </div></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center">
          <input type="text" name="ptatientid" />
          </div>
      </label></td>
      </tr>
    <tr>
      <td colspan="2"><label></label>
        <label>
        <div align="center" class="style1"><?php echo $_SESSION['regmessage']; $_SESSION['regmessage']="";?>        </div>
        <div align="center">
          <input type="submit" name="Submit3" value="Submit" />
          <input type="reset" name="Submit4" value="Reset" />
        </div>
        </label></td>
      </tr>
  </table>
</form>
<?php }else if($p=="print"){
	$id=$_GET['id'];
	$query=mysql_query("SELECT * FROM patient WHERE patient_id='$id'");
	$row=mysql_fetch_array($query);
	


?>
 
<table width="300" border="0">
  <tr>
    <td colspan="2">The Hospital</td>
    </tr>
  <tr>
    <td colspan="2"><?php echo"PATEINT ID ". $row['patient_id'] ;?></td>
    </tr>
  <tr>
    <td width="87">Name</td>
    <td width="203"><?php echo $row['fname'] ." ".$row['lname']; ; ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $row['sex'] ;?></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><?php echo $row['mstatus'] ;?></td>
  </tr>
  <tr>
    <td>Phone No</td>
    <td><?php echo $row['phoneno'] ;?></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><?php echo $row['dates'] ;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Always Bering this card With you while visiting the Doctor.</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="button" value="Print" onclick="window.print();"/></center></td>
    </tr>
</table>

<?php 
}

}?>
</div>
 












</div>
</body>
</html>
