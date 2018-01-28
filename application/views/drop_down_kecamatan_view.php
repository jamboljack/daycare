<?php        
	$style_kecamatan ='class="field-select" id="lstKecamatan" required';
	echo form_dropdown("lstKecamatan" , $listKecamatan, '', $style_kecamatan);
?>