<html>
    <head>
        <title>Counting with the SESSION array</title>
    </head>
    <body>
        <FORM action="counter-session1.php" method="GET">
            <INPUT type="submit" name="Count" value="Count">
            <?php
            session_start();
            if (!isset($_SESSION['counter']))
                $count = 0;
            else
                $count = $_SESSION['counter'];
            $count = $count + 1;
            $_SESSION['counter'] = $count;
            echo "count is $count";
            ?>
        </FORM>

    </body>
</html>