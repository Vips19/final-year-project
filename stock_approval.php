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
			if(!empty($_GET['msg'])){
$msg=$_GET['msg'];
if($msg!='')
	?>
	<script>alert("<?php echo $msg; ?>");</script>
    <?php
    }
    ?>


<script>
	function appr_detail(str) {
		
  							var xhttp;
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("cd").innerHTML = this.responseText;
									
    								}
 							 };
 							 xhttp.open("GET", "getchallan.php?c="+str, true);
							 
  							 xhttp.send();
							 
							 
							 
							
						}
</script>
<h2>Approval Of Stock</h2>
     <a href="logout.php" style="position:absolute;
			top:80px;
            left:380px;
            color:white;">Logout</a>
	<div id="sudiv">
	<h3 id="suh3">Stock Details:-</h3>
    
     <p id="date"><?php echo "Date: ". date("Y-m-d ") ."<br>";
		
		 ?></p>
        
        
        	<table id="tsu" border="2" style="border-collapse:collapse; width:100%;">
            <tr>
            	<td>Challan ID</td>
                <td>
                <select name="txt_challanid" autofocus required onchange="appr_detail(this.value)">
                <option value="--Select--" selected="selected" disabled="disabled">--Select--</option>
               <?php $sql="select distinct Challan_Id from newstock_transaction where Status='Pending'";
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
                <td colspan="2"  style="padding:0;"><div id="cd"></div> </td>
            </tr>
           
            <input type="hidden" name="date" value="<?php echo  date("Y-m-d "); ?>" />
            
            </table>
		
       
	</div>
    
  </div>
</body>
</html>
<script>
	
	
	function pe(str1){
			var num=str1.substring(4);
			var s= "val" + num;
			document.getElementById(s).disabled=false;
			
	}
	function dis(v,n1,n2){
		//document.getElementById(v).disabled=true;
		if(n1>n2 || n1<1){
			document.getElementById(v).value=n2;
		}
	}
	function vald(){
				
			var checked=false;
			var element = document.getElementsByName("ps[]");
		
			for(var i=0; i < element.length; i++){
			if(element[i].checked)
				checked = true;
			}
			if (!checked) {
				alert('Please select Atleast one checkbox before Proceeding..');

			}
			return checked;
			
		}

			/*if(document.getElementById("").checked.length>0){
				alert('Please select Atleast one checkbox before Proceeding..');
				return false;	
			}
			return true;
			
	}*/
</script>
