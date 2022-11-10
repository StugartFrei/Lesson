<?php
    class Calculating{
        private $number_1;
        private $number_2;
        public $number_result;
       
        public function adding($number_1, $number_2){
            $number_result = $number_1 + $number_2;
            return $number_result;
        }
        public function subtract($number_1, $number_2){
            $number_result = $number_1 - $number_2;
            return $number_result;
        }
        public function multiplic($number_1, $number_2){
            $number_result = $number_1 * $number_2;
            return $number_result;
        }
        public function division($number_1, $number_2){
            $number_result = $number_1 / $number_2;
            return $number_result;
        }
    }
?>