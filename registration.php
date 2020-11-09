<!DOCTYPE html>
<html>
<body>
	<form method="post">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" value=<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>><br>
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname"><br>
        <label for="email">E-Mail Adress</label>
        <input type="text" id="email" name="email"><br>
        <button type = "submit">Submit</button><br>
    </form>

    <?php

        if(isset($_POST['lastname']) && !empty( $_POST['lastname']) && isset($_POST['firstname']) && !empty( $_POST['firstname']) && isset($_POST['email']) && !empty( $_POST['email'])){
            $db = new SQLite3('registration.sq3');
            $sql = "INSERT INTO participants (firstname, lastname, email) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."')";
            $db->query($sql);
            unset($db);
        }
        else{
            echo "Complete all fields!";
        }
    ?>

    <h2>Debug</h2>
    <form method="post">
        <button type="submit" name="delete">Clear Table</button>
        <button type="submit" name="dump">Dump Table</button>
    </form>
    <?php
        if(isset($_POST['delete'])){
            $db = new SQLite3('registration.sq3');
            $sql = "DELETE FROM participants";
            $db->query($sql);
            unset($db);

            echo "Table records deleted!";
        }

        if(isset($_POST['dump'])){

            $db = new SQLite3('registration.sq3');
            $sql = "SELECT * FROM participants";
            $result = $db->query($sql);
            while ($row = $result->fetchArray(SQLITE3_ASSOC)){
                echo $row['firstname'] . ' : ' . $row['lastname'] . ' : ' . $row['email'] . '<br/>';
            }
            unset($db);
        }
    ?>
</body>
</html>