<?php
    error_reporting(E_ERROR); /* Do not show PHP errors to users. Use exceptions or your own error management system. */
    class Config{
        private $parameters =
        array(
            "exception_style" => true, /* Do methods throw exceptions when errors? */
            "exception_error_info" => true, /* Show info provided by database server on errors */
        );
        private $exceptions =
        array(
            "connection" => "Database connection error.",
            "connection_status" => "No connection to database server found.",
            "function_arguments" => "Incorrect parameters used in function.",
            "query" => "Error executing SQL query.",
        );

        private function getParameter($param) {
            return $this->parameters[$param];
        }

        private function getException($excep) {
            return $this->exceptions[$excep];
        }

        public function exceptionHandler($exception_name, $extra_info) {
            if($this->getParameter("exception_style") == true) {
                $message = $this->getException($exception_name)." ";
                if($this->getParameter("exception_error_info") == true) $message .= $extra_info;
                throw new DBException($message);
            }
        }
    }
?>
