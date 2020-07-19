<?php
session_start();
if (!isset($_SESSION['myusername'])){
header("location:index.php");
}
require_once("config.php");
$tbl_name="infos";
$datacompleta = date("d/m/Y");

$cliente = @$_GET['id'];
$sql2 = "SELECT * FROM $tbl_name WHERE id='$cliente'";
$result = mysqli_query($con,$sql2);
$infos = mysqli_fetch_array($result);

?>


<script src="image/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<title>Ftp Server Account Manager</title><img src="image/logo.jpg" width="400" height="128" /><br />
<br />
<div class="menu">
<?php
//adiciona os dados no banco
if(@$_GET['action'] === "update"){

	$nome = strip_tags($_POST['nome']);
	$localhost = strip_tags($_POST['localhost']);
	$user = strip_tags($_POST['user']);
	$senha = strip_tags($_POST['senha']);
	$endereco = strip_tags($_POST['endereco']);
	$userc = strip_tags($_POST['userc']);
	$senhac = strip_tags($_POST['senhac']);
	$data = strip_tags($_POST['data']);
	$id = strip_tags($_POST['id']);
	
	$sql2 = "UPDATE $tbl_name SET cliente='$nome', hostname='$localhost', username='$user', password='$senha', cpanel='$endereco', c_user='$userc', c_pass='$senhac', data='$data' WHERE id='$id'";		

  $result = mysqli_query($con,$sql2);

  if (mysqli_affected_rows($con) > 0)
  {
		echo "Client Info Updated!<br><br><a href=\"home.php\">Back</a>";
		exit;	
	}else{
		echo "Error! Please try again!<br><br><a href=\"home.php\">Back</a>";
		exit;	
	}

}

?>
<form name="add" method="post" action="?action=update">
  <div class="botaoimg"></div>
  <span class="botaoimg"><img src="image/user_edit.gif" width="16" height="16" border="0" align="texttop" /> <strong>Edit Client</strong></span><br />
  <br />
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td width="17%" valign="middle"><div align="right" class="style1">Name:</div></td>
      <td width="83%" valign="middle"><input name="nome" type="text" class="formu" id="textfield7" value="<?php echo $infos['cliente']; ?>" /></td>
    </tr>
  </table>
  <br />
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#EEEEEE"><img src="image/link_go.gif" width="16" height="16" align="absmiddle" /> FTP Information:</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="2" cellpadding="2">

          <tr>
            <td width="17%" valign="middle"><div align="right" class="style1"><br />
            Localhost:</div></td>
            <td width="83%" valign="middle"><br />
            <input name="localhost" type="text" class="formu" id="localhost" value="<?php echo $infos['hostname']; ?>" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">User:</div></td>
            <td valign="middle"><input name="user" type="text" class="formu" id="user" value="<?php echo $infos['username']; ?>" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">Password:</div></td>
            <td valign="middle"><input name="senha" type="text" class="formu" id="senha" value="<?php echo $infos['password']; ?>" /></td>
          </tr>
          <tr>
            <td valign="middle">&nbsp;</td>
            <td valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><img src="image/wrench.gif" width="16" height="16" align="absmiddle" /> Control Panel:</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="17%" valign="middle"><div align="right" class="style1"><br />
            URL:</div></td>
            <td width="83%" valign="middle"><br />
                <input name="endereco" type="text" class="formu" id="endereco" value="<?php echo $infos['cpanel']; ?>" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">User:</div></td>
            <td valign="middle"><input name="userc" type="text" class="formu" id="textfield5" value="<?php echo $infos['c_user']; ?>" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">Password:</div></td>
            <td valign="middle"><input name="senhac" type="text" class="formu" id="textfield6" value="<?php echo $infos['c_pass']; ?>" /></td>
          </tr>
          <tr>
            <td valign="middle">&nbsp;</td>
            <td valign="middle"><br />
            <input name="button" type="submit" class="botao" id="button" value="Update" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
  <br />
  <img src="image/arrow_left.gif" width="16" height="16" border="0" align="absmiddle" /> 
  <a href="home.php">Back</a>
  <input name="data" type="hidden" value="<?php echo $datacompleta; ?>" />
  <input name="id" type="hidden" value="<?php echo $cliente; ?>" />
</form></div>

<br />

