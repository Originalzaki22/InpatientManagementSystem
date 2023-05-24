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
//$_SESSION['patient_id']=$patient_id;
$test_no=rand(1,9999);
$_SESSION['test_no']=$test_no;

  $sql="SELECT * FROM  test_table  where test_no='$patient_id'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
 if($count>0){
	 $row=mysql_fetch_array($result);
	 $_SESSION['test_no']=$row['test_no'];
	 $_SESSION['patient_id']=$row['patient_id'];
	 header('location: Laboratory.php?p=test&tid='.$row['test_no']);
 }else{
	 echo '<div align="center" class="style1">'.$_SESSION['regmessage']; $_SESSION['regmessage']="".'</div>';
	 
 }
}

?>

</div>



<?php

}else{
	$p=$_GET['p'];
	if($p=="add_result"){
		
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
}//////////////////////////////////////
	}else if($p=="test"){
		$test_no=$_SESSION['test_no'];
		$id=$_GET['tid'];
		$query=mysql_query("SELECT * FROM test_table where test_no='$id'");
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
	
<?php }
	}elseif($p=="result"){
		$query=mysql_query("SELECT * FROM test_table where patient_id='".$_SESSION['patient_id']."'");
			$count=mysql_num_rows($query);
			$sn=0;
			echo'			<table width="700" border="1">
  <tr>
    <td>SN</td>
    <td>TEST</td>
    <td>RESULT</td>
	 
  </tr>';
     $option='';
			while($rows=mysql_fetch_array($query)){
				$test_id=$rows['test_id'];
				$option.='<option value="'.$rows['test_id'].'">'.$rows['test'].'</option>';
			$querys=mysql_query("SELECT * FROM test_result  where test_id='".$test_id."'");
						$rowr=mysql_fetch_array($querys);
	$sn+=1;
echo '  <tr>
    <td>'.$sn.'</td>
    <td>'.$rows['test'].'</td>
    <td>'.$rowr['result'].'</td>
	  
  </tr>';
  }
  
   echo'<form id="form4" name="form4" method="post" action="addresult.php">
      <table width="300" border="0">
            <tr>
              <td>
			  <select name="teste" required="required">
			  <option value="">----------select ---------</option>
			  '.$option.'
			  </select>
              <textarea name="result" id="test" cols="45" rows="5" required="required"></textarea></td>
              <td><input type="submit" name="button" id="button" value="Add" /></td>
            </tr>
    </table>
        </form>';
echo '</table>';

			
		
		}else{}



 }?>
</div>
 












</div>
</body>
</html>
