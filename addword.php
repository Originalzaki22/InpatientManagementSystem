<?php 
if(!isset($_SESSION))session_start();
  require_once('config/conn.php');
 	 
 
	 $word=$_POST['word'];
		$wno=$_POST['wno'];
		$sex=$_POST['sex'];

	$qry = "INSERT INTO word(word,gender,capacity) VALUES('$word','$sex','$wno')";
	$result = @mysql_query($qry) or die(mysql_error());
	
	
	$qry = "SELECT * FROM word ORDER BY word_id DESC";
	$result = @mysql_query($qry);
	$row=mysql_fetch_array($result);
	$word_id=$row['word_id'];
	for($i=1; $i<=$wno; $i++){
		
	$qry = "INSERT INTO bed (word_id,bed_no) VALUES('$word_id','$i')";
	$result = @mysql_query($qry) or die(mysql_error());
	}
	
	if($result) {
		 $_SESSION['regmessage']="Word Added Successifuly";
           echo header ("Location: administration.php?p=word");
             exit;
		 
	}else {
		die("Query failed");
	}

?>