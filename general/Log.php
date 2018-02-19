<?php

class Log {
    private $connection;
    private $connection_established;
    private $last_queries;

    public function __construct() {
        $this->last_queries = array();
        $this->connection_established = false;
    }

    public function addConnection($connection) {
        $this->connection = $connection;
        $this->connection_established = true;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function getConnectionStatus() {
        return $this->connection_established;
    }

    public function addQuery($query) {
        $this->last_queries[] = $query;
    }

    public function getLastQuery() {
        return $this->last_queries[sizeof($this->last_queries)-1];
    }

    public function getQuery($int) {
        return $this->last_queries[$int];
    }

}

?>