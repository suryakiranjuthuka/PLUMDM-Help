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
.select("#allPlumEmailLink")
.on("click", function(){
	search_all_p_e();
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
	
/*	d3.select("#user_c_lp")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")*/
	
	d3.select("#all_user_p_e")
	.style("display","block")
	
	d3.select("#search_all_results_p_e")
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
	
	d3.select("#plumEmailLink")
	.style("color","#FAF1E0")
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("width",260+"px")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #FAF1E0")
	
});


d3.select("body")
.select("#allClientEmailLink")
.on("click", function(){
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
/*	d3.select("#user_c_lp")
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
	.style("opacity",1)*/
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select("#clientEmailLink")
	.style("color","#FAF1E0")
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("width",260+"px")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #FAF1E0")
	
});


d3.select("body")
.select("#allPlumLPLink")
.on("click", function(){
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
/*	d3.select("#user_c_lp")
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
	.style("opacity",1)*/
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select("#plumLPLink")
	.style("color","#FAF1E0")
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("width",260+"px")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #FAF1E0")
	
});


d3.select("body")
.select("#allClientLPLink")
.on("click", function(){
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
/*	d3.select("#user_c_lp")
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
	.style("opacity",1)*/
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select("#clientLPLink")
	.style("color","#FAF1E0")
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("width",260+"px")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #FAF1E0")
	
});









d3.select("body")
.select("#plumEmailLink")
.on("click", function(){
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
	
/*	d3.select("#user_c_lp")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")*/
	
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
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.transition()
	.duration(100)
	.style("border-right","0px solid #3FB4C6")
	.style("width",267+"px")
	
	
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
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
/*	d3.select("#user_p_e")
	.style("display","none")
	
	d3.select("#user_c_lp")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")*/
	
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
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.transition()
	.duration(100)
	.style("border-right","0px solid #3FB4C6")
	.style("width",267+"px")
	
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
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
/*	d3.select("#user_p_e")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_c_lp")
	.style("display","none")*/
	
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
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.transition()
	.duration(100)
	.style("border-right","0px solid #3FB4C6")
	.style("width",267+"px")
	
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
	
	d3.select("#allUserInfoTemplatesContainer")
	.selectAll("section")
	.style("display","none")
	
/*	d3.select("#user_p_e")
	.style("display","none")
	
	d3.select("#user_c_e")
	.style("display","none")
	
	d3.select("#user_p_lp")
	.style("display","none")*/
	
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
	
	d3.select("#firstNavLinks")
	.selectAll("div")
	.transition()
	.duration(100)
	.style("border-right","0px solid #3FB4C6")
	.style("width",267+"px")
	
	d3.select("#secondNavLinks")
	.selectAll("div")
	.style("color","#6d7393")
	.style("border-right","0px solid #3FB4C6")
	
	d3.select(this)
	.style("color","#349faf")
	//.style("margin-left",0+"px")
	.style("border-right","7px solid #3FB4C6")
	
});
