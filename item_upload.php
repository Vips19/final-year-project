<?php 
	include("connection.php");


	
	 $br_id=$_POST['txt_br_id'];
	 $pr_name=$_POST['txt_pr_name'];
	 $ftype=$_POST['txt_ftype'];
	 $price=$_POST['txt_price'];
	$material=$_POST['txt_mat'];
	 $color=$_POST['txt_color'];
	 $strap_mat=$_POST['txt_s_mat'];
	$strap_color=$_POST['txt_s_color'];
	$dial_shape=$_POST['txt_dial_shape'];
	$dial_color=$_POST['txt_dial_color'];
	// $qty=$_POST['txt_qty'];
	//$discount=$_POST['txt_discount'];
	 $gender=$_POST['txt_gender'];
	$wr=$_POST['txt_wr'];
	 $features=$_POST['txt_features'];
	 $case_mat=$_POST['txt_c_mat'];
	 /*$url1=$_GET['url1'];
	$url2=$_GET['url2'];
	$url3=$_GET['url3'];
	$url4=$_GET['url4'];*/
	$sql=mysql_query("select Brand_Name from brand where Brand_Id='$br_id'");
	if(mysql_num_rows($sql)){
		$row1=mysql_fetch_array($sql);
	
	
	echo $query_watch="INSERT into watch (Brand_Id,Product_Name,Function_Type,Price,Material,Color,Strap_Material,Strap_Color,Dial_Shape,Dial_Color,Gender,Water_Resistant,Features,Case_Material) values ('$br_id','$pr_name','$ftype','$price','$material','$color','$strap_mat','$strap_color','$dial_shape','$dial_color','$gender','$wr','$features','$case_mat')";
	
	$upload_item=mysql_query($query_watch);
	
	echo $s=mysql_query("SELECT Product_Id FROM watch Order by Product_Id  DESC LIMIT 1");
	//$pr_id;
	if(mysql_num_rows($s))
	{
		$row=mysql_fetch_array($s);
		echo $pr_id=$row['Product_Id'];
		
	}
	
	
	if(!file_exists('Product Images/$row1[0]')) {
  
	mkdir("Product Images/$row1[0]");
	
	}
	mkdir("Product Images/$row1[0]/$pr_id.$pr_name");
		   $fname1= $_FILES['url1']['name'];
		 
		  
		    $fname2= $_FILES['url2']['name'];
		
		  
		    $fname3= $_FILES['url3']['name'];
		
		  
		   $fname4= $_FILES['url4']['name'];
		 
	 echo $url1 = "Product Images/$row1[0]/$pr_id.$pr_name/".$fname1;
	  echo $url2 = "Product Images/$row1[0]/$pr_id.$pr_name/".$fname2;
	   echo $url3= "Product Images/$row1[0]/$pr_id.$pr_name/".$fname3;
	    echo $url4 = "Product Images/$row1[0]/$pr_id.$pr_name/".$fname4;
          
          move_uploaded_file($_FILES['url1']['tmp_name'],$url1);
		  move_uploaded_file($_FILES['url2']['tmp_name'],$url2);
		  move_uploaded_file($_FILES['url3']['tmp_name'],$url3);
		  move_uploaded_file($_FILES['url4']['tmp_name'],$url4);
		  
		  
	/*.mkdir($br_id);mkdir('C:/xampp/htdocs/E commerce/Product Images/$br_id')*/
	
	
	/* $target_path="C:/xampp/htdocs/E commerce/Product Images/$br_id/$pr_id.$pr_name/ ";
	 $url1 = $target_path . $url1;
	 $url2 = $target_path . $url2;
	 $url3 = $target_path . $url3;
	 $url4 = $target_path . $url4; */

	
	
	
	echo $query_img="INSERT into images (Product_Id,Image1,Image2,Image3,Image4) values ('$pr_id','$url1','$url2','$url3','$url4')";
	
	$upload_img=mysql_query($query_img);
	
	if($upload_img==1 && $upload_item==1)
		header("location:Data_entry.php?msg=SUCCESSFUL");
	else
		header("location:Data_entry.php?msg=FAILED");
	}
?>