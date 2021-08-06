<?php function getHeader()
{
?>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weeb Calculator</title>
    <meta name="description" content="A web app that calculates how much of a weeb you are">
    <meta name="author" content="SitePoint">
    <link rel="icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="/style.css">
    <!-- <link href="/tailwind.css" rel="stylesheet"> -->

    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </head>

  <body>

    <!-- <head>
      <div id='headerDiv' class=" card-panel teal lighten-2 m2 z-depth-5">
        <div class='white-text'>
          <h1 class='text-white leading-tight'>Weeb Calculator</h1>
          <p class="grey-text text-lighten-4">How much of your life have you spent watching anime?</p>
        </div>
      </div>
    </head> -->
    <header>
      <nav class=' teal lighten-2 m2'>
        <div class="container">
          <div class="nav-wrapper">
            <a href="/index.php" class="brand-logo">Weeb Calculator</a>
          </div>
        </div>
      </nav>
    </header>
  <?php
}
