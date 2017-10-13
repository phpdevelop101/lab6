<?php
session_start ();
/* SQL injection.prevention
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#this function is for older PHP versions that use Magic Quotes.
#
//    function escapestring($input) {
//    if (get_magic_quotes_gpc()) {
//    $input = stripslashes($input);
//    }
//
//    @ $db = new mysqli('localhost', 'root', '', 'testinguser');
//
//
//    return mysqli_real_escape_string($db, $input);
//
//    }//paswordhashig= hash is the blender for passwords..(password+hash=bits and pieces blended in. fROM THIS )

@ $db = new mysqli('localhost', 'root', '', 'testinguser');//CONNECTING WITH DB testnguser

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=indexLAB6.php>Return to home page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['userpass'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = mysqli_real_escape_string($db, $_POST['username']);//escape specal characters(escapes) 
    //(escapes 2 parameters)goes in db then checks


    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1($_POST['userpass']);//create userpassword variable.. SHA1 blends the pasword into small pices

    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    //echo $uname;
    //echo '<br>';
    //echo $upass;
    //echo "SELECT * FROM user WHERE username = '{$uname}' AND userpass = '{$upass}'";
    //$query = ("INSERT INTO username($uname) VALUES ('{$uname}')");
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
    //select all where username==uname and userpassword==upasword
       
    
    $stmt = $db->prepare($query);//prepares
    $stmt->execute();//executes
    $stmt->store_result(); //puts the results here
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    
    
}
?>

<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
 
</title>
    
    <body>
    
        <div id="wrap">

            
            <?php 
            
            include('header.php');

            
            ?>
            
          
            
                <div class="lid">


</head>
<body>



                   <?php
        
        
        
        if (isset($totalcount)) {//icheck it out(if the total count is entered)
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
               header("location: fileupload4.php");//header redirects user to location of file upload.
            }
        }
        ?>
        <h4> Log In </h4>
                
                <form method="POST" action="">
                            
                           
                            
                            <table cellpadding="20" cellspacing="0" width="100%">
                            
                                <tr>

                                
                                    <td width="50%" valign="top">
                                    
                                        <label for="name">Username</label><br />
                                        
                                        <input id="name" type="text" name="username" required="" />
                                        
                                        <br /><br />
                                        
                                        <label for="Password">Password</label><br />
                                        
                                        <input type="Password" id="Password" name="userpass" required="" />
                                    
                                    </td>
                                    
                                    
                                
                                </tr>
                            
                            </table>
                            
                        </form>  
                       
                <p  class="last"> </p>
                <h4>Uploaded Pictures</h4>

    
           <!-- start gallery header --> <?php
   // Set a variable with the name of the gallery directory
   $galleryDir = 'uploadedfiles/';
   // Search the gallery directory for images
   foreach(glob("$galleryDir{*.jpg,*.gif,*.png,*.tif,*.jpeg}", GLOB_BRACE) as $photo) {
     // Loop this code for each image
     // Explode the image name (currently 'gallery/image.jpg') at '/'
     $imgName = explode("/", $photo);
     // Get the last part of the exploded image name (now 'image.jpg')
     $imgName = end($imgName);
     // Generate the HTML code to display each image in a grid
     
     echo "<a href='$photo' title='$imgName'>";
     echo "<div style='float:left; border:1px solid black; width:100px; height:120px; padding:10px; margin:10px; text-align:center;'>";
     echo "<img src='$photo' style='max-height:100px; max-width:100px;'><br><span>$imgName</span>";
     echo "</div>";
     echo "</a>";
   }
   ?>
       

                
            
           
           <footer>
              <?php include('footer.php');?> 

           </footer> 
       </div>
            
        </div>
        </div>
        </div>
    </body>

</html>