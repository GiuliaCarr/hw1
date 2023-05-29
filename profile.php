<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}
?>



<html>


<?php
$userid = $_SESSION['id'];

$conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);
$userid = mysqli_real_escape_string($conn, $userid);
$query = "SELECT * FROM users WHERE id = $userid";
$res_1 = mysqli_query($conn, $query);
$userinfo = mysqli_fetch_assoc($res_1);
?>

<head>
    <link rel='stylesheet' href='profile.css'>
    <script src='profile.js' defer="true"></script>
    <link rel="shortcut icon" href="images/teyvapp.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Fjalla+One&family=Lobster&display=swap"
        rel="stylesheet">

    <title>TeyvApp -
        <?php echo $userinfo['name'] . " " . $userinfo['surname'] ?>
    </title>
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
    <header id="default">
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
        <div id="idpropic"><img id="propic" src="images/defaultpropic.jpg"></div>
        <h1 id="name">
            <?php echo $userinfo['name'] . " " . $userinfo['surname'] ?>
        </h1>
        <img id="modify" src="images/modify.png">
    </header>
    <div id="modifyProfile" class="hidden">
        <form>
            <a>Choose your profile pic</a>
            <select name='tipo' id="tipo">
                <option value="albedo">Albedo</option>
                <option value="aloy">Aloy</option>
                <option value="arataki-itto">Arataki Itto</option>
                <option value="amber">Amber</option>
                <option value="ayaka">Ayaka</option>
                <option value="ayato">Ayato</option>
                <option value="barbara">Barbara</option>
                <option value="beidou">Beidou</option>
                <option value="bennett">Bennett</option>
                <option value="chongyun">Chongyun</option>
                <option value="collei">Collei</option>
                <option value="diluc">Diluc</option>
                <option value="diona">Diona</option>
                <option value="eula">Eula</option>
                <option value="fischl">Fischl</option>
                <option value="ganyu">Ganyu</option>
                <option value="gorou">Gorou</option>
                <option value="hu-tao">Hu Tao</option>
                <option value="jean">Jean</option>
                <option value="kaeya">Kaeya</option>
                <option value="kazuha">Kaedahara Kazuha</option>
                <option value="keqing">Keqing</option>
                <option value="klee">Klee</option>
                <option value="kokomi">Sangonomiya Kokomi</option>
                <option value="kuki-shinobu">Kuki Shinobu</option>
                <option value="lisa">Lisa</option>
                <option value="ningguang">Ningguang</option>
                <option value="noelle">Noelle</option>
                <option value="mona">Mona</option>
                <option value="qiqi">Qiqi</option>
                <option value="raiden">Shogun Raiden</option>
                <option value="razor">Razor</option>
                <option value="rosaria">Rosaria</option>
                <option value="mona">Mona</option>
                <option value="sara">Kujou Sara</option>
                <option value="sayu">Sayu</option>
                <option value="shenhe">Shenhe</option>
                <option value="shikanoin-heizou">Shikanoin Heizou</option>
                <option value="sucrose">Sucrose</option>
                <option value="tartaglia">tartaglia</option>
                <option value="thoma">Thoma</option>
                <option value="tighnari">Tighnari</option>
                <option value="traveler-anemo">Traveler</option>
                <option value="venti">Venti</option>
                <option value="xiangling">Xiangling</option>
                <option value="xiao">Xiao</option>
                <option value="xingqiu">Xingqiu</option>
                <option value="xinyan">Xinyan</option>
                <option value="yae-miko">Yae Miko</option>
                <option value="yanfei">Yanfei</option>
                <option value="yelan">Yelan</option>
                <option value="yoimiya">Yoimiya</option>
                <option value="yun-jin">Yun Jin</option>
                <option value="zhongli">Zhongli</option>



            </select>
            <div id="savechanges"> Save Changes</div>
        </form>
    </div>
    <h1 id="favorites"> Your preferences: </h1>
    <div id="choose">
        <div id="streams"> Streams </div>
        <div id="break"></div>
        <div id="chars"> Characters</div>
    </div>

    <section id="preferences">


    </section>

    <section id="results">

    </section>

</body>



</html>