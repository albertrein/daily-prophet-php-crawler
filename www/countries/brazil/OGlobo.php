<?php
    class OGlobo{
        private $url = "https://oglobo.globo.com/";
        private $titles = [];
        private $subParagraphs = [];
        
        public function __construct(){
            $this->titles[0] = ".teaser__title.headline__title";
            $this->subParagraphs[0] = ".teaser__subtitle.headline__subtitle";
            echo "OGlobo loaded";
        }
        public function getUrl(){
            return $this->url;
        }
        public function getTitles(){
            return $this->titles;
        }
        public function getSubParagraphs(){
            return $this->subParagraphs;
        }
    }
?>