<?php

$path = explode('/',$_SERVER["REQUEST_URI"]);
$location = @explode('?',$path[1])[0];
$action= @explode('?',$path[2])[0];

switch($location){
    case '':
        require 'views/main_view.php';
        break;
    case 'cabinet':
        require 'views/kabinet_views.php';
        break;
        case 'kartina':
            require 'views/kartina_views.php';
            break;
    case 'signup':
        require 'php/signup_action.php';
        break;
    case 'vhod':
        require 'php/vhod_action.php';
        break;  
    case 'exit':
        require 'php/exit_action.php';
        break;  
    case 'requests':
        switch ($action) {
            case 'add':
                require 'php/add_requests_action.php';
                break;
        }
        break;
    default:
        echo "охуел 404";
}

?>