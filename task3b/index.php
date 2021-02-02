<?php
    require "steamauth/steamauth.php";
    require "steamauth/userInfo.php";


    if(isset($_SESSION["steamid"]))
    {
        $id = $_SESSION["steamid"];
    }
?>

<html>
    <head>
        <title>mysteam</title>
    </head>
    <body>
        <?php echo "<p>Welcome to MySteam. A frivolous website that only does one singe thing."+
        "\nAnd that is to allow you to log into steam, and then display your profile name and avatar."+
        "\nThat's it. Also it took like the whole day to do, becouse apperently I am a moron when to comes to webdevelopment.</p>";
        if(isset($id))
        {
        #insert the logout button
        echo logoutbutton();
        }
        else
        {

        #insert the logout button
        echo loginbutton("rectangle");
        }

        ?> 
    </body>
</html>