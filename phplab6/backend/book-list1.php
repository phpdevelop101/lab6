<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#create an array of books

$books = array();
$books[] = array("title" => "Wordpress for you", "author" => "Johan Kohlin");
$books[] = array("title" => "PHP the easy way", "author" => "John Bauer");
$books[] = array("title" => "The big bad wolf", "author" => "R. K. Rowling");
$books[] = array("title" => "No Idea", "author" => "Nolan Ideos");





#print out the arrays in a table using HTML (you basically echo out HTML code, it works just fine!)

                echo '<table cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
               




                foreach ($books as $book) {
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                echo "</table>";


             

                