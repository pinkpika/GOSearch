<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="UTF-8">
		<title>GOSearch</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<style type="text/css">
		body {
		  padding-top: 50px;
		}
		.title{
			height: 100px;
		 	background: #2c33f7; /* Old browsers */
			background: -moz-linear-gradient(top,  #2c33f7 1%, #6d67e5 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#2c33f7), color-stop(100%,#6d67e5)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  #2c33f7 1%,#6d67e5 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  #2c33f7 1%,#6d67e5 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  #2c33f7 1%,#6d67e5 100%); /* IE10+ */
			background: linear-gradient(to bottom,  #2c33f7 1%,#6d67e5 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2c33f7', endColorstr='#6d67e5',GradientType=0 ); /* IE6-9 */
		}
		</style>
	</head>
	
	<body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">GOSearch</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.html">Home</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="display.php">Display Data</a></li>
		            <li><a href="search.php">Search One</a></li>
		            <li><a href="#">Parse File</a></li>
		          </ul>
		        </li>
		    <li><a href="about.html">About</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="title">
    	<div class="container">
			<h2 style="color: rgba(255,255,255,0.9);">Parse File</h2>
			<h5 style="color: rgba(255,255,255,0.8);">解析一篇短文，找出對應的GO字彙。</p>
		</div>
	</div>

	<br>

	<div class="container">
		<div class="list-group-item">

		<?php
			include("include/GO_Name_to_ID_hash.php");
			include("include/GO_ID_to_Index_hash.php");
		?>
		<?php
			$count = 0;

			error_reporting(0);
			//$input_str="The mechanisms ensuring accurate partitioning of yeast vacuoles and mitochondria are distinct, yet they share common elements. Both organelles move along actin filaments, and both organelles require fusion and fission to maintain normal morphology. Recent studies have revealed that while vacuolar inheritance requires a processive myosin motor, mitochondrial inheritance requires controlled actin polymerization. Distinct sets of proteins required for the fusion and fission of each organelle have also been identified.";
			//$input_str="During the past decade significant advances were made toward understanding the mechanism of mitochondrial inheritance in the yeast Saccharomyces cerevisiae. A combination of genetics, cell-free assays and microscopy has led to the discovery of a great number of components. These fall into three major categories: cytoskeletal elements, mitochondrial membrane components and regulatory proteins. These proteins mediate activities, including movement of mitochondria from mother cells to buds, segregation of mitochondria and mitochondrial DNA, and equal distribution of the organelle between mother cells and buds during yeast cell division.";

			$input_str=$_GET["inputFile"];
			$input_str = str_replace("\r\n"," <br>",$input_str);
			$array=mb_split("\s", $input_str);

			$process_str="";
			
			foreach($array as $uu){
				$temp_ori_str=$uu;
				$tail="";
				if($uu[strlen($uu)-1]=='.' || $uu[strlen($uu)-1]==',' ||$uu[strlen($uu)-1]==';' || $uu[strlen($uu)-1]=='?' || $uu[strlen($uu)-1]=='!' || $uu[strlen($uu)-1]=='s'){
					$tail=$uu[strlen($uu)-1];
					$uu=substr($uu, 0, -1);
				}
				
				$go_i=$name_table[$uu];
				$i=$go_table[$go_i];
				
				if(strlen($i)==0){				
					//echo $uu.$tail." ";
					$process_str=$process_str.$uu.$tail." ";
				}
				else{
					$url="searchbyname.php?inputName=".$uu;
					//echo '<a href='.$url.'>'.$uu.'</a>'.$tail." ";
					
					$process_str=$process_str.'<a href='.$url.'><u>'.$uu.'</u></a>'.$tail." ";
					$count ++;
				}
				//echo '<br>';
			}
			echo $process_str;
		?>
		</p>

		<h3>解析完成!!</h3>
		<?php echo "共找到".$count."個GO字彙，可點超連結得到詳細資訊。"?>
		</div>
	</div>
	</body>

	<script src="//code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
</html>