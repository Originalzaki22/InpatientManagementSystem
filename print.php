 <?php if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
  include('header.php'); 
 ?>
<div id="container"> 
<hr style="border-color:#FF9933;" />       
<div id="adminframe" align="center">
<?php 
 $patient_id=$_SESSION['patient_id'] ;

  $sql="SELECT * FROM  patient  where patient_id='$patient_id'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
 
$n=0;
$row=mysql_fetch_array($result);

?>
 
  <table width="44%" align="center">
    <tr>
      <td colspan="2" bgcolor="#336666"><div align="center" style="font-weight: bold; color: #FF3300; font-size: 24px"> RAHAMA NURSING HOME CLINIC </div></td>
      </tr>
    <tr>
      <td width="37%">First Name </td>
      <td width="63%"><?php echo $row['fname']; ?></td>
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
</div>
 

</div>
</body>
</html>
