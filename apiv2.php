<?php
    //I hate the Steam API
    
    //This is for caching, since Steam will ban my server if they got too many requests from it
    function get_content($file,$url,$seconds = 10,$fn = '',$fn_args = '') {
        
        $current_time = time(); $expire_time = $seconds; $file_time = filemtime($file);
        
        if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
            
            return file_get_contents($file);
        }
        else {
            $content = file_get_contents($url);
            if($fn) { $content = $fn($content,$fn_args); }
            file_put_contents($file,$content);
            return $content;
        }
    }

    $json_object = get_content("api.json", "http://api.steampowered.com/ISteamUserStats/GetGlobalStatsForGame/v0001/?appid=218620&count=15&name[0]=crimefest_challenge_chains_1&name[1]=crimefest_challenge_dallas_1&name[2]=crimefest_challenge_clover_1&name[3]=crimefest_challenge_houston_1&name[4]=crimefest_challenge_chains_2&name[5]=crimefest_challenge_dallas_2&name[6]=crimefest_challenge_clover_2&name[7]=crimefest_challenge_houston_2&name[8]=crimefest_challenge_chains_3&name[9]=crimefest_challenge_dallas_3&name[10]=crimefest_challenge_clover_3&name[11]=crimefest_challenge_houston_3&name[12]=crimefest_challenge_chains_4&name[13]=crimefest_challenge_clover_4&name[14]=crimefest_challenge_houston_4");
    $current_player = json_decode(get_content("currentPlayer.json", "http://api.steampowered.com/ISteamUserStats/GetNumberOfCurrentPlayers/v0001/?appid=218620"), true);
    $max_player = json_decode(file_get_contents("maxPlayer.json"), true);
    if ($max_player["response"]["player_count"] < $current_player["response"]["player_count"]){
        file_put_contents("maxPlayer.json", json_encode($current_player));
    }
    echo $json_object;
?>