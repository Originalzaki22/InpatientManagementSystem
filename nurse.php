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
} ?>
<style type="text/css">
table,tr,td{border:1px solid #FF6600;}
</style>
<form id="form1" name="form1" method="post" action="register_exc.php">
</form>
</div>
 












</div>
</body>
</html>
