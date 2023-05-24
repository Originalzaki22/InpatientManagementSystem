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

if(($p=="staff")||($p=="doctor")||($p=="nurse")||($p=="staff")){

if($p=="staff"){$staff=4;}elseif($p=="doctor"){$staff=2;}elseif($p=="nurse"){$staff=3;}?>
<style type="text/css">
table,tr,td{border:1px solid #FF6600;}
</style>
<table width="98%">
  <tr>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Sno</span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Staff Id </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">First Name </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Last Name  </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">Phone No </span></div></td>
    <td bgcolor="#FF6600"><div align="center" style="color: #FFFFFF"><span style="font-weight: bold">email</span></div></td>
    </tr>
  <?php $sql="SELECT * FROM  staff_details ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count>0){
$n=0;
while($row=mysql_fetch_array($result)){


?>
  <tr>
    <td><?php echo $n=$n+1; ?></td>
    <td><?php echo $row['staff_id']; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['phoneno']; ?></td>
    <td><?php //echo $row['email']; ?></td>
    </tr>
  <?php }

}else{echo "No record found";}
?>
  <tr>
    <td colspan="6" bgcolor="#FF6600"><a href="administration.php?p=news">Add New User </a></td>
    </tr>
</table>
<?php }elseif($p=="news"){?>

<form id="form1" name="form1" method="post" action="register_exc.php">
  <table width="53%" align="center">
    <tr>
      <td colspan="2"><div align="center" style="font-weight: bold">New User Form </div></td>
      </tr>
    <tr>
      <td>Staff ID </td>
      <td><label>
        <input name="staffid" type="text" id="staffid" required="required" />
      </label></td>
    </tr>
    <tr>
      <td>Title</td>
      <td><label>
        <select name="title" id="title">
          <option value="Mr">Mr</option>
          <option value="Mrs">Mrs</option>
          <option value="Dr">Dr</option>
          <option value="Nurse">Nurse</option>
        </select>
      </label></td>
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
      <td>Address</td>
      <td><textarea name="address" cols="40" id="address" required="required"></textarea></td>
    </tr>
    <tr>
      <td>Phone No </td>
      <td><input name="phoneno" type="text" id="phoneno" required="required" /></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input name="username" type="text" id="username" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="password" type="text" id="password" required="required" /></td>
    </tr>
    <tr>
      <td>Re-Password</td>
      <td><input name="password2" type="text" id="password2" required="required" /></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label>
        <select name="department" id="specialist" required="required">
          <option value="">Select </option>
          <?php $sql="SELECT * from departments ";
$result=mysql_query($sql);

 while ($row = mysql_fetch_array($result)){
 
 //echo $row['department'] ." ". $row['id'];
 echo '<option value="'.$row['id'].'">'.$row['department'].'</option>';
	  }
	 ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>Login Type </td>
      <td><select name="logintype" id="logintype">
        <option value=" "></option>
        <option value="1">Admin</option>
        <option value="2">Doctor</option>
        <option value="3">Nurse</option>
        <option value="4">Staff</option>
        <option value="5">Lab Tech</option>
            </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
      <div align="center" class="style1"><?php echo $_SESSION['regmessage']; $_SESSION['regmessage']=""; ?></div>
      </td>
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
<?php }elseif($p=="patient"){?> <table width="98%">
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
    <td colspan="7" bgcolor="#FF6600"><a href="registration.php?p=news"></a></td>
    </tr>
</table>
<?php }elseif($p=="word"){
?>
<form action="addword.php" method="post" name="formword">
<table width="300" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Word</td>
    <td><label for="word"></label>
      <input type="text" name="word" id="word" required="required" pattern="[A-Za-z ]*"/></td>
  </tr>
  <tr>
    <td>Number Of Bed</td>
    <td><input type="text" name="wno"  maxlength="3"id="wno" required="required" pattern="[0-9]*"/></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><label>
      <select name="sex" id="sex" required="required">
        <option value="">-------Select-------</option>
        <option value="2">Female</option>
        <option value="1">Male</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
          <div align="center" class="style1"><?php echo $_SESSION['regmessage']; $_SESSION['regmessage']=""; ?></div>

</table>

</form>
<?php
	
	
	
}}?>
</div>
 












</div>
</body>
</html>
