<?php

    require_once './class/author.class.php';
    require_once './class/publisher.class.php';
    class Book 
    {

        public $code;
        private $title;
        private $description;
        private $author;
        private $publisher;
        private $edition;
        private $pages;
        private $year;
        private $release;
        private $price;
        private $review; 

        public function calculatePercentReview($index){
            $totalQuantify = 0;
            $array = $this->review; 
            foreach ($this->review as $key => $value) {
                $totalQuantify += $value;
            }
            $percent = $array[$index] / $totalQuantify;
            //echo '</br> Porcento: ' . $percent . '';
            return $percent;
        }
        
        public function calculateAverageRating()
        {
            $average = 0;
            
            foreach ($this->review as $key => $value) {
                $average += $this->calculatePercentReview($key) * ($key + 1);

                echo '</br>' . $average . '</br>';
            }
            return $average;
        }

        public function fillData(array $data)
        {
            $this->code = $data[0];
            $this->title = $data[1];
            $this->description = $data[2];
            $this->author = $data[3];
            $this->publisher = $data[4];
            $this->edition = $data[5];
            $this->pages = $data[6];
            $this->year = $data[7];
            $this->release = $data[8];
            $this->price = $data[9];
            $this->review = $data[10];
        }

        public function __toString()
        {
            $textAuthor = '';
            $textReview = '';

            foreach ($this->author as $key => $value) {
                $textAuthor .= ' ' . $value . '';
            }

            foreach ($this->review as $key => $value) {
                # code...
                $textReview .= '' . $key . ': ' . $value . '</br>';
            }
            return 
            '' . $this->code . '</br>'
            . $this->title . '</br>'
            . $this->description . '</br>'
            . $textAuthor . '</br>'
            . $this->publisher . '</br>'
            . $this->edition . '</br>'
            . $this->pages . '</br>'
            . $this->year . '</br>'
            . $this->release . '</br>'
            . $this->price . '</br>'
            . $textReview  . '</br>' ;
        }
    }
?>
