<?php
/* Using exceptions. That is, exception throwing should be enabled in the Config class. */

$object = new Mysql();
try{
    // Connection
      $object->connection("127.0.0.1", "root","","prueba");
    // Executing query and getting result set in $response
      $response = $object->query("SELECT * FROM users" );
    print "Number of rows returned: ".$response->num_rows().'<br/>';
    // Looping through each row
      for($i=0;$i<$response->num_rows();$i++) {
          $f = $response->fetch_array();
          print "Name of the user: ". $f['name1'].'<br/>';
      }
}catch(DBException $ex) {
    print $ex->getMessage();
}

?>
