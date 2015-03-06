<?php namespace Models {


    class Event
    {
        private $start_datetime;
        private $end_datetime;

        public function setDateTime($start_datetime, $end_datetime)
        {
            $this->start_datetime = $start_datetime;
            $this->end_datetime = $end_datetime;
        }
    }
}