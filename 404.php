<?php
//404 error handler
require_once './modules/htmlElements/header.php';
require_once './modules/htmlElements/footer.php';
getHeader();
?>
<div class="parallax-container">
    <div class='container'>
        <h2 class="white-text">404 ERROR:</h2>
        <h4 class="white-text">Sorry, www.weeb-calculator.herokuapp.com<?php echo $_SERVER['REQUEST_URI']; ?> does not exist.<br></h4>
    </div>
    <div class="parallax"><img src="../assets/images/44772.jpg"> </p>
    </div>
</div>
<?php
getFooter();
