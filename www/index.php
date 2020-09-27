<?php

    var_dump($_COOKIE);
    if(!isset($_COOKIE['country'])){
        require('view/get-local-news.html');
        exit;
    }

    require('view/daily-prophet.html');

?>