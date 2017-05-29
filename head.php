<?php
	mysql_connect("localhost","root","");
	mysql_select_db("watch_ecommerce");
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="basic style.css" />
<link rel="stylesheet" type="text/css" href="home.css" />
<link rel="stylesheet" type="text/css" href="sidebar.css" />
<link rel="stylesheet" type="text/css" href="product.css" />
<link rel="stylesheet" type="text/css" href="product_info.css" />
<link rel="stylesheet" type="text/css" href="user_home.css" />
<link rel="stylesheet" type="text/css" href="login.css" />
<link rel="stylesheet" type="text/css" href="cart.css" />
<link rel="stylesheet" type="text/css" href="slideshow.css" />
<link rel="stylesheet" type="text/css" href="buy_now.css" />
<script src="jquery-3.1.1.min.js"></script>
<script>
		function sitem(str) {
  							var xhttp;
							 if (str.length == 0) { 
      							  document.getElementById("sbar").innerHTML = "";
        							return;
    						} 
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("sbar").innerHTML = this.responseText;
									
    								}
 							 };
 							 xhttp.open("GET", "srchbar.php?s="+str, true);
							 
  							 xhttp.send();
							 
							 
							 
							
						}
</script>
</head>


<body class="default" onLoad="sidechk()"><!-- filter_check page -->
	<div class="head" style="z-index:100;">
    	<div class="sh1">
        	<img src="brand images/logo.jpg" alt="logo" onClick="window.location.href='product_home.php'" height="80px" width="250px" class="align" />
            
            <ul>
            	<li>
               
				<?php
					if(isset($_SESSION['user'])){
						?>
                       
                       <div class="dropdown"> 
                           <p style="color:#FFF;">
						   <?php
						   
						   		 if($_SESSION['user']['f_name'] == "" && $_SESSION['user']['l_name'] == ""){
									 
									 echo $_SESSION['user']['email'];
								 }
								 else{
									 echo $_SESSION['user']['f_name']." ".$_SESSION['user']['m_name']." ".$_SESSION['user']['l_name'];
								 }
							
							?></p>
                           
                           <div class="dropdown-content">
                             		<a href="user_home.php">Account Settings</a>
                                    <a href="cart.php?msg=">My Cart</a>
                                    <a href="user_logout.php">Logout</a>
                           </div>                     
                       </div>
                       <?php
		           }
				   else{
					   ?>
                       
                       <div class="dropdown">	
                  	        <p id="login-button">Login</p>
                            
                            <div class="dropdown-content">
                            	<a href="#" onclick="document.getElementById('login').style.display='block'">User Login</a>
                                <a href="Admin_login.php?ch">Admin Login</a>
                            </div>
                       </div> 
                    <?php
				   }
				   ?>
				
				</li>
                <!--<li><a href="#">Customer Care</a></li>-->	
            </ul>
           
            <form action="search_display.php">
            	<input type="text" id="txt_search" class="align" placeholder="Search..." autocomplete="off" onKeyUp="sitem(this.value)"/>
                <p class="align" id="sbar" style="position:absolute; left:250px; top:67px;overflow-y:scroll;max-height:200px;"></p>
            </form>
            <?php
			$c="";
			$url="";
			if(isset($_SESSION['user'])){
				$query=mysql_query("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}' and Product_Id!='0'");
				$c=mysql_num_rows($query);
				$url="window.location.href='cart.php?msg='";
			}
			?>
             <img src="brand images/cart.png" id="cart-logo"  width="100px" height="50px" onClick="<?php echo $url; ?>" style="cursor:pointer; margin-left:80px;"  />
             <p id="cart-logo-no"><?php echo $c; ?></p>
           
        
        </div>
        
        <div class="sh2">
        	<ul style="float:left">
            	<li><a href="product.php?ft=Analog&g=&bname=">Analog</a></li>
                <li><a href="product.php?ft=Digital&g=&bname=">Digital</a></li>
                <li><a href="product.php?ft=Analog-Digital&g=&bname=">Analog-Digital</a></li>	
            </ul>
            <ul style="float:left">
            	<li><a href="product.php?g=Men&ft=&bname=">Men</a></li>
                <li><a href="product.php?g=Women&ft=&bname=">Women</a></li>
                <li><a href="product.php?g=Couple&ft=&bname=">Couple</a></li
            ></ul>
        </div>
    </div>
    <div id="login" class="modal"> 	
        
        <div class="modal-content animate">
        
        <div class="side-img">
        	<img src="Image/banner-tall.jpg" height="620px" width="260px"/>
        </div>
        
        <div class="login-form">
            
            
                <span class="close" onclick="document.getElementById('login').style.display='none'">&times </span>
                <span class="back" id="back-arrow" style="visibility:hidden;">&#10140; </span>
        
       
            	<div id="visible" class="form-login">
                <?php $url1=$_SERVER['REQUEST_URI']; ?>
       <form onSubmit="return chkLogin();" method="post" action="login_back.php">
       <input type="hidden" value="<?php echo $url1;  ?>" name="uri" />
                    <table>
                        <tr>
                            <td style="padding-bottom:0px;"><p>Mobile No.</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="mn" autofocus placeholder="Enter Mobile No." id="username" /></td>
                        </tr>
                        <tr>
                            <td style="padding-bottom:0px;"><p>Password</p></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="lpwd" placeholder="Enter Password" id="pwd" /></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Login" id="log-in" /></td>
                        </tr><tr>
                            <td><input type="button" value="New Here? Sign Up!" id="btn-signup" /></td>
                        </tr>
                    </table>
                    
                      <div class="list" style="padding-left:20px; margin-top:30px;">
                         <p>With an account you can:</p>
                         <ul>
                             <li>Maintian a wishlist.</li>
                             <li>Purchase Watches.</li>
                             <li>Keep track your purchases.</li> 
                         </ul>
                     </div>
                     </form>
                     
                     <script>
					 	function chkLogin()
						{
							var uname = document.getElementById("username");
							var pwd = document.getElementById("pwd");
							
							if(uname.value == "")
							{
								displayError(uname,"Enter a Valid Mobile No.");
								return false;
							}
							
							 if(pwd.value == "")
							{	
								displayError(pwd,"Enter Correct Password");
								return false;
							}
							return true;
						}
						
					 </script>
                     
                </div>
                <!-- style="visibility:hidden; height:0; width:0;"    style="width:92%; "         -->
                <div id="hidden" class="form-signup" style="margin-top:50px;">
                <form onSubmit="return chkSignup();" action="signup_back.php" method="post">
                <input type="hidden" value="<?php echo $url1;?>" name="uri" />
                	<p style="text-align:center; font-size:22px; color:black; font-weight:bold; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">
                    	New Here? Sign Up!
                    </p>
                    <table style="border-bottom:none;">
                        <tr>
                            <td><p>Enter E-Mail ID</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="em" autofocus placeholder="E-Mail" id="email" /></td>
                        </tr>
                        <tr>
                            <td><p>Enter Mobile Nunmber</p></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="mob" placeholder="Mobile No." id="mobile" /></td>
                        </tr>
                        <tr>
                            <td><p>Enter a Password</p></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="spwd" placeholder="Password" id="new-pwd" /></td>
                        </tr>
                        <tr>
                            <td><p>Re-Enter Password</p></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="repwd" placeholder="Re-Enter Password" id="conf-pwd" /></td>
                        </tr>
                        <tr>
                        	<td><input type="Submit" value="Create My Account" /></td>
                        </tr>
                    </table>
            </form>
            
            	<script>
				
					//var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					
					function chkSignup()
					{
						 var em = document.getElementsByTagName("em");
						 var mob = document.getElementsByTagName("mob");
						 var npwd = document.getElementByTagName("spwd");
						 var cpwd = document.getElementById("repwd");
						 var atpos = em.indexOf("@");
    					 var dotpos = em.lastIndexOf(".");
    					 
						 if(em.value == "")
						 {
							 displayError(em,"Enter an Email ID");
						 	 return false;
						 }
						 if (em.value != "" && (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)) 
						 {
							 displayError(em,"Not a Valid Email ID");
        				     return false;
					     }
						 
						 if(mob.value = "")
						 {
							displayError(mob,"Enter a Mobile No.");
							return false; 
						 }
						 
						 if(npwd.value = "")
						 {
							displayError(npwd,"Enter a Password");
							return false; 
						 }
						 
						 if(cpwd.value = "")
						 {
							displayError(cpwd,"Re-Enter Password");
							return false; 
						 }
						 
						 if(npwd.value != cpwd .value)
						 {
							 cpwd.value = "";
							 displayError(cpwd,"Passwords don't Match");
						 }
						 return true;
					}
					
				</script>
            
                </div>
            
            
        </div> <!-- End of Login Form -->
        </div> <!-- End of Modal Content -->
    </div><!-- End of Modal -->
   

	<script>
	  //Error Hightlight Function
	  
	 function displayError(feild,text)
	  {
			  feild.style.borderBottomColor = "red";
			  feild.placeholder = text;
			  feild.className += " user-error";
		}
	  
		// Get the modal
      var modal = document.getElementById('login');
    
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
			
			var uname = document.getElementById("username");
			var pwd = document.getElementById("pwd");
			
			uname.style.borderBottomColor = "#ccc";
			uname.placeholder = "Enter Mobile No.";
			uname.className = "";
			
			pwd.style.borderBottomColor = "#ccc";
			pwd.placeholder = "Enter Password";
			pwd.className = "";
        }
      }
	  
	  $(document).ready(function(e) {
		   //functions to toggle the visibility of the two forms in the login and sign up page
         $("#back-arrow").click(function(){
			
			  $(".form-login").attr("id","visible");
	  		  $(".form-signup").attr("id","hidden"); 
			  $("#back-arrow").css("visibility","hidden");	
	  })
	  
	  $("#btn-signup").click(function(){
		
			  $(".form-login").attr("id","hidden");
	  		  $(".form-signup").attr("id","visible");
			  $("#back-arrow").css("visibility","visible"); 	
	  })
    });
	 
	 
	 
	  
	</script>
    
   
    
   <div class="body">
   <!-- 	<div class="sidebar">
        	<p> this is sidebar </p>
        </div> -->
        
        
        