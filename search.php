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
		            <li><a href="#">Search One</a></li>
		            <li><a href="parse.php">Parse File</a></li>
		          </ul>
		        </li>
		    <li><a href="about.html">About</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="title">
    	<div class="container">
			<h2 style="color: rgba(255,255,255,0.9);">Search One</h2>
			<h5 style="color: rgba(255,255,255,0.8);">利用ID或是Name來進行搜尋。</p>
		</div>
	</div>

	<br>

    <div class="container">

	    <form action="searchbyID.php" method="get">
	    	<div class="form-group">
		    	<label for="inputID">Input by ID：</label>
				<input type="text" class="form-control" placeholder="GO:0000001" name="inputID">
				<br>
				<input type="submit" value="送出" class="btn btn-primary">
				<input type="reset" value="清除" class="btn btn-danger">
			</div>
		</form>

		<br>

		<form action="searchbyname.php" method="get">
			<div class="form-group">
		    	<label for="inputName">Input by Name：</label>
				<input type="text" class="form-control" placeholder="mitochondrion inheritance" name="inputName">
				<br>
				<input type="submit" value="送出" class="btn btn-primary">
				<input type="reset" value="清除" class="btn btn-danger">
			</div>
		</form>

	</div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

	</body>

</html>