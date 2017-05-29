

<script>
		function filter(str) {
  							var xhttp;
							 if (str.length == 0) { 
      							  document.getElementById("sbar").innerHTML = "";
        							return;
    						} 
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("exp").innerHTML = this.responseText;
									
    								}
 							 };
 							 xhttp.open("GET", "filter_check.php?brand_chk[]="+str, true);
							 
  							 xhttp.send();
							 
							 
							 
							
						}
						
			function vald(){
				
			
			var element = document.getElementsByName("brand_chk[]") ;
		
			for(var i=0; i < element.length; i++){
			if(element[i].checked)
				return true;
			}
			var element1 = document.getElementsByName("gender_chk[]") ;
		
			for(var i=0; i < element1.length; i++){
			if(element1[i].checked)
				return true;
			}
			var element2 = document.getElementsByName("type_chk[]") ;
		
			for(var i=0; i < element2.length; i++){
			if(element2[i].checked)
				return true;
			}
			var element3 = document.getElementsByName("s_mat[]") ;
		
			for(var i=0; i < element3.length; i++){
			if(element3[i].checked)
				return true;
			}
			var element4= document.getElementsByName("color[]") ;
		
			for(var i=0; i < element4.length; i++){
			if(element4[i].checked)
				return true;
			}
			var element5= document.getElementsByName("d_shape[]") ;
		
			for(var i=0; i < element5.length; i++){
			if(element5[i].checked)
				return true;
			}
			
				alert('Please select Atleast one checkbox before Proceeding..');
				
			return false;
			
		}
</script>


<p id="exp"></p>
<div class="sidebar">
<form method="get" action="filter_check.php" onSubmit="return vald();">
 <input type="submit" value="Apply Filters" style="width:250px; margin:10px; font-weight:600; font-size:16px; height:50px;" />
	<h3 style="margin-left:20px"></h3>
    <div class="accordion">Brand</div>
    
    	<div class="panel">
        
        	<?php
				$sql="select Brand_Name from brand";
				$rs=mysql_query($sql);
				if(mysql_num_rows($rs)){
					while($row=mysql_fetch_array($rs)){
			?>
						<ul>
                        		
            					<li><input type="checkbox" value="<?php echo $row[0]; ?>" name="brand_chk[]" class="bchk" /><?php echo $row[0]; ?></li>
           			   </ul>
                 <?php
                    }
                }    
			?>
           
        </div>
    <!--<button class="accordion">Offers</button>
    	<div class="panel">
        <p>this is a content</p>
        </div>
    <button class="accordion">Discount</button>
    	<div class="panel">
        </div>-->
    <div class="accordion">Ideal For</div>
    	<div class="panel">
        	<ul>
            
            	<li><input type="checkbox" value="Men" name="gender_chk[]" />Men</li>
                <li><input type="checkbox" value="Women" name="gender_chk[]"  />Women</li>
                <li><input type="checkbox" value="Men Women" name="gender_chk[]" />Unisex</li>
                <li><input type="checkbox" value="Couple" name="gender_chk[]" />Couple</li>
                
            </ul>
        </div>
    <div class="accordion">Type</div>
    	<div class="panel">
        	<ul>
            	<li><input type="checkbox" name="type_chk[]" value="Analog" />Analog</li>
                <li><input type="checkbox" name="type_chk[]" value="Digital" />Digital</li>
                <li><input type="checkbox" name="type_chk[]" value="Analog-Digital" />Analog-Digital</li>
            </ul>
        </div>
    <div class="accordion">Strap Material</div>
    	<div class="panel">
        	<ul>
            	<li><input type="checkbox" name="s_mat[]" value="Denim" />Denim</li>
                <li><input type="checkbox" name="s_mat[]" value="Gold" />Gold</li>
                <li><input type="checkbox" name="s_mat[]" value="Leather" />Leather</li>
                <li><input type="checkbox" name="s_mat[]" value="Metal" />Metal</li>
                <li><input type="checkbox" name="s_mat[]" value="Plastic" />Plastic</li>
                <li><input type="checkbox" name="s_mat[]" value="Resin" />Resin</li>
                <li><input type="checkbox" name="s_mat[]" value="Rubber" />Rubber</li>
                <li><input type="checkbox" name="s_mat[]" value="Sapphire" />Sapphire</li>
                <li><input type="checkbox" name="s_mat[]" value="Silver" />Silver</li>
            </ul>
        </div>
    <div class="accordion">Color</div>
    	<div class="panel">
        	<ul>
            	<li><input type="checkbox" name="color[]" value="Black" />Black</li>
                <li><input type="checkbox" name="color[]" value="White" />White</li>
                <li><input type="checkbox" name="color[]" value="Grey" />Grey</li>
                <li><input type="checkbox" name="color[]" value="Gold" />Gold</li>
                <li><input type="checkbox" name="color[]" value="Silver" />Silver</li>
            </ul>
        </div>
    <div class="accordion">Dial Shape</div>
    	<div class="panel">
        	<ul>
            	<li><input type="checkbox" name="d_shape[]" value="Oval" />Oval</li>
                <li><input type="checkbox" name="d_shape[]" value="Rectangle" />Rectangle</li>
                <li><input type="checkbox" name="d_shape[]" value="Round" />Round</li>
                <li><input type="checkbox" name="d_shape[]" value="Round-Oval" />Round-Oval</li>
                <li><input type="checkbox" name="d_shape[]" value="Square" />Square</li>
                
            </ul>
        </div>
   <!-- <div class="accordion">Dial Color</div>
    	<div class="panel">
        </div>-->
   <!-- <div class="accordion">Availability</div>
    	<div class="panel">
        	<ul>
            	<li><input type="checkbox" value="available" />Available</li>
                <li><input type="checkbox" value="out" />Out of Stock</li>
                
            </ul>
        </div>-->
       
        
</form>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>
