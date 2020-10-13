<?php
    require('countries/autoload.php');
    require('vendor/autoload.php');
    use Symfony\Component\DomCrawler\Crawler;
    use Symfony\Component\CssSelector\CssSelectorConverter;

    array_map("sitesIterate", $arrayOfSelectors);

    function sitesIterate($array){
        $html = file_get_contents(str_replace("\n", '', $array[0]));
        $crawler = new Crawler($html);
        $htmlElement = "";
        for($i = 1; $i < count($array); $i++){
            if(strlen($array[$i]) > 2){                
                if(substr($array[$i], 0, 1) == "h"){
                    $htmlElement .= "<div class='col py-3 px-lg-5'>";
                    $tagOfElement = substr($array[$i], 0, 2);
                    $elementSelector = substr($array[$i], 2);
                }else{
                    $tagOfElement = substr($array[$i], 0, 1);
                    $elementSelector = substr($array[$i], 1);
                }
                try{
                    $textDataFromPage = $crawler->filter($elementSelector)->each(function (Crawler $node, $i) {
                        return $node->text();
                    });
                    if($textDataFromPage[0] == ""){$htmlElement = ""; continue;}
                    $htmlElement .= "<".$tagOfElement.">".$textDataFromPage[0]."</".$tagOfElement.">";
                    if(strlen($array[$i + 1]) <= 2){
                        echo $htmlElement."</div>";
                        $htmlElement = "";
                    }
                }catch(Exception $e){
                    die('null');
                }

            }            
        }
    }


?>
