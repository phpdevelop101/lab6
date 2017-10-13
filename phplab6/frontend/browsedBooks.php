
 <?php 
            
//protection from XSS (CROSS-SITE SCRIPTING)code injection eg iframe
            include('config4.php');


?>

<html>

    <head>
    
        <title>Browse Books</title>
        
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
                
                       <hr>
           
 

<h3>Search our Book Catalog</h3>
<hr>
You may search by title, or by author, or both<br>
<form action="browsedBooks.php" method="POST">
    <table bgcolor="#bdc0ff" cellpadding="6">
        <tbody>
            <tr>
                <td>Title:</td>
                <td><INPUT type="text" name="searchtitle"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><INPUT type="text" name="searchauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Submit"></td>
            </tr>
        </tbody>
    </table>
</form>

<h3>Book List</h3>
<hr>
<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {//if its empy...
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);//if searched by title
    $searchauthor = trim($_POST['searchauthor']);//if searched by author(removes spaces?)
}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);//(whats difference btw addlashes and  trim?)//deletes spaces(trim)//adds slashes incase of apostrofies(addslashes)
$searchauthor = addslashes($searchauthor);


$searchtitle = htmlentities($searchtitle);//this protects the var from XSS (CROSS-SITE SCRIPTING)code injection eg iframe
$searchauthor = htmlentities($searchauthor);//this protects the var from XSS (CROSS-SITE SCRIPTING)code injection eg iframe

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);//why do we use not $db= mysql_$connect() diff?

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=indexLAB6.php>Return to home page </a>"); //go here if unable to connect
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select  bookid, title, author, onloan FROM Books";//goes to database and finds this in queery.(In the order in Query eg bookid, tittle, author shoould stämma also in same order in bind_results)
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where title like '%" . $searchtitle . "%'"; //percenage means any character coming b4 or after eg SELECT bookid, author, title, onloan FROM `books` WHERE author LIKE "%Ngu%" presents all authors names' that has NGU
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}
// 
//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($bookid, $title, $author, $onloan);//whatever you is assigned in query(SHOULD BE TRANSLATED) then brought here and prepares it for execution. 
    $stmt->execute();

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr><b><td>ID</td> <td>Title</td> <td>Author</td> <td>Reserved?</td><td>Reserve</td> </b> </tr>';
    while ($stmt->fetch()) {
        //We don't want to show reseved numbers
        if ($onloan==0) //shows all book's status.  with integer thats equals 1(reserved) 0(return)
            $onloan="NO"; //IF the book is not onloan(reserved) say No else write yes
        else $onloan="YES";  
        echo "<tr>";
        echo "<td>$bookid</td> <td> $title </td><td> $author </td> <td>$onloan</td>";
        echo '<td><a href="reserveBook.php?bookid=' . urlencode($bookid) . '"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>



                       
                    
                </div>
            
           

            <div>
             
          <footer>
              
            <?php include('footer.php');?>  
          </footer>
            

        
        </div>
    
    </body>

</html>


