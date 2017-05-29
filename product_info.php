<?php
 include("head.php");
$pid=$_GET['Product_Id'];
$msg=$_GET['msg'];
$cmsg=$_GET['cmsg'];

if($msg!="" && !isset($_SESSION['user'])){
	?>
    <script> alert("<?php echo $msg;?>"); </script>
    <?php	
	
}
if($cmsg!="" and isset($_SESSION['user'])){
	?>
    	
    <script> alert("<?php echo $cmsg;?>"); </script>
    <?php
 
}
//echo ("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}'");
?>
<div class="content" style="width:38%;">
	<div class="product-img">
        
        <!-- Side Images -->
        <?php
		$sql="select Image1,Image2,Image3,Image4 from images where Product_Id='$pid'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)){
			$row=mysql_fetch_array($rs);
			$query=mysql_query("select Product_Name, Brand_Id from watch where Product_Id='$pid'");
			if(mysql_num_rows($query)){
				$rw=mysql_fetch_array($query);
			$query1=mysql_query("select Brand_Name from brand where Brand_Id='$rw[1]'");
			if(mysql_num_rows($query1)){
				$brand=mysql_fetch_array($query1);
				
				
		?>
        <ul>
        	<li class="img-thumbnail"><div id="img-1" style="background-image:url('<?php echo $row[0]; ?>')"></div></li>
            <?php
			
			if($row[1]!="Product Images/$brand[0]/$pid.$rw[0]/"){
			?>
        	<li class="img-thumbnail"><div id="img-2" style="background-image:url('<?php echo $row[1]; ?>')"></div></li>
            <?php
			}
			if($row[2]!="Product Images/$brand[0]/$pid.$rw[0]/"){
			?>
            <li class="img-thumbnail"><div id="img-3" style="background-image:url('<?php echo $row[2]; ?>')"></div></li>
            <?php
			}
			if($row[3]!="Product Images/$brand[0]/$pid.$rw[0]/"){
			?>
            <li class="img-thumbnail"><div id="img-4" style="background-image:url('<?php echo $row[3]; ?>')"></div></li>
       		<?php
			}
			?>
        </ul>
        
               
        
        <!-- Main Image -->
        <div class="main-img" id="myImg" style="background-image:url('<?php echo $row[0]; ?>')" onClick="modalImg('<?php echo $row[0]; ?>')">
        </div>
        
       
        <?php
			}
			}
		}
        ?>
    </div>    
        
<script>
	$(document).ready(function() {
        
		$("#img-1").mouseenter(function() {
				
				var url=$("#img-1").css("background-image");
				
				$(".main-img").css({"background-image" : url});
			})
			
		$("#img-2").mouseenter(function() {
			
				var url=$("#img-2").css("background-image");
				
				$(".main-img").css({"background-image" : url});
			})
		
		$("#img-3").mouseenter(function() {
				
				var url=$("#img-3").css("background-image");
				
				$(".main-img").css({"background-image" : url});
			})
			
		$("#img-4").mouseenter(function() {
				
				var url=$("#img-4").css("background-image");
				
				$(".main-img").css({"background-image" : url});
			})	
    });
	
	
</script>


    <!-- Buy now button -->
    <div class="buy-button" >
    	
        	<button class="animate_button" onClick="window.location.href='buy_now.php?pid='+<?php echo $pid; ?>" ><span>BUY NOW</span></button>
        	<button class="animate_button" onClick="window.location.href='cart_back.php?pid='+<?php echo $pid; ?>"><span>ADD TO CART</span></button>
        
    </div>
    
        
</div>

<div class="content" style="width:60%;">
	<div class="product-info">
    	<div>
        <?php
				$sql1="select Brand_Id,Product_Name,Function_Type,Price,Color,Material,Strap_Material,Strap_Color,Dial_Shape,Dial_Color,Gender,Water_Resistant,Features,Case_Material from watch where Product_Id='$pid'";
			$rs1=mysql_query($sql1);
			if(mysql_num_rows($rs)){
				$row1=mysql_fetch_array($rs1);
			}
			
			
			$sql2="select Brand_Name,Brand_details,Warranty_Summary from brand where Brand_Id='$row1[0]'";
			$rs2=mysql_query($sql2);
			if(mysql_num_rows($rs2)){
				$row2=mysql_fetch_array($rs2);
			}
 			?>       
            <table class="overview">
                <tr><td colspan="2"><span style="font-size:24px; font-weight:bold;"><?php echo $row1[1]; ?></span></td></tr>
                <tr><td colspan="2"><span style="font-size:36px; font-weight:bold;">&#8377;<?php echo $row1[3]; ?></span></td></tr>
                <tr>
                    <td style="vertical-align:top;">Features</td>
                    <td>
                        <ul>
						<?php 
						$f=strtok($row1[12],",");
                        while ($f !== false)
   						{
						?>
   							<li><?php echo $f; ?></li>
                         <?php
							$f=strtok(",");
						
							
   						
   						}
					?>
                       </ul>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">Brand Description</td>
                    <td><p><?php echo $row2[1]; ?></p></td>
                </tr>
            </table>
          </div>
          
        <div class="specs">
            <h2>Specifications</h2>
            
            <table id="general">
                <tr><td class="t-head">General</td></tr>
                <tr>
                    <td>Function Type</td>
                    <td><?php echo $row1[2]; ?></td>
                </tr>
                <tr>
                    <td>Ideal For</td>
                    <td><?php echo $row1[10]; ?></td>
                </tr>
                <tr>
                    <td>Water Resistance</td>
                    <td><?php echo $row1[11]; ?></td>
                </tr>
                <tr>
                    <td>Pack Of</td>
                    <?php
					if($row1[10]=='Couple')
					{
					?>
                    <td>X 2</td>
                    <?php
					}
					
					else{
						?>
						<td>X 1</td>
					<?php
                    }
					?>
                </tr>
                <tr>
                	<td>Case Material</td>
                    <td><?php echo $row1[13]; ?></td>
                </tr>
            
            	<tr><td class="t-head">Body Features</td></tr>
                <tr>
                	<td>Material</td>
                    <td><?php echo $row1[5]; ?></td>
                </tr>
                <tr>
                	<td>Color</td>
                    <td><?php echo $row1[4]; ?></td>
                </tr>
                <tr>
                	<td>Strap Material</td>
                    <td><?php echo $row1[6]; ?></td>
                </tr>
                <tr>
                	<td>Strap Color</td>
                    <td><?php echo $row1[7]; ?></td>
                </tr>
                <tr>
                	<td>Dial Shape</td>
                    <td><?php echo $row1[8]; ?></td>
                </tr>
                <tr>
                	<td>Dial Color</td>
                    <td><?php echo $row1[9]; ?></td>
                </tr>
            	
                <tr><td class="t-head">Warranty</td></tr>
                <tr>
                	<td>Warranty Summary</td>
                    <td><?php echo $row2[2];  ?></td>
                </tr>
            </table>
        </div>
	</div>
</div>

<?php include("foot.php"); ?>