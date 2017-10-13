<?php
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
cookie-counter
<?php
if (isset($_COOKIE['counter']))
    $count = $_COOKIE['counter'];
else
    $count = 0;



$count = $count + 1;
setcookie('counter', $count, time() + 24 * 3600);


?>
<html>
    <head>
        <title>Counting with a cookie</title>
    </head>
    <body>
        <FORM action="counter-cookie.php" method="GET">
            <INPUT type="submit" name="Count" value="Count">
            <?php
            echo "count is $count";
            ?>
        </FORM>
    </body>
</html>
