<?php
require_once './vendor/autoload.php';

//Makes connection with unofficial myanimelist api (https://api.jikan.moe) and returns the response
function getUsersAnimeData($url)
{
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', $url);
    return $response;
}
//Takes in the response, validates it, and returns total hours watched and all watched anime names
function parseData($response)
{
    $animeNames = array();
    $totalWatchedEpisodes = 0;
    $response = $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
    $response = json_decode($response);
    $animes = $response->anime;
    if (count($animes) < 1) return false;
    foreach ($animes as $anime) {
        $title = $anime->title;
        $watchedEpisodes = $anime->watched_episodes;
        $totalWatchedEpisodes += $watchedEpisodes;
        array_push($animeNames, $title);
    }
    $hours = 0;
    for ($i = 0; $i < $totalWatchedEpisodes; $i++) {
        /*Here we are making the BOLD assumption that each anime is 24 minutes long. Obviously this will reduce the accuracy if the user has watched longer things like OVA's.
        **Unfortunately, this api request does not include episode request, and does not allow for me to make the 100+ calls in a minute I would need to make in order to seperately query this data.*/
        $hours += .4;
    }

    return [$animeNames, $hours];
}

//Main function for calculating a weeb score
function calculateWeebness($username)
{
    $allAnimeNames = array();
    $allAnimeHours = 0;
    //Create api url string
    //example url with the username lazerbeem123456: https://api.jikan.moe/v3/user/lazerbeem123456/animelist/all/
    $i = 1;
    while (true) {
        $url = "https://api.jikan.moe/v3/user/$username/animelist/all/$i";
        $response = getUsersAnimeData($url);
        //parses api data and return an array. [0] contains an array of watched anime titles, and [1] contains a float of total hours watched
        $result = parseData($response);
        //If there is no anime in the users list on the page of i, break out of the while loop.
        if ($result == false) break;
        $i++;
        //if successful, extract data
        $allAnimeNames = array_merge($allAnimeNames, $result[0]);
        $allAnimeHours += $result[1];
    }
    echo $allAnimeHours;
}

calculateWeebness("lazerbeem123456");
