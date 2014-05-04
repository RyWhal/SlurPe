SlurPe
======

A simple URL shortener PHP webapp with a MySQL backend. The website is currently hosted at http://slur.pe.



CLI Slur.pe
===========

A simple curl with the fields "url_full" and "url_short" pointed at "slur.pe/api/put.php" will submit your link for shortening.
```
rwhalen-mbp:~ rwhalen$  curl -F "url_full=https://github.com/RyWhal" -F "url_short=github" slur.pe/api/put.php
Your Short URL: http://slur.pe/github
Copy the link above into a URL bar to go to https://github.com/RyWhal
rwhalen-mbp:~ rwhalen$
```

If you leave off "url_short" a random shortened URL will be generated for you.
```
rwhalen-mbp:~ rwhalen$  curl -F "url_full=https://github.com/RyWhal" slur.pe/api/put.php
Your Short URL: http://slur.pe/PkbffV
Copy the link above into a URL bar to go to https://github.com/RyWhal
rwhalen-mbp:~ rwhalen$
```


Config
======

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


A .htaccess file is also necessary in the project directory. This is mine:
```
Options +FollowSymLinks
RewriteEngine On
RewriteRule ^([0-9A-Za-z]+)/?$ /url_302.php?url_short=$1 [L]
ErrorDocument 404 http://slur.pe/404
ErrorDocument 500 "Something went wrong..."
```


This is what my mysql table looks like, currently:
```
mysql> show create table urls\G
*************************** 1. row ***************************
       Table: urls
Create Table: CREATE TABLE `urls` (
  `ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `url_full` text,
  `url_short` varchar(128) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `ip_put` int(10) unsigned DEFAULT NULL,
  `clicks` int(6) DEFAULT '0',
  `score` int(6) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `random` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `url_short` (`url_short`)
)
```



URL shortening:
===============

The flow of shortening a link.

1. A full URL and short URL come into index.php

2. The form data from index.php is posted to URL.php

 1. URL.php checks to see if it is a valid URL format (functions/isValidUrl.php)
        
 2. Inserts the URL, Shortened URL, date/time, and submitting IP into the DB
        
 3. Spits out either success or failure message to the user, including the shortened URL if success

3. A user submits that URL back into a browser bar (ex. slur.pe/Google)

 1. Apache+.htaccess file take the URL and turn it into a post slur.pe/url_short?=Google
        
 2. url_302.php takes that post. It checks the DB for "Google" short URL to associate with a long URL
        
 3. url_302.php serves a HTTP response code 302 (permenant redirect) and redirects the client to google.com
        
 4. Wooo its been shortened!
