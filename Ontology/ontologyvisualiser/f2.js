/*
 	** Short Description of file:
	The file controls all the processing of nodes and links.
	It calaculates all the inter-node distances etc.
	It also makes calls to certain functions and other
	files as and when user wants to edit the graph.

	@Category : Backend, very !mportant
	@Since : Svn-Revision-11.
	@Inspected on : 15 November.
*/

var width = 1200,
    height = 500,
    node,
    fill = d3.scale.category20(),
    nodes = [],
    links = [],
    edges = [];
var colors = [ "#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b", "#e377c2", "#7f7f7f", "#bcbd22", "#17becf" ];

$.getJSON("database/.default.2.json", function(data){
	for(i=0;i<data.nodes.length;i++)
		nodes.push({x: data.nodes[i].x, y: data.nodes[i].y, type: data.nodes[i].type, color: data.nodes[i].color});

	for(var k=0;k<data.links.length;k++)
	{	
		var src={x: data.links[k].sx, y: data.links[k].sy};
		var trg={x: data.links[k].tx, y: data.links[k].ty};
		for(i=0;i<data,nodes.length;i++)
		{
			if(data.nodes[i].x==src.x && data.nodes[i].y==src.y)
				break;
		}
		for(j=0;j<data,nodes.length;j++)
		{
				if(data.nodes[j].x==trg.x && data.nodes[j].y==trg.y)
				break;
		}
		links.push({source: nodes[i], target: nodes[j],type: data.links.type});
	}
	
	restart();
});

var vis = d3.select("#chart").append("svg")
.attr("width", width)
.attr("height", height);

	var force = d3.layout.force()
	.charge(-200)
	.distance(100)
	.nodes(nodes)
.links(links)
	.size([width, height]);

	var cursor = vis.append("circle")
	.attr("transform", "translate(-100,-100)")
	.attr("class", "cursor");

	force.on("tick", function() {
		vis.selectAll("line.link")
		.attr("x1", function(d) { return d.source.x; })
		.attr("y1", function(d) { return d.source.y; })
		.attr("x2", function(d) { return d.target.x; })
		.attr("y2", function(d) { return d.target.y; });

	vis.selectAll("circle.anchorNode")
		.attr("cx", function(d) { return d.x; })
		.attr("cy", function(d) { return d.y; });
	});

vis.on("mousemove", function() {
	cursor.attr("transform", "translate(" + d3.mouse(this) + ")");
});

vis.on("mousedown", function() {
	var point = d3.mouse(this);
	node = {x: point[0], y: point[1], type: '',color: 0};
	d3.select('#mymenu')
	.style('position', 'absolute')
	.style('left', d3.event.x + "px")
	.style('top', d3.event.y + "px")
	.style('display', 'block');
edges = [];
restart();
});
restart();

function modify()
{
	var old=document.forms['modify_graph']['modifynodename'].value;
	var now=document.forms['modify_graph']['newnodename'].value;
	var col=document.forms['modify_graph']['ul2'].value;
	for(var i=0;i<nodes.length;i++)
	{
		if(nodes[i].type==old)
		{
			nodes[i].type=now;
			nodes[i].color=col;
		}
	}
	for(var i=0;i<links.length;i++)
	{
		if(links[i].source.type==old)
		{
			links[i].source.type=now;
			links[i].source.color=col;
		}
		if(links[i].target.type==old)
		{
			links[i].source.type=now;
			links[i].target.color=col;
		}
	}

	var json = myJsonify();
	console.log(json);
	window.location.href="scripts/modify_node.php?nodes=" +json + "&node1=" +old + "&name=" +now + "&color=" + col;
	return false;
}

function delete_node()
{
	var old=document.forms['delnode']['d_node'].value;
	for(var i=0;i<nodes.length;i++)
	{
		if(nodes[i].type==old)
		{
			nodes.splice(i,1);
			i--;
		}
	}
	for(var i=0;i<links.length;i++)
	{
		if(links[i].source.type==old || links[i].target.type==old)
		{
			links.splice(i,1);
			i--;
		}
	}

	var json = myJsonify();
	console.log(json);
	window.location.href="scripts/delete_node.php?nodes=" +json + "&node1=" +old;
	return false;
}

function add_node()
{
	var old=document.forms['addnode']['addnodename'].value;
	var json = myJsonify();
	console.log(json);
	window.location.href="scripts/add_node.php?nodes=" +json + "&name=" +old;
	return false;
}


function delete_link()
{
	var old=document.forms['dellink']['d_link'].value;
	for(var i=0;i<links.length;i++)
	{
		if(links[i].type==old)
		{
			links.splice(i,1);
			i--;
		}
	}

	var json = myJsonify();
	console.log(json);
	window.location.href="scripts/delete_link.php?nodes=" +json + "&link=" +old;
	return false;
}



function validate()
{
	var n=document.forms['nodes']['menu'].value;
	node.type=n;
	$.getJSON("database/.default.json",function(data){
		for(i=0;i<data.nodes.length;i++)
		{
			if(data.nodes[i].name==n)
			{
				node.color=data.nodes[i].group;
				nodes.push(node);
				restart();
				break;
			}
		}
	})
	edges=[];
	restart();
	d3.select('#mymenu') 
		.style('display', 'none');
	return false;
}

function save()
{
	var json = myJsonify();
	window.location.href="scripts/save_graph.php?nodes=" +json;
	return false;
}

function restart() {
	force.start();
	var nod = vis.selectAll("circle.anchorNode")
		.data(nodes)
		.enter().append("svg:circle")
		.style("fill",function(d) { return colors[d.color]; })
		.attr("class", "anchorNode")
		.attr("cx", function(d) { return d.x; })
		.attr("cy", function(d) { return d.y; })
		.attr("r", 4.5)
		.call(force.drag)

		.on("contextmenu",function() {
			var point = d3.mouse(this),
			n = {x: point[0], y: point[1]};

		for(i=0;i<nodes.length;i++)
		{
			if(Math.abs(nodes[i].x-n.x)<=5 && Math.abs(nodes[i].y-n.y<=5))
		{	
			nodes.splice(i,1);
			break;
		}
		}
		for(i=0;i<links.length;i++)
		{
			if((Math.abs(links[i].source.x-n.x)<=5 && Math.abs(links[i].source.y-n.y<=5)) || Math.abs((links[i].target.x-n.x)<=5 && Math.abs(links[i].target.y-n.y<=5)))
		{	
			links.splice(i,1);
			i--;
		}
		console.log(links);
		}
		
		save();
		myrestart();
		d3.event.preventDefault();
		myrestart();
		})

	.on("dblclick", function() { 
		var point = d3.mouse(this),
	node = {x: point[0], y: point[1]};
	if(edges.length == 0)
	{
		for(i=0;i<nodes.length;i++)
	{
		if(Math.abs(nodes[i].x-node.x)<=5 && Math.abs(nodes[i].y-node.y<=5))
	{	
		edges.push(i);
		break;
	}
	}
	}
	else
	{
		for(i=0;i<nodes.length;i++)
	{
		if(Math.abs(nodes[i].x-node.x)<=5 && Math.abs(nodes[i].y-node.y<=5))
	{
		edges.push(i);
		break;
	}
	}
		if(edges.length==2)
		{
			if(edges[0]!=edges[1])
			{
				d3.select('#linkmenu') 
					.style('position', 'absolute')
					.style('left', d3.event.x + "px")
					.style('top', d3.event.y + "px")
					.style('display', 'block');
			}
			else
				edges=[];
		}
		else
			edges=[];
	}
	});
	
	nod.append("svg:title")
		.text(function(d){ return d.type });
	
	vis.selectAll("line.link")
		.data(links)
		.enter().insert("line", "circle.anchorNode")
		.attr("class", "link")
		.attr("x1", function(d) { return d.source.x; })
		.attr("y1", function(d) { return d.source.y; })
		.attr("x2", function(d) { return d.target.x; })
		.attr("y2", function(d) { return d.target.y; });
}

function link()
{
	var n=document.forms['links']['menu'].value;
	console.log("HERE");
	links.push({source: nodes[edges[0]], target: nodes[edges[1]], type: n});
	edges=[];
	d3.select('#linkmenu') 
		.style('display', 'none');
	myrestart();
	myrestart();
	return false;
}

function myrestart() {
	force.start();
	var nod = vis.selectAll("circle.anchorNode")
		.data(nodes)
		.enter().insert("circle", "circle.cursor")
		.attr("class", "anchorNode")
		.attr("cx", function(d) { return d.x; })
		.attr("cy", function(d) { return d.y; })
		.style("fill",function(d) { return colors[d.color]; })
		.attr("r", 4.5);

	vis.selectAll("line.link")
		.data(links)
		.enter().insert("line", "circle.anchorNode")
		.attr("class", "link")
		.attr("x1", function(d) { return d.source.x; })
		.attr("y1", function(d) { return d.source.y; })
		.attr("x2", function(d) { return d.target.x; })
		.attr("y2", function(d) { return d.target.y; });
}

function myJsonify()
{
	var json = '{"nodes":[';
	for(i=0;i<nodes.length;i++)
	{
		if(i)
			json+=',';
		json+='{"x":'+nodes[i].x;
		json+=',"y":'+nodes[i].y;
		json+=',"type":'+nodes[i].type;
		json+=',"color":'+nodes[i].color;
		json+='}';
	}
	json+='],"links":['
	for(i=0;i<links.length;i++)	
	{
		if(i)
			json+=',';
		json+='{"sx":'+links[i].source.x;
		json+=',"sy":'+links[i].source.y;
		json+=',"tx":'+links[i].target.x;
		json+=',"ty":'+links[i].target.y;
		json+=',"type":'+links[i].type;
		json+='}';
	}
	json += ']}';
	return json;
}
