<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


# create a cookie

$cookieTimer = time()+86400;


setcookie("ourCookie", "Jasmin", $cookieTimer);



setcookie("language", "en-us", $cookieTimer);

echo $_COOKIE["ourCookie"];



setcookie("hisCookie", "Anders", $cookieTimer);

echo $_COOKIE["hisCookie"];



if (isset($_COOKIE['ourCookie']))
	echo "Cookie is set";
else
	echo "Cookie NOT set";



setcookie("ourCookie","",$timeOut);

*/


?>


