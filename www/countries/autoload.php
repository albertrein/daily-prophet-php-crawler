<?php
    //Le arquivos dentro da pasta setada pelo cookie 
    //Adiciona em um array 
    //Itera array adicionado 
    
    $directoryOfCountry = "countries".DIRECTORY_SEPARATOR.$_COOKIE["country"].DIRECTORY_SEPARATOR;
    $selectorFiles = scandir($directoryOfCountry);
    $arrayOfSelectors = [];
    for($i = 2; $i < count($selectorFiles); $i++){
        $arrayOfSelectors[] = file($directoryOfCountry.$selectorFiles[$i]);
    }
    
?>