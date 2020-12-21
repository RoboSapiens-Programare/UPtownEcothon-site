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

            $sql = "INSERT INTO content (page, section, subsection, content) VALUES (:pagename, :section, :subsection, :content)";

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
?>

<html>
    <head>
    
    </head>
    <body>
        <form method="post">
            <label for="page">Page</label><input type="text" name="page" id="page"><br>
            <label for="section">Section</label><input type="text" name="section" id="section"><br>
            <label for="subsection">Subsection</label><input type="text" name="subsection" id="subsection"><br>
            <textarea name="content" id="content"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>