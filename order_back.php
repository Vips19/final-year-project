<?php ob_start();


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="4;url=user_home.php"  />
<style>
.sk-fading-circle {
  margin-left:650px;
  margin-top:0px;
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
  background-color: #000;
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

<div  id="spinner-buy" style=" z-index:200; position:fixed; height:100%; top:0; left:0; width:100%; background-color:rgb(f,f,f);">
<div><img src="Image/cc-avenue.jpg" width="353" height="137" style=" margin-top:180px; margin-left:500px;" /></div>
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
                <div id="buy-loader-info" style="font-family:Georgia, 'Times New Roman', Times, serif; margin-top:25px; color:#353535; width:100%; display:block; text-align:center; margin-left:auto; margin-right:auto; font-size:24px; font-weight:bold;">Please be patient while we redirect you to Merchant site.</div>
              <div style="font-family:Georgia, 'Times New Roman', Times, serif; margin-top:25px; color:#8C8C8C; width:100%; display:block; text-align:center; margin-left:auto; margin-right:auto; font-size:14px; font-weight:bold;">Do not "close the window" or "refresh the window" or browser back button.</div>
</div>
</body>
</html>
<?php


// header("location:user_home.php?msg=");
 ob_end_flush();
  ?>