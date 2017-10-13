<?php
// Build the array of colour choices
$colours = array("Pink" => "f0d0d0",
    "Violet" => "cda8ef",
    "Blue" => "a8c1ef",
    "Green" => "a8efab",
    "Yellow" => "efee7b");

 create the cookie
if (isset($_GET['colourchosen'])) {
    setcookie('colourpreference', $colours[$_GET['colourchosen']], time() + 24 * 3600);
}
?>



<html>
    <head>
        <title>Choose Colour Preference</title>
    </head>
    <body>
        
        
        <?php
        
        echo "Your prefered colour is ". $_COOKIE['colourpreference'];
        
        if (isset($_GET['colourchosen'])) {
            // This is the postback so just thank the user
            echo "Your colour preference has been recorded</br>";
            echo "Your prefered colour is ". $_GET['colourchosen'];
            echo "<br> <a href=index.php>Return to home page</a>";
            exit;
        }
        
        ?>
        
        
        
        <form action="colour-chooser.php" method="GET">
            <table>
                <tbody>
                    <tr>
                        <td>Choose your colour:</td>
                        <td>
                            <select size="1" name="colourchosen">
                                <?php
                                
                                foreach ($colours as $name => $hex)
                                    echo "<option> " . $name;
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <INPUT type="submit" name="Confirm" value="Confirm Preference"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
