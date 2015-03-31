<?php
/*
	PHP for Specks v1.0

	Specks generates a number of elements, and fades them in and out recursively at random points within a defined area. 
	Each of these elements can be associated with multiple background images, which the function will cycle through. 
	
	All functions written by Josh Smith (www.joshsmithonline.com)

	Any comments, suggestions, help or criticism is extremely welcome - you can get me at specks@joshsmithonline.com

*/

/*********************************************
For each animation, define an object in place of '$mySpeck' and replace each occurence of 'mySpeck' in this top section of code with your own defined name.*/

//Define Speck object(s). 
$mySpeck = new Speck(); 
	$mySpeck->name = "mySpeck"; // This string MUST be the same as the name of the variable. 
	//Optional properties go here. See readme.txt for full documentation.

//Print class attributes 
styleSpecks($mySpeck->name, $mySpeck->noOfBackgrounds);	
?>

<script type="text/javascript">
	//Pass speck object to javascript using JSON
	var mySpeck = JSON.parse ('<?php echo json_encode($mySpeck);?>');
</script>

<?php
/*You don't need to edit anything below this line. (of course, if you want to, or feel it needs it, edit away!)
**********************************************/

 //Import specks.js
echo "<script src=\"specks.js\"></script>";
	
class Speck{
		
	//The name given to the elements - must also be the prefix to all background images. 
	public $name;
	
	//The number of div elements to created - i.e the number of images which will appear simultaneously.
	public $noOfElements = 0;
	
	//The number of distinct background images to be used. These must be located in the img/ folder and named $elementName-x
	public $noOfBackgrounds = 1;
	
	//If all elements are of a standard dimension, then these values should be stored in this variable. 
	public $standardDimension = array(
		"width" => 0,
		"height" => 0,
	);
	
	//An array to be filled with element sizes, if these all different. 
	public $elementWidths = array();
	public $elementHeights = array();
	
	/*Defines how the elements are moved; must be either 'position' or 'background'
		Position (default): Elements are moved on the page using the 'top' and 'left' css attributes. 
		Background: Elements remain static, but background position is shifted. 	
	*/
	public $moveType = "position";

	//Time in milliseconds which elements take to fade in and out
	public $fadeTime = 400;
	
	//The area within which elements can move. The default is within the entire window.
	public $scope = array(
		"x" => "window",
		"y" => "window",
	);
	
}

function printSpecks($noOfElements, $elementId){
	for ($i = 0; $i < $noOfElements; $i++) {
		echo "<div id=\"" . $elementId . "-" . $i . "\" class=\"" . $elementId . "\"></div>";
	}
}

function styleSpecks($elementName, $noOfBackgrounds){
	for ($i = 0; $i < $noOfBackgrounds; $i++) {
		echo "<style> ." . $elementName . '-' . $i . "{background-image: url(\"img/" . $elementName . '-' . $i .".png\")} </style>";
	}
} 

?>