<?php
//проверка паролей
if (!empty($_POST)){
if ($_POST["password"] != $_POST[ "password1"]){
echo 'пароли не совподают';
}
}

?>
