/*
	Javascript for Specks v1.0

	Specks generates a number of elements, and fades them in and out recursively at random points within a defined area. 
	Each of these elements can be associated with multiple background images, which the function will cycle through. 
	
	All functions written by Josh Smith (www.joshsmithonline.com)

	Any comments, suggestions, help or criticism is extremely welcome. You can get me at specks@joshsmithonline.com

*/

function speckMain(speck){ 
//Calls all subsidiary functions. 
	setDefaults(speck);
	styleElements(speck);
	fadeMultipleIn(speck,0); //The 0 here shouldn't be altered - since this function is recursive, it's a counter used as a static variable.
}	

function setDefaults(speck){
//Sets various attributes of the speck object to a default value.	

	
	if(speck.hasOwnProperty("scope")){
		if (speck.scope["x"] == "window") {
			speck.scope["x"] = $(window).width();
		}

		if (speck.scope["y"] == "window") {
			speck.scope["y"] = $(window).height();
		}
	}
}

function styleElements(speck){ //Applies CSS to speck elements, including specified widths and heights
	
	var width;
	var height;
	
	$('.bloom').each(function(i){ 
			
		$(this).css({
			'width': '200px',
			'height': '200px',
			'position': 'absolute',
			'display':'none',
		});
	});	 
	
	
	$(toClass(speck.name)).each(function(index){
	
		//If various heights/widths have been entered for each image, input those values into the CSS
		if (speck.standardDimension["width"] === 0) {
			width = speck.elementWidths[index];
			height = speck.elementHeights[index];
		}
		
		//Input standard heights, if used
		else {
			width = speck.standardDimension["width"];
			height = speck.standardDimension["height"];
		}
	
		//Print css for this element
		$(this).css({
			'width': width,
			'height': height,
			'position': 'absolute',
			'display':'none',
		});
	});
}

function fadeMultipleIn(speck, i) {
//The function which does all the work.
	
	//Change the background image of (ith) element
	swapBackgroundImg(speck.name, speck.noOfElements, speck.noOfBackgrounds, i);

	//Move element
	relocate(toId(speck.name)+'-'+(i%speck.noOfElements), rand(speck.scope["x"]), rand(speck.scope["y"]), speck.moveType);

	//Fade element in
	$(toId(speck.name) + '-' + (i%speck.noOfElements)).fadeIn(speck.fadeTime, function() {
		
		//If not all elements faded in yet, recall function
		if (i < speck.noOfElements){
			fadeMultipleIn(speck,(i+1));
		}
		
		else { //Fade 'oldest' element out, recall function.
		
			$(toId(speck.name) + '-' + ((i+1)%speck.noOfElements)).fadeOut(speck.fadeTime, function() {
				fadeMultipleIn(speck,(i+1));
			});
		}
		
	});
}

function rand(x) //Generate a random natural number smaller than or equal to x
{
	return Math.floor(Math.random()*(x))+1;
}

function toClass(str){ //Converts a string to a CSS class.
	return "."+str;
}

function toId(str){	//Converts a string to a CSS id.
	return "#"+str;
}

//Place a certain element at given coordinates. Type must be one of position or background
function relocate(elementId, x, y, type){
	
	if (type=="background"){
		$(elementId).css("background-position",x+'px '+y+'px');
	}

	else {
		$(elementId).css("left",x+'px');
		$(elementId).css("top",y+'px');
	}
}

function swapBackgroundImg(elementName, noOfElements, noOfBackgrounds, i) { //Change the background image for the next one in the folder.

	$('#'+elementName+'-'+(i%noOfElements)).each(function(){ 
		
		for (j=0; j<noOfBackgrounds; j++){
			$(this).removeClass(elementName+'-'+j);
		}
		
		$(this).addClass(elementName+'-'+(i%noOfBackgrounds));
	
	});

}


