<?php

    require_once("./includes/init.php");

    if(!$auth->IsUserLoggedIn())
    {
        header("Location: ".$auth->GetLoginURL());
    }
    else
    {
        session_start();

        //Api key needed 
        $api_key = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
        $steamid = "76561197970595999";
        $url = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$api_key.'&steamids='.$steamid);
        $json = json_decode($url, true);

        $_SESSION["steamid"] = $json['response']['players'][0]['steamid'];
        $_SESSION["username"] = $json['response']['players'][0]['personaname'];
        $_SESSION["avatar"] = $json['response']['players'][0]['avatarfull'];
        $_SESSION['logged_in'] = true;

        header('Location: /SteamProject/index.php');
    }
?>