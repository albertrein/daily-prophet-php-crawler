<?php
print_r($_COOKIE);
require('vendor/autoload.php');
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;


$html = file_get_contents("https://oglobo.globo.com/");
//$html = "<p>teste1gg</p>";
$crawler = new Crawler($html);
$title = $crawler->filter('.teaser__title.headline__title')->each(function (Crawler $node, $i) {
    return $node->text();
});

$paragraph = $crawler->filter('.teaser__subtitle.headline__subtitle')->each(function (Crawler $node, $i) {
    return $node->text();
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing muggles-news font</title>
    <style>
    	body{background-color: #ebd4b9}
        @font-face {
            font-family: 'mugglenews';
            src: URL('./mugglenews_by_nathanthenerd_d41qn8p.ttf') format('truetype');
        }
        h1{
            font-family: mugglenews;
            font-size: 104px;
        }
        .p{
            color:#d3a825;
        }
        .notice{
        	width: 200px;
        }
        a{font-family: }
    </style>
</head>
<body>
    <div style="display: flex;">
        <h1>Daily <b style="color: #d3a825;">P</b>rophet</h1>
    </div>
    <div class="notice">
	    <h2><?=$title[0];?></h2>
	    <a><?=$paragraph[0];?></a>    	
    </div>
</body>
</html>