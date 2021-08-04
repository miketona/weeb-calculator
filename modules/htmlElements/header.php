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
    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <!-- Tailwind Css library!-->
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css" rel="stylesheet">

  </head>

  <body>

    <head>
      <div id='headerDiv' class="flex  bg-black flex-col justify-center">
        <div class='w-10/12	bg-blue-700 mx-auto	'>
          <h1 class='text-white leading-tight'>Weeb Calculator</h1>
          <p class="text-white">How much of your life have you spent watching anime?</p>
        </div>
      </div>
    </head>
  <?php
}
