<?php namespace Models {


    class Student {
        private $student_id;
        private $title;
        private $first_name;
        private $middle_name;
        private $last_name;
        private $modules = [];
        private $term_address = "";
        private $home_address = "";
        private $mobile;
        private $email_address;
        private $password = "";
        private $gender = "";

        /**
         * @return mixed
         */
        public function getStudentId()
        {
            return $this->student_id;
        }

        /**
         * @param mixed $student_id
         */
        public function setStudentId($student_id)
        {
            $this->student_id = $student_id;
        }

        /**
         * @return mixed
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
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->first_name;
        }

        /**
         * @param mixed $first_name
         */
        public function setFirstName($first_name)
        {
            $this->first_name = $first_name;
        }

        /**
         * @return mixed
         */
        public function getMiddleName()
        {
            return $this->middle_name;
        }

        /**
         * @param mixed $middle_name
         */
        public function setMiddleName($middle_name)
        {
            $this->middle_name = $middle_name;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->last_name;
        }

        /**
         * @param mixed $last_name
         */
        public function setLastName($last_name)
        {
            $this->last_name = $last_name;
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

        /**
         * @return string
         */
        public function getTermAddress()
        {
            return $this->term_address;
        }

        /**
         * @param string $term_address
         */
        public function setTermAddress($term_address)
        {
            $this->term_address = $term_address;
        }

        /**
         * @return string
         */
        public function getHomeAddress()
        {
            return $this->home_address;
        }

        /**
         * @param string $home_address
         */
        public function setHomeAddress($home_address)
        {
            $this->home_address = $home_address;
        }

        /**
         * @return mixed
         */
        public function getMobile()
        {
            return $this->mobile;
        }

        /**
         * @param mixed $mobile
         */
        public function setMobile($mobile)
        {
            $this->mobile = $mobile;
        }

        /**
         * @return mixed
         */
        public function getEmailAddress()
        {
            return $this->email_address;
        }

        /**
         * @param mixed $email_address
         */
        public function setEmailAddress($email_address)
        {
            $this->email_address = $email_address;
        }

        /**
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return string
         */
        public function getGender()
        {
            return $this->gender;
        }

        /**
         * @param string $gender
         */
        public function setGender($gender)
        {
            $this->gender = $gender;
        }


    }
}