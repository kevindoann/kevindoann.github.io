var lastLoaded = "";

$(document).ready(function(){
	initIntro();
})

function initIntro(){
	$("#intro").load("intro.php");
}

function killIntro(){
	
	//$("#intro").fadeOut("slow", function(){
		//$("body").remove("#intro");
	//});
	
	resizeRenderer(true);
	
	initContent("php/home");
}


function initContent(pg){
	 
	if(lastLoaded != pg){

		if($("#content").length>0){
			killContents(pg);
		}else{
			loadPage(pg);
		}

	}

}


function killContents(pg){

	$("#content-holder").fadeOut("slow", function(){
		console.log("kill contents faded out complete function");
		$("body").remove("#content");
		loadPage(pg);
		
	})

}

function loadPage(pg){

	lastLoaded = pg;
	$("#content-holder").load(pg+".php", function(){
		console.log("loaded page complete function");
		$("#content-holder").fadeIn("slow");	
	});
	
	//$("#content-holder").fadeIn("slow", function(){
		
	//})

}