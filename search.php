<!--This page has been deprecated, it makes things too complicated -->

<!DOCTYPE html PUBLIC "-//W2C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>Slur.pe</title>

	<link href="dist/css/bootstrap.css" rel ="stylesheet">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<style>
		.col-lg-8{margin-left:15%;margin-right:15%;}
		.input-group-addon{font-size:16px;}
		.search_terms{font-size:10; margin-left:16%;}
	</style>

</head>


<body style="padding: 30px;">

<div class="container">
	<div class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:20px;">
      		<div class="container">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            				<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
					<span class="icon-bar"></span>
          			</button>
          			<a class="navbar-brand" href="http://slur.pe">slur.pe</a>
        		</div>
        		<div class="collapse navbar-collapse">
          			<ul class="nav navbar-nav">
            				<li><a href="index.html">Home</a></li>
                                        <li><a href="browse/most_clicked.php">Browse</a></li>
					<li class="active"><a href="search.php">Search</a></li>
					<li><a href="about.html">About</a></li>
				</ul>
        		</div><!--/.nav-collapse -->
      		</div>
	</div>

	<div class="jumbotron" style="margin-top:55px;">

		<h2 style="margin-left:16%;margin-right:15%;" id="foo">Its search time:</h2>
		<div class="form_input">
			<form name="input" action="/browse/results.php" class="urls" method="post">
			<div class="col-lg-8">
    				<div class="input-group">
      					<input type="text" name="search" placeholder="Enter search" class="form-control">
      					<span class="input-group-btn"> <button class="btn btn-default" type="submit">Search</button></span>
				</div><!-- /input-group -->
			</div><!--col-lg-8-->
			</form>
		</div><!-- form_input --><br><br>
		<p class="search_terms">Some things you could try searching for include: "reddit.com", "imgur",<br>"waffle", ".gif", etc.</p>
	</div><!--jumbotron -->

</div><!--container-->



<div class="slurpe_footer">
	<div class="footer_content">Created by Ryan Whalen - 2013</div>
	<img src="/images/slurpe.png" height="125" width="125" class="slurpe_logo">
</div><!--slurpe_logo--!>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45291951-1', 'slur.pe');
  ga('send', 'pageview');

</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>
