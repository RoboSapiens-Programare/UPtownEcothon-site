<?php
    //VARIABLES
    $reg_db_name = "registration.sq3";
    $content_db_name = "content.sq3";

    //---------

    class SQLiDB extends PDO {
        function __construct(){
            parent::__construct('sqlite:' . $GLOBALS['reg_db_name']);

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->exec("PRAGMA foreign_keys = ON");
        }
    }

    class ContentDB extends PDO {
        function __construct(){
            parent::__construct('sqlite:' . $GLOBALS['content_db_name']);

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->exec("PRAGMA foreign_keys = ON");
        }

        function getContentsForPage($pageName){
            $returnArray = array();

            $sql = "SELECT id FROM pages WHERE name = :pagename";
            $stmt = $this->prepare($sql);
            $stmt->bindParam(':pagename', $pageName);
            $stmt->execute();

            $pageid = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

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
                    $sql = "SELECT value FROM content WHERE subsection_id = :subsectionid";
                    $stmt = $this->prepare($sql);
                    $stmt->bindParam(':subsectionid', $subsection['id']);
                    $stmt->execute();
    
                    $content = $stmt->fetch(PDO::FETCH_ASSOC);

                    $returnArray[$section['name']][$subsection['name']] = $content['value'];
                }
            }

            return $returnArray;
        }
    }
    ?>