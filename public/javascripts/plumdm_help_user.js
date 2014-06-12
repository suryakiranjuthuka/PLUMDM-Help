// JavaScript Document
/*d3.select("#secondNavLinks")
.selectAll("div")
.on("mouseover", function(){
	d3.select(this)
	.style("margin-left",10+"px")
	.style("border-right","7px solid #3FB4C6")
});

d3.select("#secondNavLinks")
.selectAll("div")
.on("mouseout", function(){
	d3.select(this)
	.style("margin-left",0+"px")
	.style("border-right","0px solid #3FB4C6")
});*/


d3.select("#firstNav")
.on("mouseover", function(){
	d3.select(this)
	.transition()
	.duration(350)
	.style("left",-2+"px")
		
	d3.select("#firstNavTriangle")
	.transition()
	.duration(350)
	.style("left",265+"px")
	.style("opacity",0)
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("border-right-style","none")
	
});

d3.select("#firstNav")
.on("mouseout", function(){
	d3.select(this)
	.transition()
	.duration(400)
	.style("left",-247+"px")
	
	d3.select("#firstNavTriangle")
	.transition()
	.duration(400)
	.style("left",20+"px")
	.style("opacity",1)
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("border-right-style","solid")
	
});


d3.select("body")
.select("#plumEmailLink")
.on("click", function(){
	
	d3.select("#p_e_search_container")
	.style("display","block")
	
	d3.select("#user_c_lp")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")
	
	d3.select("#user_p_e")
	.style("display","block")
	
	d3.select("#search_results_p_e")
	.transition()
	.duration(500)
	.each("start",function(){
		d3.select(this)
		.style("opacity",.0)
	})
	.style("opacity",1)
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("color","#349faf")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #3FB4C6")
	
});







d3.select("body")
.select("#clientEmailLink")
.on("click", function(){
	d3.select("#user_p_e")
	.style("display","none")
	
	d3.select("#user_c_lp")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","block")
	
	d3.select("#search_results_c_e")
	.transition()
	.duration(500)
	.each("start",function(){
		d3.select(this)
		.style("opacity",.0)
	})
	.style("opacity",1)
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("color","#349faf")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #3FB4C6")
	
});


d3.select("body")
.select("#plumLPLink")
.on("click", function(){
	d3.select("#user_p_e")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_c_lp")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","block")
	
	d3.select("#search_results_p_lp")
	.transition()
	.duration(500)
	.each("start",function(){
		d3.select(this)
		.style("opacity",.0)
	})
	.style("opacity",1)
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("color","#349faf")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #3FB4C6")
	
});

d3.select("body")
.select("#clientLPLink")
.on("click", function(){
	d3.select("#user_p_e")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")
	
	d3.select("#user_c_lp")
	.style("display","block")
	
	d3.select("#search_results_c_lp")
	.transition()
	.duration(500)
	.each("start",function(){
		d3.select(this)
		.style("opacity",.0)
	})
	.style("opacity",1)
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("color","#349faf")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #3FB4C6")
	
});








//d3.select("body")
//.select("#landingPageButton")
//.on("mouseover", function(){
//	d3.select("#selectCircle")
//	  .transition()
//	  .ease("elastic")
//	  .duration(600)
//	  .style("left",80+"px")
//	  .style("background-color","#3abec0")
//	  
//	  d3.select("#landingPageButton")
//	.style("margin-top",3+"px")
//})
//.on("mouseout",function(){
//	d3.select("#selectCircle")
//	  .transition()
//	  .ease("elastic")
//	  .duration(600)
//	  .style("left",0+"px")
//	  .style("background-color",function(){
//		  if(window.test==1){
//		  	return "#3abec0";
//		  }else 
//		  if(window.test==2){
//		  	return "#4ad486";
//		  }
//		  else{ return "lightgrey";}
//		  })
//		  
//	d3.select("#landingPageButton")
//	.style("margin-top",0+"px")
//})
//.on("click", function(){
//	d3.select("#selectCircle")
//	  .transition()
//	  .ease("elastic")
//	  .duration(600)
//	  .style("left",0+"px")
//	  .style("background-color",function(){
//		  	window.test="1";
//			return "#3abec0";
//		  })
//		  
//	d3.select("#landingPageButton")
//	.style("margin-top",0+"px")
//	
//	d3.select("#circleLetter")
//	.text("L")
//	
//	d3.select("#allEmailTemplatesContainer")
//	.style("display","none")
//	
//	d3.select("#allLandingPageTemplatesContainer")
//	.transition()
//	.duration(500)
//	.each("start",function(){
//		d3.select(this)
//		.style("opacity",.0)	
//	})
//	.style("display","block")
//	.style("opacity",1)
//	
//	d3.select(".eClientScroll")
//		.attr("id","none")
//		
//	d3.select(".lpClientScroll")
//		.attr("id","CLIENT")
//	
//	d3.select("footer")
//		.style("position","relative")
//		.style("margin-top",80+"px")
//	
//	d3.select("#introduction")
//		.style("display","none")
//	
//	d3.select("#error_check")
//		.style("display","none")	
//		
//	d3.select("#fixedSidebar")
//	.transition()
//	.duration(200)
//	.each("start",function(){
//		d3.select(this)
//		.style("opacity",.0)	
//	})
//	.style("display","block")
//	.style("opacity",1)
//	
//	
//});














//d3.select("body")
//.select("#emailButton")
//.on("mouseover", function(){
//	d3.select("#selectCircle")
//	  .transition()
//	  .ease("elastic")
//	  .duration(600)
//	  .style("left",-80+"px")
//	  .style("background-color","#4ad486")
//	  
//	d3.select("#emailButton")
//	.style("margin-top",3+"px")
//})
//.on("mouseout",function(){
//	d3.select("#selectCircle")
//	  .transition()
//	  .ease("elastic")
//	  .duration(600)
//	  .style("left",0+"px")
//	  .style("background-color",function(){
//		  if(window.test==1){
//			  return "#3abec0";
//			  }else 
//		  if(window.test==2){
//		  	return "#4ad486";
//		  }else{ return "lightgrey";}
//		  })
//		  
//	d3.select("#emailButton")
//	.style("margin-top",0+"px")
//})
//.on("click", function(){
//	d3.select("#selectCircle")
//	  .transition()
//	  .ease("elastic")
//	  .duration(600)
//	  .style("left",0+"px")
//	  .style("background-color",function(){
//		  	window.test="2";
//			return "#4ad486";
//		  })
//		  
//	d3.select("#emailButton")
//	.style("margin-top",0+"px")
//	
//	d3.select("#circleLetter")
//	.text("E")
//	
//	d3.select("#allLandingPageTemplatesContainer")
//	.style("display","none")
//	
//	d3.select("#allEmailTemplatesContainer")
//	.transition()
//	.duration(500)
//	.each("start",function(){
//		d3.select(this)
//		.style("opacity",.0)	
//	})
//	.style("display","block")
//	.style("opacity",1)
//	
//	d3.select(".lpClientScroll")
//		.attr("id","none")
//		
//	d3.select(".eClientScroll")
//		.attr("id","CLIENT")
//		
//	d3.select("footer")
//		.style("position","relative")
//		.style("margin-top",80+"px")
//	
//	d3.select("#introduction")
//		.style("display","none")
//		
//	d3.select("#error_check")
//		.style("display","none")
//		
//	d3.select("#fixedSidebar")
//	.transition()
//	.duration(200)
//	.each("start",function(){
//		d3.select(this)
//		.style("opacity",.0)	
//	})
//	.style("display","block")
//	.style("opacity",1)
//		
//	
//});
//
