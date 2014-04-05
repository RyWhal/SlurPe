<DOCTYPE html PUBLIC "-//W2C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>slur.pe - Browse</title>

        <link href="../dist/css/bootstrap.css" rel ="stylesheet">
	
	<style>
		.col-lg-8{margin-left:15%;margin-right:15%;}
		.input-group-addon{font-size:16px;}
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
                                        <li><a href="../index.html">Home</a></li>
                                        <li><a href="most_recent.php">Browse</a></li>
					<li class="active"><a href="../search.php">Search</a></li>
                                        <li><a href="../about.html">About</a></li>
                                </ul>
                        </div><!--/.nav-collapse -->
                </div><!--/container -->
        </div><!--navbar -->

        <div class="jumbotron" style="margin-top:55px;">
		<div class="browse">
			<div class="form_input">
				<form name="input" action="/browse/results.php" class="urls" method="post">
				<div class="col-lg-8">
    					<div class="input-group">
      						<input type="text" name="search" placeholder="Another Search? | ex. 'imgur'" class="form-control">
      						<span class="input-group-btn"> <button class="btn btn-default" type="submit">Search</button></span>
					</div><!-- /input-group -->
				</div><!--col-lg-8-->
				</form>
			</div><!-- form_input -->
			<br>
			<h2>Your Results:</h2>
			<div class="table-responsive">
				<table class="table table-striped">
        			<thead>
          				<tr>
            				<th>#</th>
            				<th>Short URL</th>
            				<th>Clicks</th>
					<th>Full URL</th>
          				</tr>
        			</thead>
				<tbody>
					<?php
						include '../functions/search_results.php';
						$search = $_POST['search'];
						search_function($search);
					?>
				</tbody>
				</table>
			</div><!--/table-responsive -->
		</div><!--browse -->
        </div><!--jumbotron -->
	
</div><!--container -->
</div>

<div class="slurpe_footer">
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
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>
