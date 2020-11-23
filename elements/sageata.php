<div class="meniu" id="meniu-full" style="display:block;">
    <div class="cerc" id="cerc-logo-full">
        <div id="logo-meniu-full">
            <div class="logo-elem" id="sageata-meniu-TOP" z-index="3">
                <img src="pictures/1sageataUTE.png" alt="logo arrow">
            </div>
            <div class="logo-elem" id="town-TOP">
                <img src="pictures/1townUTE.png" alt="logo town">
            </div>
            <div class="logo-elem" id="cothon-TOP">
                <img src="pictures/1cothonUTE.png" alt="logo cothon">
            </div>
        </div>
    </div>

    <div class="cerc-text">
        <li>
            <a href="home.php"><img class="icon" id="home" src="icons/home.svg" alt="Home"></a>
        </li>
        <li>
            <a href="#"><img class="icon" id="user" src="icons/user.svg" alt="Account"></a>
        </li>
        <li>
            <a href="#"><img class="icon" id="info" src="icons/calendar.svg" alt="Info"></a>
        </li>
        <li>
            <a href="aboutus.php"><img class="icon" id="contact" src="icons/users.svg" alt="About Us"></a>
        </li>
        <li>
            <a href="#"><img class="icon" id="help" src="icons/help.svg" alt="Got A Problem?"></a>
        </li>
        <li>
            <a href="event.php"><img class="icon" id="event" src="icons/book.svg" alt="Event"></a>
        </li>
        <li>
            <a href="#"><img class="icon" id="sponsors" src="icons/investment.svg" alt="Our Sponsors"></a>
        </li>
    </div>

</div>

<div class="meniu" id="meniu-scroll" style="display:none;">
    <div id="border-sageata">
        <div class="cerc" id="cerc-sageata-scroll">
            <div class="logo-elem" id="sageata-meniu-scroll">
                <img src="pictures/SageataUTEpatrat.png" alt="logo arrow">
            </div>
        </div>
    </div>
</div>

<div id="language">
    <ul>
        <li style="border-right: 0.2vw solid white;">
            <a href="#">
                ro
            </a>
        </li>
        <li style="padding-left: 0.4vw;">
            <a href="#">
                en
            </a>
        </li>
    </ul>
</div>

<div id="login" style="position: fixed; top: 1vw;
left: 0vw;
height: 10vw;
width: 35vw;
padding: 0%;
background-color: white;
border-radius: 20px;
z-index: 1;">
    <?php
    if($displaylogin){
        include "elements/singin.html";
        // echo "You are not logged in. <a href='login.php'>Login</a> or <a href='registration.php'>Sign up</a>.";
    }
    else{
        include "elements/signout.php";
        // echo $welcomemsg . " <a href='logout.php'>Logout</a>";
    }
    ?>
</div>