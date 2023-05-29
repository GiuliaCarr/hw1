<?php
require_once 'auth.php';

if (checkAuth()) {
    header("Location: home.php");
    exit;
}

if (
    !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) &&
    !empty($_POST["surname"]) && !empty($_POST["confirm_password"]) && !empty($_POST["allow"])
) {
    $error = array();
    $conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']) or die(mysqli_error($conn));



    if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Unvalid username";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $query = "SELECT username FROM users WHERE username =  '" . $username . "'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username not available";
        }
    }
    
    if (strlen($_POST["password"]) < 8) {
        $error[] = "Your password is too short.";
    }

    if (strcmp($_POST["password"], $_POST["confirm_password"]) !== 0) {
        $error[] = "Passwords do not match";
    }
   
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "This email is invalid. Make sure you wrote something like example@email.com";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email =  '" . $email . "'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "This email is already taken";
        }
    }

   
    if (count($error) === 0) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";

        if (mysqli_query($conn, $query)) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["id"] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("Location: home.php");
            exit;
        } else {
            $error[] = "Error Establishing a Database Connection";
        }
    }

    mysqli_close($conn);
} else if (isset($_POST["username"])) {
    $error = array("Please fill out all fields");
}

?>


<html>

<head>
    <title>Subscribe - TeyvApp</title>
    <link rel='stylesheet' href='signup.css'>
    <script src='signup.js' defer="true"></script>
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/teyvapp.png" type="image/x-icon">


</head>

<body>

    <main>
        <form name='signup' method='post'>
            <div> <img id="icona" src="images/teyvapp.png"></div>
            <h1>Sign up for free to start using TeyvApp</h1>

            <p class="name">
                <label>Name <br>
                    <input type='text' name='name' <?php if (isset($_POST["name"])) {
                        echo "value=" . $_POST["name"];
                    } ?>>

                    <div id="name" class="hidden"> <img src="images/error.png" /> <span> Write your name</span> </div>
                </label>
            </p>
            <p class="surname">
                <label>Surname<br>
                    <input type='text' name='surname' <?php if (isset($_POST["surname"])) {
                        echo "value=" . $_POST["surname"];
                    } ?>>

                    <div id="surname" class="hidden"> <img src="images/error.png" /> <span> Write your surname</span></div>
                </label>

            </p>

            <p class="username">
                <label>Username<br>
                    <input type='text' name='username' <?php if (isset($_POST["username"])) {
                        echo "value=" . $_POST["username"];
                    } ?>></label>
            <div id="username" class="hidden"> <img src="images/error.png" /> <span> Username not available</span></div>

            </p>
            <p class="email">
                <label>Email<br><input type='text' name='email' <?php if (isset($_POST["email"])) {
                    echo "value=" . $_POST["email"];
                } ?>></label>

            <div id="email" class="hidden"> <img src="images/error.png" /> <span> Invalid email</span></div>
            </p>
            <p class="password">
                <label>Password<br><input type='password' name='password' <?php if (isset($_POST["password"])) {
                    echo "value=" . $_POST["password"];
                } ?>></label>

            <div id="password" class="hidden"> <img src="images/error.png" /> <span > Password is too short</span></div>
            </p>
            <p class="confirm_password">
                <label>Confirm Password<br><input type='password' name='confirm_password' <?php if (isset($_POST["confirm_password"])) {
                    echo "value=" . $_POST["confirm_password"];
                } ?>></label>

            <div id="confirm_password" class="hidden"> <img src="images/error.png" /> <span  > Passwords do not match</span></div>
            </p>
            <p class="allow">

                <label> <input type='checkbox' name='allow' value="1" <?php if (isset($_POST["allow"])) {
                    echo $_POST["allow"] ? "checked" : "";
                } ?>> By clicking, you agree to teyvApp's terms and conditions
                    of use. </label>
            </p>
            <?php
            if (isset($error)) {
                foreach ($error as $err) {
                    echo "<div class='error'><img src='images/error.png'/><span>$err</span></div>";
                }
            } ?>
            <div class="submit">
                <input type='submit' value="Subscribe" id="submit">
            </div>
            <div class="signup">Do you have an account? <a id="log" href="login.php">Login</a>
        </form>

        </section>
    </main>
</body>

</html>