<?php
	include("connection.php");
	include("security.php");
	include("admin_top.php");
	$sql="select Super_User from admin where Emp_Id='{$_SESSION['admin']['Emp_Id']}'";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)){
				$row=mysql_fetch_array($rs);
	include("admin_sidebar.php");
			}

?>

<h1>ADD NEW ADMIN</h1>
<div class="mainbody">

<h4>Please fill the details of employee for General Admin</h4>

<form method="post" action="Add_admin_det_back.php">
	<table id="admindet">
    <tr>
    	
        <td><input type="text" name="emp_id" placeholder="Employee ID" autofocus autocomplete="off" required /></td>
    </tr>
     <tr>
    	
        <td><input type="text" name="emp_name" placeholder="Employee Name" autocomplete="off" required /></td>
    </tr>
     <tr>
    	
        <td><input type="email" name="emp_email" placeholder="Employee Email" autocomplete="off" required /></td>
    </tr>
     <tr>
    	
        <td><input type="number" name="emp_mno" placeholder="Employee Mobile Number" autocomplete="off" required /></td>
    </tr>
    <tr>
    	<td><input type="submit" value="Submit" id="btn"/></td>
    
    </tr>
    
    
    </table>

</form>
	
</div>
</body>
</html>