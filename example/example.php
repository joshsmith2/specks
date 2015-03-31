<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
		<title></title>
        <meta name="description" content="Specks example">
	
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		
		<?php include 'example-specks.php';?>

	</head>
    
	<body>
	
		<!--Start Specks v1.0-->
			<!--Print speck elements to be animated.-->
			<?php printSpecks ($bloom->noOfElements, $bloom->name); ?>
			
			<!--Run javascript to animate elements-->
			<script type="text/javascript">
				speckMain(<?php echo $bloom->name;?>);
			</script>
		<!--End Specks-->
		
		<div id="text-overlay" style="width: 1024px;height:768px;margin:0 auto;background-image:url('img/flowers-text.png');z-index:6;position:relative;"> </div>
		
    </body>
</html>
