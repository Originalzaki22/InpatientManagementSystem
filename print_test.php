 <?php if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 
 ?>
<div id="container"> 
<hr style="border-color:#FF9933;" />       
<div id="adminframe" align="center">
<?php
$test_no=$_GET['p'];
 $query=mysql_query("SELECT * FROM test_table where test_no='$test_no' ");
$count=mysql_num_rows($query);
if($count>0){
	$sn=0;
	echo $test_no;
	?> 
	<table width="300" border="1">
    <div align="center" style="font-weight: bold; color: #FF3300; font-size: 24px"> RAHAMA NURSING HOME CLINIC </div>
  <tr>
    <td>SM</td>
    <td>Test</td>
    
  </tr>
  <?php while($rows=mysql_fetch_array($query)){$sn+=1;?>
  <tr>
    <td><?php echo $sn; ?></td>
    <td><?php echo $rows['test']; ?></td>
   
  </tr>
 <?php } 
 
}?>
 <tr>
 <td colspan="2" align="center"><a href="#" onclick="window.print();" >Print</a></td>
 </tr>
</table>
 
  
</div>

</div>
</body>
</html>
