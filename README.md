SlurPe
======

A simple URL shortener PHP webapp with a MySQL backend. The website is currently hosted at http://slur.pe.

the flow right now goes something like this

URL shortening:
===============

1) A full URL and short URL come into index.php

2) The form data from index.php is posted to URL.php

>a) URL.php checks to see if it is a valid URL format (functions/isValidUrl.php)
        
>b) Inserts the URL, Shortened URL, date/time, submitting IP, wether or not to make public, into the DB
        
>d) Spits out either success or failure message to the user, including the shortened URL

3) A user submits that URL back into a browser bar (ex. slur.pe/Google)

>a) Apache+.htaccess file take the URL and turn it into a post slur.pe/url_short?=Google
        
>b) url_302.php takes that post. It checks the DB for "Google" short URL to associate with a long URL
        
>c) url_302.php serves a HTTP response code 302 (permenant redirect) and redirects the client to google.com
        
>d) wooo its been shortened!

Browse:
=======

>To Add...


Search:
=======

>To Add...
        

Note:
=====

Each function that makes a MySQL connection looks for its MySQL connection variables in variables/secrets.php. It will be of the following format...

```
<?php
$host = "localhost";
$username = "mysqlUsername";
$password = "mysqlpassword";
$db_name = "slurpe";
$table = "urls";
?>
```
