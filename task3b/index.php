<?php
    require "steamauth/steamauth.php";
    if(isset($_SESSION["steamid"]))
    {
        $id = $_SESSION["steamid"];
        require "steamauth/userInfo.php";
    }
?>

<html>
    <head>
        <title>mysteam</title>
    </head>
    <body>
        <p>
            Welcome to MySteam. A frivolous website that only does one singe thing.
            And that is to allow you to log into steam, and then display your profile name and avatar.
            That's it. Also it took like the whole day to do, becouse apperently I am a moron when to comes to webdevelopment.
        </p>
        
        <?php
            if(isset($id))
            {
                $avatarPic = base64_encode(file_get_contents($steamprofile['avatarfull']));

                echo "<h2>" . $steamprofile['personaname'] . "</h2>";
                echo "<p>Steam ID: " . $steamprofile['steamid'] . "</p>";
                echo "<img src='data:image/jpeg;base64,".$avatarPic."'>";                
                #todo: display name and avatar
                #This inserts the logout button
                echo logoutbutton();
            }
            else
            {
                echo "<p> You are currently not logged in. Press the button below to log in.</p>";
                #This inserts the logout button
                echo loginbutton("rectangle");
            }
        ?> 
    </body>
</html>