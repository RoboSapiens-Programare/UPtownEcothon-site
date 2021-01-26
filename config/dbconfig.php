<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/dbcredentials.php";
    //---------

    class SQLiDB extends PDO {
        function __construct(){
            parent::__construct($GLOBALS['dbtype'] . ':' . $GLOBALS['reg_db_name'], 
                $GLOBALS['usr'], 
                $GLOBALS['pass'], 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8; SET CHARACTER SET UTF8")
            );

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($GLOBALS['dbtype'] == "sqlite")
                $this->exec("PRAGMA foreign_keys = ON");
        }
    }

    class ContentDB extends PDO {
        function __construct(){
            parent::__construct($GLOBALS['dbtype'] . ':' . $GLOBALS['content_db_name'], 
                $GLOBALS['usr'], 
                $GLOBALS['pass'], 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if($GLOBALS['dbtype'] == "sqlite"){
                $this->exec("PRAGMA foreign_keys = ON");
            }
            else{
                $this->exec("SET CHARACTER SET UTF8;");
            }
        }

        function getContentsForPage($pageName, $lang){
            $returnArray = array();

            $sql = "SELECT id FROM pages WHERE name = :pagename";
            $stmt = $this->prepare($sql);
            $stmt->bindParam(':pagename', $pageName);
            $stmt->execute();

            $pageid = $stmt->fetch(PDO::FETCH_ASSOC);

            if($pageid){
                $pageid = $pageid['id'];

                $sql = "SELECT id, name FROM sections WHERE page_id = :pageid";
                $stmt = $this->prepare($sql);
                $stmt->bindParam(':pageid', $pageid);
                $stmt->execute();

                $sectionResult = $stmt;

                foreach($sectionResult as $section){
                    $sql = "SELECT id, name FROM subsections WHERE section_id = :sectionid";
                    $stmt = $this->prepare($sql);
                    $stmt->bindParam(':sectionid', $section['id']);
                    $stmt->execute();

                    $subsectionResult = $stmt;

                    foreach($subsectionResult as $subsection) {
                        $sql = "SELECT value FROM content WHERE subsection_id = :subsectionid AND language = :lang";
                        $stmt = $this->prepare($sql);
                        $stmt->bindParam(':subsectionid', $subsection['id']);
                        $stmt->bindParam(':lang', $lang);
                        $stmt->execute();
        
                        $content = $stmt->fetch(PDO::FETCH_ASSOC);

                        $returnArray[$section['name']][$subsection['name']] = $content['value'];
                    }
                }
            }

            return $returnArray;
        }
    }
    ?>