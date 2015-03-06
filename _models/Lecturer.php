<?php namespace Models {


    class Lecturer
    {
        private $title = "";
        private $first_name = "";
        private $middle_name = "";
        private $last_name = "";
        private $email_address = "";
        private $tel_ext = "";
        private $modules = [];

        /**
         * @return string
         */
        public function getFullName()
        {
            return "{$this->title} {$this->first_name} {$this->middle_name} {$this->last_name}";
        }

        /**
         * @return string
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return string
         */
        public function getFirstName()
        {
            return $this->first_name;
        }

        /**
         * @param string $first_name
         */
        public function setFirstName($first_name)
        {
            $this->first_name = $first_name;
        }

        /**
         * @return string
         */
        public function getMiddleName()
        {
            return $this->middle_name;
        }

        /**
         * @param string $middle_name
         */
        public function setMiddleName($middle_name)
        {
            $this->middle_name = $middle_name;
        }

        /**
         * @return string
         */
        public function getLastName()
        {
            return $this->last_name;
        }

        /**
         * @param string $last_name
         */
        public function setLastName($last_name)
        {
            $this->last_name = $last_name;
        }

        /**
         * @return string
         */
        public function getEmailAddress()
        {
            return $this->email_address;
        }

        /**
         * @param string $email_address
         */
        public function setEmailAddress($email_address)
        {
            $this->email_address = $email_address;
        }

        /**
         * @return string
         */
        public function getTelExt()
        {
            return $this->tel_ext;
        }

        /**
         * @param string $tel_ext
         */
        public function setTelExt($tel_ext)
        {
            $this->tel_ext = $tel_ext;
        }

        /**
         * @return array
         */
        public function getModules()
        {
            return $this->modules;
        }

        /**
         * @param array $modules
         */
        public function setModules($modules)
        {
            $this->modules = $modules;
        }

    }
}