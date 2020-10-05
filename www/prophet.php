<?php
    require('countries/autoload.php');
    require('vendor/autoload.php');
    use Symfony\Component\DomCrawler\Crawler;
    use Symfony\Component\CssSelector\CssSelectorConverter;


    function siteIterate($array){
        echo "Site:".$array[0]."<br>";
        $html = file_get_contents(str_replace("\n", '', $array[0]));
        $crawler = new Crawler($html);

        for($i = 1; $i < count($array); $i++){
            if(strlen($array[$i]) > 2){
                
                try{
                    $texto = $crawler->filter($array[$i])->each(function (Crawler $node, $i) {
                        return $node->text();
                    });
                    echo $texto[0]."<br>";
                }catch(Exception $e){
                    die($e);
                }

            }            
        }
        echo "<br><br>";
    }


    array_map("siteIterate", $arrayOfSelectors);


?>
