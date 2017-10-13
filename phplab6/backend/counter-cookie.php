<?php
if (isset($_COOKIE['counter']))
    $count = $_COOKIE['counter'];
else
    $count = 0;//is language set? if not set, use the default

//if (isset($_COOKIE['language']))//language
   // $lng = $_COOKIE['language'];
//else
    //$count = 0;


$count = $count + 1;
setcookie('counter', $count, time() + 24 * 3600);
//setcookie("language", "en-us", time() + 24 * 3600);


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
