<!DOCTYPE html>
<html>
<body>

    <a href="home.php">Home</a>

    <?php
        include 'config/dbconfig.php';
        
        $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? $_POST['firstname'] : null;
        $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? $_POST['lastname'] : null;
        $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
        $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $_POST['phone'] : null;
        $position = (isset($_POST['position']) && !empty($_POST['position'])) ? $_POST['position'] : null;
        $experience = (isset($_POST['experience']) && !empty($_POST['experience'])) ? $_POST['experience'] : null;

        $team_id = 1;
        $participant_id = null;
    ?>

    <h2>Register</h2>
	<form method="post">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" value=<?php if($firstname) echo $firstname; ?>><br>
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" value=<?php if($lastname) echo $lastname; ?>><br>
        <label for="email">E-Mail Adress</label>
        <input type="text" id="email" name="email" value=<?php if($email) echo $email; ?>><br>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value=<?php if($phone) echo $phone; ?>><br>
        <label for="position">Position</label>
        <select id="position" name="position">
            <option value="elev">Elev</option>
            <option value="student">Student</option>
            <option value="angajat">Angajat</option>
            <option value="l-intrep">Liber Intreprinzator</option>
        </select><br>
        <label for="experience">Experience</label>
        <textarea type="text" id="experience" name="experience"><?php if($experience) echo $experience; ?></textarea><br>    

    <?php
        $participant_ok = false;

        if($firstname && $lastname && $email && $phone && $position && $experience){

            $participant_id = rand(1000, 9999);
            try{
                $db = new SQLiDB();
                $sql = "INSERT INTO participants (id, firstname, lastname, email, phone, position, experience) VALUES (:participant_id, :firstname, :lastname, :email, :phone, :position, :experience)";
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':participant_id', $participant_id);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':position', $position);
                $stmt->bindParam(':experience', $experience);

                $stmt->execute();

                $db = null;
                unset($db);

                $participant_ok = true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        else{
            echo "Complete all fields!";
        }
    ?>

    <?php
        $username = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : null;
    ?>

    <h2>Configure Account</h2>
    
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value=<?php if($username) echo $username; ?>><br>
        <label for="passwd">Password</label>
        <input type="password" id="passwd" name="passwd"><br>
        <label for="passwd">Confirm Password</label>
        <input type="password" id="cpasswd" name="cpasswd"><br>
        <button type="submit">Submit</button>
    </form>

    <?php
        $passwd = null;
        if(!$participant_ok){
            echo "Complete participant registration first!";
        }
        else if(!(isset($_POST['passwd']) && isset($_POST['cpasswd']))){
            echo "Complete all fields! <br>";
        }
        else if($_POST['passwd'] !== $_POST['cpasswd']){
            echo "Passwords do not match!";
        }
        else{
            $passwd = $_POST['passwd'];
        }

        if($username && $passwd){
            try{
                $db = new SQLiDB('registration.sq3');
                $sql = "INSERT INTO users (username, passwd, team_id, participant_id) VALUES (:username, :passwd, :team_id, :participant_id)";
                $stmt = $db->prepare($sql);
                
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':passwd', $passwd);
                $stmt->bindParam(':team_id', $team_id);
                $stmt->bindParam(':participant_id', $participant_id);

                $stmt->execute();

                $db = null;
                unset($db);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    ?>

    <h2>Debug</h2>
    <form method="post">
        <button type="submit" name="delete">Clear Table</button>
        <button type="submit" name="dump">Dump Table</button>
    </form>
    <?php
        if(isset($_POST['delete'])){
            $db = new SQLiDB();
            $sql = "DELETE FROM participants";
            $db->exec($sql);
            unset($db);

            echo "Table records deleted!";
        }

        if(isset($_POST['dump'])){

            $db = new SQLiDB();
            $sql = "SELECT * FROM participants";
            $result = $db->query($sql);
            
            foreach($result as $row){
                foreach($row as $a){
                    echo $a . " : ";
                }
                echo "<br>";
            }
            unset($db);
        }
    ?>
</body>
</html>