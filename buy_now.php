<?php 
ob_start();
include("head.php");

$row=array("");
$adno=array("");
$row6=array("");
$row7=array("");
$row8=array("");
//$adno="";
$u=$_SERVER['REQUEST_URI'];
if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
}
else{
	$pid="";
}

if(isset($_POST['captcha_conf'])){
	
	 $cap=$_POST['captcha_txt'];	
	 $actualcap=$_SESSION['captcha_code'];
	
	if($cap == $actualcap){
		
		$pr1="";
		$pr2="";
		$pr3="";
		$pr4="";
		$pr5="";
		$qty1="";
		$qty2="";
		$qty3="";
		$qty4="";
		$qty5="";
		ob_start();
		 ob_end_clean();
		
		if(isset($_POST['pr1'])){
			$pr1=$_POST['pr1'];
			$qty1=$_POST['qty1'];
			$query11=mysql_query("select Quantity from watch where Product_Id='$pr1'");
			if(mysql_num_rows($query11)){
				$row9=mysql_fetch_array($query11);
			    $q1=$row9[0]-$qty1;
				//echo "update watch set Quantity='$q1' where Product_Id='$pr1'";
				$query12=mysql_query("update watch set Quantity='$q1' where Product_Id='$pr1'");
				
				
			}
			
		}
		if(isset($_POST['pr2'])){
			$pr2=$_POST['pr2'];
			$qty2=$_POST['qty2'];
			$query13=mysql_query("select Quantity from watch where Product_Id='$pr2'");
			if(mysql_num_rows($query13)){
				$row10=mysql_fetch_array($query13);
				$q2=$row10[0]-$qty2;
				$query14=mysql_query("update watch set Quantity='$q2' where Product_Id='$pr2'");
				
			}
		}
		if(isset($_POST['pr3'])){
			$pr3=$_POST['pr3'];
			$qty3=$_POST['qty3'];
			$query15=mysql_query("select Quantity from watch where Product_Id='$pr3'");
			if(mysql_num_rows($query15)){
				$row11=mysql_fetch_array($query15);
				$q3=$row11[0]-$qty3;
				$query16=mysql_query("update watch set Quantity='$q3' where Product_Id='$pr3'");
				
			}
		}
		if(isset($_POST['pr4'])){
			$pr4=$_POST['pr4'];
			$qty4=$_POST['qty4'];
			$query17=mysql_query("select Quantity from watch where Product_Id='$pr4'");
			if(mysql_num_rows($query17)){
				$row12=mysql_fetch_array($query17);
				$q4=$row12[0]-$qty4;
				$query18=mysql_query("update watch set Quantity='$q4' where Product_Id='$pr4'");
				
			}
		}
		if(isset($_POST['pr5'])){
			$pr5=$_POST['pr5'];
			$qty5=$_POST['qty5'];
			$query19=mysql_query("select Quantity from watch where Product_Id='$pr5'");
			if(mysql_num_rows($query19)){
				$row13=mysql_fetch_array($query19);
				$q5=$row13[0]-$qty5;
				$query20=mysql_query("update watch set Quantity='$q5' where Product_Id='$pr5'");
				
			}
		}
	   $pay=$_POST['type_pay'];
		$address=$_POST['addr_sel'];
		echo $ct=$_POST['ct'];
		$date=date("Y-m-d ");
		$query9=mysql_query("insert into order_detail (Date,Product1,Product2,Product3,Product4,Product5,address_no,Payment_mode,Status,Qty1,Qty2,Qty3,Qty4,Qty5,mobile) values('$date','$pr1','$pr2','$pr3','$pr4','$pr5','$address','$pay','Processing','$qty1','$qty2','$qty3','$qty4','$qty5','{$_SESSION['user']['mobile']}')");
        if($query9==1){
			if($ct=='y'){
				$query10=mysql_query("update cart_detail set Product_Id='0',Qty='1' where mobile='{$_SESSION['user']['mobile']}'");	
				if($query10==1){
					echo 'success';
				}
				
			}
			
			header("location:order_back.php?pay=".$pay);
			
		}
		
		
	//	echo 'true';
	}
	else{
		?>
        <script>alert('Captcha Mismatch');</script>
        <?php
	}
}

/*if(isset($_POST['Debit_Conf']) ||  isset($_POST['Credit_Conf'])){
		
		$pr1="";
		$pr2="";
		$pr3="";
		$pr4="";
		$pr5="";
		$qty1="";
		$qty2="";
		$qty3="";
		$qty4="";
		$qty5="";
		ob_start();
		 ob_end_clean();
		
		if(isset($_POST['pr1'])){
			$pr1=$_POST['pr1'];
			$qty1=$_POST['qty1'];
		}
		if(isset($_POST['pr2'])){
			$pr2=$_POST['pr2'];
			$qty2=$_POST['qty2'];
		}
		if(isset($_POST['pr3'])){
			$pr3=$_POST['pr3'];
			$qty3=$_POST['qty3'];
		}
		if(isset($_POST['pr4'])){
			$pr4=$_POST['pr4'];
			$qty4=$_POST['qty4'];
		}
		if(isset($_POST['pr5'])){
			$pr5=$_POST['pr5'];
			$qty5=$_POST['qty5'];
		}
	   $pay=$_POST['type_pay'];
		$address=$_POST['addr_sel'];
		echo $ct=$_POST['ct'];
		$query9=mysql_query("insert into order_detail (Product1,Product2,Product3,Product4,Product5,address_no,Payment_mode,Status,Qty1,Qty2,Qty3,Qty4,Qty5,mobile) values('$pr1','$pr2','$pr3','$pr4','$pr5','$address','$pay','Processing','$qty1','$qty2','$qty3','$qty4','$qty5','{$_SESSION['user']['mobile']}')");
        if($query9==1){
			if($ct=='y'){
				$query10=mysql_query("update cart_detail set Product_Id='0',Qty='1' where mobile='{$_SESSION['user']['mobile']}'");	
				if($query10==1){
					echo 'success';
				}
				
			}
			
			header("location:card_loading.php?pay=".$pay);
			
		}
		
		
	//	echo 'true';
	
}*/


function check(){
	
	echo 'onsubmit called';
}
if(isset($_SESSION['user'])){

			 //$a=1;
			 $i=0;
					//echo "select st_name,landmark,city,state,pin_code from address where mobile='{$_SESSION['user']['mobile']}'";
					$sql=mysql_query("select address_no from address where mobile='{$_SESSION['user']['mobile']}' ");
					  $c=mysql_num_rows($sql);
					  if(mysql_num_rows($sql)){
						  while($row5=mysql_fetch_array($sql)){
							 $adno[$i]=$row5[0];
							 $i++;
							
						  }
					  }
					  
					 
					  
					if($c==1){
						$query3=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='1' ");
						if(mysql_num_rows($query3)){
							for($i=1;$i<=6;$i++)
							{	$row6[$i]="null";
								$row7[$i]="null";
								$row8[$i]="null";
							}
							$row6=mysql_fetch_array($query3);
							
							/*echo $row6[2];
							echo $row6[3];
							echo $row6[4];
							echo $row6[5];
							echo $row6[6];*/
						}
						
					}
					else if($c==2){
						
						$query4=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='1' ");
						if(mysql_num_rows($query4)){
						
							$row6=mysql_fetch_array($query4);
							/*echo $row6[2];
							echo $row6[3];
							echo $row6[4];
							echo $row6[5];
							echo $row6[6];*/
						}
						$query5=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='2' ");
						if(mysql_num_rows($query5)){
							$row7=mysql_fetch_array($query5);
							for($i=1;$i<=6;$i++)
							{
								
								$row8[$i]="null";
							}
							/*echo $row7[2];
							echo $row7[3];
							echo $row7[4];
							echo $row7[5];
							echo $row7[6];*/
						}
					}
					else{
						$query6=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='1' ");
						if(mysql_num_rows($query6)){
							$row6=mysql_fetch_array($query6);
							/*echo $row6[2];
							echo $row6[3];
							echo $row6[4];
							echo $row6[5];
							echo $row6[6];*/
							
						}
						$query7=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='2' ");
						if(mysql_num_rows($query7)){
							$row7=mysql_fetch_array($query7);
							/*echo $row7[2];
							echo $row7[3];
							echo $row7[4];
							echo $row7[5];
							echo $row7[6];*/
						}
						$query8=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='3' ");
						if(mysql_num_rows($query8)){
							$row8=mysql_fetch_array($query8);
							/*echo $row8[2];
							echo $row8[3];
							echo $row8[4];
							echo $row8[5];
							echo $row8[6];*/
						}
					}	
					 
}
						

	/*create_image();
 function  create_image()
    {
		$word="";
        $image = imagecreatetruecolor(250, 80);
		$background_color = imagecolorallocate($image, 255, 255, 255);  
		imagefilledrectangle($image,0,0,250, 150,$background_color);
		$line_color = imagecolorallocate($image, 64,64,64); 
		for($i=0;$i<10;$i++) {
			imageline($image,0,rand()%80,250,rand()%80,$line_color);
		}
		$pixel_color = imagecolorallocate($image, 0,0,255);
		for($i=0;$i<1000;$i++) {
    		imagesetpixel($image,rand()%250,rand()%80,$pixel_color);
		}  
		$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$len = strlen($letters);
		$letter = $letters[rand(0, $len-1)];
		
		$text_color = imagecolorallocate($image, 0,0,0);
		for ($i = 0; $i< 6;$i++) {
			$letter = $letters[rand(0, $len-1)];
			imagestring($image, 5,  5+($i*30), 20, $letter, $text_color);
			$word.=$letter;
		}
		$_SESSION['captcha_string'] = $word;
        imagepng($image, "image.png");
    }*/

    ?>

<script type="text/javascript">
				

	function delv(str) {
  							var xhttp;
					
							 if (str.length == 0) { 
      							  document.getElementById("bn-selected-addr").innerHTML = "";
        							return;
    						} 
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("bn-selected-addr").innerHTML = this.responseText;
									
    								}
 							 };
 							 xhttp.open("GET", "delivery_address.php?d="+str, true);
							 
  							 xhttp.send();
							 
							 
							document.getElementById("addr1").value=str; //address for credit card
							document.getElementById("addr2").value=str; //address for debit card
							document.getElementById("addr3").value=str; //address COD
							 
							 
							
						}
						
						function cap() {
  							var xhttp;
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("capt_img").setAttribute("src",this.responseText);
									
    								}
									
 							 };
 							 xhttp.open("GET", "refresh_captcha.php?", true);
							 
  							 xhttp.send();
							 
							 
							 
							
						}
						
						
						function edit_addr(aid){
							
							var ad1;
							var ad2;
							var ad3;
							var ad4;
							var ad5;
							var ad6;
							/*alert(ad1);
							alert(ad2);
							alert(ad3);
							alert(ad4);*/
							
							
							a=aid.substring(12,13);
							//alert(aid);
							
							
							
							if(a==1){
							 ad1="<?php echo $row6[2]; ?>";
							 ad2="<?php echo $row6[3]; ?>";
							 ad3="<?php echo $row6[4]; ?>";
							 ad4="<?php echo $row6[5]; ?>";
							 ad5="<?php echo $row6[6]; ?>";
							 ad6="<?php echo $row6[0]; ?>";
							 /*	document.getElementById("st_ad").value=ad1;
								document.getElementById("land_ad").value=ad2;
								document.getElementById("city_ad").value=ad3;
								document.getElementById("state_ad").value=ad4;
								document.getElementById("pc_ad").value=ad5;
								document.getElementById("add_num").value=ad6;*/
							
							}
							else if(a==2){
							 ad1="<?php echo $row7[2]; ?>";
							 ad2="<?php echo $row7[3]; ?>";
							 ad3="<?php echo $row7[4]; ?>";
							 ad4="<?php echo $row7[5]; ?>";
							 ad5="<?php echo $row7[6]; ?>";
							 ad6="<?php echo $row7[0]; ?>";
							 /*	document.getElementById("st_ad").value=ad1;
								document.getElementById("land_ad").value=ad2;
								document.getElementById("city_ad").value=ad3;
								document.getElementById("state_ad").value=ad4;
								document.getElementById("pc_ad").value=ad5;
								document.getElementById("add_num").value=ad6;*/
							}
							
							 else if(a==3){
							 ad1="<?php echo $row8[2]; ?>";
							 ad2="<?php echo $row8[3]; ?>";
							 ad3="<?php echo $row8[4]; ?>";
							 ad4="<?php echo $row8[5]; ?>";
							 ad5="<?php echo $row8[6]; ?>";
							 ad6="<?php echo $row8[0]; ?>";
							/* document.getElementById("st_ad").value=ad1;
								document.getElementById("land_ad").value=ad2;
								document.getElementById("city_ad").value=ad3;
								document.getElementById("state_ad").value=ad4;
								document.getElementById("pc_ad").value=ad5;	
								document.getElementById("add_num").value=ad6;*/
							}
							else{
								ad1="";
								ad2="";
								ad3="";
								ad4="";
								ad5="";
								ad6="";	
							}
							document.getElementById("st_ad").value=ad1;
								document.getElementById("land_ad").value=ad2;
								document.getElementById("city_ad").value=ad3;
								document.getElementById("state_ad").value=ad4;
								document.getElementById("pc_ad").value=ad5;
								document.getElementById("add_num").value=ad6;
							
							
							
						}


				
				$(document).ready(function(e) {
                    
					//$(":button", ":submit", "#bn-addr-close-icon").click(function(){})
					
					
					
					//control functions for tabs in the Address Section
					$("#bn-add-new-addr-button").click(function(){
						
						$("#bn-new-addr-form").attr("class","");
						$("#bn-select-addr").attr("class","bn-tab-hide");
						$("#bn-selected-addr").attr("class","bn-tab-hide");
						window.scrollTo(0,0);
					});
					
					/*$("#bn-add-new-addr-button").click(function(){
						$("#bn-new-addr-form").show(300);
						$("#bn-selected-addr").hide(300);
						$("#bn-select-addr").hide(300);
					})*/
					
					$("#bn-save-and-con-button, #bn-addr-close-icon").click(function(){
						
						$("#bn-new-addr-form").attr("class","bn-tab-hide");
						$("#bn-select-addr").attr("class","");
						$("#bn-selected-addr").attr("class","bn-tab-hide");
						
						
						
						window.scrollTo(0,0);
					});
					
					$("#bn-addr-close-icon").click(function(){
						
						document.getElementById("st_ad").value="";
						document.getElementById("land_ad").value="";
						document.getElementById("city_ad").value="";
						document.getElementById("pc_ad").value="";
						document.getElementById("state_ad").value="--Select--";
						document.getElementById("add_num").value="";
						
						
						});
					
					$("#bn-selected-addr").click(function(){
						
						$("#bn-new-addr-form").attr("class","bn-tab-hide");
						$("#bn-select-addr").attr("class","");
						$("#bn-selected-addr").attr("class","bn-tab-hide");
						$("#bn-tab-checkout").attr("class","bn-tab-hide");
						$("#bn-tab-payment").attr("class","bn-tab-hide");
						window.scrollTo(0,0);
					});
					
					
					$(".bn-addr-edit-class").click(function(){
						
						$("#bn-new-addr-form").attr("class","");
						$("#bn-select-addr").attr("class","bn-tab-hide");
						$("#bn-selected-addr").attr("class","bn-tab-hide");
						$("#bn-tab-checkout").attr("class","bn-tab-hide");
						$("#bn-tab-payment").attr("class","bn-tab-hide");
						window.scrollTo(0,0);
					});
					
					$(".bn-addr-deleiver-here-button").click(function(){
							
						$("#bn-new-addr-form").attr("class","bn-tab-hide");
						$("#bn-select-addr").attr("class","bn-tab-hide");
						$("#bn-selected-addr").attr("class","");
						$("#bn-tab-checkout").attr("class","bn-info-tab");
						window.scrollTo(0,0);
					});
					
					$("#bn-checkout-link").click(function(){
					
						$("#bn-tab-checkout").attr("class","bn-tab-hide");
						$("#bn-tab-payment").attr("class","");
						$("#bn-select-addr").attr("class","bn-tab-hide");	
					});
					
					$("#bn-payment-button-debit-card").click(function(){
					
						$("#bn-payment-img-src").attr("src","Image/debit.png");
						$("#bn-payment-type-img-text")	
					});
					
					$("#bn-payment-button-cod").click(function(){
					
						$("#bn-payment-img-src").attr("src","Image/cash-to-delivery.png");
						$("#bn-payment-type-img-text")	
					});
					
					$("#bn-payment-button-credit-card").click(function(){
					
						$("#bn-payment-img-src").attr("src","Image/credit-card-orange-icon-png-1.png");
						$("#bn-payment-type-img-text")	
					});
					window.onload(window.scrollTo(0,0));
					
				});
				
				function openPaymentTab(evt, paymentType) {
					  var i, payment_tabcontent, payment_tablinks;
					  payment_tabcontent = document.getElementsByClassName("payment_tabcontent");
					  for (i = 0; i < payment_tabcontent.length; i++) {
						  payment_tabcontent[i].style.display = "none";
					  }
					  payment_tablinks = document.getElementsByClassName("payment_tablinks");
					  for (i = 0; i < payment_tablinks.length; i++) {
						  payment_tablinks[i].className = payment_tablinks[i].className.replace(" payment-active-tab", "");
					  }
					  document.getElementById(paymentType).style.display = "block";
					  evt.currentTarget.className += " payment-active-tab";
				  }
				  
				  // Get the element with id="defaultOpen" and click on it
				  function openCard(){
				  	document.getElementById("bn-payment-button-credit-card").click();
				  }
				 		  
				  
			</script>

<div class="content" style="/* [disabled]width: 72%; */ margin-left: 15px;">
	<div class="bn-tab-container" > <!-- first container -->
    	<div class="bn-info-tab"> <!-- tab 1 - Login -->
        	
            <!-- The tab below is for before Login. Initially visible -->
            <?php
				if(!isset($_SESSION['user'])){
			?>
            <div class="" id="bn-tab-before-login">
                <div class="bn-tab-head"><h3>Login</h3></div>
                    <div class="bn-tab-body">
                        <div class="bn-tab-login-form">
                        <form method="post" action="login_back.php">
                        <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="uri" />
                            <table class="login-form">
                                <tr>
                                    <td>Mobile Number</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="mn" placeholder="Enter Mobile Number"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="lpwd" placeholder="Enter Mobile Number"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Login" /></td>
                                </tr>
                            </table>
                        </form>
                        </div>
                        
                        <div class="bn-tab-login-text">
                            <p>You need to Login to your account to make a purchase</p>
                            <img src="Image/ecom.png">
                        </div>
                    </div>
                </div>
            <?php
				}
				else{
			
			?>
            <!-- The tab below is for after Login. Initially hidden -->
            <div id="bn-tab-after-login">
            	<div class="bn-after-login-content">
                	<div class="bn-step-confirmed">
                    	<p>&#x2714;</p>
                    </div>
                    
                    <div class="bn-step-name">
                    	<p>LOGGED IN AS</p>
                    </div>
                    
                    <div class="bn-step-data">
                    	<p>
                        	<?php
								 
						   
						   		 if($_SESSION['user']['f_name'] == "" && $_SESSION['user']['l_name'] == ""){
									 
									 echo $_SESSION['user']['email'];
								 }
								 else{
									 echo $_SESSION['user']['email'];
								 }
							
							?>
								
							
                        </p>
                    </div>
                </div>
            </div>
			
        </div>
    	
        <div class="bn-info-tab"> <!-- tab 2 - Address -->
        	
            <!-- Tab below is for selecting an address. Initially visible -->
            <div class="" id="bn-select-addr">
                    <div class="bn-tab-head"><h3>Delivery Address</h3></div>
                   
                   
                    <div class="bn-tab-body">
                    <?php
					//echo $adno;
					//while($a<=$c){
						//echo $c=strpos($adno," ");
						foreach($adno as $a){
							//echo "select st_name,landmark,city,state,pin_code from address where mobile='{$_SESSION['user']['mobile']}' and address_no='$a'";
						$query=mysql_query("select st_name,landmark,city,state,pin_code from address where mobile='{$_SESSION['user']['mobile']}' and address_no='$a'");
						//echo $c=mysql_num_rows($query);
						
				   if(mysql_num_rows($query)){
					   
							while($row=mysql_fetch_array($query)){
								
								if($row[0]!= "" && $row[1]!="" && $row[2]!= "" && $row[3]!="" && $row[4]!= ""){
				   
				   ?>
                        
                        <div class="bn-addr-card">
                       
                            <div class="bn-addr-container">
                                <div class="bn-addr-head">
                                    <p><span class="bn-default-home">Default - Home</span></p>
                                </div>
                                
                                <div class="bn-addr-body">
                                    <p><?php echo $row[0]; ?></p>
                                    <p><?php echo $row[1]." ".$row[2]." ".$row[3]; ?></p>
                                    
                                    <p>Pin Code -<?php echo $row[4]; ?></p>
                                </div>
                                
                                <div class="bn-addr-phone">
                                    <p>Phone:&nbsp;<span style="color:#333; font-weight:bold"><?php echo $_SESSION['user']['mobile'];  ?></span></p>
                                </div>
                                
                                <div class="bn-addr-deliv-button">
                                    <button class="bn-addr-deleiver-here-button" onClick="delv(<?php echo $a; ?>)">Deliver Here</button>
                                    	
                                </div> 
                                
                                <div class="bn-addr-edit-del">
                                    <button id="bn-addr-edit<?php echo $a; ?>" onClick="edit_addr(this.id)"  class="bn-addr-edit-class">Edit</button>
                                   <!--  <form method="get" action="delete_address.php" id="form2">
                                     <input type="hidden" name="a<?php echo $a; ?>" value="<?php echo $a; ?>" />-->
                                     
                                   <!-- <button id="bn-addr-del" onClick="window.location.href='delete_address.php?ad='+<?php echo $a; ?>+'&pid='+<?php echo $pid; ?>">Delete</button>-->
                                     <!--</form>-->
                                </div>
                            </div>
                           
                        </div>
                          <?php
						  
								}
								
							}
						}
						//$a=$a+1;
					}
					
					if($c<3){
					?>
                   
                        
                        <div class="bn-add-new-addr">
                            <button id="bn-add-new-addr-button"> +ADD NEW ADDRESS</button>
                        </div>
                        <?php
					}
						?>
                        
                        
                    </div>
                    
                    
            </div>
           
            
            <!-- Tab below is for selected address. Initially hidden -->
            <div class="bn-tab-hide" id="bn-selected-addr">
            	<div class="bn-step-confirmed">
                	<p>&#x2714;</p>
                </div>
                
                <div class="bn-step-name">
                	<p>DELIVERY ADDRESS</p><br/>
                    <p style="color:#0099FF; font-size:12px;" id="bn-change-addr-link">Change Adress</p>
                </div>
                
                <div class="bn-step-data">
                	<p>Name</p><br/>
                	<p>Address Line 1</p><br/>
                    <p>Address Line 1</p><br/>
                    <p>Mobile: 8697668896</p><br/>
                </div>
            </div>
           
            <?php
			$con="";
			$query1=mysql_query("select st_name,landmark,city,state,pin_code from address where mobile='{$_SESSION['user']['mobile']}' and address_no='1'");
						//echo $c=mysql_num_rows($query);
						
				   if(mysql_num_rows($query1)){
					   $row1=mysql_fetch_array($query1);
						if($row1[0]== "" && $row1[1]=="" && $row1[2]== "" && $row1[3]=="" && $row1[4]== ""){
						$con="bn-tab-hide";	
						}
						else{
							$con="bn-tab-hide";
								
						}
						?>
            <!-- Tab below is for neww address form. Initially Hidden -->
                        
             <div class="<?php echo $con; ?>" id="bn-new-addr-form">
            	<div class="bn-tab-head"><h3>Delivery Address</h3></div>
                
                <div class="bn-addr-form">
                	<p id="bn-addr-close-icon">&times;</p>
                    <form onSubmit="return checkAddrForm();" action="add_new_address.php" method="post">
                    	<table style="border-bottom: none; width: 65%;">
                        	<tr>
                            	<!--<td><p>Full Name</p></td>
                                <td><input type="text" placeholder="Enter Name"/></td>-->
                                <input type="hidden" name="add_no" id="add_num" />
                            </tr>
                            
                        	<tr>
                            	<td><p>Street Address</td>
                                <td><textarea rows="5" cols="50" name="st" id="st_ad" required placeholder="Enter Complete Street Address" ></textarea></td>
                            </tr>
                            
                        	<tr>
                            	<td><p>Landmark</p></td>
                                <td><input type="text" name="landmrk" id="land_ad" required autocomplete="off" placeholder="E.g. Near Park Street" /></td>
                            </tr>
                             <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="uri" />
                        	<tr>
                            	<td><p>City</p></td>
                                <td><input type="text" name="city" id="city_ad" required autocomplete="off" placeholder="E.g. Chennai" /></td>
                            </tr>
                            
                        	<tr>
                            	<td><p>State</p></td>
                                <td><select name="u_state" id="state_ad">
                    <option disabled selected>--Select--</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option> 
                    <option value="Delhi">Delhi</option>   
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                    <option value="Jharkand">Jharkand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    
                    </select></td>
                            </tr>
                            
                        	<tr>
                            	<td><p>Pin Code</p></td>
                                <td><input type="text" name="pc" required id="pc_ad" autocomplete="off" placeholder="Enter Pin Code" /></td>
                            </tr>
                            
                            <tr>
                            	<td></td>
                                <td><input type="submit" value="Save and Continue" id="bn-save-and-con-button" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <script>
					function checkAddrForm()
					{
						var st_ad = document.getElementById("st_ad");
						if(st_ad.value == "")
						{
							displayError(st_ad,"Enter Street Address")
							return false;
						}
						return true
					}
					
			     	function displayError(feild,text)
	  				{
			  			feild.style.borderColor = "red";
			  			feild.placeholder = text;
			  			feild.className += " user-error";
					}

				</script>
                
				
            </div>
            
           

        </div>
        
        <div class="bn-tab-hide" id="bn-tab-checkout"> <!-- tab 3 - Checkout -->
 	       <!--<div class="bn-tab-hide"> -->
                <div class="bn-tab-head"><h3>Checkout</h3></div>
                
                <div class="bn-tab-body">
                <?php
					if(!isset($_GET['pid'])){
						
				
				?>
                    <div class="bn-back-to-cart">
                        <p>Back to Cart</p><br/>
                        <a href="cart.php?msg="><img src="Image/back to cart.png" title="Go back to cart and edit your Order" /></a><br/>
                    </div>
                 <?php
					}
				 ?>
                    
                    <div class="bn-checkout">
                        <p>Proceed to Checkout</p><br/>
                        <a href="#" ><img src="Image/checkout.png" title="Proceed to Checkout" onClick="openCard()" id="bn-checkout-link" /></a><br/>
                    </div>
                </div>
                
		</div>	
       <!-- </div>-->
       
       <div class="bn-info-tab" style="">
           <div class="bn-tab-hide" id="bn-tab-payment"> <!-- tab 4 - select payment method -->
                <div class="bn-tab-head"><h3>Payment Method</h3></div>
                
                <div class="bn-tab-body" style="margin:0; padding:0;">
                    
                    <div class="bn-sidebar-payment-op" style="min-height:500px; background-color:#f2f2f2">
                    	<ul>
                        	<li><button class="payment_tablinks" onClick="openPaymentTab(event,'bn-credit-card')" id="bn-payment-button-credit-card">Credit Card</button></li>
                            <li><button class="payment_tablinks" onClick="openPaymentTab(event,'bn-debit-card')" id="bn-payment-button-debit-card">Debit Card</button></li>
                            <!--<li><button class="payment_tablinks" onClick="openPaymentTab(event,'bn-net-banking')">Net Banking</button></li> -->
                            <li style="border-bottom:1px solid #999"><button class="payment_tablinks" onClick="openPaymentTab(event,'bn-cod')" id="bn-payment-button-cod">Cash on Delivery</button></li>
                        </ul>
                        
                        <div class="bn-payment-type-img">
                        	<img src="Image/cash-to-delivery.png"/ id="bn-payment-img-src">
                            <p id="bn-payment-type-img-text"></p>
                        </div>
                    </div>
                    
                    <div class="bn-payment-form">
                    	
                        <div id="bn-credit-card" class="payment_tabcontent">
                        	
                        	<p style="font-size:14px; display:block; float:left; margin-top:5px; margin-right:5px;">Pay using: <span style="font-size:18px; color:#000">Credit Card</span></p>
                            <ul class="bn-payment-card-icons" style="margin-bottom:20px;">
                            	<li><img src="Image/rsz_visa_png38.png" /></li>
                                <li><img src="Image/mastercard_logo.png" /></li>
                                <li><img src="Image/Maestro-icon.png" /></li>
                                <li><img src="Image/Rupay.png" /></li>
                            </ul>
                            <br/>
                           <form method="post" action="card_loading.php" >
                            <?php
                            if(!isset($_GET['pid'])){
								$i=1;
								$sql2=mysql_query("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}' and Product_Id!='0'");
								if(mysql_num_rows($sql2)){
									while($row4=mysql_fetch_array($sql2)){
										?>
											<input type="hidden" name="pr<?php echo $i;?>" value="<?php echo $row4[2];?>" />
                                            <input type="hidden" name="qty<?php echo $i; ?>" value="<?php echo $row4[3]; ?>" />
											<?php
											$i++;
											}
											?>
                                            <input type="hidden" name="ct" value="y" />
                                            <?php
							
									}
								
						}
						else{
									$pid=$_GET['pid'];
									?>
                                    <input type="hidden" name="pr1" value="<?php echo $pid;?>" />
                                    <input type="hidden" name="qty1" value="1" />
                                    <input type="hidden" name="ct" value="n" />
                                    <?php
								
						}
				
				?>
                            	<table id="bn-credit-card-form">
                                	<tr>
                                     <input type="hidden" name="type_pay" value="Credit Card" />
                                     <input type="hidden" name="addr_sel" class="addr_select" id="addr1"  />
                                    	<td colspan="4"><input type="text" pattern="[0-9]{16}" maxlength="16" placeholder="Card Number" required style="width:350px;"/></td>
                                    </tr>
                                    <tr>
                                    	<td><input type="text" placeholder="MM / YY" pattern="[0-9]" required style="width:100px" /></td>
                                        <td><p style="font-size:12px; padding-left: 20px;">Expiry Date</p></td>
                                        <td style="padding-left: 60px;"><input type="text" placeholder="CVV" maxlength="3" pattern="[0-9]{3}" required style="width:70px;" /></td>
                                        <td style="padding-left: 10px;"><img src="Image/cvv.png" title="The CVV Number is the last 3 digits printed on the signature panel on the back side of the card."  style="height:45px; width:45px; margin-top:5px; cursor:pointer;"/></td>
                                    </tr>
                                    <tr>
                                   
                                    	<td colspan="4"><input type="text" placeholder="Name on Card" name="cowner" required style="width:350px;" /></td>
                                    </tr>
                                    <tr>
                                    	<td colspan="4"><input type="Submit" value="Confirm Payment" name="Credit_Conf"/></td>
                                    </tr>                                    
                                </table>
                            </form>
                            
                        </div>
                        
                        <div id="bn-debit-card" class="payment_tabcontent">
                        	<p style="font-size:14px; display:block; float:left; margin-top:5px; margin-right:5px;">Pay using: <span style="font-size:18px; color:#000">Debit Card</span></p>
                            <ul class="bn-payment-card-icons" style="margin-bottom:20px;">
                            	<li><img src="Image/rsz_visa_png38.png" /></li>
                                <li><img src="Image/mastercard_logo.png" /></li>
                                <li><img src="Image/Maestro-icon.png" /></li>
                                <li><img src="Image/Rupay.png" /></li>
                            </ul>
                            <br/>
                            <form method="post" action="card_loading.php" >
                            <?php
                            if(!isset($_GET['pid'])){
								$i=1;
								$sql2=mysql_query("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}' and Product_Id!='0'");
								if(mysql_num_rows($sql2)){
									while($row4=mysql_fetch_array($sql2)){
										?>
											<input type="hidden" name="pr<?php echo $i;?>" value="<?php echo $row4[2];?>" />
                                            <input type="hidden" name="qty<?php echo $i; ?>" value="<?php echo $row4[3]; ?>" />
											<?php
											$i++;
											}
											?>
                                            <input type="hidden" name="ct" value="y" />
                                            <?php
							
									}
								
						}
						else{
									$pid=$_GET['pid'];
									?>
                                    <input type="hidden" name="pr1" value="<?php echo $pid;?>" />
                                    <input type="hidden" name="qty1" value="1" />
                                    <input type="hidden" name="ct" value="n" />
                                    <?php
								
						}
				
				?>
                            	<table id="bn-debit-card-form">
                                	<tr>
                                     <input type="hidden" name="type_pay" value="Debit Card" />
                                    <input type="hidden" name="addr_sel" class="addr_select" id="addr2" />
                                    	<td colspan="4"><input type="text" placeholder="Card Number" pattern="[0-9]{16}" required maxlength="16" style="width:350px;"/></td>
                                    </tr>
                                    <tr>
                                    	<td><input type="text" placeholder="MM / YY" required maxlength="5" style="width:100px" /></td>
                                        <td><p style="font-size:12px; padding-left: 20px;">Expiry Date</p></td>
                                        <td style="padding-left: 60px;"><input type="text" placeholder="CVV" maxlength="3" pattern="[0-9]{3}" required style="width:70px;" /></td>
                                        <td style="padding-left: 10px;"><img src="Image/cvv.png" title="The CVV Number is the last 3 digits printed on the signature panel on the back side of the card."  style="height:45px; width:45px; margin-top:5px; cursor:pointer;"/></td>
                                    </tr>
                                    <tr>
                                    	<td colspan="4"><input type="text" placeholder="Name on Card" required style="width:350px; " name="downer" /></td>
                                    </tr>
                                        <td colspan="4"><input type="submit" value="Confirm Payment" name="Debit_Conf" id="bn-debit-card-pay" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        
                        <!--<div id="bn-net-banking" class="payment_tabcontent">
                        	<p>Net Banking</p>
                        </div>-->
                        
                        <div id="bn-cod" class="payment_tabcontent" style="width:450px">
                        <p style="font-size:14px; display:block; float:left; margin-top:5px; margin-right:5px;">Pay using: <span style="font-size:18px; color:#000">Cash on Delivery</span></p>
                        	<div style="display:block; float:left;">
                            <form method="post" action="<?php echo $u; ?>" >
                            <?php
                            if(!isset($_GET['pid'])){
								$i=1;
								$sql2=mysql_query("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}' and Product_Id!='0'");
								if(mysql_num_rows($sql2)){
									while($row4=mysql_fetch_array($sql2)){
										?>
											<input type="hidden" name="pr<?php echo $i;?>" value="<?php echo $row4[2];?>" />
                                            <input type="hidden" name="qty<?php echo $i; ?>" value="<?php echo $row4[3]; ?>" />
											<?php
											$i++;
											}
											?>
                                            <input type="hidden" name="ct" value="y" />
                                            <?php
							
									}
								
						}
						else{
									$pid=$_GET['pid'];
									?>
                                    <input type="hidden" name="pr1" value="<?php echo $pid;?>" />
                                    <input type="hidden" name="qty1" value="1" />
                                    <input type="hidden" name="ct" value="n" />
                                    <?php
								
						}
				
				?>
                                <table style="width:100%;" class="bn-cod-form">
                                    <tr>
                                    <input type="hidden" name="type_pay" value="Cash On Delivery" />
                                     <input type="hidden" name="addr_sel" class="addr_select" id="addr3" />
                                        <td><p  id="captcha"><img src="captcha.php" id="capt_img" title="Captcha" style="border:1px dashed blue;"><img src="Image/refresh.png" onClick="cap()"  title="Refresh Text in Captcha Image" id="bn-captcha-refresh"/> </p></td>
                                        <br/>
                                        <td><input type="text" name="captcha_txt" maxlength="6" placeholder="Enter Captcha Here" required style="width:200px;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><p><span style="font-size:16px; font-weight:bold; color:#333">Verify Order</span><br/> Type the characters you see in the image on the left. Letters shown are case-sensitive.</p></td>
                                    </tr>
                                    <tr>
                                    
                                    	<td colspan="2"><input type="submit" name="captcha_conf" value="Confirm Order"/></td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
           </div>
       </div>
    </div>
</div>

<div class="content bn-summary-container">
    <div class="bn-summary">
    	<p style="font-size:18px;text-align:center; color:#C00;">ORDER SUMMARY</p><br/>
        <?php
		$total=0;
		if(!isset($_GET['pid'])){
				$sql1=mysql_query("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}'");
				
			
			?>
			
			<div class="bn-item-summary">
			
			<?php
				if(mysql_num_rows($sql1)){
					while($row2=mysql_fetch_array($sql1)){
						$query2=mysql_query("select Product_Name,Price from watch where Product_Id='$row2[2]'");
						if(mysql_num_rows($query2)){
							$row3=mysql_fetch_array($query2);
							$total=$total+($row2[3]*$row3[1]);
			?>
				<ul>
					<li style="font-weight:bold; color: #60bf79;"><?php echo $row3[0]; ?></li>
					<li>Quantity: <?php echo $row2[3]; ?></li>
					<li>Price: <span style="font-weight:bold; color:#000">&#8377;<?php echo $row3[1]; ?></span></li>
				</ul>
				<?php
						}
					
					}
				}
		}
		else{
			?>
			<div class="bn-item-summary">
			
			<?php
				$pid=$_GET['pid'];
						$query2=mysql_query("select Product_Name,Price from watch where Product_Id='$pid'");
						if(mysql_num_rows($query2)){
							$row3=mysql_fetch_array($query2);
							$total=$total+(1*$row3[1]);
			?>
				<ul>
					<li style="font-weight:bold; color: #0099FF;"><?php echo $row3[0]; ?></li>
					<li>Quantity: 1<!--<input type="number" value="1" max="5" min="1" />--></li>
					<li>Price: <span style="font-weight:bold; color:#000;">&#8377;<?php echo $row3[1]; ?></span></li>
				</ul>
				<?php
						}
					
					
			
			
			
			
			
			
		}
				?>
           <!-- <ul>
            	<li style="font-weight:bold;">Item Name Here</li>
            	<li>Quantity: 1</li>
            	<li>Price: <span style="font-weight:bold;">Rs. 4,999</span></li>
        	</ul>
            <ul>
            	<li style="font-weight:bold;">Item Name Here</li>
            	<li>Quantity: 1</li>
            	<li>Price: <span style="font-weight:bold;">Rs. 4,999</span></li>
        	</ul>
            <ul>
            	<li style="font-weight:bold;">Item Name Here</li>
            	<li>Quantity: 1</li>
            	<li>Price: <span style="font-weight:bold;">Rs. 4,999</span></li>
        	</ul>-->
            
            <ul style="border-bottom: 1px solid #333">
            	<li>Total: <span style="font-size:18px; font-weight:bold; color:#000;">&#8377;<?php echo $total; ?></span></li>
                <li>Delivery Charges: <span style="color:#009900;">Free</span></li>
            </ul>
            
            <p><span style="font-size:20px;">Total Amount:</span> <span style="font-size:28px; font-weight:bold; color:#000;">&#8377;<?php echo $total; ?></span></p>
        </div>
    </div>
    		
					<?php
					$_SESSION['total_price']=$total;
					}
				
				}
			?>
</div>

<?php include("foot.php");
ob_end_flush();
?>

