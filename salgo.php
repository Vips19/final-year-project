<?php

$set5=array("");
$set6=array("");
$set7=array("");
  
	while($sp=strpos($s," ")){
		 ob_get_contents();
		 ob_end_clean();
		 $l=strlen($s);
		$z=$sp+"1";
		  $s=substr($s,$z,$l);
		  $l=strlen($s);
		
		$query4=mysql_query("select distinct Brand_Name from brand");
		 mysql_num_rows($query4)."<br/>";
		if(mysql_num_rows($query4)){
			while($dta4=mysql_fetch_array($query4)){
				
				if(substr($dta4[0],0,$l)==$s){
				 echo "br".$brand=$brand+"1"."<br/>";
				$set4=$dta4[0];
				}
			
					
			}
		}
		
		$query5=mysql_query("select distinct Function_Type from watch");
		if(mysql_num_rows($query5)){
			while($dta5=mysql_fetch_array($query5)){
				
				if(substr($dta5[0],0,$l)==$s){
					 "ft".$ft=$ft+"1"."<br/>";
					 $set5[]=$dta5[0];
				}
			}
			
		}
		$query6=mysql_query("select distinct Gender from watch");
		if(mysql_num_rows($query6)){
			while($dta6=mysql_fetch_array($query6)){
				if($s==substr($dta6[0],0,$l)){
					 "gen". $g=$g+"1"."<br/>";
					$set6[]=$dta6[0];
				}
					
			}
		}
		$query7=mysql_query("select distinct Dial_Shape from watch");
		if(mysql_num_rows($query7)){
			while($dta7=mysql_fetch_array($query7)){
				if($s==substr($dta7[0],0,$l)){
					 "ds". $ds=$ds+"1"."<br/>";
					$set7[]=$dta7[0];
		
				}
					
			}
		}
	/*echo $ft;
	echo $brand;
	echo $pb;
	echo $pft;*/
	if($brand>0 and $brand==$pb){
		 $var="and Brand_Id like (select Brand_Id from brand where Brand_Name='$set')";
		
	}
	
	if($g>0){
		$var="and Gender=''";
	}
	if($ds>0){
		$var="and Dial_Shape=''";
	}
	if($pft!=$ft){
		foreach($set5 as $s1){
			if($s1!=""){
			 $q5=mysql_query("select distinct Product_Name from watch where Function_type='$s1' $var");
		
		//$q5=mysql_query("select * from view1");
		  if(mysql_num_rows($q5)){
			while($br5=mysql_fetch_array($q5)){
				
				 echo $br5[0]."<br/>";
			}
		}
			}
		}
		
	}
	
	if($brand!=$pb){
		if($set4!=""){
			if($ft>0 and $ft==$pft){
					foreach($set1 as $sf){
						$var="and Function_type='$sf'";
		
			 $q4=mysql_query("select distinct Product_Name from watch where Brand_Id like (select Brand_Id from brand where Brand_Name='$set4') $var");
		
		//$q4=mysql_query("select * from view1");
		  if(mysql_num_rows($q4)){
			while($br4=mysql_fetch_array($q4)){
				
				 echo $br4[0]."<br/>";
			}
		}
		}
		
	}
		}
	}
	if($g!=$pg){
		
	}
	if($ds!=$pds){
		
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			/*  echo $z=intval($sp)+"1";
	   echo  $s=substr($s,$z,$slen);*/
		 /*$sql="select distinct Product_Name from watch where Function_Type LIKE '$str%' OR Product_Name LIKE '%$str%'";
 $rs=mysql_query($sql) or die("Could not search");
 $c=mysql_num_rows($rs);
		if(mysql_num_rows($rs)){
			while($row=mysql_fetch_array($rs)){
				echo $row[0];
				echo "<br/>";
				
				if($f==0){
					foreach($row as $rw){
					echo $rw;
					$r=$rw;
					echo "<br/>";
					}
				}
				else{
					if(array_diff($row,$r) && array_diff($row,$m)){
						foreach($row as $rw){
						echo $m=$rw;
						echo "<br/>";
						}
					}
				}
		 		$r=$row[0];
				echo $m=array_merge(array_diff($m,$r),array_diff($m,$r));
			}
			 
		}
		
		*/
	}
?>