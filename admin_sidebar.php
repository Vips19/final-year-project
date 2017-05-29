<div class="sidebar">

    	

	<!--<h3 style="margin-left:20px"></h3>-->
    <?php
    if($row['0'] == 1){
				
		?>
        <!--<button class="accordion" onClick="window.location.href='Add_admin_det.php'">ADD NEW ADMIN DETAILS</button>-->
        <button class="accordion" id="rab" onClick="window.location.href='Stock_approval.php?msg='">APPROVE STOCK</button>
        	
        <?php
			}
			?>
    <button class="accordion" id="ah" onClick="window.location.href='Or_Approval.php'">ORDER/REQUEST APPROVAL</button>
    <button class="accordion" id="anw" onClick="window.location.href='Data_entry.php'">ADD NEW WATCH</button>
    <button class="accordion" id="anb" onClick="window.location.href='brand_entry.php'">ADD NEW BRAND</button>
    <button class="accordion" id="ana" onClick="window.location.href='stock_update.php'">ADD NEW ARRIVALS</button>
    <button class="accordion" id="rap" onClick="window.location.href='remove_product.php'">REMOVE A PRODUCT</button>
    <button class="accordion" id="rab" onClick="window.location.href='remove_brand.php'">REMOVE A BRAND</button>
    
    <!--<button class="accordion"></button>-->
    
    	
</div>