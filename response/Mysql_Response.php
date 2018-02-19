<?php
class Mysql_Response extends Response {
    private $object;

    public function __construct($object) {
        $this->object = $object;
    }

    public function fetch_array() {
        return $this->object->fetch_array();
    }

    public function num_rows() {
        return $this->object->num_rows;
    }
}

?>