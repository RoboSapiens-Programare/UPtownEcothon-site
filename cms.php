<!DOCTYPE html>

<?php
    include 'config/dbconfig.php';

    $page = (isset($_POST['page']) && !empty($_POST['page'])) ? $_POST['page'] : null;
    $section = (isset($_POST['section']) && !empty($_POST['section'])) ? $_POST['section'] : null;
    $subsection = (isset($_POST['subsection']) && !empty($_POST['subsection'])) ? $_POST['subsection'] : null;
    $content = (isset($_POST['content']) && !empty($_POST['content'])) ? $_POST['content'] : null;
    
    if($page && $section && $subsection && $content){
        try{
            $db = new SQLiDB();

            //INSERT NEW STUFF
            $sql = "INSERT INTO pages (page) VALUES (:pagename); INSERT INTO sections (name) VALUES (:section); INSERT INTO subsections (name) VALUES (:subsection); INSERT INTO content (value) VALUES (:content);";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(':pagename', $page);
            $stmt->bindParam(':section', $section);
            $stmt->bindParam(':subsection', $subsection);
            $stmt->bindParam(':content', $content);
            
            $stmt->execute();

            $db = null;
            unset($db);
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }

    try{
        $db = new SQLiDB();

        //GET ALL PAGES, SECTIONS, AND SUBSECTIONS FOR OPTIONS
        $pageOptions = $sectionOptions = $subsectionOptions = $contentValues = array();

        $sql = "SELECT * FROM pages";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();

        foreach($stmt as $row){
            $pageOptions[] = "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }

        $sql = "SELECT * FROM sections";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();

        foreach($stmt as $row){
            $sectionOptions[$row['page_id']][] = "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }

        $sql = "SELECT * FROM subsections";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();

        foreach($stmt as $row){
            $subsectionOptions[$row['section_id']][] = "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }

        $sql = "SELECT * FROM content";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();

        foreach($stmt as $row){
            $contentValues[$row['subsection_id']] = $row['value'];
        }

        $db = null;
        unset($db);
    }
    catch(PDOException $e){
        $e->getMessage();
    }
?>

<html>
    <head>
        <title>CMS UTE :D</title>
    </head>
    <body>
        <form method="post">
            <label for="page">Page</label>
            <select name="page" id="page" oninput="displayContent(3);">
            <?php
                foreach($pageOptions as $op){
                    echo $op;
                }
            ?>
            </select>
            <br>
            <label for="section">Section</label>
            <select name="section" id="section" oninput="displayContent(2);">
            </select>
            <br>
            <label for="subsection">Subsection</label>
            <select name="subsection" id="subsection" oninput="displayContent(1);">
            </select>
            <br>
            <textarea name="content" id="content"></textarea><br>
            <button type="submit">Submit</button>
        </form>

        <script>
            var sectionOptions = <?php echo json_encode($sectionOptions); ?>;
            var subsectionOptions = <?php echo json_encode($subsectionOptions); ?>;
            var contentValues = <?php echo json_encode($contentValues); ?>;
 
            displayContent(3);

            function displayContent(loc){
                var page = document.getElementById('page').value;
                var section = document.getElementById('section').value;
                var subsection = document.getElementById('subsection').value;


                if(loc > 1){
                    if(loc > 2){
                        var sectionText = "";

                        if(sectionOptions[page]){
                            for(var x of sectionOptions[page]){
                                sectionText += x;
                            }
                        }

                        document.getElementById("section").innerHTML = sectionText;
                        section = document.getElementById('section').value;
                    }
                    var subsectionText = "";

                    if(subsectionOptions[section]){
                        for(var x of subsectionOptions[section]){
                            subsectionText += x;
                        }
                    }

                    document.getElementById("subsection").innerHTML = subsectionText;
                    subsection = document.getElementById('subsection').value;
                }
                document.getElementById("content").innerHTML = contentValues[subsection];
            }
        </script>
    </body>
</html>