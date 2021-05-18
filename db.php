<!--
Carlos Munoz
assignment09
INFO_1335_4A
Rosas
5-20-2021
-->
<?php
/*
Complete the php below to connect to a database with PDO.
There is a great example of this on page 633 of your book.
Keep in mind that I have included a db_err.php for you to 
include for error handling.
*/
    $dsn = 'mysql:host=localhost;dbname=student_db';
    $username = 'webuser';
    $password = 'AAaa!!11';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO ($dsn, $username, $password, $options) ;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include 'db_err.php';
        exit();
    }
?>