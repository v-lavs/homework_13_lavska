<?php
require 'config.php';

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty(trim($_POST["nickname"]))) {
        $nickname_err = 'Please enter nickname.';
    } else {
        $nickname = trim($_POST["nickname"]);
    }

    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }

    $hashed_password = md5($password);

    $result = $conn->query("SELECT * FROM `users` WHERE `nickname` = '$nickname' AND `password` = '$hashed_password'");
    $user = $result->fetch_array();
//    var_dump( $user);

    if ($user) {
        $isLoggedIn = true;
        $_SESSION['nickname'] = $nickname;
        $log_msg = "<p class='message'>You are logged in.</p>";
    } else {
        $isLoggedIn = false;
        $password_err = 'The password you entered was not valid.';
        $nickname_err = 'No account found with that nickname.';
    }
    $conn->close();
}

?>

<?php include ('header.php'); ?>

<?php
if ($log_msg) :
echo $log_msg;
endif;
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="user-form">
    <ul class="user-form-list">
        <li class="list-item">
            <label for="user-login">Enter your nickname:</label>
            <input type="text" name="nickname" id="user-login">
            <?php if($nickname_err) :
                echo "<p class='err'>$nickname_err</p>";
                endif;
            ?>
        </li>
        <li class="list-item">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <?php if($password_err) :
                echo "<p class='err'>$password_err</p>";
            endif;
            ?>
        </li>
        <li class="list-item submit">
            <button type="submit">Sign In</button>
        </li>
    </ul>
</form>
</body>
</html>