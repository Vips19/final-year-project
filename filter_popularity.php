
<?php
	include("connection.php");
	 $var=$_GET['var'];
	 $o=$_GET['o'];
	 $bu="";
	 $gu="";
	 $su="";
	 $tu="";
	 $du="";
	 $cu="";
	/* echo $bu=$_GET['bu'];
	 echo $gu=$_GET['gu'];
	 echo $tu=$_GET['tu'];
	 echo $su=$_GET['su'];
	 echo $du=$_GET['du'];*/
	 
	 if(!empty($_GET['brand_chk'])) {
				
				foreach($_GET['brand_chk'] as $a){
					
					/*if($var!="")
					$var=$var." ".$a;
					else
						$var=$a;
						*/
						/*if($br=="")
							$br=$a;
							else
								$br=$br."/".$a;*/
						
						if($bu=="")		
							$bu="brand_chk[]=$a";
						else
							 $bu=$bu."&brand_chk[]=$a";
							
						/*if($b=="") 
							$b="Brand_Id=(select Brand_Id from brand where Brand_Name='$a')";
						else
						    $b=$b." "."or"." "."Brand_Id=(select Brand_Id from brand where Brand_Name='$a')";*/	
				}
				/*if($var=="")
			 $var="($b)";*/
		
		}
		
		
		
		if(!empty($_GET['gender_chk'])){
					
					foreach($_GET['gender_chk'] as $a){
						
						/*if($gen=="")
							$gen=$a;
							else
								$gen=$gen."/".$a;*/
						
						
						if($gu=="")		
							$gu="gender_chk[]=$a";
						else
							 $gu=$gu."&gender_chk[]=$a";
						
						
						/*if($g=="")
							$g="Gender='$a'";
						else
							$g=$g." "."or"." "."Gender='$a'";	*/	
						
					}
					/*if($var=="")
						 $var="($g)";
					else
			 			 $var=$var." "."and"." "."($g)";*/
					 
		}
		
		
		
		if(!empty($_GET['type_chk'])){
					
					foreach($_GET['type_chk'] as $a){
						
						/*if($type=="")
							$type=$a;
							else
								$type=$type."/".$a;*/
						
						
						if($tu=="")		
							$tu="type_chk[]=$a";
						else
							 $tu=$tu."&type_chk[]=$a";
						
						/*if($t=="")
							$t="Function_Type='$a'";
						else
							$t=$t." "."or"." "."Function_Type='$a'";*/		
					}
					/*if($var=="")
						 $var="($t)";
					else
						 $var=$var." "."and"." "."($t)";*/	 
		}
		
		if(!empty($_GET['s_mat'])){
					
					foreach($_GET['s_mat'] as $a){
						
						/*if($smat=="")
							$smat=$a;
							else
								$smat=$smat."/".$a;*/
						
						
						if($su=="")		
							$su="s_mat[]=$a";
						else
							 $su=$su."&s_mat[]=$a";
						
						/*if($s=="")
							$s="Strap_Material='$a'";
						else
							$s=$s." "."or"." "."Strap_Material='$a'";	*/	
					}
					/*if($var=="")
						 $var="($s)";
					else
						 $var=$var." "."and"." "."($s)";	*/ 
		}
		
		
		if(!empty($_GET['color'])) {
				
				foreach($_GET['color'] as $a){
					
					/*if($var!="")
					$var=$var." ".$a;
					else
						$var=$a;
						*/
						/*if($colr=="")
							$colr=$a;
							else
								$colr=$colr."/".$a;*/
						
						if($cu=="")		
							$cu="color[]=$a";
						else
							 $cu=$cu."&color[]=$a";
							
						/*if($c=="") 
							$c="Color='$a'";
						else
						    $c=$c." "."or"." "."Color='$a'";*/	
				}
				/*if($var=="")
			 $var="($c)";*/
		
		}
		
		if(!empty($_GET['d_shape'])){
					
					foreach($_GET['d_shape'] as $a){
						
						
						/*if($dshape=="")
							$dshape=$a;
							else
								$dshape=$dshape."/".$a;*/
						
			
						if($du=="")		
							$du="d_shape[]=$a";
						else
							 $du=$du."&d_shape[]=$a";
						
						/*if($d=="")
							$d="Dial_Shape='$a'";
						else
							$d=$d." "."or"." "."Dial_Shape='$a'";*/		
					}
					/*if($var=="")
						 $var="($d)";
					else
						 $var=$var." "."and"." "."($d)";*/	 
		}
		
	
?>




<?php


$pagination="";
	//echo $var;
	//echo "select Product_Id,Product_Name,Price from watch where $var";
	$query1=mysql_query("select Product_Id,Product_Name,Price from watch where $var and Quantity!='0'");
	 $c1=mysql_num_rows($query1);

	
	
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
	
	
	
	
	if($o=="lth"){
		//echo "select Product_Id,Product_Name,Price from watch where $var $limit";
	$sql="select Product_Id,Product_Name,Price from watch where $var and Quantity!='0' ORDER BY Price $limit";
	$rs=mysql_query($sql);
		}
		else{
			//echo "select Product_Id,Product_Name,Price from watch where $var ORDER BY Price DESC $limit";
			$sql="select Product_Id,Product_Name,Price from watch where $var and Quantity!='0' ORDER BY Price DESC $limit";
		$rs=mysql_query($sql);
		}
	
	
	
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
		
		
		
		else{
		?>
        	<div>No Products To Display.</div>
			
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
			}
		}

?>
<div id="pgn">
		<?php echo $pagination; ?>
	</div>

</div>






