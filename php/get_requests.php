<?php
session_start();

require_once '../database/connect.php';
if (!empty($_GET)) {
    $user_id = $_GET["user_id"];
    $result = $mysqli->query("SELECT * FROM `requests` WHERE `user_id` = '$user_id'");
    while ($row = mysqli_fetch_assoc(@$result)) {
        echo json_encode($row);
    }
}
