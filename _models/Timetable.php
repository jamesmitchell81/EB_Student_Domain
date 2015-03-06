<?php namespace Models {


    class Timetable {
        private $sessions = [];

        /**
         * @return array
         */
        public function getSessions()
        {
            return $this->sessions;
        }

        /**
         * @param array $sessions
         */
        public function setSessions($sessions)
        {
            $this->sessions = $sessions;
        }


    }
}