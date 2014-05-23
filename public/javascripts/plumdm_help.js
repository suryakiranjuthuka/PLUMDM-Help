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
	
	d3.select("#allEmailTemplatesContainer")
	.style("display","none")
	
	d3.select("#allLandingPageTemplatesContainer")
	.transition()
	.duration(500)
	.each("start",function(){
		d3.select(this)
		.style("opacity",.0)	
	})
	.style("display","block")
	.style("opacity",1)
	
	
	d3.select("#overlaylp")
	.classed("md-overlay",true)
	
	d3.select("#overlaye")
	.classed("md-overlay",false)
	
	
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
	
	d3.select("#allLandingPageTemplatesContainer")
	.style("display","none")
	
	d3.select("#allEmailTemplatesContainer")
	.transition()
	.duration(500)
	.each("start",function(){
		d3.select(this)
		.style("opacity",.0)	
	})
	.style("display","block")
	.style("opacity",1)
	
	d3.select("#overlaye")
	.classed("md-overlay",true)
	
	d3.select("#overlaylp")
	.classed("md-overlay",false)
	
});


