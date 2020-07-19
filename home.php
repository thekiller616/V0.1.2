<?php
ob_start();
session_start();
if (!isset($_SESSION['myusername']))
{
header("location:index.php");

}

require_once("config.php");
$tbl_name="infos";


$sql = "SELECT * FROM $tbl_name";
$result = $con -> query($sql);

?>

<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<title>Ftp Server Account Manager</title><img src="image/logo.jpg" width="400" height="128" /><br />
<br />
<div class="menu"><img src="image/user_add.gif" width="16" height="16" align="texttop" /> <a href="add.php">Add Client</a> <span class="style4">|</span> <img src="image/delete.gif" width="16" height="16" border="0" align="texttop" /> <a href="delete.php">Delete Client</a> <span class="style4">| <img src="image/logout.gif" width="16" height="16" align="absmiddle">&nbsp;<a href="logout.php">Logout</a></span></div>
<br />



<!--INICIO CLIENTES -->
<?php while ($coluna =$result -> fetch_assoc()) { ?> 
<div id="<?php echo $coluna['username']; ?>" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0"><img src="image/user_go.gif" width="16" height="16" align="absmiddle"> <?php echo $coluna['cliente']; ?></div>
  <div class="CollapsiblePanelContent">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" bgcolor="#EEEEEE"><img src="image/link_go.gif" width="16" height="16" align="absmiddle" /> FTP Information:</td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="3" cellpadding="2">
          <tr>
            <td width="74" bgcolor="#FFFFFF"><div align="right"><span class="style1">Localhost:</span></div></td>
            <td width="309" bgcolor="#FFFFFF"><div align="left" class="style1"><?php echo $coluna['hostname']; ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" class="style1"><div align="right">User:</div></td>
            <td bgcolor="#FFFFFF"><div align="left" class="style1"><?php echo $coluna['username']; ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" class="style1"><div align="right">Password:</div></td>
            <td bgcolor="#FFFFFF"><div align="left" class="style1"><?php echo $coluna['password']; ?></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="72%">&nbsp;</td>
        <td width="28%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#EEEEEE"><img src="image/wrench.gif" width="16" height="16" align="absmiddle" /> Control Panel:</td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="3" cellpadding="2">
          <tr>
            <td width="74" bgcolor="#FFFFFF"><div align="right"><span class="style1">URL:</span></div></td>
            <td width="309" bgcolor="#FFFFFF"><div align="left" class="style1"><?php echo $coluna['cpanel']; ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" class="style1"><div align="right">User:</div></td>
            <td bgcolor="#FFFFFF"><div align="left" class="style1"><?php echo $coluna['c_user']; ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" class="style1"><div align="right">Password:</div></td>
            <td bgcolor="#FFFFFF"><div align="left" class="style1"><?php echo $coluna['c_pass']; ?></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><span class="style3">Last modified on: <?php echo $coluna['data']; ?></span></td>
        <td><div align="right"><img src="image/user_edit.gif" width="16" height="16" align="absmiddle" /> <span class="style1"><a href="edit.php?id=<?php echo $coluna['id']; ?>">Update Info</a></span></div></td>
      </tr>
    </table>
  </div>
  


  <!--FIM CLIENTES -->
</div><br />
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("<?php echo $coluna['username']; ?>", {contentIsOpen:false, enableAnimation:false});
//-->
</script><?php } ?>
