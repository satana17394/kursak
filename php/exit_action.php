<?php
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

$uri = $_SERVER["HTTP_HOST"] . '/';
header("Location: http://" . $uri);
