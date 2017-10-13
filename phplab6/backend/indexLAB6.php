
<?php
session_start();
if (isset($_COOKIE['counter']))
    $count = $_COOKIE['counter'];
else
    $count = 0;//is language set? if not set, use the default

if (isset($_COOKIE['language']))//language
    $lng = $_COOKIE['language'];
    $lng =0;
//else
    //$count = 0;


$count = $count + 1;
setcookie('counter', $count, time() + 24 * 3600);
setcookie("language", "en-us", time() + 24 * 3600);


?>
<!DOCTYPE html>

<html>

    <head>
    
        <title>admins</title>
        
        <meta name="Book Lovers" content="The ultimate page for great books from all over the world"/>
        
        <meta charset="utf-8"/>
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="Lab4.css"/>
        
    </head>
    
    <body>
    
        <div id="wrap">
            
            <?php include('header.php');?>
            
            
            
                <div class="lid">
               <h4> Welcome to Admin Page! </h4>
                
                 <img class="about us" src="admin.jpg" alt="topicture" width="30%" height="5%">
          <footer>
           <?php include('footer.php');?>    

          </footer>
               

            
            
            
      
  </div>    
</div>
    
    </body>

</html>