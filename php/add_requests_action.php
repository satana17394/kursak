<?php
session_start();
require_once './database/connect.php';
if (!empty($_POST)) {
    $adress = $_POST['adress'];
    $description = $_POST['description'];
    $img = $_FILES['img'];
    $max_cost = $_POST['max_cost'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['id'];

    $img_type = explode('/', $img['type'])[0];
    if ($img_type !== 'image')
        $errs[] = "не допустимый формат файла";

    $img_name = time() . '.' . explode('/', $img['type'])[1];
    if (!move_uploaded_file($img['tmp_name'], './imgs/' . $img_name))
        $errs[] = 'не удалось переместить файл';

    if (isset($errs)) {

        $_SESSION['errs'] = $errs;

        $uri = $_SERVER["HTTP_HOST"] . '/cabinet';
        header("Location: http://" . $uri);
    } else {

        $sql = "INSERT INTO `requests` (`adress`, `description`, `img`, `max_cost`,`category_id`,`user_id`) VALUES ('$adress', '$description', '$img_name','$max_cost','$category_id','$user_id')";
        $mysqli->query($sql);



        $uri = $_SERVER["HTTP_HOST"] . '/cabinet';
        header("Location: http://" . $uri);
    }
}
