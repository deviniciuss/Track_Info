<?php 

    $db_user = "root";
    $db_password = "";
    $db_name = "test-cegos";

    //"mysql:host=127.0.0.1;dbname=test-cegos;charset=utf8, root, "
    $db = new PDO("mysql:host=127.0.0.1;dbname=" . $db_name . ";charset=utf8",$db_user, $db_password);

    //Setting attributes and calling the methods statics from PDO!
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Creating constant with global scope though method define()
    define( "APP_NAME" , "TEST_CEGOS");

?>