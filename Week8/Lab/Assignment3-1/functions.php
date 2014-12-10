<?php

function checkLen($password, $email)
{
    if (strlen($password) > 3 && strlen($email) > 3)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function hashPass ($password)
{
    return sha1($password);
}

function checkEmail ($email)
{
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    
    $dbs = $db->prepare('select * from signup where email = :email');     
     
$dbs->bindParam(':email', $email, PDO::PARAM_STR);
        
 if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
     return true;
 } else {
     return false;
 }
}

function checkLogin($password, $email)
{
    $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
    
    $dbs = $db->prepare('select * from signup where email = :email and password = :password');     
     
$dbs->bindParam(':email', $email, PDO::PARAM_STR);
$password = hashPass($password);
$dbs->bindParam(':password', $password, PDO::PARAM_STR);
        
 if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
     return true;
 } else {
     return false;
 }
}

//var_dump(checkEmail('test@test.com'));