<?php
require 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = mysqli_real_escape_string($conn,$_POST['nickname']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Проверька, не пустое ли поле имя пользователя
    if(empty(trim($_POST["nickname"]))){
        $nickname_err = 'Please enter nickname.';
    } else{
        $nickname = trim($_POST["nickname"]);
    }

    // проверка, не пустое ли поле с паспортом
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Проверка учетных данных
    if(empty($nickname_err) && empty($password_err)){

        $sql = "SELECT nickname, password FROM users WHERE nickname = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Привязка переменных к параметрам подготавливаемого запроса
            mysqli_stmt_bind_param($stmt, "s", $param_nickname);
            // установили параметр
            $param_nickname = $nickname;

            // пробуем выполнить (ф-я Выполняет подготовленный запрос)
            if(mysqli_stmt_execute($stmt)){
                //  Передает результирующий набор запроса на клиента
                mysqli_stmt_store_result($stmt);
                // проверяем существование имени пользователя
                // (ф-я Возвращает число строк в результате запроса)
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // связываем переменные с результатом для его размещения
                    mysqli_stmt_bind_result($stmt, $nickname, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION['nickname'] = $nickname;
                            $log_msg = "<p class='message'>You are logged in.</p>";
                        } else{
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    $nickname_err = 'No account found with that nickname.';
                }
            }
        }
        mysqli_stmt_close($stmt);
    }
    // закрыли соединение
    mysqli_close($conn);
}
?>

<?php include('header.php'); ?>

<?php
if($log_msg) :
    echo $log_msg;
endif;
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="user-form">
    <ul class="user-form-list">
        <li class="list-item">
            <label for="user-login">Enter your nickname:</label>
            <input type="text" name="nickname" id="user-login">
            <? if($nickname_err) :
                echo "<p class='err'>$nickname_err</p>";
                endif;
            ?>
        </li>
        <li class="list-item">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <? if($password_err) :
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