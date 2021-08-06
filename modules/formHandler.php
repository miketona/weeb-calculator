<?php
require_once '../modules/htmlElements/header.php';
require_once '../modules/htmlElements/footer.php';
require_once '../functions.php';
getHeader();
// function handleSingleUserForm($user)
// {
//     return calculateWeebness($user);
// }

//logic
function handleDoubleUserForm()
{
}

function main()
{
    $userOne = $_GET['usernameOne'];
    $userTwo = '';
    //if doubleUserForm
    if ($_GET['usernameTwo'])
        return handleDoubleUserForm($userOne, $_GET['usernamewo']);

    return calculateWeebness($userOne);
}

$usersData = main();
//two users or one?
count($usersData) == 1 ? $type = 1 : $type = 2;

//HTML
?>
<div class='back'>
    <a href="http://localhost:3000/" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back</a>
</div>

<?php
echo '<div class="collection">';
foreach ($usersData as $data) {
    //get thumbnail https://kitsu.io/api/edge/anime/id
?>
    <div id="dataContainer" class="<?php echo $type; ?>">
        <div class=" scoreContainer">
            <h4>Total Hours Watched:</h4>
            <p><?php echo ceil($data[1]); ?></p>
        </div>
        <div class='animeList'>
            <h4>List of all watched anime:</h4>
            <ul>
                <div class='row'>
                    <?php
                    foreach ($data[0] as $animeData) {
                    ?>
                        <div class='col s12 m6'>
                            <?php
                            echo "<li class='collection-item avatar animeName' id='$animeData[1]'>"; ?>
                            <img src="<?php echo $animeData[3]; ?>" alt="" class="circle">
                            <span class="title"><?php echo $animeData[0]; ?></span> </br>
                            <p> You watched <?php echo $animeData[4] . '/' . $animeData[5]; ?></p>
                            <a href="<?php echo $animeData[2]; ?>" class="secondary-content"><i class="material-icons">send</i></a>
                            </li>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </ul>
        </div>
    </div>
<?php
    //                    //https://media.kitsu.io/anime/poster_images/738/medium.jpg?1408442165

}
echo "</div>";

getFooter();
