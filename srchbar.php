<?php
include("connection.php");
$s=$_GET['s'];
$i=0;
$str="";
//$s="Digital Sonata";
$slen=0;
 $slen=strlen($s);
 $f=0;
 $brand=0;
 $ft=0;
 $g=0;
 $ds=0;
 $m=array("");
 $r=array("");
$pb=0;
$pft=0;
$pg=0;
$pds=0;
$set=0;
$set1=array("");
$set2=array("");
$set3=array("");
if($sp1=strpos($s," "))
{
	//echo $sp1;
$str=substr($s,0,$sp1);
}
else{
	
	$str=substr($s,0,$slen);
}
$len=strlen($str);
	 $query=mysql_query("select distinct Brand_Name from brand");
		if(mysql_num_rows($query)){
			while($dta=mysql_fetch_array($query)){
				if(substr($dta[0],0,$len)==$str){
				 "br".$brand=$brand+"1"."<br/>";
					$set=$dta[0];
				}
					
			}
		}
		$query1=mysql_query("select distinct Function_Type from watch");
		if(mysql_num_rows($query1)){
			while($dta1=mysql_fetch_array($query1)){
				
				if(substr($dta1[0],0,$len)==$str){
					  "ft".$ft=$ft+"1"."<br/>";
					 $set1[]=$dta1[0];
				}
			}
			
		}
		$query2=mysql_query("select distinct Gender from watch");
		if(mysql_num_rows($query2)){
			while($dta2=mysql_fetch_array($query2)){
				if($str==substr($dta2[0],0,$len)){
					  "gen". $g=$g+"1"."<br/>";
					$set2[]=$dta2[0];
				}
					
			}
		}
		$query3=mysql_query("select distinct Dial_Shape from watch");
		if(mysql_num_rows($query3)){
			while($dta3=mysql_fetch_array($query3)){
				if($str==substr($dta3[0],0,$len)){
					  "ds". $ds=$ds+"1"."<br/>";
					$set3[]=$dta3[0];
		
				}
					
			}
		}
	foreach($set1 as $s1){
		if($s1!=""){
		echo "<br/>".$s1."Watches"."<br/><br/>";
		}
		 $q4=mysql_query("select distinct Product_Name from watch where Function_type='$s1'");
		
		//$q4=mysql_query("select * from view1");
		  if(mysql_num_rows($q4)){
			while($br=mysql_fetch_array($q4)){
				
				 echo $br[0]."<br/>";
			}
		}
	}
	foreach($set2 as $s1){
		if($s1!=""){
		echo "<br/>".$s1."Watches"."<br/><br/>";
		}
		 $q4=mysql_query("select distinct Product_Name from watch where Gender='$s1'");
		
		//$q4=mysql_query("select * from view1");
		  
		if(mysql_num_rows($q4)){
			while($br=mysql_fetch_array($q4)){
				
				 echo $br[0]."<br/>";
			}
		}
	}
	if($brand!=""){
		if($set!=""){
		echo "<br/>".$set."Watches"."<br/><br/>";
		}
			 $q4=mysql_query("select distinct Product_Name from watch where Brand_Id like (select Brand_Id from brand where Brand_Name='$set')");
		
		//$q4=mysql_query("select * from view1");
		 
		if(mysql_num_rows($q4)){
			
			while($br=mysql_fetch_array($q4)){
				
				echo $br[0]."<br/>";
			}
		}
		
	}
	foreach($set3 as $s1){
		if($s1!=""){
		echo "<br/>".$s1."Watches"."<br/><br/>";
		}
			 $q4=mysql_query("select distinct Product_Name from watch where Dial_Shape='$s1'");
		
		//$q4=mysql_query("select * from view1");
		
		if(mysql_num_rows($q4)){
			while($br=mysql_fetch_array($q4)){
				
				echo $br[0]."<br/>";
			}
		}
		
	}
	$pb=$brand;
	$pft=$ft;
	$pg=$g;
	$pds=$ds;
include("salgo.php");
	/*$sql1="select distinct Product_Name from watch where Function_Type LIKE '$s%' OR Product_Name LIKE '$s%' OR Gender LIKE '%s'";
 $rs1=mysql_query($sql1) or die("Could not search");
  $c1=mysql_num_rows($rs1);
		if(mysql_num_rows($rs1)){
			while($row1=mysql_fetch_array($rs1)){
		
		 		echo $row1[0]."<br/>";
			}
		}
	
	*/
	










/*$hint="";
$sql="select distinct Product_Name from watch where Function_Type LIKE '$s%' ";
 $rs=mysql_query($sql);
if(mysql_num_rows($rs)){
	while($row=mysql_fetch_array($rs)){
		
	

	if ($s !== "") {
    	$s = strtolower($row[0]);*/
    	
		
		/*$len=strlen($s);
    	
        		if (stristr(substr($row['0'], 0, $len),$s)) {
          	  		if ($hint == "") {
             	   		 $hint = $row[0]."<br/>";
           	 		} else {
           	     		 $hint .= "$row[0]"."<br/>";
           		 	}
        		}*/
			/*echo "<a href=\"\">$row[0]</a>.\"<br/>";	
   	 	 
	}
	
	}
}*/

//echo $hint == "" ? "no suggestion" : $hint;

?>