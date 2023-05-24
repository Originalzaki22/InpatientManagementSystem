

<?php 
 require_once('config/conn.php');
$word=$_POST['word'];
$output2='<option value="">-----Select Word-----</option>';
$query=mysql_query("select * from bed WHERE word_id='$word'");
while($row=mysql_fetch_array($query)){
$output2.='<option value="'.$row['bed_id'].'">'.$row['bed_no'].'</option>';
}
echo $output2;
?>