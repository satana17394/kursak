<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">
    <title>кабинет</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">КаГл</div>

                <nav class="nav">
                    <a class="nav__link" href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/"; ?>">авторизация</a>
                    <a class="nav__link" href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/cabinet"; ?>">кабинет</a>
                    <a class="nav__link" href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/kartina"; ?>">картины</a>

                </nav>
                <div class="exit">
                    <a class="nav__link" href="/exit">Выйти</a>
                </div>
            </div>
        </div>
    </header>

    <div class="requests-div">
        <div class="container">
            <h3 class="intro__title">Мои картины</h3>
        </div>
        <div class="requests">
            <ul class="requests-list">
                <?php
                session_start();
                require './database/connect.php';

                $user_id = $_SESSION["user"]["id"];
                $sql = "SELECT * FROM `requests` WHERE `user_id` = '$user_id'";
                $res = $mysqli->query($sql);


                while ($row = mysqli_fetch_assoc($res)) {
                    $img_path = '../imgs/' . $row['img'];
                    $description_path = $row['description'];
                    $created_at = $row['created_at'];



                    echo '<li class="request-item">';
                    echo '<div class="panel-block">';
                    echo '<img class="req-img" src="' . $img_path . '" alt="">';
                    echo ' </div>';
                    echo ' <div class="panel-block flex j-c_s-b">';
                    echo '  <div class="panel-text">';
                    echo '    <span>Статус: </span>хороший';
                    echo ' </div>';
                    echo ' <div class="panel-text">';

                    echo '  </div>';
                    echo ' </div>';
                    echo ' <div class="panel-block">';
                    echo '  <div class="panel-title"><h4>описание</h4></div>';
                    echo '  <div class="panel-text"> ' . $description_path . ' </div>';
                    echo ' </div>';

                    echo ' <div class="panel-block">дата  и  время добавления ' . $created_at . '</div>';
                    echo ' </li>';
                }
                ?>
               
            </ul>
        </div>
    </div>

    <div class="form-div">
        <form action="/requests/add" enctype="multipart/form-data" class="request-form form" method="post">
            <ul class="error-list">
                <?php
                if (isset($_SESSION['errs'])) {
                    foreach ($_SESSION['errs'] as $err) {
                        echo '<li>' . $err . '</li>';
                    }
                    unset($_SESSION['errs']);
                }
                ?>
            </ul>
            <div class="requests">
                <ul class="requests-list">
                    <li class="register__1">
                        <div class="form-element">

                            <input type="text" placeholder="адрес" name="adress" required />
                        </div>
                        <div class="form-element">

                            <input type="text" placeholder="описание" name="description" required />
                        </div>
                        <div class="form-element">
                            <label>фото</label>
                            <input type="file" name="img" required />
                        </div>
                        <div class="form-element">
                            <input type="text" name="max_cost" placeholder="максимольно денег" pattern="[0-9]+" required />
                        </div>
                        <div class="form-element">
                            <label>катигория</label>
                            <select name="category" id="category" class="auth-input">
                                <option value="" hidden selected>выбирите категорию</option>
                                <?php

                                $sql = "SELECT * FROM `categories`";
                                $query = $mysqli->query($sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $categories[] = $row;
                                }
                                foreach ($categories as $value) {
                                    $id = $value["id"];
                                    $category = $value["category"];
                                    echo "<option value='$id'>$category</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="" value="">отправить</button>
                    </li>
                </ul>
        </form>

    </div>

    <input type="text" name="user_id" id="user-id" value="<?php echo @$_SESSION['user']['id'] ?>" hidden>
    <script src="../js/requests/getUserRequests.js"></script>
    <script>
        let userId = document.querySelector('#user-id').value;
        let userData = getUserRequests(userId);

        const printData = async () => {
            console.log(await userData)
        }
        printData();
    </script>
</body>


</html>