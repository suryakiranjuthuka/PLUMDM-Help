// JavaScript Document

d3.select("body")
.select("#landingPageButton")
.on("mouseover", function(){
	d3.select("#selectCircle")
	  .transition()
	  .ease("elastic")
	  .duration(600)
	  .style("left",80+"px")
	  .style("background-color","#3abec0")
	  
	  d3.select("#landingPageButton")
	.style("margin-top",3+"px")
})
.on("mouseout",function(){
	d3.select("#selectCircle")
	  .transition()
	  .ease("elastic")
	  .duration(600)
	  .style("left",0+"px")
	  .style("background-color",function(){
		  if(window.test==1){
		  	return "#3abec0";
		  }else 
		  if(window.test==2){
		  	return "#4ad486";
		  }
		  else{ return "lightgrey";}
		  })
		  
	d3.select("#landingPageButton")
	.style("margin-top",0+"px")
})
.on("click", function(){
	d3.select("#selectCircle")
	  .transition()
	  .ease("elastic")
	  .duration(600)
	  .style("left",0+"px")
	  .style("background-color",function(){
		  	window.test="1";
			return "#3abec0";
		  })
		  
	d3.select("#landingPageButton")
	.style("margin-top",0+"px")
	
	d3.select("#circleLetter")
	.text("L")
	
});














d3.select("body")
.select("#emailButton")
.on("mouseover", function(){
	d3.select("#selectCircle")
	  .transition()
	  .ease("elastic")
	  .duration(600)
	  .style("left",-80+"px")
	  .style("background-color","#4ad486")
	  
	d3.select("#emailButton")
	.style("margin-top",3+"px")
})
.on("mouseout",function(){
	d3.select("#selectCircle")
	  .transition()
	  .ease("elastic")
	  .duration(600)
	  .style("left",0+"px")
	  .style("background-color",function(){
		  if(window.test==1){
			  return "#3abec0";
			  }else 
		  if(window.test==2){
		  	return "#4ad486";
		  }else{ return "lightgrey";}
		  })
		  
	d3.select("#emailButton")
	.style("margin-top",0+"px")
})
.on("click", function(){
	d3.select("#selectCircle")
	  .transition()
	  .ease("elastic")
	  .duration(600)
	  .style("left",0+"px")
	  .style("background-color",function(){
		  	window.test="2";
			return "#4ad486";
		  })
		  
	d3.select("#emailButton")
	.style("margin-top",0+"px")
	
	d3.select("#circleLetter")
	.text("E")
});
