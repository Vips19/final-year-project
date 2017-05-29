<?php
 include("head.php");
  if(isset($_GET['msg'])){
	 $msg=$_GET['msg'];
 }
 else{
	 $msg=" ";
 }
 
 if($msg!=" "){
		?>
        <script>alert("<?php echo $msg; ?>");</script>
        
        <?php
 }
  ?>





<div class="content" style="width:100%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);; margin:0; padding:0;">
	<div class="slider">
    </div>
	
   <!-- <h2>Top Deals</h2>
    
    <table class="main" align="center">
    	<tr>
        	<td><a href="test.php?val=1"><img src="brand images/casio shop now.jpg" /></a></td>
            <td><a href="product.php?val=2"><img src="brand images/Aamir Khan  Titan Ad  Wallpapers.jpg" /></a></td>
            <td><a href="product.php?val=3"><img src="brand images/Fastrack-Bikers-925591274-2164881-1.jpg" /></a></td>
        </tr>
        <tr>
        	<td><a href="product.php?val=4"><img src="brand images/tag huer.jpg" /></a></td>
            <td><a href="product.php?val=5"><img src="brand images/timex.jpg" /></a></td>
            <td><a href="product.php?val=6"><img src="brand images/rado-og.png"/></a></td>
        </tr>
	</table>-->
    <?php include("slideshow.php"); ?>
    
    <h2>Top Brands</h2>
    
    <table class="brand">
    	<tr>
        	<td><a href="product.php?ft=&g=&bname=Casio"><img src="brand images/casio.png" /></a></td>
            <td><a href="product.php?ft=&g=&bname=Fastrack"><img src="brand images/Fastrack.jpg" /></a></td>
            <td><a href="product.php?ft=&g=&bname=Rado"><img src="brand images/rado.jpg" /></a></td>
            <td><a href="product.php?ft=&g=&bname=Titan"><img src="brand images/titan-logo.jpg" /></a></td>
            <td><a href="product.php?ft=&g=&bname=Sonata"><img src="brand images/sonata.jpg" /></a></td>
        </tr>
    </table>
    
    <div class="end">
    <table class="trust">
    	<tr>
        	<td><img src="Image/original.png" /></td>
            <td>100% Original! All products are original and go through strict quality check.</td>
        </tr>
        <tr>
        	<td><img src="Image/return.png" /></td>
            <td>10 Days Return! Use our hassle free method to return. Call 1800-108-1100</td>
        </tr>
        <tr>
        	<td><img src="Image/shippin.png" /></td>
            <td> Shipping in India is free. Shipping charges applicable for International locations.</td>
        </tr>
        
    </table>

    <img src="Image/trust-us.png" style="float:left; display:block; margin-left:200px;" height="200px" width="200px"/>
	</div>
    
<?php include("foot.php"); ?>