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

	
<h2>Add New Brand Details</h2>
 <a href="logout.php" style="position:absolute;
			top:80px;
            left:380px;
            color:white;">Logout</a>
<div class="align">
    <h3 id="beh3">Details For Brand:</h3>
    <form action="brand_back.php" method="post">
    	<table>
        	<tr>
            	<td>Brand Name</td>
                <td><input type="text" name="txt_bn" autofocus required/></td>
            </tr>
			<tr>
				<td>Brand Details</td>
				<td><textarea rows="4" cols="30" name="txt_bd" required></textarea></td>
				
			</tr>
            <tr>
            	<td>Warranty Summary</td>
            	<td><textarea rows="4" cols="30" name="txt_ws" required></textarea></td>
            </tr>
            <tr>
            	<td><input type="submit" value="ADD BRAND"  /></td>
            </tr>
        </table>
    </form>
    </div>
   </div>
</body>
</html>