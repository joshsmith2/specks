<!--Place this into the <head> element, or wherever you would normally include .php files-->

	<?php include 'specks.php';?>

<!--...and this into the body; wherever you'd like the image elements to be printed:-->	
	
	<!--Start Specks v1.0-->
		<!--Print speck elements to be animated.-->
		<?php printSpecks ($bloom->noOfElements, $bloom->name); ?>
		
		<!--Run javascript to animate elements-->
		<script type="text/javascript">
			speckMain(<?php echo $bloom->name;?>);
		</script>
	<!--End Specks-->


	