<?php
//файл стилей

require_once './database/connect.php';


if (!empty($_POST)) {
    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    $sql = "SELECT `login` FROM `users`
        WHERE `login` = '$login'";

    if (mysqli_fetch_assoc(mysqli_query($mysqli, $sql)))
        $errs[] = "error 102(логин уже есть)";

    $sql = "SELECT `email` FROM `users`
         WHERE `email` ='$email'";

    if (mysqli_fetch_assoc(mysqli_query($mysqli, $sql)))
        $errs[] = "error 103(емайл уже есть)";

    if ($_POST["password"] != $_POST["password1"]) {
        $errs[] = "error 101(неправельно веден пароль)";
    }

    if (isset($errs)) {
        session_start();
        $_SESSION['reg_errs'] = $errs;

        $uri = $_SERVER["HTTP_HOST"] . '/';
        header("Location: http://" . $uri);
    } else {
        $sql = "INSERT INTO `users` (`FIO`, `login`, `email`, `password`) VALUES ('$fio', '$login', '$email', '$password')";
        $mysqli->query($sql);

        $sql = "SELECT * FROM `users`
            WHERE `login` = '$login'";
        $user = mysqli_fetch_assoc(mysqli_query($mysqli, $sql));
        session_start();
        $_SESSION['user'] = $user;

        $uri = $_SERVER["HTTP_HOST"] . '/';
            header("Location: http://" . $uri);
    }
}
