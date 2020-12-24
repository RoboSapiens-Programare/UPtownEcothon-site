<!DOCTYPE html>

<?php
    include 'config/dbconfig.php';

    //Luam toate variabilele setate in POST si verificam daca sunt valide (adica daca sunt setate si nu sunt goale)
    $page = (isset($_POST['page']) && !empty($_POST['page'])) ? $_POST['page'] : null; //id-ul curent al paginii
    $section = (isset($_POST['section']) && !empty($_POST['section'])) ? $_POST['section'] : null; //id-ul curent al sectiunii
    $subsection = (isset($_POST['subsection']) && !empty($_POST['subsection'])) ? $_POST['subsection'] : null; //id-ul curent al subsectiunii
    $content = (isset($_POST['content']) && !empty($_POST['content'])) ? $_POST['content'] : null; //valoarea textarea-ului de content
    $newPageName = (isset($_POST['newPageName']) && !empty($_POST['newPageName'])) ? $_POST['newPageName'] : null; //valoarea imputului de new page name
    $newSectionName = (isset($_POST['newSectionName']) && !empty($_POST['newSectionName'])) ? $_POST['newSectionName'] : null; //valoarea inputului de new section name
    $newSubsectionName = (isset($_POST['newSubsectionName']) && !empty($_POST['newSubsectionName'])) ? $_POST['newSubsectionName'] : null; //valoarea inputului de new subsection name
    $deletePage = isset($_POST['deletePage']); //a fost apasat butonul delete page?
    $deleteSection = isset($_POST['deleteSection']); //
    $deleteSubsection = isset($_POST['deleteSubsection']); //
    
    //Daca valorile de page, section, subsection si content sunt setate then proceed
    if($page && $section && $subsection && $content){
        try{
            //Creem conexiunea la DB
            $db = new ContentDB();

            //Daca a fost apasat vreun buton de delete
            if($deletePage || $deleteSection || $deleteSubsection){
                //Verificam care din ele si stergem pagina / section-ul / subsection-ul corespunzator (luat din variabilele de mai sus)
                if($deletePage){
                    $sql = "DELETE FROM pages WHERE id=:page";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':page', $page);
                    $stmt->execute();
                }
                if($deleteSection){
                    $sql = "DELETE FROM sections WHERE id=:section";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':section', $section);
                    $stmt->execute();
                }
                if($deleteSubsection){
                    $sql = "DELETE FROM subsections WHERE id=:subsection";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':subsection', $subsection);
                    $stmt->execute();
                }
            }
            //Daca exista vreo adaugare de pagina / sectiune / subsectiune
            else if($newPageName || $newSectionName || $newSubsectionName){
                //INSERT NEW STUFF
                if($newPageName){
                    //Adaugam noua pagina
                    $sql = "INSERT INTO pages (name) VALUES (:pagename);";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':pagename', $newPageName);
                    $stmt->execute();

                    //Luam id-ul noii pagini
                    $sql = "SELECT id FROM pages WHERE name = :pagename";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':pagename', $newPageName);
                    $stmt->execute();
                    //Updatam field-ul de page cu noul id
                    $page = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                }
                if($newSectionName){
                    //Adaugam noua sectiune, aici avem nevoie si de id-ul paginii
                    $sql = "INSERT INTO sections (name, page_id) VALUES (:section, :pageid);";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':section', $newSectionName);
                    $stmt->bindParam(':pageid', $page);
                    $stmt->execute();

                    //Luam id-ul noii sectiuni
                    $sql = "SELECT id FROM sections WHERE name = :section AND page_id = :pageid";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':section', $newSectionName);
                    $stmt->bindParam(':pageid', $page);
                    $stmt->execute();
                    //Updatam field-ul de section cu noul id
                    $section = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                }
                if($newSubsectionName){
                    //Adaugam noua subsectiune, aici avem nevoie si de id-ul sectiunii
                    $sql = "INSERT INTO subsections (name, section_id) VALUES (:subsection, :sectionid);";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':subsection', $newSubsectionName);
                    $stmt->bindParam(':sectionid', $section);
                    $stmt->execute();

                    //Luam id-ul noii subseciuni
                    $sql = "SELECT id FROM subsections WHERE name = :subsection AND section_id = :sectionid";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':subsection', $newSubsectionName);
                    $stmt->bindParam(':sectionid', $section);
                    $stmt->execute();
                    //Updatam field-ul de subsection cu noul id
                    $subsection = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                }
                //Adaugam noul content, aici ne trebuie si id-ul subsectiunii
                $sql = "INSERT INTO content (value, subsection_id) VALUES (:content, :subsectionid);";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':subsectionid', $subsection);
                $stmt->execute();
            }
            //Daca nici nu dam delete, nici nu adaugam o pagina noua
            else{
                //UPDATE STUFF
                $sql = "UPDATE content SET value=:content WHERE subsection_id=:subsectionid";

                $stmt = $db->prepare($sql);

                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':subsectionid', $subsection);

                $stmt->execute();
            }

            $db = null;
            unset($db);
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }

    try{
        $db = new ContentDB();

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
                <option value="newPage">new page...</option>
            </select>
            <button type="submit" name="deletePage" id="deletePage">Delete</button>
            <div style="display: none" id="addNewPage">
                <label for="newPageName">Name</label>
                <input type="text" name="newPageName" id="newPageName">
            </div>
            <br>
            <label for="section">Section</label>
            <select name="section" id="section" oninput="displayContent(2);">
            </select>
            <button type="submit" name="deleteSection" id="deleteSection">Delete</button>
            <div style="display: none" id="addNewSection">
                <label for="newSectionName">Name</label>
                <input type="text" name="newSectionName" id="newSectionName">
            </div>
            <br>
            <label for="subsection">Subsection</label>
            <select name="subsection" id="subsection" oninput="displayContent(1);">
            </select>
            <button type="submit" name="deleteSubsection" id="deleteSubsection">Delete</button>
            <div style="display: none" id="addNewSubsection">
                <label for="newSubsectionName">Name</label>
                <input type="text" name="newSubsectionName" id="newSubsectionName">
            </div>
            <br>
            <textarea name="content" id="content" style="width: 50vw; height: 50vh"></textarea><br>
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

                if(page === "newPage"){
                    document.getElementById("addNewPage").style.display = "block";
                    document.getElementById("deletePage").style.display = "none";
                }
                else{
                    document.getElementById("addNewPage").style.display = "none";
                    document.getElementById("deletePage").style.display = "inline";
                }

                if(loc > 1){
                    if(loc > 2){
                        var sectionText = "";

                        if(sectionOptions[page]){
                            for(var x of sectionOptions[page]){
                                sectionText += x;
                            }
                        }

                        document.getElementById("section").innerHTML = sectionText + "<option value='newSection'>new section...</option>";
                        section = document.getElementById('section').value;
                    }
                    if(section === "newSection"){
                        document.getElementById("addNewSection").style.display = "block";
                        document.getElementById("deleteSection").style.display = "none";
                    }
                    else{
                        document.getElementById("addNewSection").style.display = "none";
                        document.getElementById("deleteSection").style.display = "inline";
                    }
                    var subsectionText = "";

                    if(subsectionOptions[section]){
                        for(var x of subsectionOptions[section]){
                            subsectionText += x;
                        }
                    }

                    document.getElementById("subsection").innerHTML = subsectionText + "<option value='newSubsection'>new subsection...</option>";
                    subsection = document.getElementById('subsection').value;
                }
                if(subsection === "newSubsection"){
                    document.getElementById("addNewSubsection").style.display = "block";
                    document.getElementById("deleteSubsection").style.display = "none";
                }
                else{
                    document.getElementById("addNewSubsection").style.display = "none";
                    document.getElementById("deleteSubsection").style.display = "inline ";
                }
                document.getElementById("content").innerHTML = contentValues[subsection];
            }
        </script>
    </body>
</html>