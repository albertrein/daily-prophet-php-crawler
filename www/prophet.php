<?php
    require('countries/autoload.php');
    require('vendor/autoload.php');
    use Symfony\Component\DomCrawler\Crawler;
    use Symfony\Component\CssSelector\CssSelectorConverter;

    array_map("sitesIterate", $arrayOfSelectors);

    function sitesIterate($array){
        //echo "Site:".$array[0]."<br>";
        $html = file_get_contents(str_replace("\n", '', $array[0]));
        $crawler = new Crawler($html);

        for($i = 1; $i < count($array); $i++){
            if(strlen($array[$i]) > 2){
                if(substr($array[$i], 0, 1) == "h"){
                    echo "<div>";
                    $tagOfElement = substr($array[$i], 0, 2);
                    $elementSelector = substr($array[$i], 2);
                }else{
                    $tagOfElement = substr($array[$i], 0, 1);
                    $elementSelector = substr($array[$i], 1);
                }
                try{
                    $texto = $crawler->filter($elementSelector)->each(function (Crawler $node, $i) {
                        return $node->text();
                    });
                    echo "<".$tagOfElement.">".$texto[0]."</".$tagOfElement.">";
                    if(strlen($array[$i + 1]) <= 2){
                        echo "</div>";
                    }
                }catch(Exception $e){
                    die($e);
                }

            }            
        }
    }


?>
