<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}

?>


<html>

<head>

    <title>TeyvApp - Twitch</title>
    <link rel="stylesheet" href="twitch.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="twitch.js" defer="true"></script>
    <link rel="shortcut icon" href="images/teyvapp.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fjalla+One&family=Lobster&display=swap"
        rel="stylesheet">

</head>


<body>
    <div id="minimenu" class="offmenu">

        <img id="esc" src="images/esc.png">

        <a class="char" href='characters.php' class="Button">CHARACTERS</a>
        <a class="vis" href='visions.php' class="Button">VISIONS</a>
        <a class="tw" href='twitch.php' class="Button">GAMING ZONE</a>
        <a class="profile" href='profile.php' class="Button">MY PROFILE</a>
        <a class="about" href='about.php' class="Button">ABOUT US</a>
        <a href='logout.php' class="log">LOG OUT</a>

    </div>
    <header>
        <div id="Overlay"> </div>
        <div id="nome">
            <img id="logo" src="images/teyvapp.png">
            <a id="home" href='home.php'>TeyvApp</a>
        </div>
        <nav>

            <div id="options">
                <a class="char" href='characters.php' class="Button">CHARACTERS</a>
                <a class="vis" href='visions.php' class="Button">VISIONS</a>
                <a class="tw" href='twitch.php' class="Button">GAMING ZONE</a>
                <a class="profile" href='profile.php' class="Button">MY PROFILE</a>
                <a class="about" href='about.php' class="Button">ABOUT US</a>
                <a href='logout.php' class="log">LOG OUT</a>
            </div>

        </nav>
        <div id="laterale">

            <img id="menu" src="images/sidebar.png">
        </div>

        <h1 id="Titolo">GAMING ZONE</h1>

    </header>
    <div id="break"><span> Discover new streamers every day! <br> Save your favorite streamers!</span></div>

    <div id="divide"></div>
    <section id="results"></section>
</body>

</html>