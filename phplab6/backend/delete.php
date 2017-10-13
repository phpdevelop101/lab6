<?php
session_start();
include("config4.php");

if (isset($_GET['submit'])) {
    // We know the borrower so go ahead and check the book out
    # Get data from form
    $bookid = trim($_GET['bookid']);      // From the hidden field
    $bookid = addslashes($bookid);

    # Open the database using the "librarian" account
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
       header("location: indexLAB6.php");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("DELETE FROM books WHERE bookid = ? ");
        $stmt->bind_param('i', $bookid);
        $response = $stmt->execute();
        printf("<br>Book deleted!");
        header("location: indexLAB6.php");
    
    
    exit;
}

// We don't have a borrower id yet so present a form to get one,
// then post back using a hidden field to pass through the bookid
// which came from the hand-crafted URL query string on the book
// search page
?>

<!DOCTYPE html>

<html>
    
    <head>

        <title>My Books</title>

        <meta charset="utf-8"/>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="Lab4.css"/>

    </head>

    <body>

    <div id="wrap">

        <?php 
        
        include('header.php');




?>
        
    <div class="lid">

       

    <h3>Delete book</h3>
<hr>
<form action="delete.php" method="GET">
    Are you sure you want to delete book?
    <?php
    $bookid = trim($_GET['bookid']);
    echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';
    ?>
    <INPUT type="submit" name="submit" value="Continue">
</form>


       <footer>
        <?php include ('footer.php');?>   
       </footer> 

        

     </div>
 </div>
 </div>


    </body>
    
</html>