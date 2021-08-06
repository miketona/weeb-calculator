<?php
require_once './modules/htmlElements/header.php';
require_once './modules/htmlElements/footer.php';
getHeader();
?>
<div class="parallax-container">
    <div class="parallax"><img src="../assets/images/39033.png"></div>
</div>
<main class="m2 z-depth-0">
    <div id='formContainer' class='row'>
        <div class='col s12 m6'>
            <h3> How big of a weeb are you?</h3>
            <p>Type in your <a href="https://myanimelist.net/" target="_blank">myanimelist</a> username and find out how many hours you've spent watching anime</p>
            <div class="switch">
                <label>
                    Closed
                    <input id="formOneLever" type="checkbox" onclick="isChecked('singleUserForms','formOneLever')">
                    <span class="lever"></span>
                    Open
                </label>
            </div>
            <!-- <div class="container"> -->

            <div class="row">
                <!-- <h2 class="header">Horizontal Card</h2> -->
                <div class="card horizontal">
                    <!-- <div class="card-image">
                        <img src="https://lorempixel.com/100/190/nature/6">
                    </div> -->
                    <form id="singleUserForms" action="./modules/formHandler.php" method="get" class="hide col s12">

                        <div class="card-stacked">
                            <div class="card-content">
                                <div class="row">
                                    <div class="input-field col s12 m12 l6">
                                        <input required id="usernameOne" placeholder="myAnimeListUsername123" name="usernameOne" type="text" length="10">
                                        <label for="usernameOne">Myanimelist Username: </label>
                                    </div>
                                    <!-- Anime list option -->
                                    <div class="input-field col s12 m12 l6">
                                        <p>
                                            <label>
                                                <input class="displayAnimeCheckbox" name="animeList" type="checkbox" />
                                                <span>Include list of all seen anime?</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn waves-effect waves-light" type="submit" name="action">
                                    <i class="material-icons right">send</i>
                                    Full send
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
        <div class='col s12 m6'>
            <h3> Who is the bigger Weeb?</h3>
            <p>Type in two <a href="https://myanimelist.net/" target="_blank">myanimelist</a> usernames and find out who has spent more of their life watching Anime</p>
            <div class="switch right">
                <label>
                    Closed
                    <input id="formTwoLever" type="checkbox" onclick="isChecked('multiUserForms','formTwoLever')">
                    <span class="lever"></span>
                    Open
                </label>
            </div>
            <!-- <div class="container"> -->

            <div class="row right relative">
                <!-- <h2 class="header">Horizontal Card</h2> -->
                <div class="card horizontal">
                    <!-- <div class="card-image">
                        <img src="https://lorempixel.com/100/190/nature/6">
                    </div> -->
                    <form id="multiUserForms" action="./modules/formHandler.php" method="get" class="hide col s12">
                        <div class="card-stacked">
                            <div class="card-content">
                                <div class="row">
                                    <div class="input-field col s12 m12 l6">
                                        <input required id="usernameOne" placeholder="myAnimeListUsername123" name="usernameOne" type="text" length="10">
                                        <label for="usernameOne">Myanimelist Username: </label>
                                    </div>
                                    <!-- Anime list option -->
                                    <div class="input-field col s12 m12 l6">
                                        <p>
                                            <label>
                                                <input class="displayAnimeCheckbox" name="animeList" type="checkbox" />
                                                <span>Include list of all seen anime?</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn waves-effect waves-light" type="submit" name="action">
                                    <i class="material-icons right">send</i>
                                    Full send
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- </div> -->
        <!-- <form action="#">
            <p>
                <input type="checkbox" id="test5" />
                <label for="test5">Red</label>
            </p>
            <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Yellow</label>
            </p>
            <p>
                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                <label for="filled-in-box">Filled in</label>
            </p>
            <p>
                <input type="checkbox" id="test7" checked="checked" disabled="disabled" />
                <label for="test7">Green</label>
            </p>
            <p>
                <input type="checkbox" id="test8" disabled="disabled" />
                <label for="test8">Brown</label>
            </p>
        </form> -->
    </div>
</main>
<?php
getFooter();
