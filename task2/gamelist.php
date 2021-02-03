<?php ?>

<html>
    <head>
        <title>My Game list</title>

        <?php
            $steamappsraw = file_get_contents("https://api.steampowered.com/ISteamApps/GetAppList/v2/");
            $steamapps = json_decode($steamappsraw);
            echo $steamapps -> applist -> apps[0];
        ?>

    </head>
</html>