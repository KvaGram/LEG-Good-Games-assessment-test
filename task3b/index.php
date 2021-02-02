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
                #todo: display name and avatar
                #insert the logout button
                echo logoutbutton();
            }
            else
            {
                echo "<p> You are currently not logged in. Press the button below to log in.</p>";
                #insert the logout button
                echo loginbutton("rectangle");
            }
        ?> 
    </body>
</html>