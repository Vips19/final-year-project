
<?php
	include("connection.php");
	 $fun_t=$_GET['f'];
	 $gen=$_GET['g'];
	 $bn=$_GET['b'];
	$o=$_GET['o'];
?>




<?php
$query=mysql_query("select Brand_Id from brand where Brand_Name='$bn'");
	if(mysql_num_rows($query)){
		$row1=mysql_fetch_array($query);
		
	}
$pagination="";
	if($gen!=""){
	$query1=mysql_query("select Product_Id,Product_Name,Price from watch where Gender='$gen' and Quantity!='0' UNION select Product_Id,Product_Name,Price from watch where Gender like '$gen %' and Quantity!='0' UNION select Product_Id,Product_Name,Price from watch where Gender like '% $gen' and Quantity!='0'");
	 $c1=mysql_num_rows($query1);
	}
	if($fun_t!==""){
	$query2=mysql_query("select Product_Id,Product_Name,Price from watch where Function_Type='$fun_t' and Quantity!='0'");
	 $c1=mysql_num_rows($query2);
	}
	if($bn!==""){
	$query2=mysql_query("select Product_Id,Product_Name,Price from watch where Brand_Id='$row1[0]' and Quantity!='0'");
	  $c1=mysql_num_rows($query2);
	}
	
	if(isset($_GET['page'])){
		$page=preg_replace("#[^0-9]#","",$_GET['page']);		
	}
	else{
		$page=1;
	}
	
	$perpage=12;
	
	
	$lastpage=ceil($c1/$perpage);
	
	if($page<1){
		$page=1;
	}
	elseif($page>$lastpage){
		$page=$lastpage;
	}
	
	 $limit="LIMIT ".($page-1)*$perpage.",$perpage";
	
	
	
	if($fun_t=="" and $gen=="" and $bn!=""){
		if($o=="lth"){
	$sql="select Product_Id,Product_Name,Price from watch where Brand_Id='$row1[0]' and Quantity!='0' ORDER BY Price  $limit";
	$rs=mysql_query($sql);
		}
		else{
			$sql="select Product_Id,Product_Name,Price from watch where Brand_Id='$row1[0]' and Quantity!='0' ORDER BY Price DESC $limit";
		$rs=mysql_query($sql);
		}
	
	
	
	if($lastpage!=1){
		
		if($page!=$lastpage){
			$next=$page+1;
		     $pagination ='<a href="Product.php?page='.$next.'&ft=&g=&bname='.$bn.'&o='.$o.'" id="nxt">Next</a>';	
		}
		if($page!=1){
			$prev=$page-1;
			 $pagination .='<a href="Product.php?page='.$prev.'&ft=&g=&bname='.$bn.'&o='.$o.'" id="prv">Previous</a>';	
		}
			
	}
	else{
		$pagination ="";	
	}
	
	if(mysql_num_rows($rs)){
		while($row=mysql_fetch_array($rs)){
			?>
	<div class="card">
    	<!--<div class="icon">
        	<div class="cart">
            	<img src="Image/cart-on-mouse-exit.png" id="cart-icon">
            </div>
            
            <div class="wishlist">
            	<img src="Image/heart-grey.png" id="wishlist-icon">
            </div>
        </div>-->
    <?php
    	$sql1="select Image1 from images where Product_Id='$row[0]'";
		$rs1=mysql_query($sql1);
		if(mysql_num_rows($rs1)){
			$row1=mysql_fetch_array($rs1);
		}
		?>
    	<div class="card-img">
        <a href="product_info.php?Product_Id=<?php echo $row[0]; ?>&cmsg=&msg=" >
    		<!--<img src="<?php echo $row1[0]; ?>" />-->
            <div class="img-thumbnail" style="background-image:url('<?php echo $row1[0]; ?>')"></div>
         </a>
        </div>
        <div class="card-data">
        	<div class="product-name"><p><?php echo $row[1]; ?></p></div>
            <div class="product-price">&#8377; <?php echo $row[2]; ?></p></div>
        </div>
    </div>
		<?php
        	}
		}
	}
	elseif($fun_t!=="" and $gen=="" and $bn==""){
		if($o=="lth"){
		 $sql="select Product_Id,Product_Name,Price from watch where Function_Type='$fun_t' and Quantity!='0' ORDER BY Price $limit ";
		$rs=mysql_query($sql);
		}
		else{
			 $sql="select Product_Id,Product_Name,Price from watch where Function_Type='$fun_t' and Quantity!='0' ORDER BY Price DESC $limit ";
			$rs=mysql_query($sql);
		}
		
		if($lastpage!=1){
		
		if($page!=$lastpage){
			$next=$page+1;
		     $pagination ='<a href="Product.php?page='.$next.'&ft='.$fun_t.'&g=&bname=&o='.$o.'" id="nxt">Next</a>';	
		}
		if($page!=1){
			$prev=$page-1;
			 $pagination .='<a href="Product.php?page='.$prev.'&ft='.$fun_t.'&g=&bname=&o='.$o.'" id="prv">Previous</a>';	
		}
			
	}
	else{
		$pagination ="";	
	}
	
	if(mysql_num_rows($rs)){
		while($row=mysql_fetch_array($rs)){
			?>
	<div class="card">
    	<!--<div class="icon">
        	<div class="cart">
            	<img src="Image/cart-on-mouse-exit.png" id="cart-icon">
            </div>
            
            <div class="wishlist">
            	<img src="Image/heart-grey.png" id="wishlist-icon">
            </div>
        </div>-->
    <?php
    	$sql1="select Image1 from images where Product_Id='$row[0]'";
		$rs1=mysql_query($sql1);
		if(mysql_num_rows($rs1)){
			$row1=mysql_fetch_array($rs1);
		}
		?>
    	<div class="card-img">
        <a href="product_info.php?Product_Id=<?php echo $row[0]; ?>&cmsg=&msg=" >
    		<!--<img src="<?php echo $row1[0]; ?>"  />-->
            <div class="img-thumbnail" style="background-image:url('<?php echo $row1[0]; ?>')"></div>
         </a>
        </div>
        <div class="card-data">
        	<div class="product-name"><p><?php echo $row[1]; ?></p></div>
            <div class="product-price">&#8377; <?php echo $row[2]; ?></p></div>
        </div>
    </div>
		<?php
        	}
		}
	}
	else{
		if($o=="lth"){
		$sql="select Product_Id,Product_Name,Price from watch where Gender='$gen' and Quantity!='0' UNION select Product_Id,Product_Name,Price from watch where Gender like '$gen %' and Quantity!='0' UNION select Product_Id,Product_Name,Price from watch where Gender like '% $gen' and Quantity!='0' ORDER BY Price $limit";
		$rs=mysql_query($sql);
		}
		else{
			$sql="select Product_Id,Product_Name,Price from watch where Gender='$gen' and Quantity!='0' UNION select Product_Id,Product_Name,Price from watch where Gender like '$gen %' and Quantity!='0' UNION select Product_Id,Product_Name,Price from watch where Gender like '% $gen' and Quantity!='0' ORDER BY Price DESC $limit";
		$rs=mysql_query($sql);
		}
		 
		if($lastpage!=1){
		
		if($page!=$lastpage){
			$next=$page+1;
		     $pagination ='<a href="Product.php?page='.$next.'&g='.$gen.'&ft=&bname=&o='.$o.'" id="nxt">Next</a>';	
		}
		if($page!=1){
			$prev=$page-1;
			 $pagination .='<a href="Product.php?page='.$prev.'&g='.$gen.'&ft=&bname=&o='.$o.'" id="prv">Previous</a>';	
		}
			
	}
	else{
		$pagination ="";	
	}
	
	if(mysql_num_rows($rs)){
		while($row=mysql_fetch_array($rs)){
			?>
	<div class="card">
    	<!--<div class="icon">
        	<div class="cart">
            	<img src="Image/cart-on-mouse-exit.png" id="cart-icon">
            </div>
            
            <div class="wishlist">
            	<img src="Image/heart-grey.png" id="wishlist-icon">
            </div>
        </div>-->
    <?php
    	$sql1="select Image1 from images where Product_Id='$row[0]'";
		$rs1=mysql_query($sql1);
		if(mysql_num_rows($rs1)){
			$row1=mysql_fetch_array($rs1);
		}
		?>
    	<div class="card-img">
        <a href="product_info.php?Product_Id=<?php echo $row[0]; ?>&cmsg=&msg=" >
    		<!--<img src="<?php echo $row1[0]; ?>"   />-->
            <div class="img-thumbnail" style="background-image:url('<?php echo $row1[0]; ?>')"></div>
         </a>
        </div>
        <div class="card-data">
        	<div class="product-name"><p><?php echo $row[1]; ?></p></div>
            <div class="product-price">&#8377; <?php echo $row[2]; ?></p></div>
        </div>
    </div>
		<?php
        	}
		}
	}
		
        

?>
    
    <script>
	$(document).ready(function() {
		$(".wishlist #wishlist-icon").on({
	 		mouseenter : function() {
             $(this).attr("src","Image/heart-red.png");
  		},
 		    mouseleave : function() {
             $(this).attr("src","Image/heart-grey.png");
  		},
			click : function() {
			 alert('Heart Clicked');
		}
    });

	$(".cart #cart-icon").on({
		mouseenter : function() {
			$(this).attr("src","Image/cart-on-mouse-enter.png");
		},
		mouseleave : function() {
			$(this).attr("src","Image/cart-on-mouse-exit.png");
		},
		click : function() {
			alert('cart clicked');
		}
	});
});
</script>
    
	<div id="pgn">
		<?php echo $pagination; ?>
	</div>
