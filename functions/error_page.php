<?php

function error_page($message, $search){
	//this code is run if there was an error submitting the link. gives another chance to enter a URL	
	if($search=='true'){
		echo '
			<div class="message" style="margin-left:17%;margin-right:25%">'.$message.'</div>
			<div class="form_input">
			<form name="input" action="url.php" class="urls" method="post">
			<div class="col-lg-8">
			<div class="input-group">
			<input type="text" name="url_full" placeholder="Full URL: http://example.com" class="form-control">
			<span class="input-group-btn"> <button class="btn btn-default" type="submit">Submit</button></span>
			</div><!-- /input-group -->
			</div><!--col-lg-8-->
			<div class="col-lg-8" sytle="width:50%;">
			<div class="input-group">
			<input type="text" id="url_short" name="url_short" onchange="duplicate()" placeholder="Custom URL   (Alphanumeric only)" maxlength="40" class="form-control">
			<span class="input-group-addon"><input type="checkbox" name="searchable" value="1">  Public * </span>
			</div><!-- /input-group -->
			</div><br><!-- /.col-lg-8 -->
			<div class="url_out" id="url_out" style="margin-left:17%"></div>
			</form>
			</div><!-- form_input -->';
	}
	//success message. Shows message in jumbotron
	else{
		echo '<div class="message" style="margin-left:15%;margin-right:15%;width:70%;">'.$message.'</div>';
	}
}

?>
