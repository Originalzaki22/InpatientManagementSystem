

<?php 
 require_once('config/conn.php');
$gender=$_POST['gender'];
$output2='<option value="">-----Select Word-----</option>';
$query=mysql_query("select * from word WHERE gender='$gender'");
while($row=mysql_fetch_array($query)){
$output2.='<option value="'.$row['word_id'].'">'.$row['word'].'</option>';
}
echo $output2;
?>