<?php        
	$style_subcategory ='class="form-control select2me" id="lstSubCategory" required';
	echo form_dropdown("lstSubCategory" , $listSubCategory, '', $style_subcategory);
?>