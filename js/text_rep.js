function duplicate()
{
   	var f1 = document.getElementById('url_short');
   	var f2 = document.getElementById('url_out');   
	var url="Your URL will be: slur.pe/";	
   	f2.innerHTML = String(url) + f1.value;
};
