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

            $gamestolist = [];
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
                    array_push($gamestolist, $id);
                }
            }
            echo "filter 1. Do not contain character 'a'. rejected ".$filter_1_reject_count." entries<br>";
            
            #returns false apps with invalid id, no reviews or average score less than 5
            function filterReviews($appid)
            {
                $reviewdata = json_decode(file_get_contents("https://store.steampowered.com/appreviews/".$appid."?json=1&language=all"));
                if($reviewdata -> success != 1)
                {
                    return false;
                }
                if($reviewdata -> query_summary -> num_reviews < 1)
                {
                    return false;
                }
                return ($reviewdata -> query_summary -> review_score <= 5);
            }

            $filter_2_reject_count = 0;
            foreach($gamestolist as $id)
            {
                if(!filterReviews($id))
                {
                    $filter_2_reject_count += 1;
                    continue;
                }

                #$gamedataraw = file_get_contents("https://store.steampowered.com/api/appdetails?appids=".$id);                
                #$gamedata = json_decode($gamedataraw, true);
                #echo $gamedata[$id]["data"]["name"]."<br>";
                #var_dump($gamedata->$id);
            }
            echo "filter 2. valid id, more than 0 reivews, score of at least 5. rejected ".$filter_2_reject_count." entries";


        ?>

    </head>
</html>