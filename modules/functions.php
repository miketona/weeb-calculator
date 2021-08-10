<?php
require_once '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
//Makes connection with unofficial myanimelist api (https://api.jikan.moe) and returns the response
function getUsersAnimeData($url, $username)
{
    // $client = new GuzzleHttp\Client();
    $client =  new \GuzzleHttp\Client(['verify' => false]);
    try {
        $response = $client->request('GET', $url);
    } catch (RequestException  $e) {
        if ($e->hasResponse()) {
            // invalid username in query
            if ($e->getResponse()->getStatusCode() == '400') {
?>
                <div class="errorMessage">
                    <p>ERROR: <?php echo $username ?> is not a valid username. Please try again with a different username.</p>
                </div>
        <?php
                die();
            }
        }
    } catch (\Exception $e) {

        // There was a different exception. Likely that the api or myanimelist itself is down.
        ?>
        <div class="errorMessage">
            <p>ERROR: <?php echo $username ?>There was an error with this query, please try again later.</p>
        </div>
    <?php
        die();
    }
    if ($response->getStatusCode() !== 200) return false;
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
        $id = $anime->mal_id;
        $title = $anime->title;
        $url = $anime->url;
        $img = $anime->image_url;
        $watchedEpisodes = $anime->watched_episodes;
        $totalEpisodes = $anime->total_episodes;
        $totalWatchedEpisodes += $watchedEpisodes;
        array_push($animeNames, [$title, $id, $url, $img,  $watchedEpisodes, $totalEpisodes]);
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
    //main query loop - some users who are biiiig weebs have multiple pages of anime
    while (true) {
        $url = "https://api.jikan.moe/v3/user/$username/animelist/all/$i";
        $response = getUsersAnimeData($url, $username);
        //parses api data and return an array. [0] contains an array of watched anime titles, and [1] contains a float of total hours watched
        $result = parseData($response);
        //If there is no anime in the users list on the page of i, break out of the while loop.
        if ($result == false) break;
        //if successful, extract data
        $allAnimeNames = array_merge($allAnimeNames, $result[0]);
        $allAnimeHours += $result[1];
        //API has a max request of 2 calls per second, so lets make sure we take a break every two calls. This shouldn't be a big issue, because most users I tested this on did not have over 1 /all/ page. And even the api example user "Nekomata1037" only has 4
        if ($i % 2 == 0) sleep(1);
        // API has a max request of 30 a minute. I don't even know if myanimelist has over 30 api pages of anime... but better to be safe instead of get an ip blocked.
        if ($i == 30) sleep(60);
        $i++;
    }
    /*If user exists, but does not have any logged anime*/
    if ($i == 1) {
    ?>
        <div class="errorMessage">
            <p>User does not have any logged anime.</p>
        </div>
<?php
        die();
    }

    return [[$allAnimeNames, $allAnimeHours, $username]];
}
