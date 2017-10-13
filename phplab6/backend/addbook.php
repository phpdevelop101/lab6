
 <?php 
          session_start();  
//protection from XSS (CROSS-SITE SCRIPTING)code injection eg iframe
            include('config4.php');


?>

<html>

    <head>
    
        <title>add book</title>
        
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
                    
                    <div>
                


<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookauthor = trim($_POST['newbookauthor']);
    $newbookisbn = trim($_POST['newbookisbn']);

    if (!$newbooktitle || !$newbookauthor || !$newbookisbn) {//if book title or author isnt entered, they must enter it
        printf("You must specify both a title, author and isbn!");
        header("location: indexLAB6.php");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);//if the title or book has an apostrophe or wierd characters
    $newbookauthor = addslashes($newbookauthor);
    $newbookisbn = addslashes($newbookisbn);

    $newbooktitle = htmlentities($newbooktitle);//this protects the var from XSS (CROSS-SITE SCRIPTING)code injection eg iframe
    $newbookauthor = htmlentities($newbookauthor);
    $newbookisbn = htmlentities($newbookisbn);

    # Open the database using the "librarian" account
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        header("location: indexLAB6.php");
        exit();
    }

    // Prepare an insert statement and execute it(`bookID`, `title`, `isbn`, `pageCount`, `edition`, `year`, `publisher`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
    $stmt = $db->prepare("INSERT INTO books(title, author, isbn) VALUES (?, ?, ? )");//why not adding ISBN?
    $stmt->bind_param('ssi', $newbooktitle, $newbookauthor, $newbookisbn);//ssi=string(is , string, string(isbn is an integer)
    $stmt->execute();
    printf("<br>Book Added!");
    header("location: indexLAB6.php");
    exit;
}

// Not a postback, so present the book entry form
?>

<h3>Add a new book</h3>
<hr>
All values required!
<form action="addbook.php" method="POST">
    <table bgcolor="#bdc0ff" cellpadding="6">
        <tbody>
            <tr>
                <td>Title:</td>
                <td><INPUT type="text" name="newbooktitle"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><INPUT type="text" name="newbookauthor"></td>
            </tr>
            <td>ISBN:</td>
                <td><INPUT type="number" name="newbookisbn"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Add Book"></td>
            </tr>
        </tbody>
    </table>
</form>

                    
                </div>
            
           

            <div>
             
          <footer>
              
            <?php include('footer.php');?>  
          </footer>
            

        
        </div>
    
    </body>

</html>
