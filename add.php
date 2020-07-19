<?php
session_start();
if (!isset($_SESSION['myusername'])) {
header("location:index.php");
}

require_once("config.php");
$tbl_name="infos";
$datacompleta = date("d/m/Y");
?>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<title>Ftp Server Account Manager</title><img src="image/logo.jpg" width="400" height="128" /><br />
<br />
<div class="menu">


<?php
//add data to the bank
if(@$_GET['action'] === "add"){

	$nome = strip_tags($_POST['nome']);
	$localhost = strip_tags($_POST['localhost']);
	$user = strip_tags($_POST['user']);
	$senha = strip_tags($_POST['senha']);
	$endereco = strip_tags($_POST['endereco']);
	$userc = strip_tags($_POST['userc']);
	$senhac = strip_tags($_POST['senhac']);
	$data = strip_tags($_POST['data']);
	

       $sql = "INSERT INTO $tbl_name(`cliente`, `hostname`, `username`, `password`, `cpanel`, `c_user`, `c_pass`, `data`) 
                VALUES ('$nome','$localhost','$user','$senha','$endereco','$userc','$senhac','$data')";
       
        
  $result = mysqli_query($con,$sql);

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
    
<form name="add" method="post" action="?action=add">
  <div class="botaoimg"></div>
  <span class="botaoimg"><img src="image/user_add.gif" width="16" height="16" border="0" align="texttop" /> <strong>Add New Client</strong></span><br />
  <br />
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td width="17%" valign="middle"><div align="right" class="style1">Name:</div></td>
      <td width="83%" valign="middle"><input name="nome" type="text" class="formu" id="textfield7" /></td>
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
            <input name="localhost" type="text" class="formu" id="localhost" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">User:</div></td>
            <td valign="middle"><input name="user" type="text" class="formu" id="user" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">Password:</div></td>
            <td valign="middle"><input name="senha" type="text" class="formu" id="senha" /></td>
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
                <input name="endereco" type="text" class="formu" id="endereco" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">User:</div></td>
            <td valign="middle"><input name="userc" type="text" class="formu" id="textfield5" /></td>
          </tr>
          <tr>
            <td valign="middle"><div align="right" class="style1">Password:</div></td>
            <td valign="middle"><input name="senhac" type="text" class="formu" id="textfield6" /></td>
          </tr>
          <tr>
            <td valign="middle">&nbsp;</td>
            <td valign="middle"><br />
            <input name="button" type="submit" class="botao" id="button" value="Save" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
  <br />
  <img src="image/arrow_left.gif" width="16" height="16" border="0" align="absmiddle" /> 
  <a href="home.php">Back</a>
  <input name="data" type="hidden" value="<?php echo $datacompleta; ?>" />
</form></div>

<br />

