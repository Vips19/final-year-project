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
	function o_approve(str) {
		//alert(str);
  							var xhttp;
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("o_details").innerHTML = this.responseText;
									
    								}
 							 };
 							 xhttp.open("GET", "get_orderdet.php?t="+str, true);
							 
  							 xhttp.send();
							 
							 
							 
							
						}
						
	function vald(){
				
			var checked=false;
			var element = document.getElementsByName("d_chk[]");
		
			for(var i=0; i < element.length; i++){
			if(element[i].checked)
				checked = true;
			}
			if (!checked) {
				alert('Please select Atleast one checkbox before Proceeding..');

			}
			return checked;
			
		}

</script>



 <h3 style="position:absolute;
			top:60px;
			left:950px;
            color:white;">Welcome &nbsp;&nbsp;<?php echo $_SESSION['admin']['Emp_Name'] ?></h3>
            
 <a href="logout.php" style="position:absolute;
			top:80px;
            left:380px;
            color:white;">Logout</a>
	
	<div id="left">
     <h3 id="beh3">Approval of Order/Request Status:</h3>
        <table id="tah">
        <tr>
            <td>
           	<input type="radio" value="delv" name="order_request"  onClick="o_approve(this.value)" /><span id="despan" style="float:left;display:block;margin-top:6px;">Order Delivered</span>
            </td>
            <td>
            <input type="radio" value="can" name="order_request" onClick="o_approve(this.value)" /><span id="despan" style="float:left;display:block;margin-top:6px;">Cancelled Order</span>
            </td>
            <td>
            <input type="radio" value="replace" name="order_request" onClick="o_approve(this.value)" /><span id="despan" style="float:left;display:block;margin-top:6px;">Order Replacement Request</span>
            </td>
        </tr>
        </table>
        <div id="o_details">
    	
    	</div>
	</div>
    
	<!--<tr>
		<td><input type="button" name="btn_be" value="ADD NEW BRAND"  /><td>
	</tr>
	<tr>
		<td><input type="button" name="btn_iu" value="ADD NEW WATCH"  /><td>
	</tr>
	<tr>
		<td><input type="button" name="btn_su" value="NEW STOCK ARRIVALS"  /><td>
	</tr>
	
		<td><input type="button" name="btn_br" value="REMOVE BRAND"  /><td>-->
	
    <!--<div id="option">
    	<div id="s1">
        <img src="brand images/new brand.jpg" width="175" height="175" alt="Add New Brand" onclick="window.location.href='brand_entry.php'"/>
        </div>
        <div id="s1">
        <img src="brand images/new watches.png" width="175" height="175" alt="Add New Watches" onclick="window.location.href='Data_entry.php'"/>
        </div>
        <div id="s1">
        <img src="brand images/new arrival.png" width="175" height="175" alt="Add New Arrivals" onclick="window.location.href='stock_update.php?ch='" />
        </div>
        
        <div id="s1">
        <img src="brand images/remove brand.png" width="175" height="175" alt="Remove A Brand" onclick="window.location.href='remove_brand.php'"/>
        </div>
        <div id="s2">
        <img src="brand images/remove product.png" width="175" height="175" alt="Remove A Brand" onclick="window.location.href='remove_product.php'"/>
        </div>
    </div>-->
   </div>
   

	
</body>
</html>