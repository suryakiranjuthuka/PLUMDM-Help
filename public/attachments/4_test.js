//Testing Code
var circle_details = d3.select("#circleDetailsModal")
			.selectAll("div")
			.data(dataset)
			.enter()
			.append("div")
			.attr("class","circleParaGroup")
			.append("div")
			.attr("class","circleDetails")
			.style("background-color",function(d){ 
				if(d.years==1){
					return c1;} else if(d.years==2){
					return c2;} else if(d.years==3){
					return c3;} else if(d.years==4){
					return c4;} else{ return c5;  }
			});
		
		var circle_details_para = d3.select("#circleDetailsModal")
			.selectAll("p")
			.data(dataset)
			.enter()
			.select(".circleParaGroup")
			.append("p")
			.attr("class","circleDetailsPara");
			
			
			circle_details_para
			.text(function(d){ return d.name; });


//Curent OnWorking Code
var circle_para_group = d3.select("#circleDetailsModal")
			.selectAll("div")
			.data(dataset)
			.enter()
			.append("div")
			.attr("class","circleParaGroup");


			var circle_details = circle_para_group
			.append("div")
			.attr("class","circleDetails")
			.style("background-color",function(d){ 
				if(d.years==1){
					return c1;} else if(d.years==2){
					return c2;} else if(d.years==3){
					return c3;} else if(d.years==4){
					return c4;} else{ return c5;  }
			});
		
		var circle_details_para = circle_para_group
			.append("p")
			.attr("class","circleDetailsPara")
			.text(function(d){ return d.name; });




//OLD CODE(Working)

	var circle_details = d3.select("#circleDetailsModal")
			.append("div")
			.attr("id","circleDetails")
			.selectAll("div")
			.data(dataset)
			.enter()
			.append("div")
			.attr("class","circleDetails")
			.style("background-color",function(d){ 
				if(d.years==1){
					return c1;} else if(d.years==2){
					return c2;} else if(d.years==3){
					return c3;} else if(d.years==4){
					return c4;} else{ return c5;  }
			});
		
		var circle_details_para = d3.select("#circleDetailsModal")
			.append("div")
			.attr("id","circleDetailsPara")
			.selectAll("p")
			.data(dataset)
			.enter()
			.append("p")
			.attr("class","circleDetailsParaEach");
			
			
			circle_details_para
			.text(function(d){ return d.name; });

