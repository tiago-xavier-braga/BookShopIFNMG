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

        private function calculateAverageRating()
        {
            $average = 0;
            $totalQuantify = 0;

            foreach ($this->review as $key => $value) {
                $totalQuantify += $value;
            }

            foreach ($this->review as $key => $value) {
                $average += ((($value * 100) / $totalQuantify) / 100) * ($key + 1);

                //echo '</br>' . $average . '</br>';
            }
            return $average;
        }
        private function calculatePercentReview(){

        }

        public function __toString()
        {
            return ''. $this->calculateAverageRating() .'';
        }
    }
?>
