<!DOCTYPE html>

<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

	$displaylogin = true;
	// if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] == false){
    //     header('Location: adminlogin.php');
    //     die();
	// }
?>

<?php
    include 'config/dbconfig.php';

    //Luam toate variabilele setate in POST si verificam daca sunt valide (adica daca sunt setate si nu sunt goale)
    $page = (isset($_POST['page']) && !empty($_POST['page'])) ? $_POST['page'] : null; //id-ul curent al paginii
    $section = (isset($_POST['section']) && !empty($_POST['section'])) ? $_POST['section'] : null; //id-ul curent al sectiunii
    $subsection = (isset($_POST['subsection']) && !empty($_POST['subsection'])) ? $_POST['subsection'] : null; //id-ul curent al subsectiunii
    $content = (isset($_POST['content']) && !empty($_POST['content'])) ? $_POST['content'] : null; //valoarea textarea-ului de content
    $contentEN = (isset($_POST['contentEN']) && !empty($_POST['contentEN'])) ? $_POST['contentEN'] : null; //valoarea textarea-ului de contentEN
    $newPageName = (isset($_POST['newPageName']) && !empty($_POST['newPageName'])) ? $_POST['newPageName'] : null; //valoarea imputului de new page name
    $newSectionName = (isset($_POST['newSectionName']) && !empty($_POST['newSectionName'])) ? $_POST['newSectionName'] : null; //valoarea inputului de new section name
    $newSubsectionName = (isset($_POST['newSubsectionName']) && !empty($_POST['newSubsectionName'])) ? $_POST['newSubsectionName'] : null; //valoarea inputului de new subsection name
    $deletePage = isset($_POST['deletePage']); //a fost apasat butonul delete page?
    $deleteSection = isset($_POST['deleteSection']); //
    $deleteSubsection = isset($_POST['deleteSubsection']); //
    
    //Daca valorile de page, section, subsection si content sunt setate then proceed
    if($page && $section && $subsection && $content && $contentEN){
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
                $sql = "INSERT INTO content (value, subsection_id, language) VALUES (:content, :subsectionid, 'RO');";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':subsectionid', $subsection);
                $stmt->execute();

                $sql = "INSERT INTO content (value, subsection_id, language) VALUES (:content, :subsectionid, 'EN');";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':content', $contentEN);
                $stmt->bindParam(':subsectionid', $subsection);
                $stmt->execute();
            }
            //Daca nici nu dam delete, nici nu adaugam o pagina noua
            else{
                //UPDATE STUFF
                $sql = "UPDATE content SET value=:content WHERE subsection_id=:subsectionid AND language='RO'";

                $stmt = $db->prepare($sql);

                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':subsectionid', $subsection);

                $stmt->execute();

                $sql = "UPDATE content SET value=:content WHERE subsection_id=:subsectionid AND language='EN'";

                $stmt = $db->prepare($sql);

                $stmt->bindParam(':content', $contentEN);
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
    else{
        echo "<h2 style='color: red'>Da fill la tot coane!</h2>";
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
            $contentValues[$row['subsection_id']][$row['language']] = $row['value'];
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
        <meta name="robots" content="noindex">
        <title>CMS UTE :D</title>
    </head>
    <body>
        <form method="post" id="theForm" accept-charset="UTF-8">
            <label for="page">Page</label>
            <select name="page" id="page" oninput="displayContent(3);">
                <?php
                    foreach($pageOptions as $op){
                        echo $op;
                    }
                ?>
                <option value="newPage">new page...</option>
            </select>
            <button type="submit" onclick="popupDialogue(this);" name="deletePage" id="deletePage">Delete</button>
            <div style="display: none" id="addNewPage">
                <label for="newPageName">Name</label>
                <input type="text" name="newPageName" id="newPageName">
            </div>
            <br>
            <label for="section">Section</label>
            <select name="section" id="section" oninput="displayContent(2);">
            </select>
            <button type="submit" onclick="popupDialogue(this);" name="deleteSection" id="deleteSection">Delete</button>
            <div style="display: none" id="addNewSection">
                <label for="newSectionName">Name</label>
                <input type="text" name="newSectionName" id="newSectionName">
            </div>
            <br>
            <label for="subsection">Subsection</label>
            <select name="subsection" id="subsection" oninput="displayContent(1);">
            </select>
            <button type="submit" onclick="popupDialogue(this);" name="deleteSubsection" id="deleteSubsection">Delete</button>
            <div style="display: none" id="addNewSubsection">
                <label for="newSubsectionName">Name</label>
                <input type="text" name="newSubsectionName" id="newSubsectionName">
            </div>
            <br>
            <label for="content">RO:</label><br><textarea name="content" id="content" style="width: 50vw; height: 50vh"></textarea><br>
            <label for="contentEN">EN:</label><br><textarea name="contentEN" id="contentEN" style="width: 50vw; height: 50vh"></textarea><br>
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
                document.getElementById("content").innerHTML = contentValues[subsection]["RO"];
                document.getElementById("contentEN").innerHTML = contentValues[subsection]["EN"];
            }

            // function popupDialogue(el){
            //     if (confirm('Are you sure you want to delete the thing? Really sure?')) {
            //         console.log('Thing was deleted from the database.');
            //         var myInput = document.createElement('input');
            //         myInput.setAttribute("id", el.id);
            //         myInput.setAttribute("value", 1);
            //         document.getElementById('theForm').submit();
            //     }
            // }
        </script>
    </body>
</html>