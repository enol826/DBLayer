<?php

abstract class Response {
    /*
     - Action: Fetch a result row as an associative
     - Parameters: none
     - Throws: nothing
     - Returns:
        · an associative array according to the result of the fetch row
        · NULL is no rows are found (i.e. the end of the result set)
     */
    public abstract function fetch_array();
    /*
     - Action: number of rows of the result
     - Parameters: none
     - Throws: nothing
     - Returns: int value representing the number of rows in the response
    */
    public abstract function num_rows();

}

?>