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
      <td colspan="2"><table width="100%" border="1">
        <tr>
          <td width="5%">Sn</td>
          <td width="70%">Drugs</td>
          <td width="14%">Strienght</td>
          <td width="11%">Dosage</td>
        </tr>
		<?php 
 $prescription_id=$_SESSION['prescription_id'] ;

  $sql="SELECT * FROM  prescription  INNER JOIN drug ON(prescription.prescription_id=drug.prescription_id) WHERE 	prescription.prescription_id='$prescription_id'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
 
$n=0;
while($row=mysql_fetch_array($result)){

?>
        <tr>
          <td><?php echo $n=$n+1; ?></td>
          <td><?php echo $row['drugs']; ?></td>
          <td><?php echo $row['Strength']; ?></td>
          <td><?php echo $row['dosage']; ?></td>
        </tr>
		<?php }?>
      </table>
        <p>'</p>
        <p>Doctor..............................................................Date...<?php echo date('j-m-Y');?></p></td>
      </tr>
  </table>
</div>
 

</div>
</body>
</html>
