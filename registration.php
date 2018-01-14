<?php
require 'config.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    заекранировали от нежелательных символов/Возвращает экранированную строку - mysqli_real_escape_string,
// тестирует инпуты на условия ввода - test_input
    $user_name = mysqli_real_escape_string($conn, test_input($_POST['user_name']));
    $last_name = mysqli_real_escape_string($conn, test_input($_POST['last_name']));
    $age = mysqli_real_escape_string($conn, test_input($_POST['age']));
    $gender = mysqli_real_escape_string($conn, test_input($_POST['gender']));
    $hobbies = mysqli_real_escape_string($conn, test_input($_POST['hobbies']));
    $nickname = mysqli_real_escape_string($conn, test_input($_POST ['nickname']));
    $birthday = mysqli_real_escape_string($conn, test_input($_POST['birthday']));
    $card_number = mysqli_real_escape_string($conn, test_input($_POST['card_number']));

    $password = mysqli_real_escape_string($conn, test_input($_POST['password']));
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $myself = mysqli_real_escape_string($conn, test_input($_POST['myself']));
    $category = mysqli_real_escape_string($conn, test_input($_POST['category']));

    //обработка сообщений ошибок для юзера
    if (!preg_match("/^[a-zA-Z ]*$/", $user_name)) {
        $user_name_err = "Only letters and white space allowed";
    }
    if (empty($user_name)) {
        $user_name_err = 'Please enter your name.';
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $last_name_err = "Only letters and white space allowed";
    }
    if (empty($last_name)) {
        $last_name_err = 'Please enter your last name.';
    }

    if (empty($nickname)) {
        $nickname_err = 'Please enter your nickname.';
    }

    if (strlen($password) < 6) {
        $password_err = 'Password is at least 6 characters long';
    }
    if (empty($password)) {
        $password_err = 'Please enter your password.';
    }


//вставляем в мою таблицу в столбци значения с полей формы
    $sql = "INSERT INTO users (user_name, last_name, age, gender, hobbies, nickname, birthday, card_number,
 password, myself, category) 
            VALUES (\"$user_name\", \"$last_name\",\"$age\", \"$gender\", \"$hobbies\", \"$nickname\", \"$birthday\", 
            \"$card_number\", \"$hashed_password\", \"$myself\", \"$category\")";

// проверяем чтоб небыли пустыми поля, если  переменные не ошибки, т.е. существуют  - подключаем к базе
    if (!$user_name_err and !$last_name_err and !$nickname_err and !$password_err) {
        if ($conn->query($sql) === TRUE) {
            $success_msg = "<p class='message'>You are successfully registered. <a href='login.php'>Please Log In.</a></p>";
            $user_name = $last_name = $gender = $hobbies = $nickname = $birthday = $card_number = $password = $myself = $category = '';
        } else {
            echo "<h5>Something went wrong</h5>";
            echo "<p>Error: " . $sql . "<br>" . $conn->error . '</p>';
        }
        $conn->close();
    }
}


?>

<?php include('header.php'); ?>
<!--вывод меседжа-->
<?php if ($success_msg):
    echo $success_msg;
endif;
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user-form">
    <ul class="user-form-list">
        <li class="list-item">
            <label for="user-name">Name:</label>
            <input type="text" name="user_name" id="user-name" value="<?php echo $user_name; ?>">
            <? if ($user_name_err) :
                echo "<p class='err'>$user_name_err</p>";
            endif;
            ?>
        </li>
        <li class="list-item">
            <label for="user-last-name">Last name:</label>
            <input type="text" name="last_name" id="user-last-name" value="<?php echo $last_name; ?>">
            <? if ($last_name_err) :
                echo "<p class='err'>$last_name_err</p>";
            endif;
            ?>
        </li>
        <li class="list-item">
            <label for="nickname">Nickname:</label>
            <input type="text" name="nickname" id="nickname" value="<?php echo $nickname; ?>">
            <? if ($user_name_err) :
                echo "<p class='err'>$nickname_err</p>";
            endif;
            ?>
        </li>
        <li class="list-item">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $password; ?>">
            <? if ($password_err) :
                echo "<p class='err'>$password_err</p>";
            endif;
            ?>
        </li>
        <li class="list-item">
            <label for="user-age">Age:</label>
            <input type="text" name="age" id="user-age" value="<?php echo $age; ?>">
        </li>
        <li class="list-item inline" >
            <label><input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
                          value="male" checked="checked">male gender</label>
            <label><input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                          value="female">female gender</label>
        </li>
        <li class="list-item">
            <label for="hobbies">list of hobbies</label>
            <select name="hobbies" id="hobbies">
                <option value="">Choose your option</option>
                <option value="football">Football</option>
                <option value="travels">Travels</option>
                <option value="handmade">Handmade</option>
                <option value="dance">Dance</option>
            </select>
        </li>
        <li class="list-item">
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" id="birthday" value="<?php echo $birthday; ?>">
        </li>
        <li class="list-item">
            <label for="card_number">Bankcard number:</label>
            <input type="text" name="card_number" id="card_number" value="<?php echo $card_number; ?>">

        </li>
        <li class="list-item">
            <label for="category">list of category</label>
            <select name="category" id="category">
                <option value="">Choose your option</option>
                <option value="sport">Sport</option>
                <option value="recreation">Recreation</option>
                <option value="art">Art</option>
                <option value="dance">Dance</option>
            </select>
        </li>
        <li class="list-item">
            <label for="myself">Briefly about myself in general</label>
            <textarea name="myself" cols="50" rows="8" id="myself" value="<?php echo $myself; ?>"></textarea>
        </li>

        <li class="list-item submit">
            <button type="submit">Sign Up</button>
        </li>
    </ul>
    <p class="footnote"><span class="star">*</span> - required field.</p>
</form>
</body>


