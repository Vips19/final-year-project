<?php
include("admin_top.php");
 include("connection.php");
	include("security.php");
	$sql="select Super_User from admin where Emp_Id='{$_SESSION['admin']['Emp_Id']}'";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)){
				$row=mysql_fetch_array($rs);
	include("admin_sidebar.php");
			}
	
?>
<script>
	function brandDetails(val) {
  							if(val=="")
								return;
							else 
							{
								if(window.XMLHttpRequest)
									xmlhttp=new XMLHttpRequest();
								else
									xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				
									xmlhttp.onreadystatechange = function() {
									if(this.readyState == 4 && this.status == 200)
										document.getElementById("detail").innerHTML = this.responseText;
									};
 									 xmlhttp.open("GET", "getbranddetail.php?bn="+val, true);
  							 		 xmlhttp.send();
							}
						}
</script>
<!--<h3 style="color:blue; text-align:right;">Welcome:&nbsp;&nbsp;<?php echo $_SESSION['admin']['Emp_name'] ?></h3>
 <a href="logout.php" style="color:blue; text-align:left;">Logout</a>-->
	<h2>Remove A Brand</h2>
     <a href="logout.php" style="position:absolute;
			top:80px;
            left:380px;
            color:white;">Logout</a>
    <!--<div id="left">
    <form action="stock_update_back.php" method="get">
	<table border="2">
			<tr>
                <th><p>Brand_Id</p></th>
                <th><p>Brand_Name</p></th>
                <th><p>Brand_Details</p></th> 
                <th></th>        
              </tr>  
	<?php
			/*$sql="select Brand_Id,Brand_Name,Brand_details from brand";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)){
					while($row=mysql_fetch_array($rs)){
	?>
				<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
                 <td><input type="submit" name="btn_del" value="DELETE-<?php echo $row[0];?>"  /></td>
				
				</tr>
				<?php
					}
	 }
		*/?>
		</table>
		</form>
        </div>-->
        
        <div class="align">
        <form action="remove_brand_back.php" method="post">
        	<table>
            	<tr>
                	<td>Brand Name</td>
                    <td>
                     <select name="txt_br_id" required autofocus onChange="brandDetails(this.value)">
				 <option disabled selected >--Select--</option>
				<?php $sql="select Brand_Name from brand";
					  $rs=mysql_query($sql);
					 if(mysql_num_rows($rs))
					 {
					  while($row=mysql_fetch_array($rs))
					  {
				  ?>
				 
				  <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
					<?php
					  
					  }
					 }
				?>
				</select>
				</td>
               </tr>
               <tr>
                	<td colspan="2"><p id="detail"></p></td>
               </tr>
            </table>
            
        </form>
        </div>
        
</body>
</html>