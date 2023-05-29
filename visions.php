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
    <title>TeyvApp - Visions</title>
    <link rel="stylesheet" href="visions.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="visions.js" defer="true"></script>
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

        <h1 id="Titolo">Visions</h1>


    </header>

    <section id="vision">

        <div class="vision" id="pyro">
            <img src="images/pyro.png">
            <h1> Pyro</h1>
            <p>The Pyro element represents the power of fire.
                Pyro characters possess fire-based abilities and attacks,
                dealing high damage and inflicting burning effects on enemies.
                The Pyro element is associated with the nation of Natlan, inspired
                by Mesoamerican culture, and is governed by the Pyro Archon Murata.
                Pyro embodies passion, fervor, and determination, making it a
                powerful and dynamic elemental force in the game.</p>
        </div>
        <div class="vision" id="hydro">
            <img src="images/hydro.png">
            <h1>Hydro</h1>
            <p>The Hydro element represents the power of water. Hydro characters possess abilities
                and attacks that harness water-based attacks and manipulations. The Hydro element is associated with the
                nation of Fontaine, a region inspired by French culture. The ruler of the Hydro element, the Hydro
                Archon, is known as Focalors.

                Hydro abilities excel in creating water-based effects, such as summoning water projectiles, creating
                healing and restorative abilities, and applying Hydro status to enemies. Hydro can also interact with
                other elements, forming elemental reactions like Vaporize and Freeze, which amplify damage and provide
                crowd control effects.

                Hydro characters are often depicted as calm and serene individuals, reflecting the fluid and adaptable
                nature of water.
            </p>
        </div>
        <div class="vision" id="anemo">
            <img src="images/anemo.png">
            <h1> Anemo</h1>
            <p>The Anemo element represents the power of wind. Anemo characters possess abilities and
                attacks that harness the force of wind to control and manipulate their surroundings. The Anemo element
                is associated with the nation of Mondstadt, a region inspired by German culture. It is
                governed by the Anemo Archon, Barbatos, also known as Venti. Anemo abilities are known for their
                mobility and crowd control effects, allowing characters to create gusts of wind, launch enemies into the
                air, and create updrafts for gliding. Anemo characters are often depicted as free-spirited and agile,
                reflecting the dynamic and ever-changing nature of wind. Anemo is also an essential element for
                activating elemental reactions, amplifying the power of other elements when combined.</p>
        </div>
        <div class="vision" id="electro">
            <img src="images/electro.png">
            <h1> Electro</h1>
            <p>The Electro element represents the power of electricity. Electro characters possess
                abilities and attacks that harness electrical energy to deliver powerful shocks and chain lightning
                effects. The Electro element is associated with the nation of Inazuma, a region heavily inspired by
                Japanese culture and ruled by the Electro Archon, Raiden Shogun. Electro abilities are known for their
                versatility, allowing characters to deal damage, apply status effects, and manipulate the battlefield.
                Electro attacks can also disrupt enemy formations and inflict Electro-Charged reactions with other
                elements. Electro characters are often depicted as quick and agile, reflecting the fast and
                unpredictable nature of electricity.</p>
        </div>
        <div class="vision" id="dendro">
            <img src="images/dendro.png">
            <h1>Dendro</h1>
            <p>The Dendro element is represented by a vibrant green color, Dendro is associated with nature, plants, and
                the life
                force that flows through all living things.

                As an elemental power, Dendro is characterized by its ability to manipulate and harness the energy of
                plants and vegetation. Dendro-based characters and abilities often revolve around the themes of growth,
                healing, and nature's destructive forces.


                Due to its affinity with plants, the Dendro element has unique interactions with other elements in
                Genshin Impact. When combined with the Pyro element, Dendro can cause burning effects. Additionally,
                Dendro has a strong interaction with the Hydro element, as it can
                cause the Bloom reaction, creating a powerful burst of seeds and dealing increased damage.</p>
        </div>
        <div class="vision" id="cryo">
            <img src="images/cryo.png">
            <h1> Cryo</h1>
            <p>The Cryo element represents the power of ice. Cryo characters possess abilities and
                attacks that manipulate ice and freezing effects. The Cryo element is associated with the nation of
                Snezhnaya, a region inspired by Eastern European culture. It is governed by the Cryo Archon, who is
                known as the Tsaritsa. Cryo abilities are known for their ability to freeze enemies, slowing them down
                and
                reducing their movement. Additionally, Cryo is effective against Hydro, as it can freeze water and
                create platforms to traverse bodies of water. Cryo characters are often depicted as calm and composed
                individuals, reflecting the cool and serene nature of ice.</p>
        </div>
        <div class="vision" id="geo">
            <img src="images/geo.png">
            <h1>Geo</h1>
            <p>The Geo element represents the power of earth and stone. Geo characters possess
                abilities and attacks that manipulate the earth's energy, creating constructs and shields. The Geo
                element is associated with the nation of Liyue, a region inspired by
                Chinese culture. It is governed by the Geo Archon, Morax, also known as Zhongli. Geo characters are
                often depicted as steadfast and
                grounded, reflecting the stability and resilience of the earth. The Geo element is particularly
                effective against enemy shields and can cause Crystallize reactions with other elements, providing
                additional defensive benefits</p>
        </div>
    </section>


</body>