<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}
?>


<html>

<head>
    <title> TeyvApp - Characters </title>
    <script src='char.js' defer="true"></script>
    <link rel="shortcut icon" href="images/teyvapp.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='characters.css'>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fjalla+One&family=Lobster&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">
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

        <h1 id="Titolo">Characters</h1>

    </header>
    <section id="ricerca">

        <form action="searchapigenshin.php" id="search">

            <p>
                <label>Search<input id="searchbar" type='text' name="character">
                    <input id="sub" type='submit' value='Submit'><img id="alert" src="images/alert.png"></label>
            <div id="dash"> <span class="hidden"> Tip: Try to insert dash instead of space like: Hu-Tao instead of Hu
                    Tao</span></div>
            </p>


        </form>

    </section>
    <section id="results">

    </section>

    <div id="separatore"></div>

    <section id="container">

    </section>


</body>

</html>