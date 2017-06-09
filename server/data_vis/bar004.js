function sub(data,color_value){

  var svg = d3.select("svg")
    .selectAll('rect')
    .remove();

  var svg = d3.select("svg")
    .selectAll('g')
    .remove();

  var svg = d3.select("svg")
    .selectAll('text')
    .remove();
    
  width = document.getElementById("width_bar").value;
  width = Number(width);

  height = document.getElementById("height_bar").value;
  height = Number(height);

  y_bar = document.getElementById("y_bar").value;
  x_bar = document.getElementById("x_bar").value;

  font_bar = document.getElementById("font_bar").value;
  font_bar = font_bar + "px";

  //var width = 700;
  //var height = 700;
  
  var svg = d3.select("svg")
//    .append("svg")
    .attr("width", width)
    .attr("height", height);


  var padding = {left:60, right:60, top:40, bottom:60};

  cont = document.getElementById("bardata_1").value;
  dataset2 = cont.split(",");

  cont2 = document.getElementById("bardata_2").value;
  dataset1 = cont2.split(",");

  if (dataset1.length!=dataset2.length){
      alert("The number of labels is not equal to the number of data !");
      return cont
  }

  var dataset = new Array();
  for (var i=0;i<dataset1.length;i++){
      dataset.push([dataset1[i],dataset2[i]]);
  }

//  cont = document.getElementById("data").value;
//  var dataset = new Array();
//  dataset = cont.split(",");
  //alert(Math.max.apply(null, dataset));
  //var dataset = [10, 20, 30, 40, 33, 24, 12, 5];
  color_value = "#" + document.getElementById("color_value").value;
  //alert(color_value);
    
  //xÖáµÄ±ÈÀý³ß
  //dataset1.map(function(d){ alert(d); });
  
  var xScale = d3.scale.ordinal()
    .domain(dataset1.map(function(d){ return d; }))
    .rangeRoundBands([0, width - padding.left - padding.right]);
  //alert(xScale);

  //yÖáµÄ±ÈÀý³ß
  var yScale = d3.scale.linear()
    .domain([0,Math.max.apply(null, dataset2)])
    .range([height - padding.top - padding.bottom, 0]);

  //¶¨ÒåxÖá
  var xAxis = d3.svg.axis()
    //.append("text")
    //.style("font-size",font_bar)
    .scale(xScale)
    .orient("bottom");
    
  //¶¨ÒåyÖá
  var yAxis = d3.svg.axis()
    .scale(yScale)
    .orient("left");
    //.append("text")
    //.style("font-size",font_bar);

  //svg.selectAll("text")
    //.style("font-size",font_bar);

  //¾ØÐÎÖ®¼äµÄ¿Õ°×
  var rectPadding = 4;

  //Ìí¼Ó¾ØÐÎÔªËØ
  var rects = svg.selectAll(".MyRect")
    .data(dataset2)
    .enter()
    .append("rect")
    .attr("class","MyRect")
    .attr("transform","translate(" + padding.left + "," + padding.top + ")")
    .attr("x", function(d,i){
      //alert(dataset1[i]);
      return xScale(dataset1[i]) + rectPadding/2;
    } )
    .attr("width", xScale.rangeBand() - rectPadding )
    .attr("y",function(d){
      var min = yScale.domain()[0];
      return yScale(min);
    })
    .attr("height", function(d){
      return 0;
    })
    .attr("fill",color_value)
    .transition()
    .delay(function(d,i){
      return i * 200;
    })
    .duration(2000)
    .ease("bounce")
    .attr("y",function(d){
      return yScale(d);
    })
    .attr("height", function(d){
      return height - padding.top - padding.bottom - yScale(d);
    });
    


  var texts = svg.selectAll(".MyText")
    .data(dataset2)
    .enter()
    .append("text")
    .style({  
                        "font-size":font_bar,  
                        "text-anchor":"middle",  
                        'fill':"white"
                    })
    .attr("class","MyText")
    .attr("transform","translate(" + padding.left + "," + padding.top + ")")
    .attr("x", function(d,i){
      return xScale(dataset1[i]) + rectPadding/2;
    } )
    .attr("dx",function(){
      return (xScale.rangeBand() - rectPadding)/2;
    })
    .attr("dy",function(d){
      return 20;
    })
    .text(function(d){
      return d;
    })
    .attr("y",function(d){
      var min = yScale.domain()[0];
      return yScale(min);
    })
    .transition()
    .delay(function(d,i){
      return i * 200;
    })
    .duration(2000)
    .ease("bounce")
    .attr("y",function(d){
      return yScale(d);
    });


  //Ìí¼ÓxÖá
  svg.append("g")
    .attr("class","axis")
    .attr("transform","translate(" + padding.left + "," + (height - padding.bottom) + ")")
    .call(xAxis) 
    .append('text')
    .attr('x', width-120)
    .attr('dy', '40px')
//    .style('text-anchor', 'end')
    .style({  
                        'font-size':font_bar,    
                        
                        'text-anchor':'end',  
//                        'font-weight':600  
  })
    .text(x_bar);
    
  //Ìí¼ÓyÖá
  svg.append("g")
    .attr("class","axis")
    .attr("transform","translate(" + padding.left + "," + padding.top + ")")
    .call(yAxis)
    .append('text')
    .attr('transform', 'rotate(-90)')
    .attr('y', -40)
    .attr('dy', '10px')
//    .style('text-anchor', 'end')
    .style({  
                        "font-size":font_bar,   
                        'text-anchor':'end',  
//                        "font-weight":600  
                    })
    .text(y_bar);


  var rects = svg.selectAll(".MyRect")
    .on("mouseover",function(d,i){
      d3.select(this)
        .attr("fill","steelblue");
    })
    .on("mouseout",function(d,i){
      d3.select(this)
        .transition()
            .duration(500)
        .attr("fill",color_value);
    });

  return svg; 
}