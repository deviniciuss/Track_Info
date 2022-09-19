<?php 
    //Verify if that constant exists or not though method denifed()!
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    //"SITE_ROOT/xampp/htdocs/test-cegos"
    defined("SITE_ROOT") ? null : define("SITE_ROOT", DS . "xampp" . DS . "htdocs" . DS . "test-cegos");
    //"INC_PATH/SITE_ROOT/xampp/htdocs/test-cegos/includes"
    defined("INC_PATH") ? null : define("INC_PATH", SITE_ROOT . DS . "includes");
    //"CORE_PATH/SITE_ROOT/xampp/htdocs/test-cegos/core"
    defined("CORE_PATH") ? null : define("CORE_PATH", SITE_ROOT . DS . "core");

    //Loading config file
    require_once(INC_PATH . DS . "config.php");

    require_once(INC_PATH . DS . "cryptography.php");

    //core classes
    require_once(CORE_PATH . DS . "trackInfo.php")

    



?>