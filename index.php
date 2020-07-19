<?php
ob_start();
require_once("config.php");
$tbl_name="ftp";


?>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<title>Ftp Server Account Manager</title><img src="image/logo.jpg" width="400" height="128" /><br />
<br />



<?php
if(@$_GET['action']=="login"){
	$senha="demo"; //type your password here
	$pwd=$_POST['pwd'];
	  if($senha==$pwd){
		session_start();
		  $_SESSION['myusername']= "myusername";
		header("location:home.php");
	  		  
	  }else{

		  echo "Wrong Password!<br><br><a href=\"index.php\">Back</a>";
		  
		exit;
	  }
}
?>




<div class="menu">
<form action="?action=login" name="login" method="post">
<img src="image/key.gif" width="16" height="16" align="texttop" /> <span class="style1">Type your password:</span>
  <input name="pwd" type="password" class="formu" id="pwd" />
   <input name="button" type="submit" class="botao2" id="button" value="Login" />
</form>
</div>
<br />

