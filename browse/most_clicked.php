<!--This page has been deprecated, it makes things too complicated --> 

<DOCTYPE html PUBLIC "-//W2C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>slur.pe</title>

        <link href="../dist/css/bootstrap.css" rel ="stylesheet">

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
                        </div><!--/navbar-header -->
                        <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                        <li><a href="../index.html">Home</a></li>
                                        <li class="active"><a href="#browse">Browse</a></li>
					<li><a href="../search.php">Search</a></li>
                                        <li><a href="../about.html">About</a></li>
                                </ul>
                        </div><!--/.nav-collapse -->
                </div><!--container -->
        </div><!--navbar-->

        <div class="jumbotron" style="margin-top:55px;">
		<div class="browse">
			<ul class="nav nav-tabs">
				<li class="active"><a href="most_clicked.php">Most Clicked</a></li>
				<li><a href="most_recent.php">Most Recent</a></li>	
				<li><a href="random.php">Random Links</a></li>
			</ul>
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
							include '../functions/most_clicked_links.php';
							most_clicked();
						?>
					</tbody>
				</table>
			</div><!--table-responsive -->
		</div><!--browse -->
        </div><!--/jumbotron -->
</div>
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

