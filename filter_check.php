<?php
 include("head.php");
 

 		$o="";
 		$s=array("");
		$var="";
		$b="";
		$g="";
		$t="";
		$d="";
		$s="";
		$c="";
		$bu="";
		$cu="";
		$gu="";
		$tu="";
		$su="";
		$du="";
		$br="";
		$colr="";
		$gen="";
		$smat="";
		$type="";
		$dshape="";
		$pagination="";
 
	if(isset($_GET['o'])){
	$o=$_GET['o'];
	}
	if($o==""){
		 $o="emp";
	}
	
	if(!empty($_GET['brand_chk'])) {
				
				foreach($_GET['brand_chk'] as $a){
					
					/*if($var!="")
					$var=$var." ".$a;
					else
						$var=$a;
						*/
						if($br=="")
							$br=$a;
							else
								 $br=$br."/".$a;
						
						if($bu=="")		
							$bu="brand_chk[]=$a";
						else
							 $bu=$bu."&brand_chk[]=$a";
							
						if($b=="") 
							$b="Brand_Id=(select Brand_Id from brand where Brand_Name='$a')";
						else
						    $b=$b." "."or"." "."Brand_Id=(select Brand_Id from brand where Brand_Name='$a')";	
				}
				if($var=="")
			 $var="($b)";
		
		}
		
		
		
		if(!empty($_GET['gender_chk'])){
					
					foreach($_GET['gender_chk'] as $a){
						
						if($gen=="")
							$gen=$a;
							else
								$gen=$gen."/".$a;
						
						
						if($gu=="")		
							$gu="gender_chk[]=$a";
						else
							 $gu=$gu."&gender_chk[]=$a";
						
						
						if($g=="")
							$g="Gender='$a'";
						else
							$g=$g." "."or"." "."Gender='$a'";		
						
					}
					if($var=="")
						 $var="($g)";
					else
			 			 $var=$var." "."and"." "."($g)";
					 
		}
		
		
		
		if(!empty($_GET['type_chk'])){
					
					foreach($_GET['type_chk'] as $a){
						
						if($type=="")
							$type=$a;
							else
								$type=$type."/".$a;
						
						
						if($tu=="")		
							$tu="type_chk[]=$a";
						else
							 $tu=$tu."&type_chk[]=$a";
						
						if($t=="")
							$t="Function_Type='$a'";
						else
							$t=$t." "."or"." "."Function_Type='$a'";		
					}
					if($var=="")
						 $var="($t)";
					else
						 $var=$var." "."and"." "."($t)";	 
		}
		
		
		
		if(!empty($_GET['s_mat'])){
					
					foreach($_GET['s_mat'] as $a){
						
						if($smat=="")
							$smat=$a;
							else
								$smat=$smat."/".$a;
						
						
						if($su=="")		
							$su="s_mat[]=$a";
						else
							 $su=$su."&s_mat[]=$a";
						
						if($s=="")
							$s="Strap_Material='$a'";
						else
							$s=$s." "."or"." "."Strap_Material='$a'";		
					}
					if($var=="")
						 $var="($s)";
					else
						 $var=$var." "."and"." "."($s)";	 
		}
		
		if(!empty($_GET['color'])) {
				
				foreach($_GET['color'] as $a){
					
					/*if($var!="")
					$var=$var." ".$a;
					else
						$var=$a;
						*/
						if($colr=="")
							$colr=$a;
							else
								$colr=$colr."/".$a;
						
						if($cu=="")		
							$cu="color[]=$a";
						else
							 $cu=$cu."&color[]=$a";
							
						if($c=="") 
							$c="Color='$a'";
						else
						    $c=$c." "."or"." "."Color='$a'";	
				}
				if($var=="")
			 		$var="($c)";
					else
					$var=$var." "."and"." "."($c)";
		
		}
		
		
		if(!empty($_GET['d_shape'])){
					
					foreach($_GET['d_shape'] as $a){
						
						
						if($dshape=="")
							$dshape=$a;
							else
								$dshape=$dshape."/".$a;
						
			
						if($du=="")		
							$du="d_shape[]=$a";
						else
							 $du=$du."&d_shape[]=$a";
						
						if($d=="")
							$d="Dial_Shape='$a'";
						else
							$d=$d." "."or"." "."Dial_Shape='$a'";		
					}
					if($var=="")
						 $var="($d)";
					else
						 $var=$var." "."and"." "."($d)";	 
		}
		
		$query=mysql_query("select Product_Id,Product_Name,Price from watch where $var and Quantity!='0'");
		$c=mysql_num_rows($query);
		?>
		
	
 
 <script>
 	function sidechk(){
		
		
		 
		<?php
		if($br!=""){
		 $k=substr($br,0,strpos($br,"/"));
		 ?>
		 var v="<?php echo $k; ?>";
		 
		 var element = document.getElementsByName("brand_chk[]");
		
			for(var i=0; i < element.length; i++){
				
				if(element[i].value==v){
				//alert(v);
				element[i].checked=true;
				}
				
			}
		
		<?php
		while($sp=strpos($br,"/")){
			$z=$sp+1;
			$br=substr($br,$z,strlen($br));
			if($sp1=strpos($br,"/")){
				$z1=$sp1+1;
				$temp=substr($br,0,$sp1);
				?>
				var v1="<?php echo $temp; ?>";
			 	//alert(v1);
				var element1 = document.getElementsByName("brand_chk[]");
				for(var i=0; i < element1.length; i++){
					
					if(element1[i].value==v1){
					element1[i].checked=true;
					}
				
				}
			 <?php
			}
		}
		?>/*var v="<?php echo $br; ?>";
			 alert(v);*/
			 var element2 = document.getElementsByName("brand_chk[]");
				for(var i=0; i < element2.length; i++){
				
				if(element2[i].value=="<?php echo $br; ?>"){
				element2[i].checked=true;
				}
				
				
		 
			}
		<?php
		}
		
		if($gen!=""){
		 $k=substr($gen,0,strpos($gen,"/"));
		 ?>
		 var v="<?php echo $k; ?>";
		 var element = document.getElementsByName("gender_chk[]");
		
			for(var i=0; i < element.length; i++){
				
				if(element[i].value==v){
				//alert(v);
				element[i].checked=true;
				}
				
			}
		
		<?php
		while($sp=strpos($gen,"/")){
			$z=$sp+1;
			$gen=substr($gen,$z,strlen($gen));
			if($sp1=strpos($gen,"/")){
				$z1=$sp1+1;
				$temp=substr($gen,0,$sp1);
				?>
				var v1="<?php echo $temp; ?>";
			 	//alert(v1);
				var element1 = document.getElementsByName("gender_chk[]");
				for(var i=0; i < element1.length; i++){
					
					if(element1[i].value==v1){
					element1[i].checked=true;
					}
				
				}
			 <?php
			}
		}
		?>/*var v="<?php echo $br; ?>";
			 alert(v);*/
			 var element2 = document.getElementsByName("gender_chk[]");
				for(var i=0; i < element2.length; i++){
				
				if(element2[i].value=="<?php echo $gen; ?>"){
				element2[i].checked=true;
				}
				
				
		 
			}
		<?php
		}
		
		
		if($type!=""){
		 $k=substr($type,0,strpos($type,"/"));
		 ?>
		 var v="<?php echo $k; ?>";
		 var element = document.getElementsByName("type_chk[]");
		
			for(var i=0; i < element.length; i++){
				
				if(element[i].value==v){
				//alert(v);
				element[i].checked=true;
				}
				
			}
		
		<?php
		while($sp=strpos($type,"/")){
			$z=$sp+1;
			$type=substr($type,$z,strlen($type));
			if($sp1=strpos($type,"/")){
				$z1=$sp1+1;
				$temp=substr($type,0,$sp1);
				?>
				var v1="<?php echo $temp; ?>";
			 	//alert(v1);
				var element1 = document.getElementsByName("type_chk[]");
				for(var i=0; i < element1.length; i++){
					
					if(element1[i].value==v1){
					element1[i].checked=true;
					}
				
				}
			 <?php
			}
		}
		?>/*var v="<?php echo $br; ?>";
			 alert(v);*/
			 var element2 = document.getElementsByName("type_chk[]");
				for(var i=0; i < element2.length; i++){
				
				if(element2[i].value=="<?php echo $type; ?>"){
				element2[i].checked=true;
				}
				
				
		 
			}
		<?php
		}
		
		
		if($smat!=""){
		 $k=substr($smat,0,strpos($smat,"/"));
		 ?>
		 var v="<?php echo $k; ?>";
		 var element = document.getElementsByName("s_mat[]");
		
			for(var i=0; i < element.length; i++){
				
				if(element[i].value==v){
				//alert(v);
				element[i].checked=true;
				}
				
			}
		
		<?php
		while($sp=strpos($smat,"/")){
			$z=$sp+1;
			$smat=substr($smat,$z,strlen($smat));
			if($sp1=strpos($smat,"/")){
				$z1=$sp1+1;
				$temp=substr($smat,0,$sp1);
				?>
				var v1="<?php echo $temp; ?>";
			 	//alert(v1);
				var element1 = document.getElementsByName("s_mat[]");
				for(var i=0; i < element1.length; i++){
					
					if(element1[i].value==v1){
					element1[i].checked=true;
					}
				
				}
			 <?php
			}
		}
		?>/*var v="<?php echo $br; ?>";
			 alert(v);*/
			 var element2 = document.getElementsByName("s_mat[]");
				for(var i=0; i < element2.length; i++){
				
				if(element2[i].value=="<?php echo $smat; ?>"){
				element2[i].checked=true;
				}
				
				
		 
			}
		<?php
		}
		
		if($colr!=""){
		 $k=substr($colr,0,strpos($colr,"/"));
		 ?>
		 var v="<?php echo $k; ?>";
		 var element = document.getElementsByName("color[]");
		
			for(var i=0; i < element.length; i++){
				
				if(element[i].value==v){
				//alert(v);
				element[i].checked=true;
				}
				
			}
		
		<?php
		while($sp=strpos($colr,"/")){
			$z=$sp+1;
			$colr=substr($colr,$z,strlen($colr));
			if($sp1=strpos($colr,"/")){
				$z1=$sp1+1;
				$temp=substr($colr,0,$sp1);
				?>
				var v1="<?php echo $temp; ?>";
			 	//alert(v1);
				var element1 = document.getElementsByName("color[]");
				for(var i=0; i < element1.length; i++){
					
					if(element1[i].value==v1){
					element1[i].checked=true;
					}
				
				}
			 <?php
			}
		}
		?>/*var v="<?php echo $br; ?>";
			 alert(v);*/
			 var element2 = document.getElementsByName("color[]");
				for(var i=0; i < element2.length; i++){
				
				if(element2[i].value=="<?php echo $colr; ?>"){
				element2[i].checked=true;
				}
				
				
		 
			}
		<?php
		}
		
		
		if($dshape!=""){
		 $k=substr($dshape,0,strpos($dshape,"/"));
		 ?>
		 var v="<?php echo $k; ?>";
		 var element = document.getElementsByName("d_shape[]");
		
			for(var i=0; i < element.length; i++){
				
				if(element[i].value==v){
				//alert(v);
				element[i].checked=true;
				}
				
			}
		
		<?php
		while($sp=strpos($dshape,"/")){
			$z=$sp+1;
			$dshape=substr($dshape,$z,strlen($dshape));
			if($sp1=strpos($dshape,"/")){
				$z1=$sp1+1;
				$temp=substr($dshape,0,$sp1);
				?>
				var v1="<?php echo $temp; ?>";
			 	//alert(v1);
				var element1 = document.getElementsByName("d_shape[]");
				for(var i=0; i < element1.length; i++){
					
					if(element1[i].value==v1){
					element1[i].checked=true;
					}
				
				}
			 <?php
			}
		}
		?>/*var v="<?php echo $br; ?>";
			 alert(v);*/
			 var element2 = document.getElementsByName("d_shape[]");
				for(var i=0; i < element2.length; i++){
				
				if(element2[i].value=="<?php echo $dshape; ?>"){
				element2[i].checked=true;
				}
				
				
		 
			}
		<?php
		}
		?>
	
									var myVar;
									
									var x = Math.floor((Math.random() * 5000) + 1000);
									
									myVar = setTimeout(showPage, x);
					
					
					function showPage() {
						
					  document.getElementById("f-loader").style.display = "none";
					  document.getElementById("product-content").style.display = "block";
					}
		
	}
	
 	function fil(str){
		
							var xhttp;
							
							var v="<?php echo $var; ?>";
							/*alert(v);
							alert("o="+str+"&var="+v+"&"+"<?php echo $bu ;?>"+"&"+"<?php echo $gu; ?>");*/
							/*var bu="<?php echo $bu; ?>";
							var gu="<?php echo $gu; ?>";
							var tu="<?php echo $tu; ?>";
							var su="<?php echo $su; ?>";
							var du="<?php echo $du; ?>";
							alert(bu);
							alert(gu);
							alert("o="+str+"&var="+v+"&bu="+bu+"&gu="+gu+"&tu="+tu+"&su="+su+"&du="+du);*/
							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("product-content").innerHTML = this.responseText;
									
    								}
 							 };
 							// xhttp.open("GET", "filter_popularity.php?o="+str+"&var="+v+"&bu="+bu+"&gu="+gu+"&tu="+tu+"&su="+su+"&du="+du, true);
  							 xhttp.open("GET", "filter_popularity.php?o="+str+"&var="+v+"&"+"<?php echo $bu ;?>"+"&"+"<?php echo $gu; ?>"+"&"+"<?php echo $su ;?>"+"&"+"<?php echo $tu; ?>"+"&"+"<?php echo $cu; ?>"+"&"+"<?php echo $du ;?>", true);
							 xhttp.send();
	}
	
			
					
					
					
					window.onload=sidechk;
					
					$(document).ready(function(e) {
                        $("#filter-link").click(function(){
							//alert('click');
							$(".filter-tooltiptext").css("visibility","visible");
						})
						
						$("#close-fitler-tooltip").click(function(){
							$(".filter-tooltiptext").css("visibility","hidden");
						})
                    });
					
					/*function showFilters() {
						var popup = document.getElementById("show-filters");
    					popup.classList.add("show-selected-filter");
					}*/

					
	
 </script>
<?php //include("slideshow.php"); ?>
<!--<img src="brand images/Titan-Classique-Banner.jpg" class="banner" />-->

<?php include("sidebar.php"); ?>

<!--<div class="flter">

	<div id="popularity">
	<select onChange="fil(this.value)">
    	<option value="--Sort by price--" selected disabled>--Sort By Price--</option>
        <option value="lth">Low to High</option>
        <option value="htl">High to Low</option>
    </select>
    </div>
    
</div>-->

<div class="flter">
	<div class="chips" ><p>Displayed <?php echo $c; ?> Products</p></div>
    <div class="chips" style="border-radius:0px 0px 0px 0px; font-weight:bold;" id="selected-filters">
    	<span id="filter-link" onClick="showFilters()">Filters:</span>
    	
        <div class="filter-tooltiptext">
        	<p id="filter-heading">Applied Filters<span id="close-fitler-tooltip">&times;</span></p>
            
            <table>
            	<tr>
                	
					<?php
                    if(!empty($_GET['brand_chk'])){
						?>
                        <td>Brand:</td>
                        <?php
                        foreach($_GET['brand_chk'] as $b){
                    ?>
                    
                    <td><?php echo $b; ?></td>
                    <?php
                        }
                    }
                    ?>
                	
                </tr>
                <tr>
					<?php
                    if(!empty($_GET['gender_chk'])){
						?>
                        <td>Ideal For:</td>
                        <?php
                        foreach($_GET['gender_chk'] as $b){
                    ?>
                    <td><?php echo $b; ?></td>
                    <?php
                        }
                    }
                    ?>
                	
                    
                </tr>
                <tr>
                    <?php
					if(!empty($_GET['type_chk'])){
						?>
                        <td>Type:</td>
                        <?php
						foreach($_GET['type_chk'] as $b){
					?>
					<td><?php echo $b; ?></td>
					<?php
						}
					}
					?>
				
                    
                </tr>
                <tr>
					<?php
                    if(!empty($_GET['s_mat'])){
						?>
                        <td>Strap Material:</td>
                        <?php
                        foreach($_GET['s_mat'] as $b){
                    ?>
                    <td><?php echo $b; ?></td>
                    <?php
                        }
                    }
                    ?>
                	
                    
                </tr>
                <tr>
					 <?php
                    if(!empty($_GET['color'])){
						?>
                        <td>Color:</td>
                        <?php
                        foreach($_GET['color'] as $b){
                    ?>
                     <td><?php echo $b; ?></td>
                    <?php
                        }
                    }
                    ?>
                	
                   
                </tr>
                <tr>
					 <?php
					if(!empty($_GET['d_shape'])){
						?>
                        <td>Dial Shape:</td>
                        <?php
						foreach($_GET['d_shape'] as $b){
					?>
					 <td><?php echo $b; ?></td>
					<?php
						}
					}
					?>
                	
                   
                </tr>
                
            </table>
        </div>
    
    </div>
    
    
    
    
   
    
    
   
    <?php
	

	if($c!=0){
	?>
	<div id="popularity">
	<select onChange="fil(this.value)">
    	<option value="--Sort by price--" selected disabled>--Sort By Price--</option>
        <option value="lth">Low to High</option>
        <option value="htl">High to Low</option>
    </select>
    </div>
    <?php
	}
	?>
    
</div>
<!--<div id="f-loader" style="display:block; margin-left: 500px; margin-top:100px;">
	<div id="filter-loader"></div></br>
	<div id="filter-loader-info" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:18px; font-weight:bold; margin-top:10px;">Loading..</div>
</div>-->

<div id="f-loader" style="display:block; margin-left: 500px;  width:50px; margin-top:150px;">
        <div class="spinner">
          <div class="rect1"></div>
          <div class="rect2"></div>
          <div class="rect3"></div>
          <div class="rect4"></div>
          <div class="rect5"></div>
          <div class="rect6"></div>
          <div class="rect7"></div>
        </div>
      <div id="filter-loader-info" style="font-family:Georgia, 'Times New Roman', Times, serif; color:#F5B632; display:block; font-size:18px; font-weight:bold; margin-top:10px;">Loading..</div>
   </div>

<div class="content" id="product-content">
<?php
		
		
		/*$query=mysql_query("select Product_Id,Product_Name,Price from watch where $var");
		$c=mysql_num_rows($query);*/
		if(isset($_GET['page'])){
		$page=preg_replace("#[^0-9]#","",$_GET['page']);		
	}
	else{
		$page=1;
	}
	
	$perpage=12;
	
	
	$lastpage=ceil($c/$perpage);
	
	if($page<1){
		$page=1;
	}
	elseif($page>$lastpage){
		$page=$lastpage;
	}
	
	 $limit="LIMIT ".($page-1)*$perpage.",$perpage";
	
		if($c!=0){
		//echo ("select Product_Id,Product_Name,Price,Gender,Function_Type from watch where $var $limit");
		
		if($o=="emp"){
			$sql="select Product_Id,Product_Name,Price from watch where $var and Quantity!='0' $limit";
			$rs=mysql_query($sql);
		}
		elseif($o=="lth"){
		//echo "select Product_Id,Product_Name,Price from watch where $var $limit";
			$sql="select Product_Id,Product_Name,Price from watch where $var and Quantity!='0' ORDER BY Price $limit";
			$rs=mysql_query($sql);
		}
		else{
			//echo "select Product_Id,Product_Name,Price from watch where $var ORDER BY Price DESC $limit";
			$sql="select Product_Id,Product_Name,Price from watch where $var and Quantity!='0' ORDER BY Price DESC $limit";
		$rs=mysql_query($sql);
		}
		if(mysql_num_rows($rs)){
		if($lastpage!=1){
		
		if($page!=$lastpage){
			$next=$page+1;
		     $pagination ='<a href="filter_check.php?page='.$next.'&o='.$o.'&'.$bu.'&'.$gu.'&'.$tu.'&'.$su.'&'.$cu.'&'.$du.'" id="nxt">Next</a>';	
		}
		//echo $bu;
		if($page!=1){
			$prev=$page-1;
			 $pagination .='<a href="filter_check.php?page='.$prev.'&o='.$o.'&'.$bu.'&'.$gu.'&'.$tu.'&'.$su.'&'.$cu.'&'.$du.'" id="prv">Previous</a>';	
		}
			
	}
	else{
		$pagination ="";	
	}
		
		
		
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
        <a href="product_info.php?Product_Id=<?php echo $row[0]; ?>&msg=&cmsg=" >
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
		else{
		?>
        	<div style="text-align:center; width:100%;height:400px;">
            	<img src="brand images/no_product.jpg" alt="No product Matched" width="200px" height="200px;" title="Sorry, No Product Matched Your Selection." />
                <p style="margin-top:30px;">Sorry, No Product Matched Your Selection.</p>
            </div>
			
		<?php	
		}
		
		/*if($var!=""){
			
			
			 $s=strpos($var," ");
			$v=substr($var,0,$s);
			$c="Brand_Name='$v'";
			
			while($s=strpos($var," ")){
				 $l=strlen($var);
				 $z=$s+"1";
		  		 $var=substr($var,$z,$l);
		  		$l=strlen($var);
				echo $c="Brand_Name='$var'"." "."and"." ".$c;
				
			}
			//$cond="Where Brand_Id=(select Brand_Id from brand where Brand_Name='')";
		}*/

?>
<div id="pgn">
		<?php echo $pagination; ?>
	</div>

</div>
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
    


<?php include("foot.php") ?>

