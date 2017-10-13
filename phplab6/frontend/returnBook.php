
<?php

include("config4.php");

$bookid = trim($_GET['bookid']); //gets book id and connects to db
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=indexLAB6.php>Return to home page </a>");
        exit();
    }
    
   echo $bookid;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE books SET onloan=0 WHERE bookid = ?");
    $stmt->bind_param('i', $bookid);
    $stmt->execute();
    printf("<br>Succesfully returned!");

    printf("<br><a href=browsedBooks.php>Search and Book more Books </a>");
    printf("<br><a href=Lab4MyBooks.php>Return to Reserved Books </a>");
    printf("<br><a href=indexLAB6.php>Return to home page </a>");
    exit;

?>

    


