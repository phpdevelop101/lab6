<?php

session_start();

?>
<!DOCTYPE html>

<html>

    <head>
    
        <title>Contacts</title>
        
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
                    
                        <form id="form">
                            
                            <h1>Contact Form :</h1>
                            
                            <table cellpadding="20" cellspacing="0" width="100%">
                            
                                <tr>
                                
                                    <td width="50%" valign="top">
                                    
                                        <label for="name">Your names</label><br />
                                        
                                        <input id="name" type="text" name="name" required="" />
                                        
                                        <br /><br />
                                        
                                        <label for="email">Email Address</label><br />
                                        
                                        <input type="email" id="email" name="email" required="" />
                                    
                                    </td>
                                    
                                    <td width="50%" valign="top">
                                    
                                        <label for="subject">Subject</label><br />
                                        
                                        <input type="text" name="subject" id="subject" required="" />
                                        
                                        <br /><br />
                                        
                                        <label for="msg">Message</label><br />
                                        
                                        <textarea id="msg" name="msg" required=""></textarea>
                                        
                                        <br /><br />
                                        
                                        <input type="button" value="Submit" required="" />
                                    
                                    </td>
                                
                                </tr>
                            
                            </table>
                            
                        </form> 
                    
                
            
           <footer>
              <?php include "footer.php";?> 
               
           </footer>
            
            
        
        </div>
            </div>
                
                </div>
    
    </body>

</html>

 