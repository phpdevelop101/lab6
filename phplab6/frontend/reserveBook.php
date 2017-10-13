<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ('config4.php');


$bookid = trim($_GET['bookid']);
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>'; //gets book id and connects to db

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=indexLAB6.php>Return to home page </a>");
        exit();
    }
    
   echo "You are reserving book with the ID:"           .$bookid;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE books SET onloan=1 WHERE bookid = ?");//update book table and set online. The question ark is when the user clicks on reserve. In the db, 
    $stmt->bind_param('i', $bookid); //the parameters being sent in.. i for intergegar
    $stmt->execute();
    printf("<br>Book Reserved!");

    printf("<br><a href=browsedBooks.php>Search and Book more Books </a>");
    printf("<br><a href=Lab4MyBooks.php>Return to Reserved Books </a>");
    printf("<br><a href=indexLAB6.php>Return to home page </a>");
    exit;
    

