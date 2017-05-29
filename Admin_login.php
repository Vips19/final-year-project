<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="admin_login_css.css" />
</head>
<?php 
if(!empty($_GET['ch'])){
    $f=$_GET['ch'];
	if($f!='')
		?>
		<script> alert("<?php echo $f; ?>"); </script>
        <?php
        }
        ?>
<body>
<div id="hd">
	<h1>ADMIN LOGIN</h1>
</div>
	<div id="con1">
	<form method="POST" action="Admin_login_back.php">
		<table id="tl" cellspacing="15">
			<tr>
				<td><img src="Image/admin-button-icon-hi.png" width="35" height="35"/></td>
				<td><input type="text" name="txt_eu" placeholder="Username" autofocus required /></td>
			</tr>
			<tr>
				<td><img src="Image/admin_login_icon.png" width="35" height="35"/></td>
				<td><input type="password" name="txt_pas" placeholder="Password" required /></td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan="2"><input type="submit" value="LOGIN"  ></td>
			</tr>
            
			<tr>
				<td colspan="2"><a href="Set_admin_pass.php?otp=&flag=&eid=">New General Administrator</a></td>
			</tr>
		</table>
		</form>
	</div>
   </div>
	

</body>
</html>