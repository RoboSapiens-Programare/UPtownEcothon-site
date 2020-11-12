<?php
    //VARIABLES
    $db_name = "registration.sq3";

    //---------

    class SQLiDB extends PDO {
        function __construct(){
            parent::__construct('sqlite:' . $GLOBALS['db_name']);

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->exec("PRAGMA foreign_keys = ON");
        }
    }
    ?>