	<?php
		include("connection.php");
		echo $st=$_POST['st'];
		echo $landmark=$_POST['landmrk'];
		echo $city=$_POST['city'];
		echo $state=$_POST['u_state'];
		echo $pc=$_POST['pc'];
		echo $url=$_POST['uri'];
		
		$a="";
		$add_no="";
		$f=array("");
		$i=1;
		$g=1;
		if(isset($_POST['add_no'])){
			echo $add_no=$_POST['add_no'];
		}
		
		if($add_no==""){	

			$sql=mysql_query("select address_no from address where mobile='{$_SESSION['user']['mobile']}'");
			$c=mysql_num_rows($sql);
			if(mysql_num_rows($sql)){
				while($row1=mysql_fetch_array($sql)){
					 $f[$i]=$row1[0];	
					 $i++;
				}
				
			}
			
			
			$query=mysql_query("select st_name,landmark,city,state,pin_code from address where mobile='{$_SESSION['user']['mobile']}' and address_no='1'");
							//echo $c=mysql_num_rows($query);
							if(mysql_num_rows($query)){
								while($row=mysql_fetch_array($query)){
									
									if($row[0]== "" && $row[1]=="" && $row[2]== "" && $row[3]=="" && $row[4]== ""){
			
			
			
											$query1=mysql_query("update address set st_name='$st',landmark='$landmark',city='$city',state='$state',pin_code='$pc' where mobile='{$_SESSION['user']['mobile']}' and address_no='1'");
											if($query1==1){
												header("location:$url");
											}
											else{
												header("location:$url&msg=failed1");
											}
											
									}
									else{
										while($g<= 3){
				
										if($g == $f[$g]){
											
										//echo $f[$g];
										$g++;
										}
										
										else{
											echo "insert into address (address_no,mobile,st_name,landmark,city,state,pin_code) values('$g','{$_SESSION['user']['mobile']}','$st','$landmark','$city','$state','$pc')";
											$sql1=mysql_query("insert into address (address_no,mobile,st_name,landmark,city,state,pin_code) values('$g','{$_SESSION['user']['mobile']}','$st','$landmark','$city','$state','$pc')");
											if($sql1==1){
												
												header("location:$url");
											}
											else{
												echo "2";
												//header("location:$url&msg=failed_insert");
											}		
											
												
											
										}
										
									}
											//$a=$c+1;
												
										
										
										
									}
								}
							}
		}
		else{
			$query2=mysql_query("update address set st_name='$st',landmark='$landmark',city='$city',state='$state',pin_code='$pc' where mobile='{$_SESSION['user']['mobile']}' and address_no='$add_no'");
											if($query2==1){
												header("location:$url");
											}
											else{
												header("location:$url&msg=failed1");
											}
		}
	?>