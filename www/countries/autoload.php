<?php
spl_autoload_register(function ($class_name) {
    if(file_exists('countries/brazil/'.$class_name . '.php')){
        include 'brazil/'.$class_name . '.php';
    }
});

//Make array of Objects here
?>