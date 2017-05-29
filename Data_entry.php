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
	function select_check()
	{
		var  br_name = document.getElementById("br_name").value;
		var func_type = document.getElementById("func_type").value;
		var select_gen = document.getElementById("select_gen").value;
		var select_mat = document.getElementById("select_mat").value;
		var select_smat = document.getElementById("select_smat").value;
		var dial_s = document.getElementById("dial_s").value;
		var case_mat = document.getElementById("case_mat").value;
		
		if(br == "--Select--")
		{
			alert('Select Brand Name');
			return false;
		}
	}
</script>

<h2>Add New Watches</h2>
	 <a href="logout.php" style="position:absolute;
			top:80px;
            left:380px;
            color:white;">Logout</a>
    <div class="align">
    <h3 id="beh3">Details for Watch:</h3>
    <form method="POST" action="item_upload.php" enctype="multipart/form-data">
    	<table style="border-collapse:collapse;">
                	<tr>
            	<td><b>Brand Name</b></td>
				<td>
				 <select name="txt_br_id" id="br_name" required autofocus>
				 <option disabled selected >--Select--</option>
				<?php $sql="select Brand_Name,Brand_Id from brand";
					  $rs=mysql_query($sql);
					 if(mysql_num_rows($rs))
					 {
					  while($row=mysql_fetch_array($rs))
					  {
				  ?>
				 
				  <option value="<?php echo $row[1]; ?>"><?php echo $row[0]; ?></option>
					<?php
					  
					  }
					 }
				?>
				</select>
				</td>
            	<!--<td><input type="text"  required autofocus /></td>-->
            </tr>
            <tr>
            	<td><b>Product Name</b></td>
            	<td><input type="text" name="txt_pr_name" required /></td>
            </tr>
            <tr >
            	<td><b>Funtion Type</b></td>
				<td>
				<select name="txt_ftype" id="func_type" required>
				<option value="--Select--" selected disabled>--Select Function Type--</option>
            	<option value="Analog" >Analog</option>
				<option value="Analog-Digital" >Analog-Digital</option>
				<option value="Digital" >Digital</option>
				</select>
				</td>
            </tr>
            <tr>
            	<td><b>Gender</b></td>
				<td>
				<select name="txt_gender" id="select_gen" required>
				<option value="--Select--" selected disabled>--Select Gender--</option>
            	<option value="Men" >Men</option>
				<option value="Women" >Women</option>
				<option value="Men Women" >Men Women</option>
				<option value="Couple" >Couple</option>
				</select>
				</td>
            	
            </tr>
            <tr>
            	<td><b>Price</b></td>
            	<td><input type="text" name="txt_price" /></td>
            </tr>
            <tr>
            	<td><b>Material</b></td>
				<td>
				<select name="txt_mat" id="select_mat" required>
				<option value="--Select--" selected disabled>--Select Material--</option>
            	<option value="Metal" >Metal</option>
				<option value="Plastic" >Plastic</option>
				<option value="Resin" >Resin</option>
				<option value="Rubber" >Rubber</option>
				<option value="Sapphire" >Sapphire</option>
				</select>
				</td>
            	
            </tr>
            <tr>
            	<td><b>Color</b></td>
            	<td><input type="text" name="txt_color" required  /></td>
            </tr>
            <tr>
            	<td><b>Strap Material</b></td>
				<td>
				<select name="txt_s_mat" id="select_smat" required >
				<option value="--Select--" selected disabled>--Select Strap Material--</option>
            	<option value="Denim" >Denim</option>
				<option value="Gold" >Gold</option>
				<option value="Leather" >Leather</option>
				<option value="Metal" >Metal</option>
				<option value="Plastic" >Plastic</option>
				<option value="Resin" >Resin</option>
				<option value="Rubber" >Rubber</option>
				<option value="Sapphire" >Sapphire</option>
				<option value="Silver" >Silver</option>
				</select>
				</td>
            	
            </tr>
            <tr>
            	<td><b>Strap Color</b></td>
            	<td><input type="text" name="txt_s_color" required /></td>
            </tr>
            <tr>
            	<td><b>Dial Shape</b></td>
				<td>
				<select name="txt_dial_shape" id="dial_s" required>
				<option value="--Select--" selected disabled>--Select Dial Shape--</option>
            	<option value="Oval" >Oval</option>
				<option value="Rectangle" >Rectangle</option>
				<option value="Round" >Round</option>
				<option value="Round-Oval" >Round-Oval</option>
				<option value="Square" >Square</option>
				</select>
				</td>
            	
            </tr>
            <tr>
            	<td><b>Dial Color</b></td>
            	<td><input type="text" name="txt_dial_color" required /></td>
            </tr>
            
            <tr>
            	<td><b>Water Resistance</b></td>
				<td>
				<input type="radio" name="txt_wr" value="Yes" required><span id="despan">Yes</span>
				<input type="radio" name="txt_wr" value="No" required><span id="despan">No</span>
				</td>
            </tr>
            <tr>
            	<td><b>Features</b></td>
                <td><textarea cols="30" rows="3" name="txt_features"></textarea></td>
            	
            </tr>
            <tr>
            	<td><b>Case Material</b></td>
            	<td>
                <select name="txt_c_mat" id="case_mat" required >
				<option value="--Select--" selected disabled>--Select Case Material--</option>
            	<option value="Hard Case" >Hard Case</option>
				<option value="Leather" >Leather</option>
				<option value="Metal" >Metal</option>
				<option value="Plastic" >Plastic</option>
				<option value="Cardboard" >Cardboard</option>
				<option value="NA" >NA</option>
				
				</select>
                </td>
            </tr>
            <tr>
            	<td><b>Front Image </b></td>
            	<td><input id="f1" type="file" name="url1" required/></td>
            </tr>
            <tr>
            	<td><b>Side Image </b></td>
            	<td><input id="f1" type="file" name="url2"/></td>
            </tr>
            <tr>
            	<td><b>Back Image</b></td>
            	<td><input id="f1" type="file" name="url3"/></td>
            </tr>
            <tr>
            	<td><b>Image with Case</b></td>
            	<td><input id="f1" type="file" name="url4"/></td>
            </tr>
            <tr>
            	<td><input type="submit" value="Add Item" /></td>
            </tr>
        </table>
    </form>
    </div>
    
    
</body>
</html>