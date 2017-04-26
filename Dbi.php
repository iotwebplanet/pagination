<?php

/**
 * Description :
 * This Class form Mysqli connectivity for Pagination
 * Application
 *
 * @author Vivek
 */
class Dbi {


        private $databaseURL = "localhost";
	private $databaseUName = "root";
        private $databasePWord = "XXXX";
	private $databaseName = "pagination";
        private $conn;

        public function get_conn() {
            return $this->conn;
        }

        public function set_conn($conn) {
            $this->conn = $conn;
        }


        public function get_databaseURL() {
            return $this->databaseURL;
        }

        public function get_databaseUName() {
            return $this->databaseUName;
        }

        public function get_databasePWord() {
            return $this->databasePWord;
        }

        public function get_databaseName() {
            return $this->databaseName;
        }


     /**
      * @author Vivek Kumar <vivek.aris@gmail.com>
      * this is mysqli constructo for pks data
      */
    function __construct()
        {
        $conn = mysqli_connect($this->databaseURL, $this->databaseUName, $this->databasePWord,$this->get_databaseName());
        if (!$conn) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }
 else {
     $this->set_conn($conn);
     }

        }

        function __destruct() {
            mysqli_close($this->get_conn());
        }


}
