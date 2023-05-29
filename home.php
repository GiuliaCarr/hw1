<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>TeyvApp</title>
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="script.js" defer="true"></script>

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
            <span>TeyvApp</span>
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

        <h1 id="Titolo">Hello fellow traveler!</h1>
        <h3 id="sottotitolo"> What are you looking for?</h3>

    </header>

    <section id="vision">

        <img class="vision" src="images/anemo.gif">
        <img class="vision" src="images/geo.gif">
        <img class="vision" src="images/electro.gif">
        <img class="vision" src="images/dendro.gif">
        <img id="allvisions" class="vision" src="images/allvisions.gif">
        <img class="vision" src="images/hydro.gif">
        <img class="vision" src="images/pyro.gif">
        <img class="vision" src="images/cryo.gif">

    </section>

    <section id="contenitore">

        <div id="destro1"><span class="tHome">Discover all the visions</span> <br>
            <span class="descHome"> What are the visions? What kind of visions we know? <br></span>
            How do people obtain them?
        </div> <br>

        <div id="one" class="separate"></div>

        <div id="sinistro1"><span class="tHome">Meet all the heroes</span> <br>
            <span class="descHome"> What vision do they have? What weapon do they use? <br></span>
            How much rare are them to find?
        </div> <br>
        <div id="two" class="separate"></div>

        <div id="destro2"><span class="tHome">Custom your profile</span> <br>
            <span class="descHome"> Choose your favorite characters. What do u have? <br></span>
            Add a description
        </div> <br>
        <div id="three" class="separate"></div>

        <div id="sinistro2"><span class="tHome">Join our streamers on Twitch</span> <br>
            <span class="descHome"> Follow the channels who play Genshin Impact. Enjoy the stream <br></span>
            Discover all the secrets of the game.
        </div> <br>


    </section>


    <footer> <a>TeyvApp - The App of Teyvat</a></footer>
</body>

</html>