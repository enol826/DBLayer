<?php

require("config/config.php");
require("exceptions/DBException.php");
require("exceptions/InternalException.php");

require("mysql/Mysql.php");

require("response/Response.php");
require("response/Mysql_Response.php");

require("general/Log.php");

abstract class DB{
    protected $config;
    protected $log;

    public function __construct() {
        $this->config = new Config();
        $this->log = new Log();
    }

    public function checkConnection() {
        if(!$this->log->getConnectionStatus()) {
            throw new InternalException("connection_status","You have not established a valid connection to the database server.");
        }
    }
    /*
   *  - Action: Establish a database server connection based on host, username, password, databatename and port.
   *  - Parameters: ($host,$username,$password,[$database,[$port]]...)
   *  - Throws: DBException if connection is not possible. => /only exception_style = true/
   *  - Returns:
   *      · true: connection established with server
   *      · false: connection not established with server
    */
    public abstract function connection();
     /*
     *  - Action: Perfom a SQL query to the database server.
     *  - Parameters: ($sql)
     *  - Throws: DBException an error is encountered.
     *  - Returns:
     *      · true/Reponse: if the query was executed successfully
     *          If query is SELECT it returns a Response object; otherwise, true
     *      · false: otherwise
      */
    public abstract function query($sql);
}


?>