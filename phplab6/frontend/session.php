<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

#first you have to start a session
session_start();

#assign a value to the $_SESSION superglobal array

$_SESSION['userid']=1;

#unset using unset 

unset($_SESSION['userid']);

#check if set

if (isset($_SESSION['userid']))
    echo $_SESSION['userid'];
else
    echo "Not set";


#if you want to remove all session values, use session_destroy

session_destroy();