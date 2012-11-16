/*
	** Short Description of file:
	This file basically deals with obtaining 
	the co-ordinates of all the nodes and then 
	rendering them to svg for display
	[works on 'd3' API]
	Also describes the properties of nodes
	and edges which are different for various 
	nodes/edges such as color, name etc.

	@Category: Frontend,!mportant
	@Since: Svn revision-1.
	@Inspected on: 5 October
	*/

var width = 1300,		//dimensions of the 'div' for display
    height = 660;

var colors = [ "#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b", "#e377c2", "#7f7f7f", "#bcbd22", "#17becf" ];

	var force = d3.layout.force()		//charges on various nodes and lenght of edges
	.charge(-180)
.linkDistance(100)
	.size([width, height]);

	var svg = d3.select("#chart").append("svg")	
	.attr("width", width)
	.attr("height", height);

	d3.json("database/.default.json", function(json) {		
		force
		.nodes(json.nodes)
		.links(json.links)
		.start();

	var link = svg.selectAll(".link")		//properties of each edge, including its connections
		.data(json.links)
		.enter().append("line")
		.attr("class", "link")

		var node = svg.selectAll("g.anchorNode")	//properties of each node, including its radius, color etc.
		.data(json.nodes)
		.enter().append("svg:g")
		.attr("class", "anchorNode")
		.call(force.drag);
	node.append("svg:circle")
		.attr("r", 4)
		.style("fill", function(d) { return colors[d.group]; })

		node.append("text")
		.text(function(d) { return d.name })
		.attr("x", -8)
		.attr("y", -8)
		.attr("width", 16)
		.attr("height", 16)
		.style("fill", "#555");
  node.append("title")
      .text(function(d) { return d.name; });

	force.on("tick", function() {				//obtains co-ordinates for each link
		link.attr("x1", function(d) { return d.source.x; })
		.attr("y1", function(d) { return d.source.y; })
		.attr("x2", function(d) { return d.target.x; })
		.attr("y2", function(d) { return d.target.y; });
	node.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });
	});
	});
