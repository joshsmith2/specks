SPECKS jQuery PLUGIN v1.0 - Readme

	Specks was written to solve a problem for a client who wanted a site
	with a 'subtle, cosmic glimmer.' It was designed  to automate the creation,
	styling, random positioning and animation of multiple elements, 
	each with their own background image. It was also, for me, an interesting exercise 
	in writing harmonious PHP and Javascript. The results of that first 
	project, by the way, are at www.thelovebelow.org

USAGE AND DOCUMENTATION

	Running the plugin will require three minor additions to your site:

		- A small chunk of PHP in the head of the page to be animated, to import the 
		requisite functions and define various parameters for the animation. This also contains a call to a javascript function which will animate the elements. 
		
		- A call to a PHP function which will print out the elements to be animated, 
		placed somewhere in the body.
		
		- A set of conventially named background images (see below), located in specks/img
		
TO USE THE PLUGIN: 

	1. Ensure you have imported jQuery into all pages you'd like to animate (jQuery.com)
	
	2. Place the 'specks' folder anywhere into your site. 
	
	3. Place the following code snippets into any page you'd like to animate (these can also be found in insertIntoPage.php): 
	
	 - The following 'include' statement should go into the <head> of your page, or wherever in your site you habitially include php scripts. You might need to edit the file path so it points to wherever specks.php resides on your site. 

		<?php include 'specks.php';?>
	 
	- The second snippet should be pasted into the <body> of the page to be animated. You should change all occurences of '$mySpeck' for the name of the object you will define in specks.php (see step 4.) You will need to insert this multiple times if using multiple objects.
	 
		<!--Start Specks v1.0-->
			<!--Print speck elements to be animated.-->
			<?php printSpecks ($bloom->noOfElements, $bloom->name); ?>
			
			<!--Run javascript to animate elements-->
			<script type="text/javascript">
				speckMain(<?php echo $bloom->name;?>);
			</script>
		<!--End Specks-->
	
	3. In 'specks.php', replace all occurences of 'mySpeck' with an arbitary name for your speck animation object (e.g $foo).
	
	4. Place at least one image into the specks/img folder. The plugin works by applying a series of background images to an element, and then fading these elements in and out.
	
	These images must share the name given to a speck object, and numbered serially from 0; so the images for an object named $foo should be called $foo-0.png, $foo-1.png etc. It's possible to use images with a different file extension (.png is the default) as long as they all share an extension. 
	
	5. The line $mySpeck = new Speck() defines a PHP object. By defining properties of this object you can control the qualities of the animation. Some of these properties are obligatory.
	
	OBJECT PROPERTIES:
	
		$mySpeck->name    (string, OBLIGATORY)
		
			A string which MUST be identical to the name of the myString variable.
			e.g $foo->name = "foo";

		$mySpeck->standardDimension["width"]    (integer, OBLIGATORY unless $mySpeck->elementWidths used)
		$mySpeck->standardDimension["height"]	(integer, OBLIGATORY unless $mySpeck->elementHeights used)
		
			An array containing the height and width in pixels of $mySpeck's background images. Use this property if all your images are of uniform size. For example, for a set of images all sized 200x300 pixels, use 
				$foo->standardDimension["width"] = 300; 
				$foo->standardDimension["height"] = 200; ; 
			
			
		$mySpeck->elementWidths[x]  (array of integers; OBLIGATORY unless $mySpeck->standardDimension["width"] used)
		$mySpeck->elementHeights[x] (array of integers; OBLIGATORY unless $mySpeck->standardDimension["height"] used)
		
			Use this property if each of your images is a different size.These arrays should contain the heights and widths of the background images used. (If defining these values seems tiresome, use standardDimension with the dimensions of the largest image.)
			
			E.g: 
			$foo->elementWidths[0] = 245;		//Width in pixels of 'foo-0.png'
			$foo->elementHeights[0] = 342;		//Height of 'foo-0.png'
			$foo->elementWidths[1] = 100;		//Width of 'foo-1.png'
			$foo->elementHeights[1] = 132;		//Height of 'foo-1.png'
			...
		
		$mySpeck->noOfElements    (integer, OPTIONAL, default: 1)
		
			An integer value for the number of div elements to created - i.e the number of images which will appear simultaneously.
		
		
		$mySpeck->noOfBackgrounds 	(integer, OPTIONAL, default: 1)
		
			The number of distinct background images to be used. As explained in 4, these must be located in the img/ folder and named $mySpeck-x
		
		
		$mySpeck->imgExtension    (string, OPTIONAL, default: ".png")
		
			The file extension for all background images used. 
	
	
		$mySpeck->fadeTime    (integer, OPTIONAL, default: 400)
		
			Time in milliseconds which elements take to fade in and out.
			
		
		$mySpeck->scope["x", "y"]    (array, OPTIONAL, default: "window")
		
			Defines the area in which elements can be displayed. By default, elements are set to display within an area defined by the current window size. Entering integer values for x and y will restrict elements to the area between (0,0) and (x,y). (Note: x and y can be negative; useful when using moveType="background" below.) 
			
			Currently, 'window' is the only string option for this value - more may be added in future releases.
			
		$mySpeck->moveType    (string, OPTIONAL, default: "position")
		
			The plugin has two ways of relocating elements once they have faded out, which correpond to the two values this property can take:
			
				"position": Use the 'top' and 'left' CSS attributes to relocate the element to a randomly chosen absolute position within the defined scope.
				
				"background": Use the 'background-position' CSS attribute to relocate the background within the element. 
			
			
That's it! The plugin will run automatically on page load. 

If you encounter any problems with the above, have requests for added functionality, or suggestions as to how the plugin could be improved, please let me know at specks@joshsmithonline.com.


		
