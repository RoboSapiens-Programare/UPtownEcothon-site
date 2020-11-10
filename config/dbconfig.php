<?php
    //VARIABLES
    $db_name = "registration.sq3";

    //---------

    class SQLiDB extends SQLite3 {
        function __construct(){
            $this->open($GLOBALS['db_name']);

            $this->exec("PRAGMA foreign_keys = ON");
        }
    }
    ?>