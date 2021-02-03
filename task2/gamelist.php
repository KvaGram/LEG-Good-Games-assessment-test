<?php ?>

<html>
    <head>
        <title>My Game list</title>

        <?php
            $steamappsraw = file_get_contents("https://api.steampowered.com/ISteamApps/GetAppList/v2/");
            $steamapps = json_decode($steamappsraw);
            $list = $steamapps -> applist -> apps;
            $list_length = sizeof($list);
            echo "number of apps : " . $list_length . "<br>";

            $sample = $list[123];
            #var_dump($sample);
            #echo $sample -> name;

            $gameidstoload = [];
            $filter_1_reject_count = 0;
            foreach($list as $g)
            {
                $name = $g->name;
                $id = $g->appid;
                if(strpos($name, "a"))
                {
                    $filter_1_reject_count ++;
                }
                else
                {
                    array_push($gameidstoload, $id);
                }
            }
            echo "filter 1. Do not contain character 'a'. rejected ".$filter_1_reject_count." entries";
        ?>

    </head>
</html>