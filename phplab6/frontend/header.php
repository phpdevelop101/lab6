<?php


include('config4.php');

 //if this statements is correct active if ts not its null
?>

<!DOCTYPE html>
<html>
<head>
    <title>head</title>
   
          <meta charset="utf-8"/>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="Lab4.css"/>

<header>
         
    <div class="image">

        <div class="mainmenu">
         
             
        <a class="<?php echo ($current_page == 'indexLAB6.php' || $current_page == '') ? 'active' : NULL ?>" href="indexLAB6.php"> Home</a>
           

           <a class="<?php echo ($current_page == 'Lab4aboutUs.php') ? 'active' : NULL ?>" href="Lab4aboutUs.php">About us</a>
            
         <a class="<?php echo ($current_page == 'browsedBooks.php') ? 'active' : NULL ?>" href="browsedBooks.php">Search books</a>

         <a class="<?php echo ($current_page == 'Lab4MyBooks.php') ? 'active' : NULL ?>" href="Lab4MyBooks.php">Reserved books</a>
            
        <a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php"> Gallery</a>

        <a class="<?php echo ($current_page == 'Lab4c.ontact.php') ? 'active' : NULL ?>" href="Lab4.contact.php">Contact</a>
    </div>
</div>
</div>
    </header>
            
          
</head>
<body>

</body>
</html>

