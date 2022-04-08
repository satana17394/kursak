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
        <div class="container">
            <h3 class="intro__title">регистрация и авторизация</h3>
        </div>
        <div class="form-div" <?php
                                if (isset($_SESSION['user'])) {
                                    echo 'hidden';
                                }
                                ?>>
            <form method="post" action="/signup" name="signup-form">
                <div class="form-element">
                    <ul class="error-list">
                        <?php
                        if (isset($_SESSION['reg_errs'])) {
                            foreach ($_SESSION['reg_errs'] as $err) {
                                echo '<li>' . $err . '</li>';
                            }
                            unset($_SESSION['reg_errs']);
                        }
                        ?>
                    </ul>
                </div>
                <div class="requests">
                    <ul class="requests-list">
                        <li class="register__1">
                            <div class="form-element">
                                <input type="text" name="fio" placeholder="фио" pattern="[А-я\Ёё\s\-]+" required />
                            </div>
                            <div class="form-element">
                                <input type="text" name="login" placeholder="логин" pattern="[A-z]+" required />
                            </div>
                            <div class="form-element">
                                <input type="email" name="email" placeholder="емайл" required />
                            </div>
                            <div class="form-element">
                                <input type="password" name="password" placeholder="пароль" required />
                            </div>
                            <div class="form-element">
                                <input type="password" name="password1" placeholder="потверждение пароля" required />
                            </div>

                            <input type="checkbox" name="ok" id="ok" required>
                            <label for="ok">потверждаю на использование персональных данных</label>
                            <div class="form-element">
                                <button type="submit" name="register" value="register">регистрация</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
            <div class="requests">
                <ul class="requests-list">
                    <li class="register__1">
                        <form method="post" action="/vhod" name="vhod">
                            <div class="form-element">
                                <ul class="error-list">
                                    <?php
                                    if (isset($_SESSION['vhod_errs'])) {
                                        foreach ($_SESSION['vhod_errs'] as $err) {
                                            echo '<li>' . $err . '</li>';
                                        }
                                        unset($_SESSION['vhod_errs']);
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="form-element">
                                <input type="text" placeholder="логин" name="login1" require />
                            </div>
                            <div class="form-element">
                                <input type="password" placeholder="пароль" name="password3" require />
                            </div>
                            <button type="submit" name="vhod2" value="vhod2">вход</button>
                        </form>

            </div>
            </li>
            </ul>
</body>

</html>