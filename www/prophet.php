<?php
//print_r($_COOKIE);

require('countries/autoload.php');
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
