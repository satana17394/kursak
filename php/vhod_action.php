<?php

require_once './database/connect.php';


if (!empty($_POST)) {
    $login = $_POST['login1'];
    $password = $_POST['password3'];
   
    $sql = "SELECT * FROM `users`
            WHERE `login` = '$login'";

    $user = mysqli_fetch_assoc(@mysqli_query($mysqli, $sql));


    if ($user !== null) {
        $bd_pass = $user["password"];
        if($password == $bd_pass){
            session_start();
            $_SESSION['user'] = $user;
    
            $uri = $_SERVER["HTTP_HOST"] . '/';
            header("Location: http://" . $uri);
        } else 
            $errs[] = "ты дурак";
    } else 
        $errs[] = "Пользователь не найден";

    if (isset($errs)) {
        session_start();
        $_SESSION['vhod_errs'] = $errs;

        $uri = $_SERVER["HTTP_HOST"] . '/';
        header("Location: http://" . $uri);
    }
    
    
}
