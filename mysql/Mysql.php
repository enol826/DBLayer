<?php
class Mysql extends DB {
    private $object; // For OO APIs only

    public function __construct() {
        parent::__construct();
        $this->object = new mysqli();
    }

    public function connection() {
        $result = true;
        try {
            if (func_num_args() >= 3 && func_num_args() <= 5) {
                if (!call_user_func_array(array($this->object, "real_connect"), func_get_args())) { // Undefined number of arguments
                    throw new InternalException("connection",$this->object->connect_error);
                }else{
                    $this->log->addConnection(func_get_args()); // add connection to Log
                }
            } else {
                throw new InternalException("function_arguments", "connection() method expects at least 3 parameters (host, username, password)");
            }
        }catch (InternalException $ex) {
            $this->config->exceptionHandler($ex->getExceptionName(),$ex->getExtraInfo());
            $result = false;
        }
        return $result;
    }

    public function query($sql) {
        $result = true;
        try{
            $this->checkConnection();
            $response = $this->object->query($sql);
            if($response == false) {
                throw new InternalException("query",$this->object->error);
            }else if(get_class($response) == "mysqli_result") {
                $result = new Mysql_Response($response);
            }
        }catch(InternalException $ex) {
            $this->config->exceptionHandler($ex->getExceptionName(),$ex->getExtraInfo());
            $result = false;
        }
        return $result;
    }
}

?>