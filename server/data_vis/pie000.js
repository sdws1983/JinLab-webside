function pie(data_1){

		var svg = d3.select("#id2")
				.select("svg")
				.remove();
		
		var pie = d3.layout.pie();

		cont = document.getElementById("data_1").value;
		dataset2 = cont.split(",");

		cont2 = document.getElementById("data_2").value;
		dataset1 = cont2.split(",");
 		
        font_pie = document.getElementById("font_pie").value;
        font_pie = font_pie + "px";

		if (dataset1.length!=dataset2.length){
			alert("The number of labels is not equal to the number of data !");
			return cont
		}
		//var width = 600;  
      //  var height = 600; 
	   	width = document.getElementById("width_pie").value;
	 	width = Number(width);

		height = document.getElementById("height_pie").value;
		height = Number(height);

		rect_width = document.getElementById("rect_width_pie").value;
	 	rect_width = Number(rect_width);
          
        radius = document.getElementById("radius_pie").value;
		radius = Number(radius);

		var dataset = new Array();
        //var dataset=[["标签1",30],["标签2",20],["标签3",43],["标签4",55],["标签5",13]];  
		for (var i=0;i<dataset1.length;i++){
			dataset.push([dataset1[i],dataset2[i]]);
		}
		//alert(dataset);

        var outerRadius = radius; //外半径  
            var innerRadius = 0; //内半径，为0则中间没有空白  
        var arc = d3.svg.arc() //弧生成器  
                .innerRadius(innerRadius) //设置内半径  
                .outerRadius(outerRadius); //设置外半径  
        var color = d3.scale.category20();//构造20种颜色的序数比例尺，索引值可以是字符串或数字  
        var pie = d3.layout.pie()   //饼图布局  
            .sort(null)             //不排序，不写则会从大到小，顺时针排序。  
			.value(function(d){  return d[1]});   //设置value值为上面的2二维数组中的数字  
        var piedata=pie(dataset);  
        var svg = d3.select("#id2")
					.append("svg")
					.attr("width", width)
					.attr("height", height);
  
         var arcs=svg.selectAll(".arc")               
            .data(piedata) //返回是pie(data0)  
            .enter().append("g")  
            .attr("class", "arc")  
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")   //将圆心平移到svg的中心  
            .append("path")  
            .attr("fill", function(d, i) {  
                return color(i);            //根据下标填充颜色  
            })  
            .attr("d", function(d, i) {  
                return arc(d);              ///调用上面的弧生成器  
            });  
  
         var text=svg.selectAll(".text")  
            .data(piedata) //返回是pie(data0)  
            .enter().append("g")  
            .attr("class", "text")  
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")  
            .append("text")  
            .style('text-anchor', function(d, i) {  
                //根据文字在是左边还是右边，在右边文字是start，文字默认都是start。  
                return (d.startAngle + d.endAngle)/2 < Math.PI ? 'start' : 'end';  
            })  
            .attr('transform', function(d, i) {  
                var pos = arc.centroid(d);      //centroid(d)计算弧中心  
                pos[0]=outerRadius*((d.startAngle+d.endAngle)/2<Math.PI?1.4:-1.4)  
                pos[1]*=2.1;                    //将文字移动到外面去。  
                return 'translate(' + pos + ')';  
            })  
            .attr("dy",".3em")              //将文字向下便宜.3em  
            .text(function(d) {             //设置文本  
                return d.data[0];     
            })  
  
         var text2=svg.selectAll(".text2")  
            .data(piedata) //返回是pie(data0)  
            .enter().append("g")  
            .attr("class", "text")  
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")  
            .append("text")  
            .style('text-anchor',"middle")  
            .attr('transform', function(d, i) {  
                var pos = arc.centroid(d);          //将数字放在圆弧中心  
                return 'translate(' + pos + ')';  
            })  
            .text(function(d) {  
                return d.data[1];  
            })  
             var line = svg.selectAll(".line")      //添加文字和弧之间的连线  
                .data(piedata) //返回是pie(data0)  
                .enter().append("g")  
                .attr("class", "line")  
                .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")  
                .append("polyline")  
                .attr('points', function(d, i) {  
                    var pos1= arc.centroid(d),pos2= arc.centroid(d),pos3= arc.centroid(d);  
                    pos1[0]*=2,pos1[1]*=2;  
                    pos2[0]*=2.1,pos2[1]*=2.1  
                    pos3[0]=outerRadius*((d.startAngle+d.endAngle)/2<Math.PI?1.4:-1.4)  
                    pos3[1]*=2.1;  
                    //pos1表示圆弧的中心边缘位置，pos2是网上稍微去了一下，pos3就是将pos2平移后得到的位置  
                    //三点链接在一起就成了线段。  
                    return [pos1,pos2,pos3];  
                })  
                .style('fill', 'none')  
                .style('stroke',function(d,i){  
                    return color(i);  
                })  
                .style('stroke-width', "3px")  
                .style('stroke-dasharray',"5px")  
  
             var label=svg.selectAll('.label')      //添加右上角的标签  
                    .data(piedata)  
                    .enter()  
                    .append('g')  
                    .attr("transform","translate("+(width-rect_width)+","+10+")")  
                    ;     
                label.append('rect')        //标签中的矩形  
                    .style('fill',function(d,i){  
                        return color(i);  
                    })  
                    .attr('x',function(d,i){  
                        return 0;  
                    })  
                    .attr("y",function(d,i){  
                        return 10+i*10+i*0.4*rect_width;  
                    })  
                    .attr('rx','5')     //rx=ry 会出现圆角  
                    .attr('ry','5')  
                    .attr('width',rect_width)  
                    .attr('height',0.4*rect_width)  
                    ;  
                label.append('text')            //标签中的文字  
                    .attr('x',function(d,i){  
                        return rect_width / 2;              //因为rect宽度是50，所以把文字偏移25,在后面再将文字设置居中  
                    })  
                    .attr("y",function(d,i){          
                        return 15+0.2*rect_width+i*10+i*0.4*rect_width;  
                    })  
                    .text(function(d){  
                        return d.data[0];  
                    })  
                    .style({  
                        "font-size":font_pie,  
                        "text-anchor":"middle",  
                        'fill':"white",  
                        "font-weight":600  
                    })
                    return svg;
} 
function sort_pie(pie){
	pie.sort();
}