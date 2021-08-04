<?php
require_once './modules/htmlElements/header.php';
require_once './modules/htmlElements/footer.php';
require_once './functions.php';
getUser();
getHeader();
echo 'helloWorld';
?>
<main>
    <div id='app'>
        <button onlcick=id='.SingleStats' class='button'>Get your Weeb Score</button>
        <form action="./modules/singleFormHandle.php" method="get">
            <div class="field">
                <label for="username" class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" name="userName" placeholder="Text input">
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</main>
<?php
getFooter();
