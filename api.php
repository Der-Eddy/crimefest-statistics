<?php
//I hate the Steam API
$json_object = file_get_contents("http://api.steampowered.com/ISteamUserStats/GetGlobalStatsForGame/v0001/?appid=218620&count=12&name[0]=crimefest_challenge_chains_1&name[1]=crimefest_challenge_dallas_1&name[2]=crimefest_challenge_clover_1&name[3]=crimefest_challenge_houston_1&name[4]=crimefest_challenge_chains_2&name[5]=crimefest_challenge_dallas_2&name[6]=crimefest_challenge_clover_2&name[7]=crimefest_challenge_houston_2&name[8]=crimefest_challenge_chains_3&name[9]=crimefest_challenge_dallas_3&name[10]=crimefest_challenge_clover_3&name[11]=crimefest_challenge_houston_3");
echo $json_object;
?>