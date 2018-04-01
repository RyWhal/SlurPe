SlurPe
======

A simple URL shortener PHP webapp with a MySQL backend. The website is currently hosted at http://slur.pw.




CLI Slur.pw
===========

A simple curl with the fields "url_full" and "url_short" pointed at "slur.pw/api/put.php" will submit your link for shortening.
```
rwhalen-mbp:~ rwhalen$  curl -F "url_full=https://github.com/RyWhal" -F "url_short=github" slur.pw/urlshort/api/put.php
Your Short URL: http://slur.pw/github
Copy the link above into a URL bar to go to https://github.com/RyWhal
rwhalen-mbp:~ rwhalen$
```

If you leave off "url_short" a random shortened URL will be generated for you.
```
rwhalen-mbp:~ rwhalen$  curl -F "url_full=https://github.com/RyWhal" slur.pw/urlshort/api/put.php
Your Short URL: http://slur.pw/PkbffV
Copy the link above into a URL bar to go to https://github.com/RyWhal
rwhalen-mbp:~ rwhalen$
```


URL shortening:
===============

How the shortening works...

1) A full URL and short URL come into index.php

2) The form data from index.php is posted to URL.php

>a) URL.php checks to see if it is a valid URL format (functions/isValidUrl.php)
        
>b) Inserts the URL, Shortened URL, date/time, submitting IP, wether or not to make public, into the DB
        
>d) Spits out either success or failure message to the user, including the shortened URL

3) A user submits that URL back into a browser bar (ex. slur.pw/Google)

>a) Apache+.htaccess file take the URL and turn it into a post slur.pw/url_short?=Google
        
>b) url_302.php takes that post. It checks the DB for "Google" short URL to associate with a long URL
        
>c) url_302.php serves a HTTP response code 302 (permenant redirect) and redirects the client to google.com
        
>d) wooo its been shortened!


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
  `public` tinyint(1) DEFAULT NULL,
  `random` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `url_short` (`url_short`)
)
```
