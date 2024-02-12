<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'financebuddy');

define('APPROOT', dirname(dirname(__FILE__)));


// Zet hier je virtualhostnaam. Let op dat er http:// voor staat anders werkt het niet
define('URLROOT', 'http://localhost/financebuddydev/');
define('IMAGEROOT', 'http://localhost/financebuddydev/public/media/');


define('SITENAME', 'FinanceBuddy');
define('ROOT', dirname(dirname(dirname(__FILE__))));


date_default_timezone_set('Europe/Amsterdam');

define('TIME', date("Y-m-d H:i:s", strtotime('NOW')));

$var['timestamp'] = time();