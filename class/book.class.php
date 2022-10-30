<?php
    class Book 
    {
        public $code;
        public $title;
        public $description;
        public $author;
        public $publisher;
        public $edition;
        public $pages;
        public $year;
        public $release;
        public $price;
        public $review; 

        private function calculatePercentReview($index){
            $totalQuantify = 0;
            $array = $this->review; 
            foreach ($this->review as $key => $value) {
                $totalQuantify += $value;
            }
            $percent = $array[$index] / $totalQuantify;
            //echo '</br> Porcento: ' . $percent . '';
            return $percent;
        }
        
        private function calculateAverageRating()
        {
            $average = 0;
            
            foreach ($this->review as $key => $value) {
                $average += $this->calculatePercentReview($key) * ($key + 1);

                echo '</br>' . $average . '</br>';
            }
            return $average;
        }
        public function __toString()
        {
            return '' . $this->calculateAverageRating() . '' ;
        }
    }
?>
