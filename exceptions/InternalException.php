<?php
class InternalException extends Exception {
    private $exception_name;
    private $extra_info;

    public function __construct($exception_name,$extra_info) {
        $this->exception_name = $exception_name;
        $this->extra_info = $extra_info;
    }

    public function getExceptionName() {
        return $this->exception_name;
    }

    public function getExtraInfo() {
        return $this->extra_info;
    }

}

?>