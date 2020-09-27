<?php
    if(!isset($_COOKIE['country'])){
        require('view/set-local-news.html');
        exit;
    }
    
    require('view/daily-prophet.html');

?>