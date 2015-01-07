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
		            <li><a href="#">Display Data</a></li>
		            <li><a href="search.php">Search One</a></li>
		            <li><a href="parse.php">Parse File</a></li>
		          </ul>
		        </li>
		    <li><a href="about.html">About</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="title">
	    <div class="container">	
			<h2 style="color: rgba(255,255,255,0.9);">Display Data</h2>
			<h5 style="color: rgba(255,255,255,0.8);">利用輸入資料庫編號來輸出資料。</p>
		</div> 
	</div>

	<br>

	<div class="container">
		<form class="form" action="#" method="get">
			<div class="form-group">
				<label>起始編號</label>
				<input type="number" name="first" min="1" max="1000000" class="form-control" placeholder="Min:1">
			</div>
			<div class="form-group">
				<label>終止編號</label>
				<input type="number" name="end" min="1" max="1000000" class="form-control" placeholder="Max:42329">
			</div>
			<button type="submit" class="btn btn-primary">送出</button>
		</form>
		<div style="color: rgba(0,0,0,0.6);">(起始編號<=終止編號)</div>
		<div style="color: rgba(0,0,0,0.6);">註：此編號為資料庫內的編號，並非GO的ID</div>
		<br>
	<?php

		if(isset($_GET["first"])&&
		   isset($_GET["end"])&&
		   $_GET["first"]<=$_GET["end"]){

		$first = $_GET["first"];
		$end = $_GET["end"];
		
		$xmlDoc = new DOMDocument();
		$xmlDoc->load("include/go_obo.xml");
		$term=$xmlDoc->getElementsByTagName('term');
		
	    for($i=$first-1; $i<=$end-1; $i++){
			if($i+1>42329)
				echo "<b>無編號 ".($i+1)."</b><br>";
			else{
				echo "<b>編號 ".($i+1)."</b>";
				$id=$term->item($i)->getElementsByTagName('id')->item(0)->textContent;
				$name=$term->item($i)->getElementsByTagName('name')->item(0)->textContent;
				$namespace=$xmlDoc->getElementsByTagName('namespace')->item(0)->textContent;
				$def=$term->item($i)->getElementsByTagName('defstr')->item(0)->textContent;
				$synonym=$term->item($i)->getElementsByTagName('synonym_text');
				$is_a=$term->item($i)->getElementsByTagName('is_a');
				$dbxref=$term->item($i)->getElementsByTagName('dbxref');
	?>
		<br>

		<table class="table table-bordered">
			<tr>
				<td><b>id</b></td>
				<td><?php echo $id?></td>
			</tr>
			<tr>
				<td><b>name</b></td>
				<td><?php echo $name?></td>
			</tr>
			<tr>
				<td><b>namespace</b></td>
				<td><?php echo $namespace?></td>
			</tr>
			<tr>
				<td><b>def</b></td>
				<td>
					<?php 
						$temp="";
						foreach($dbxref as $uu){
							$temp=$temp.$uu->getElementsByTagName('dbname')->item(0)->textContent.':'.$uu->getElementsByTagName('acc')->item(0)->textContent." ";
						}
						echo "\"".$def."\"".'['.$temp.']';
					?>										
				</td>
			</tr>
			<tr>
				<td><b>synonym</b></td>
				<td>
					<?php 
						foreach($synonym as $uu){
							echo $uu->textContent;
							echo '<br>';
						}
						if($synonym->length==0){
							echo "none";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><b>is_a</b></td>
				<td>
					<?php
					 	foreach($is_a as $uu){
							echo $uu->textContent;
							echo '<br>';
						}

						if($is_a->length==0){
							echo "none";
						}
					?>
				</td>
			</tr>
		</table>
	<?php
			}//if
		}//for

		}//if
		else{
			echo "<br>尚未送出編號!!";
		}
	?>

	</div> 

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

	</body>

</html>