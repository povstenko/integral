<?php

require "vendor/rb-mysql.php";
R::setup('mysql:host=localhost;dbname=integral_db', 'root', '1234');

session_start();