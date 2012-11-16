<!--
	** Short Description of file:
	The main file with which the user interacts.
	All the options provided to the user are 
	through this file. This file provides several 
	options to the user including starting a new graph,
	or loading a previous graph, or to modify current
	graph by adding/deleting nodes/edges.

	@Category: Frontend,Very !mportant
	@Since: Svn revision-8.
	@Inspected on: 14 November
-->


<html>
<head>
    <title>Ontology Visualiser</title>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/d3.v2.js"></script>
	<style>
		article, aside, details, figcaption, figure, 
		footer, header, hgroup, menu, nav, section {
		  display: block;
		}
		
		option.royalblue {font-family: Arial, Helvetica, sans-serif;background-color: #1f77b4; font-weight: bold; font-size: 14px;}
		option.orange {font-family: Arial, Helvetica, sans-serif;background-color: #ff7f0e; font-weight: bold; font-size: 14px;}
		option.green {font-family: Arial, Helvetica, sans-serif;background-color: #2ca02c; font-weight: bold; font-size: 14px;}
		option.red {font-family: Arial, Helvetica, sans-serif;background-color: #d62728; font-weight: bold; font-size: 14px;}
		option.purple {font-family: Arial, Helvetica, sans-serif;background-color: #9467bd; font-weight: bold; font-size: 14px;}
		option.lightbrown {font-family: Arial, Helvetica, sans-serif;background-color: #8c546b; font-weight: bold; font-size: 14px;}
		option.pink {font-family: Arial, Helvetica, sans-serif;background-color: #e377c2; font-weight: bold; font-size: 14px;}
		option.gray {font-family: Arial, Helvetica, sans-serif;background-color: #7f7f7f; font-weight: bold; font-size: 14px;}
		option.yellow {font-family: Arial, Helvetica, sans-serif;background-color: #bcbd22; font-weight: bold; font-size: 14px;}
		option.lightblue {font-family: Arial, Helvetica, sans-serif;background-color: #17becf; font-weight: bold; font-size: 14px;}
		
		fieldset
		{
		  margin: 0;
		  padding: 0;
		  border: 0;
		}

		input:focus,textarea:focus {
		  outline: none;
		}

		/*----------------------*/

		body
		{
			font-family: Arial, Helvetica, sans-serif;
			color: #388E8E;
			background-image: url("images/bkg.png");
			margin: 0;
			font-size: 12px;
		}     

		/*----------------------*/
		.typo
		{
			font-family:  'Hoefler Text', 'Georgia', 'Times New Roman', serif;
			font-weight: normal;
			font-size: 3.75em;
			letter-spacing: .5em;
			margin:10px;
			text-align: center;
			text-transform: uppercase;
		}
		.subtypo
		{
		        font-family: "Lucida Grande", Tahoma;
			font-size: 12px;
			font-weight: lighter;
			font-variant: normal;
			text-transform: uppercase;
			color: #666666;
			margin-top: 5px;
			text-align: center;
			letter-spacing: 0.3em;
		}
	
		.cf:before,
		.cf:after {
		  content:"";
		  display:table;
		}

		.cf:after {
		  clear:both;
		}

		.cf {
		  zoom:1;
		}

		/*----------------------*/


		header
		{
			background-image: url("header.jpg");
			background-size:100% 50%;
			padding: 12px 15%;
		}


		/*----------------------*/

		nav ul{
			margin: 0;
			padding: 0;
			list-style: none;
			position: relative;
			float: left;
			background: #ddd;
			border-bottom: 1px solid #fff;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;    
		}

		nav li {
			float: left;          
		}

		nav #login {
			border-right: 2px solid #fff;
			border-left: 5px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}
		nav #login11 {
			border-right: 2px solid #fff;
			border-left: 40px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login12 {
			border-right: 2px solid #fff;
			border-left: 130px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login13 {
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

	nav #login9 {
			border-right: 100px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}
	nav #login10 {
			border-right: 2px solid #fff;
			border-left: 50px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}


		nav #login2 {
			border-right: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login3 {
			border-right: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login4 {
			border-right: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login5 {
			border-right: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login6 {
			border-left: 2px solid #fff;
			border-right: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login7 {
			border-right: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login8 {
			border-right: 2px solid #fff;
			border-left: 100px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}

		nav #login13 {
			border-right: 2px solid #fff;
			border-left: 2px solid #fff;
			-moz-box-shadow: 1px 0 0 #fff;
			-webkit-box-shadow: 1px 0 0 #fff;
			box-shadow: 1px 0 0 #fff;  
		}



		nav #login-trigger,
		nav #signup a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger2,
		nav #signup2 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger3,
		nav #signup3 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger4,
		nav #signup4 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger5,
		nav #signup5 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

	nav #login-trigger13,
		nav #signup13 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}


		nav #login-trigger6,
		nav #signup6 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger7,
		nav #signup7 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger8,
		nav #signup8 a {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			height: 25px;
			line-height: 25px;
			font-weight: bold;
			padding: 0 8px;
			text-decoration: none;
			color: #444;
			text-shadow: 0 1px 0 #fff; 
		}

		nav #login-trigger {
			-moz-border-radius: 1px 0 0 1px;
			-webkit-border-radius: 1px 0 0 1px;
			border-radius: 1px 0 0 1px;
		}
		nav #login-trigger2 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}
		nav #login-trigger3 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}

		nav #login-trigger4 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}

		nav #login-trigger5 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}

		nav #login-trigger6 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}

		nav #login-trigger7 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}
		nav #login-trigger13 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}

		nav #login-trigger8 {
			-moz-border-radius: 3px 0 0 3px;
			-webkit-border-radius: 3px 0 0 3px;
			border-radius: 3px 0 0 3px;
		}

		nav #login-trigger:hover,
		nav #login .active,
		nav #signup a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger13:hover,
		nav #login13 .active,
		nav #signup13 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}


		nav #login-trigger2:hover,
		nav #login2 .active,
		nav #signup2 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger3:hover,
		nav #login3 .active,
		nav #signup3 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger4:hover,
		nav #login4 .active,
		nav #signup4 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger5:hover,
		nav #login5 .active,
		nav #signup5 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger6:hover,
		nav #login6 .active,
		nav #signup6 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger7:hover,
		nav #login7 .active,
		nav #signup7 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-trigger8:hover,
		nav #login8 .active,
		nav #signup8 a:hover {
			background: #388E8E;
			color: #fff;
			text-shadow: 0 0 0 #fff; 
		}

		nav #login-content {
			display: none;
			position: absolute;
			top: 24px;
			left: 5px;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content {
			right: 0;
			width: 200px;  
		}

		nav #login-content2 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content2 {
			right: 0;
			width: 200px;  
		}

		nav #login-content3 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content3 {
			right: 0;
			width: 200px;  
		}

		nav #login-content4 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content4 {
			right: 0;
			width: 200px;  
		}

		nav #login-content5 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content5 {
			right: 0;
			width: 200px;  
		}

		nav #login-content6 {
			display: none;
			position: absolute;
			top: 24px;
			left: 5px;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content6 {
			right: 0;
			width: 200px;  
		}

		nav #login-content7 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content7 {
			right: 0;
			width: 200px;  
		}

		nav #login-content13 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content13 {
			right: 0;
			width: 100px;  
		}



		nav #login-content8 {
			display: none;
			position: absolute;
			top: 24px;
			left: 0;
			z-index: 999;    
			background: #fff;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
			background-image: -webkit-linear-gradient(top, #fff, #eee);
			background-image: -moz-linear-gradient(top, #fff, #eee);
			background-image: -ms-linear-gradient(top, #fff, #eee);
			background-image: -o-linear-gradient(top, #fff, #eee);
			background-image: linear-gradient(top, #fff, #eee);  
			padding: 15px;
			-moz-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-webkit-box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			box-shadow: 0 -1px 2px 2px rgba(0,0,0,.9);
			-moz-border-radius: 3px 3px 3px 0px;
			-webkit-border-radius: 3px 3px 3px 0px;
			border-radius: 3px 3px 3px 0px;
		}

		nav li #login-content8 {
			right: 0;
			width: 200px;  
		}

		/*--------------------*/

		#inputs input {
			background: #f1f1f1;
			padding: 6px 5px;
			margin: 0 0 5px 0;
			width: 188px;
			border: 1px solid #ccc;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			-moz-box-shadow: 0 1px 1px #ccc inset;
			-webkit-box-shadow: 0 1px 1px #ccc inset;
			box-shadow: 0 1px 1px #ccc inset;
		}

		#inputs input:focus {
			background-color: #fff;
			border-color: #e8c291;
			outline: none;
			-moz-box-shadow: 0 0 0 1px #e8c291 inset;
			-webkit-box-shadow: 0 0 0 1px #e8c291 inset;
			box-shadow: 0 0 0 1px #e8c291 inset;
		}

		/*--------------------*/

		#login #actions {
			margin: 10px 0 0 0;
		}

		#login #submit
		{
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9
		}

		#login #submit:hover,
		#login #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login #submit::-moz-focus-inner {
			border: none;
		}

		#login label {
			float: right;
			line-height: 20px;
		}

		#login label input {
			position: relative;
			top: 1px;
			right: 1px;
		}

		#login2 #actions {
			margin: 10px 0 0 0;
		}

		#login2 #submit {	
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}


		#login2 #submit:hover,
		#login2 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login2 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login2 #submit::-moz-focus-inner {
			border: none;
		}

		#login2 label {
			float: right;
			line-height: 30px;
		}

		#login2 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		#login3 #actions {
			margin: 10px 0 0 0;
		}

		#login3 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login3 #submit:hover,
		#login3 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login3 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login3 #submit::-moz-focus-inner {
			border: none;
		}

		#login3 label {
			float: right;
			line-height: 30px;
		}

		#login3 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		#login4 #actions {
			margin: 10px 0 0 0;
		}

		#login4 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login4 #submit:hover,
		#login4 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login4 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login4 #submit::-moz-focus-inner {
			border: none;
		}

		#login4 label {
			float: right;
			line-height: 30px;
		}

		#login4 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		#login5 #actions {
			margin: 10px 0 0 0;
		}

		#login5 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login5 #submit:hover,
		#login5 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login5 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login5 #submit::-moz-focus-inner {
			border: none;
		}

		#login5 label {
			float: right;
			line-height: 30px;
		}

		#login5 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		#login6 #actions {
			margin: 10px 0 0 0;
		}

		#login6 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login6 #submit:hover,
		#login6 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login6 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login6 #submit::-moz-focus-inner {
			border: none;
		}

		#login6 label {
			float: right;
			line-height: 30px;
		}

		#login6 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		#login13 #actions {
			margin: 10px 0 0 0;
		}

		#login13 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login13 #submit:hover,
		#login13 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login13 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login13 #submit::-moz-focus-inner {
			border: none;
		}

		#login13 label {
			float: right;
			line-height: 30px;
		}

		#login13 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}



		#login7 #actions {
			margin: 10px 0 0 0;
		}

		#login7 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login7 #submit:hover,
		#login7 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login7 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login7 #submit::-moz-focus-inner {
			border: none;
		}

		#login7 label {
			float: right;
			line-height: 30px;
		}

		#login7 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		#login8 #actions {
			margin: 10px 0 0 0;
		}

		#login8 #submit {		
			background:#25A6E1;
			background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
			background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
			padding:8px 13px;
			color:#fff;
			font-family:'Helvetica Neue',sans-serif;
			font-size:12px;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border:1px solid #1A87B9;
		}

		#login8 #submit:hover,
		#login8 #submit:focus {		
			background-color: #25A6E1;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#1A87B9), to(#188BC0));
			background-image: -webkit-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -moz-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -ms-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: -o-linear-gradient(top, #25A6E1, #1A87B9);
			background-image: linear-gradient(top, #25A6E1, #1A87B9);
		}	

		#login8 #submit:active {		
			outline: none;
			-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;		
		}

		#login8 #submit::-moz-focus-inner {
			border: none;
		}

		#login8 label {
			float: right;
			line-height: 30px;
		}

		#login8 label input {
			position: relative;
			top: 2px;
			right: 2px;
		}

		/*--------------------*/

		#about {
			margin: 15px;
		}

		#about a {
			color: #555;
		}
		#footer{	
			font-size: 11px !important;
			margin: 0 0 0 0;	
			padding: 0 0 100px 0;
			width: 1000px;
			margin: 0 auto;
			border-top: 1px solid #dcdcdc;
			}

		#footer p{
			color: #919191;	
			}

		#footer a:link, #footer a:visited{	
			line-height: 30px;
			color: #676767;
			}

		#footer a:hover{
			text-decoration: none;
			color: #4a4a4a;
			}

		#footer .links{
			float: right;
		       	margin: 0 0px 0 0;
			padding: 20px 0 10px 0;
			font-size: 11px !important;
			}

		#footer .copyright{
			float: left;
		       	margin: 0 0 0 0px;
			padding: 20px 0 10px 0;
			font-size: 11px !important;
			}
		.menu
		{
		position: relative;
		margin: 0 0 0 0px;
		padding: 0 0 30px 0;
		}

	</style>
	<script>
		$(document).ready(function(){
			$('#login-trigger2').click(function(){
				$(this).next('#login-content2').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
		$(document).ready(function(){
			$('#login-trigger').click(function(){
				$(this).next('#login-content').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
		$(document).ready(function(){
			$('#login-trigger3').click(function(){
				$(this).next('#login-content3').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
		$(document).ready(function(){
			$('#login-trigger4').click(function(){
				$(this).next('#login-content4').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
		$(document).ready(function(){
			$('#login-trigger5').click(function(){
				$(this).next('#login-content5').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
		$(document).ready(function(){
			$('#login-trigger6').click(function(){
				$(this).next('#login-content6').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
		$(document).ready(function(){
			$('#login-trigger7').click(function(){
				$(this).next('#login-content7').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});
	$(document).ready(function(){
			$('#login-trigger8').click(function(){
				$(this).next('#login-content8').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
	});
		$(document).ready(function(){
			$('#login-trigger13').click(function(){
				$(this).next('#login-content13').slideToggle();
				$(this).toggleClass('active');					

				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
				else $(this).find('span').html('&#x25BC;')
			})
		});


	</script>

	<body>	
		<a href="https://github.com/piyushbansal/GraphVisualiser"><img style="position: absolute; top: 0; right: 0; border: 0;" src="images/fork.png" alt="Fork me on GitHub"></a>	
		<div class="typo">
			Ontology Visualiser
			<div class="subtypo"> A JavaScript Based Graphing Tool</div>
			<hr style="color:#F0F0F0" width=50% align="center" height=0.0px >
		</div>
<div class="menu">
				<nav>
		<ul>
		<li id="login12">
		</li>
		</ul>
		</nav>
		<nav>
		<ul>
		<li id="login10">
		</li>
		</ul>
		</nav>
		<nav>
		<ul>
			<li id="login6">
			<a id="login-trigger6" href="#">
				New Graph<span>&#x25BC;</span>
			</a>
			<div id="login-content6">
				<form action="scripts/new_graph.php" method="post">
					<fieldset id="inputs">
						<input type="text" name="newgraphname" placeholder ="Name of new graph" required>   
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Create">
					</fieldset>
				</form>
			</div>                     
			</li>
		</ul>
		</nav>	
		<nav>
		<ul>
			<li id="login7">
			<a id="login-trigger7" href="#">
				Load Graph<span>&#x25BC;</span>
			</a>
			<div id="login-content7">
				<form action="scripts/load_graph.php" method="post">	
					<fieldset id="inputs">
						Select Graph :
						<select id="g-ul" name="g_name" STYLE = 'width:70px'>
<?php
$file=fopen("filelist","r");
while(!feof($file))
{
	$var = fgets($file);
	if(!empty($var))
			echo "<option>".$var."<option>";
}
?>
						</select>
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Load">
					</fieldset>
				</form>
			</div>                     
			</li>
		</ul>
		</nav>
		<nav>
		<ul>
		<li id="login13">
			<a id="login-trigger13" href="#">
				Save Graph<span>&#x25BC;</span></a>
			<div id="login-content13">
		<form action='' onsubmit="return save()">
<fieldset id="actions">
				<input type='submit' id='submit' value='Save'>
</fieldset>
		</form>
		</li>
		</ul>
		</nav>
		<nav>
		<ul>
		<li id="login11">
		</li>
		</ul>
		</nav>
		<nav>
		<ul>
			<li id="login">
			<a id="login-trigger" href="#">
				Add Node Type<span>&#x25BC;</span>
			</a>
			<div id="login-content">
				<form name="addnode" method ="post" onsubmit="return add_node()">
					<fieldset id="inputs">
						<input  type="text" name="addnodename" placeholder="Name node type" required>
						Colour :
						<select id="ul2" name="color" value="color">
							<option class="royalblue" value="0">Royal Blue</option>	
							<option id="l2" class="orange" value="1">Orange</option>
							<option id="l2" class="green" value="2">Green</option>
							<option id="l2" class="red" value="3">Red</option>
							<option id="l2" class="purple" value="4">Purple</option>
							<option id="l2" class="lightbrown" value="5">Light Brown</option>
							<option id="l2" class="pink" value="6">Pink</option>
							<option id="l2" class="gray" value="7">Gray</option>
							<option id="l2" class="yellow" value="8">Yellow</option>
							<option id="l2" class="lightblue" value="9">Light Blue</option></select>
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Add">
					</fieldset>
				</form>
			</div>                     
			</li>
		</ul>
		</nav>
		
		<nav>
		<ul>
			<li id="login5">
			<a id="login-trigger5" href="#">
				Modify Node Type<span>&#x25BC;</span>
			</a>
			<div id="login-content5">
				<form name="modify_graph" onsubmit="return modify()" method="post">
					<fieldset id="inputs">
						Select Node :
						<select id="m_node" name="m_node" STYLE = 'width:80px'>
<?php
		$var=file_get_contents("filename");
		$var=substr_replace($var,"",-1);
		$var="database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		for($i=0;$i<count($obj["nodes"]);$i++)
		{
			echo "<option>".$obj["nodes"][$i]["name"]."</option>";
		}
?>
						</select>
<br />
<br />
						<input  type="text" name="newnodename" placeholder="New name" required>
<br />
<br />
						New colour :
						<select id="ul2" name="color">
							<option class="royalblue" value="0">Royal Blue</option>	
							<option class="orange" value="1">Orange</option>
							<option class="green" value="2">Green</option>
							<option class="red" value="3">Red</option>
							<option class="purple" value="4">Purple</option>
							<option class="lightbrown" value="5">Light Brown</option>
							<option class="pink" value="6">Pink</option>
							<option class="gray" value="7">Gray</option>
							<option class="yellow" value="8">Yellow</option>
							<option class="lightblue" value="9">Light Blue</option>
						</select>

					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Modify">
					</fieldset>
				</form>
			</div>                     
			</li>

		</ul>
		</nav>

		<nav>
		<ul>
			<li id="login2">
			<a id="login-trigger2" href="#">
				Delete Node Type<span>&#x25BC;</span>
			</a>
			<div id="login-content2">
				<form name="delnode" onsubmit="return delete_node()" method="post">
						Select Node :
						<select id="d_node" name="d_node" STYLE = 'width:80px'>
<?php
		$var=file_get_contents("filename");
		$var=substr_replace($var,"",-1);
		$var="database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		for($i=0;$i<count($obj["nodes"]);$i++)
		{
			echo "<option>".$obj["nodes"][$i]["name"]."</option>";
		}
?>
						</select>
						<input type="submit" id="submit" value="Delete">
				</form>
			</div>                     
			</li>
		</ul>
		</nav>
		<nav>
		<ul>
			<li id="login3">
			<a id="login-trigger3" href="#">
				Add Edge Type<span>&#x25BC;</span>
			</a>
			<div id="login-content3">
				<form action="scripts/add_link.php" method="post">
					<fieldset id="inputs">
						<input  type="text" name="addlinkname" placeholder="Type of the Link" required>
					</fieldset>
					<fieldset id="actions">
						<input type="submit" id="submit" value="Add">
					</fieldset>
				</form>
			</div>                     
			</li>

		</ul>
		</nav>
		<nav>
		<ul>
			<li id="login4">
			<a id="login-trigger4" href="#">
				Delete Edge Type<span>&#x25BC;</span>
			</a>
			<div id="login-content4">
				<form name="dellink" onsubmit="return delete_link()" method="post">
						Select Node :
						<select id="d_link" name="d_link" STYLE = 'width:80px'>
<?php
		$var=file_get_contents("filename");
		$var=substr_replace($var,"",-1);
		$var="database/".$var;
		$var=$var.".json";
		$file=file_get_contents($var);
		$obj=json_decode($file,true);
		for($i=0;$i<count($obj["link"]);$i++)
		{
			echo "<option>".$obj["links"][$i]["name"]."</option>";
		}
?>
						</select>

						<input type="submit" id="submit" value="Delete">
					</fieldset>
				</form>
			</div>                     
			</li>

		</ul>
		</nav>
</div>

<div class="mymenu" id="mymenu">
<?php
$file=file_get_contents("database/.default.json");
$obj=json_decode($file,true);
$count_nodes=count($obj["nodes"]);
$size=6;
if($count_nodes<6)
	$size=$count_nodes;

echo "
	<form name='nodes' onsubmit='return validate ()' method='post'>
	<select id='menu' size='".$size."' STYLE = 'width:70px'>";
for($i=0;$i<$count_nodes;$i++)
	echo "<option>".$obj['nodes'][$i]['name']."</option>";
echo "</select>
	<br />
	<input type='submit' value='Add node'/>
	</form>
	";
?>
				<form onsubmit='return save()'>
						<input type="submit" id="submit" value="Cancel">
				</form>
</div>
<div class="mymenu" id="linkmenu">
<?php
$file=file_get_contents("database/.default.json");
$obj=json_decode($file,true);
$count_nodes=count($obj["links"]);
$size=6;
if($count_nodes<6)
	$size=$count_nodes;
echo "
	<form name='links' onsubmit='return link()' method='post'>
	<select id='menu' size='".$size."' STYLE = 'width:70px'>";
for($i=0;$i<$count_nodes;$i++)
	echo "<option>".$obj['links'][$i]['name']."</option>";
echo "</select>
	<br />
	<input type='submit' value='Add link'/>
	</form>
	";
?>
				<form onsubmit='return save()'>
						<input type="submit" id="submit" value="Cancel">
				</form>
</div>

		<div id="chart"></div>
		<script type="text/javascript" src="f2.js"></script>
		<link href='css/style.css' rel='stylesheet' type='text/css' />
<div id="footer" class="clearfix">
		<p class="copyright">Copyleft; The Team no 15. All wrongs reserved.
				<p class="links"><a href="http://piyushbansal.github.com/GraphVisualiser">About</a> &nbsp; | &nbsp; <a href="http://github.com/piyushbansal/GraphVisualiser">Source Code</a></p>
					</div>
</body>
</html>
