<?php

require_once './lib/DB.php';
require_once './lib/Session.php';
require_once './lib/helpers.php';
require_once './models/City.php';


$host = 'localhost';
$dbname = 'world';
$dbusername = 'root';
$dbpassword = '';

// Connection to DB
DB::connect($host, $dbname, $dbusername, $dbpassword);
