<!DOCTYPE html>
<html>
<body>
	<form method="post">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname"><br>
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname"><br>
        <label for="email">E-Mail Adress</label>
        <input type="text" id="email" name="email"><br>
        <button type = "submit">Submit</button><br>
    </form>

    <?php

        if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email'])){
            $db = new SQLite3('registration.sq3');
            $sql = "INSERT INTO participants (firstname, lastname, email) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."')";
            $db->query($sql);
            

            $db->close();
        }
        else{
            echo "Complete all fields!";
        }
    ?>
</body>
</html>