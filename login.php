<?php
include 'auth.php';
if (checkAuth()) {
    header('Location: home.php');
    exit;
}


if (!empty($_POST["username"]) && !empty($_POST["password"])) {

    $conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']) or die(mysqli_error($conn));


    $username = mysqli_real_escape_string($conn, $_POST["username"]);


    $query = "SELECT * FROM users WHERE username = '" . $username . "'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        $entry = mysqli_fetch_assoc($res);

        if (password_verify($_POST['password'], $entry['password'])) {


            $_SESSION["username"] = $entry['username'];
            $_SESSION["id"] = $entry['id'];

            header("Location: home.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }


    $error = "Wrong username and/or password.";


} else if (isset($_POST["username"]) || isset($_POST["password"])) {

    $error = "Enter your username and password";
}

?>


<html>

<head>
    <title> Login - TeyvApp</title>
    <link rel="stylesheet" href="login.css">
    <script src='login.js' defer="true"></script>
    <link rel="shortcut icon" href="images/teyvapp.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


    <main>

        <form name='login_form' method='post'>
            <img id="logo" src="images/teyvapp.png">
            <a id="signIn"> Sign in to TeyvApp</a>

            <p class="username">
                <label>Username <br><input type='text' name='username' <?php if (isset($_POST["username"])) {
                    echo "value=" . $_POST["username"];
                } ?>><div id="username" class="hidden"> <img src="images/error.png" /> <span>Write your username.</span>
                    </div>
                </label>

            </p>
            <p class="password">
                <label>Password <br><input type='password' name='password' <?php if (isset($_POST["password"])) {
                    echo "value=" . $_POST["password"];
                } ?>><div id="password" class="hidden"> <img src="images/error.png" /> <span> Write your password.
                            </span></div>
                </label>

            </p>
            <?php

            if (isset($error)) {
                echo "<p class='error'> $error</p>";
            }
            ?>
            <p id="enter">
                <label>&nbsp;<input type='submit' value='Log In'></label>
            </p>
            <span>Do not have an account?</span><a id="sign"href="signup.php">Sign up</a>
        </form>
    </main>
</body>

</html>