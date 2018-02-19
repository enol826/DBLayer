<?php

class Oracle extends DB {

    public function __construct() {

    }

    public function connection() {
        $response = true;
        $parameters = func_get_args();
        if(func_num_args() >= 3 && func_num_args() <= 5) {
            if(!occi_connect($parameters[1],$parameters[2])) {
                // To do
            }
        }else{
            $this->config->exceptionHandler("function_arguments", "connection() method expects at least 3 parameters (host, username, password)");
            $response = false;
        }
        return $response;
    }

    public function query($sql) {

    }

}

?>