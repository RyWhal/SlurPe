<?php

function error_page($message, $search){
	//this code is run if there was an error submitting the link. gives another chance to enter a URL	
	if($search=='true'){
		echo '
			<html>
			<div class="message" style="margin-left:17%;margin-right:25%">'.$message.'</div>
			<div class="form_input">
			<form name="input" action="url.php" class="urls" method="post">
			<div class="col-lg-8">
			<div class="input-group">
			<input type="text" name="url_full" placeholder="Enter the URL you want to shorten" class="form-control">
			<span class="input-group-btn"> <button class="btn btn-default" type="submit">SHORTEN</button></span>
			</div><!-- /input-group -->
			</div><!--col-lg-8-->
			<div class="col-lg-8" sytle="width:50%;">
			<h3 class="url">http://slur.pe/</h3>
			<input type="text" id="url_short" name="url_short" placeholder="Custom-URL" maxlength="20" class="form-control customurl"">
			</div><br><!-- /.col-lg-8 -->
			</form>
			</div><!-- form_input -->
			</html>
			';
	}
	//success message. Shows message in jumbotron
	else{
		echo '<div class="message" style="margin-left:15%;margin-right:15%;width:70%;">'.$message.'</div>';
	}
}

?>
