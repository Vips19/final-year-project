<?php

 include("head.php");
 $msg=$_GET['msg'];
 if($msg!=""){
	 ?>
    <script> alert("<?php echo $msg;?>"); </script>
    <?php	
	
}
 $sql=mysql_query("select product_Id,Item_No from cart_detail where Product_Id!='0' and mobile='{$_SESSION['user']['mobile']}'");
 $c=mysql_num_rows($sql);

 //include("user_security.php");
$val=array("");
$tprice=0;


 ?>

<div class="content" style="width:75%; margin:12px 0px 10px 10px;">
	<div class="cart">
     <?php
	if($c!=0){
	?>
    <form action="cart_detailupdate.php" method="get" id="form1">
   
        <table class="cart-table">
        
            <tr>
                <th>Item</th>
                <th>Qty.</th>
                <th>Price</th>
                <th>Delivery Details</th>
                <th>Sub Total</th>
            </tr>
            <!-- a single row for information of a row -->
            <script>
				$(document).ready(function(e) {
                    //var price = [];
					
                });
			</script>
       		<?php
				$f=0;
				//echo ("select product_Id,Item_No from cart_detail where Product_Id!=0 and mobile='{$_SESSION['user']['mobile']}'");
						$sql=mysql_query("select product_Id,Item_No,Qty from cart_detail where Product_Id!=0 and mobile='{$_SESSION['user']['mobile']}'");
						$c=mysql_num_rows($sql);
						if(mysql_num_rows($sql)){
							while($row=mysql_fetch_array($sql)){
								 $f=$f.$row[1];	
							if($row[0]!='0'){
								$sql1=mysql_query("select Product_Name,Color,Price,Strap_Material,Quantity from watch where product_Id='$row[0]'");
								if(mysql_num_rows($sql1)){
									while($row1=mysql_fetch_array($sql1)){
										
										 $tprice=$tprice+$row1[2];	
										
				?>
			
		
            
            <tr>
                <td style="width:80%">
                    <div style=" width:100%;">
                        <div class="table-img">
                        <?php
						$sql2=mysql_query("select Image1 from images where Product_Id='$row[0]'");
						if(mysql_num_rows($sql2)){
							$row2=mysql_fetch_array($sql2);
						?>
                            <img src="<?php echo $row2[0]; ?>"  />
                            <?php
						}
							?>
                        </div>
                        <div class="table-content" >
                            <p><span style="font-size:18px; color:black"><?php echo $row1[0]; ?></span></p><br/>
                            <p><span style="font-size:12px"><?php echo $row1[1] ; ?>, <?php  echo $row1[3]; ?></span></p><br/>
                        </div>
                        <div style="width:100%; padding-bottom:0px; margin-bottom:0px;">
                            <div class="table-replacement">
                                <p><i><span style="font-size:12px; color:#999999">10 DAYS REPLACEMENT GUARANTEED</span></i></p><br/>
                            </div>
                            <div class="table-links">
                                <!--<a href="">Move to Wishlist</a>&nbsp;<b>.</b>-->&nbsp;<a href="remove_cart_item.php?in=<?php echo $row[1]; ?>">Remove</a>
                            </div>
                        </div>
                    </div>
                </td>
            	<?php
					if($row1[4]>=5)
						$max=5;
						else
							$max=$row1[4];
				
				?>
                <td style="text-align:center;">
                    <input type="number" id="qt<?php echo $row[1]; ?>" name="q<?php echo $row[1]; ?>"  class="qty" max="<?php echo $max; ?>" min="1" value="1" onChange="cal(this.value,this.id,<?php echo $row[1]; ?>)"  /><br/>
                    <!--<input type="button"  class="table-qty" value="Save">-->
                </td>
                
                <td>
                    <p class="pvalue" id="pv<?php echo $row[1]; ?>">&#8377;<?php echo $row1[2]; ?></p><br/>
                   
                    <!--<p><span style="font-size:14px"><i>MRP: <del>&#8377;</del></i></span></p> -->
                </td>
            
                <td>
                    <p><span style="color:#00CC00">Free</span></p><br/>
                    <p>Delivery in 5 Days</p>
                </td>
            
                <td>
                    <p>&#8377;<span id="tsum<?php echo $row[1]; ?>" style="font-size:18px; font-weight:bold; color:black;"><?php echo $row1[2]; ?></span></p>
                </td>
            </tr>
           
            <?php
								}
							}
							}
						
						}
					}
				
			?>
            <input type="hidden" id="hid1" value="<?php echo $f;  ?>" />
            <tr>
            	<td colspan="4"><b>Total Price:</b></td>
                <td style="padding-bottom:10px;"><p>&#8377;<span id="tp"><b><?php echo $tprice; ?></b></span></p></td>
            </tr>
            
            
      
            
        </table>
        
         </form>
        <?php
	}
	else{
		?>
        <div ><p style="font-size:24px; font-weight:bold; padding:50px; margin:10px;"> No Items Available in Cart.</p></div>
        <?php
	}
		?>
        <div>
        	
        </div>


        
    </div>
</div>
 <?php
	if($c!=0){
	?>
<div class="summary content" style="width:22%; margin:10px; background-color:#FFF;">
<div style="margin:10px;">
    <h3 style="font-family:'Times New Roman', Times, serif; color:#C40500">ORDER SUMMARY</h3>
    <p>(<?php echo $c; ?> Products)</p>
    <br/>
    <p>Delivery Charges:<span style="color:#00CC00">Free</span></p>
    <br/>
    <p>Total Amount Payable: &#8377;<span id="sumt"><?php echo $tprice; ?> </span></p>
    <br/>
    <input type="submit" id="payment" form="form1"   value="Place Order" />
</div>
</div>
<?php
	}
?>
<!-- To toggle the visibility of the save link in qty col. -->     
<script type="text/javascript">
	$(document).ready(function(e) {
		
		//var quantity = document.getElementById("qty").value; 
		
        $(".qty").focus(function(){
			$(".table-qty").css("visibility","visible");
		})
		
		$(".table-qty").click(function(){
			$(".table-qty").css("visibility","hidden");
				
			 //document.getElementById("qty").value = quantity;
		})
		
		
    });
	
	/*$(document).ready(function(e) {
        
    });*/
	
	function cal(str,i) {
							var p=i.substring(2);
							var pid= "pv" + p;
							var pvalue=document.getElementById(pid).innerHTML;
							var pv=pvalue.substring(1);
							var tvalue= pv * str;
							var tsumid= "tsum" + p;
							document.getElementById(tsumid).innerHTML=tvalue;
							var itm=document.getElementById('hid1').value;
							
							var item1= 0,item2= 0,item3= 0,item4= 0,item5= 0,c;
							for (var x = 1; x < itm.length; x++)
							{
   								 c = itm.charAt(x);
    							
									 switch (c) {
									case "0":
										
										break;
									case "1":
										 item1=document.getElementById("tsum1").innerHTML;
										break;
									case "2":
										 item2=document.getElementById("tsum2").innerHTML;
										break;
									case "3":
										 item3=document.getElementById("tsum3").innerHTML;
										break;
									case "4":
										 item4=document.getElementById("tsum4").innerHTML;
										break;
									case "5":
										 item5=document.getElementById("tsum5").innerHTML;
										break;
								   
									}
							}
							var itotal=Number(item1) + Number(item2) + Number(item3) + Number(item4) + Number(item5);
							//alert(itotal);
							
							document.getElementById("tp").innerHTML=itotal;
							document.getElementById("sumt").innerHTML=itotal;
							
						}
						
</script>
<?php include("foot.php") ?>
