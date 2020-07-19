<?php
session_start();
if (!isset($_SESSION['myusername'])){
header("location:index.php");
}

require_once("config.php");
$tbl_name="infos";

$sql = "SELECT * FROM $tbl_name";
$result = $con -> query($sql);
?>
<script language="JavaScript">
	function confirmSubmit() {
	var agree=confirm("Are you sure?");
	if (agree)
		 return true;
	else
		 return false;
	}
</script>
<script src="image/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<title>Ftp Server Account Manager</title><img src="image/logo.jpg" width="400" height="128" /><br />
<br />
<div class="menu"><img src="image/delete.gif" width="16" height="16" border="0" align="texttop" /> <strong>Delete Client</strong><br />
  <br />
  <?php
  	if(@$_GET['action']=="delete"){
		$id = $_GET['id'];
		$sql = "DELETE FROM infos WHERE id='$id'";
		$result = $con -> query($sql);
		if (mysqli_affected_rows($con) > 0){
			echo "Client Removed!<br><br><a href=\"home.php\">Back</a>";
			exit;
		} else {
			echo "Error! Please try again!<br><br><a href=\"home.php\">Back</a>";
			exit;		
		}
	}
  ?>
  <div class="delete">
    <table width="98%" border="0" cellspacing="3" cellpadding="2">
    <?php while ($coluna =$result -> fetch_assoc()) { ?>
      <tr>
        <td width="71%" valign="middle" bgcolor="#F2F2F2"><div align="left"><?php echo $coluna['cliente']; ?></div></td>
        <td width="29%" valign="middle" bgcolor="#F2F2F2"><div align="center"><a href="?action=delete&id=<?php echo $coluna['id']; ?>"  onClick="return confirmSubmit()">Delete</a></div></td>
      </tr>
     <?php } ?>
    </table>
  </div>
  <br />
  <img src="image/arrow_left.gif" width="16" height="16" align="absmiddle" /> <a href="home.php">Back</a><br />
</div>
<br />
<!--INICIO CLIENTES --><br />
