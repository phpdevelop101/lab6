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
           

          
            
         <a class="<?php echo ($current_page == 'addbook.php') ? 'active' : NULL ?>" href="addbook.php">Add book</a>

         <a class="<?php echo ($current_page == 'deletebook.php') ? 'active' : NULL ?>" href="deletebook.php">Delete book</a>
            
        <a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php"> Gallery</a>

        <a class="<?php echo ($current_page == 'logout.php') ? 'active' : NULL ?>" href="logout.php">Log Out</a>
    </div>
</div>
</div>
    </header>
            
          
</head>
<body>

</body>
</html>

