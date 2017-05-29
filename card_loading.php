<?php
session_start();

 
 if(isset($_POST['Debit_Conf']) ||  isset($_POST['Credit_Conf'])){
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
		$name="";
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
		 $ct=$_POST['ct'];
if(isset($_POST['cowner'])){
	$name=$_POST['cowner'];
}
if(isset($_POST['downer'])){
	$name=$_POST['downer'];
}

		 echo $str=mt_rand(100000,999999);
			//$str=substr($str,0,6);
			
			$_SESSION['pay_otp']=$str;
			$a="";
			$otp="";
			$a="{$_SESSION['user']['mobile']}";
			
			 $mob="91".$a;
			 $otp=$str;
			 
			 // Authorisation details.
			$username = "vibhashpratik19@gmail.com";
			$hash = "3391f9ae6f51d9d6cdc10f072242c56edb24c872c0dca866e9fb3970c7318e79";
		
			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";
		
			// Data for text message. This is the text message data.
			$sender = "TXTLCL"; // This is who the message appears to be from.
			$numbers = "$mob"; // A single number or a comma-seperated list of numbers
			$message = "Your One Time Password (OTP) is $otp";
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$message = urlencode($message);
			$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			$ch = curl_init('http://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch); // This is the result from the API
			curl_close($ch);
			echo $result;

 }
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="4;url=otp_page.php?type_pay=<?php echo $pay; ?>&cowner=<?php echo $name;?>&downer=<?php echo $name;?>&pr1=<?php echo $pr1;?>&pr2=<?php echo $pr2; ?>&pr3=<?php echo $pr3; ?>&pr4=<?php echo $pr4; ?>&pr5=<?php echo $pr5; ?>&qty1=<?php echo $qty1; ?>&qty2=<?php echo $qty2; ?>&qty3=<?php echo $qty3; ?>&qty4=<?php echo $qty4; ?>&qty5=<?php echo $qty5; ?>&addr_sel=<?php echo $address; ?>&ct=<?php echo $ct; ?>"  />
<style>
.sk-fading-circle {
  margin-left:650px;
  margin-top:250px;
  width: 40px;
  height: 40px;
  position: relative;
}

.sk-fading-circle .sk-circle {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.sk-fading-circle .sk-circle:before {
  content: '';
  display: block;
  margin: 0 auto;
  width: 15%;
  height: 15%;
  background-color: #FFF;
  border-radius: 100%;
  -webkit-animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
          animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
}
.sk-fading-circle .sk-circle2 {
  -webkit-transform: rotate(30deg);
      -ms-transform: rotate(30deg);
          transform: rotate(30deg);
}
.sk-fading-circle .sk-circle3 {
  -webkit-transform: rotate(60deg);
      -ms-transform: rotate(60deg);
          transform: rotate(60deg);
}
.sk-fading-circle .sk-circle4 {
  -webkit-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
          transform: rotate(90deg);
}
.sk-fading-circle .sk-circle5 {
  -webkit-transform: rotate(120deg);
      -ms-transform: rotate(120deg);
          transform: rotate(120deg);
}
.sk-fading-circle .sk-circle6 {
  -webkit-transform: rotate(150deg);
      -ms-transform: rotate(150deg);
          transform: rotate(150deg);
}
.sk-fading-circle .sk-circle7 {
  -webkit-transform: rotate(180deg);
      -ms-transform: rotate(180deg);
          transform: rotate(180deg);
}
.sk-fading-circle .sk-circle8 {
  -webkit-transform: rotate(210deg);
      -ms-transform: rotate(210deg);
          transform: rotate(210deg);
}
.sk-fading-circle .sk-circle9 {
  -webkit-transform: rotate(240deg);
      -ms-transform: rotate(240deg);
          transform: rotate(240deg);
}
.sk-fading-circle .sk-circle10 {
  -webkit-transform: rotate(270deg);
      -ms-transform: rotate(270deg);
          transform: rotate(270deg);
}
.sk-fading-circle .sk-circle11 {
  -webkit-transform: rotate(300deg);
      -ms-transform: rotate(300deg);
          transform: rotate(300deg); 
}
.sk-fading-circle .sk-circle12 {
  -webkit-transform: rotate(330deg);
      -ms-transform: rotate(330deg);
          transform: rotate(330deg); 
}
.sk-fading-circle .sk-circle2:before {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s; 
}
.sk-fading-circle .sk-circle3:before {
  -webkit-animation-delay: -1s;
          animation-delay: -1s; 
}
.sk-fading-circle .sk-circle4:before {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s; 
}
.sk-fading-circle .sk-circle5:before {
  -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s; 
}
.sk-fading-circle .sk-circle6:before {
  -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s; 
}
.sk-fading-circle .sk-circle7:before {
  -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s; 
}
.sk-fading-circle .sk-circle8:before {
  -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s; 
}
.sk-fading-circle .sk-circle9:before {
  -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
}
.sk-fading-circle .sk-circle10:before {
  -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
}
.sk-fading-circle .sk-circle11:before {
  -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
}
.sk-fading-circle .sk-circle12:before {
  -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
}

@-webkit-keyframes sk-circleFadeDelay {
  0%, 39%, 100% { opacity: 0; }
  40% { opacity: 1; }
}

@keyframes sk-circleFadeDelay {
  0%, 39%, 100% { opacity: 0; }
  40% { opacity: 1; } 
}
</style>
<script>
function myFunction() {
						var myVar;
						var x = Math.floor(5000);
						
						myVar = setTimeout(showPage, x);
					}
					
					function showPage() {
						
					  document.getElementById("spinner-buy").style.display = "none";
					  //document.getElementById("product-content").style.display = "block";
					}
					
					window.onload=myFunction;
					
					 
</script>
</head>
<body>
<div  id="spinner-buy" style=" z-index:200; position:fixed; height:100%; top:0; left:0; width:100%;; background-color:rgba(0,0,0,0.9);">
              <div  class="sk-fading-circle">
                  <div class="sk-circle1 sk-circle"></div>
                  <div class="sk-circle2 sk-circle"></div>
                  <div class="sk-circle3 sk-circle"></div>
                  <div class="sk-circle4 sk-circle"></div>
                  <div class="sk-circle5 sk-circle"></div>
                  <div class="sk-circle6 sk-circle"></div>
                  <div class="sk-circle7 sk-circle"></div>
                  <div class="sk-circle8 sk-circle"></div>
                  <div class="sk-circle9 sk-circle"></div>
                  <div class="sk-circle10 sk-circle"></div>
                  <div class="sk-circle11 sk-circle"></div>
                  <div class="sk-circle12 sk-circle"></div>
                  
                </div>
                <div id="buy-loader-info" style="font-family:Georgia, 'Times New Roman', Times, serif; margin-top:25px; color:white; width:100%; display:block; text-align:center; margin-left:auto; margin-right:auto; font-size:18px; font-weight:bold;">Processing..</div>
              
</div>
</body>
</html>