<?php

#our config file, has information about the database, about the current page we're on

$url = $_SERVER['REQUEST_URI'];//takes full domain

$strings = explode('/', $url);//php explodes URL BASED ON backslash

$current_page = end($strings);//

$dbname = 'library2';
$dbuser = 'root';
$dbpass = '';
$dbserver = 'localhost';

          
//set cookie with username




?>