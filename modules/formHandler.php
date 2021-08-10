<?php
require_once '../modules/htmlElements/header.php';
require_once '../modules/htmlElements/footer.php';
require_once './functions.php';
getHeader();
function main()
{
    $userOne = $_GET['usernameOne'];
    $userTwo = '';
    //if doubleUserForm
    if ($_GET['usernameTwo']) {
        $userOneData = calculateWeebness($userOne);
        sleep(1);
        return array_merge($userOneData, calculateWeebness($_GET['usernameTwo']));
    }

    return calculateWeebness($userOne);
}

$usersData = main();
//two users or one?
count($usersData) == 1 ? $type = 1 : $type = 2;

//HTML
?>
<br>
<div class='back'>
    <a href="https://weeb-calculator.herokuapp.com/" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
</div>

<?php
if ($type !== 1) {

    echo '<div id = "verdict">';
    //who is the bigger weeb?
    $usersData[0][0] > $usersData[2][0] ? $winner = $usersData[0][2] : $winner = $usersData[1][2];
    echo "<h4>THE BIGGEST WEEB IS $winner</h4>";

    echo '</div>';
}
echo '<div class="collection">';

foreach ($usersData as $data) {
?>
    <div class="dataContainer <?php echo $type; ?>">
        <div class=" scoreContainer">
            <h4> <?php echo $data[2]; ?></h4>
            <h6>Weeb Data:</h6>
            <ul>
                <li>Hours watched: <?php echo ceil($data[1]); ?></li>
                <li>Days watched: <?php $days = ceil($data[1] / 24);
                                    echo $days; ?></li>
                <li>Weeks watched: <?php echo $days / 7 ?></li>

            </ul>
        </div>
        <?php if ($_GET['animeList'] == 'on') { ?>
            <div class='animeList'>
                <h4>List of all watched anime:</h4>
                <ul>
                    <div class='row'>
                        <?php
                        foreach ($data[0] as $animeData) {
                        ?>
                            <div class='col s12 m6'>
                                <?php
                                echo "<a class='black-text' target='_blank' href = '$animeData[2]' ><li class='collection-item avatar animeName' id='$animeData[1]'>"; ?>
                                <img src="<?php echo $animeData[3]; ?>" alt="" class="circle">
                                <span class="title black-text"><?php echo $animeData[0]; ?></span> </br>
                                <p class="black-text"> You watched <?php echo $animeData[4] . '/' . $animeData[5]; ?></p>
                                <?php
                                //give star to finished anime
                                if ($animeData[4] == $animeData[5])  echo '<a href="#!" class="secondary-content"><i class="material-icons">star</i></a>';
                                ?>
                                </li>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </ul>
            </div>
        <?php } ?>
    </div>
<?php
    //                    //https://media.kitsu.io/anime/poster_images/738/medium.jpg?1408442165

}
echo "</div>";

getFooter();
