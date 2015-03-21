<?php

require_once(LIB_PATH.DS.'config.php');

class MySqlDatabase{
	
	private $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	
	public function __construct() {
	$this->open_connection();
	$this->magic_quotes_active = get_magic_quotes_gpc();
	$this->real_escape_string_exists = function_exists( "mysql_real_escape_string" );
	}
	
    
    //OPEN CONNECTION
//	public function open_connection() {
//		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
//		if (!$this->connection) {
//			die("Database connection failed: " . mysql_error());
//		}
//		else{
//			$db_select = mysql_select_db(DB_NAME, $this->connection);
//			if (!$db_select) {
//				die("Database selection failed: " . mysql_error());
//			}
//		}
//	}    
    public function open_connection() {
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_errno()) {
      die("Database connection failed: " . 
           mysqli_connect_error() . 
           " (" . mysqli_connect_errno() . ")"
      );
    }
  }
	
    
    //CLOSE CONNECTION
    public function close_connection() {
    if(isset($this->connection)) {
      mysqli_close($this->connection);
      unset($this->connection);
    }
  }
    
	

    public function query($sql) {
        $this->last_query=$sql;
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
      }
    

    private function confirm_query($result) {
        if (!$result) {
            $output .= " Last SQL Query: " . $this->last_query;
            die("Database query failed.");
        }
      }
	
	
	// "database-neutral" methods
  public function fetch_array($result_set) {
    return mysqli_fetch_array($result_set);
  }

  
  public function num_rows($result_set) {
   return mysqli_num_rows($result_set);
  }
  
  public function insert_id() {
    // get the last id inserted over the current db connection
    return mysqli_insert_id($this->connection);
  }
  
  public function affected_rows() {
    return mysqli_affected_rows($this->connection);
  }

        
    
    
    
public function escape_value($string) {
    $escaped_string = mysqli_real_escape_string($this->connection, $string);
    return $escaped_string;
  }
  
//  public function escape_value( $value ) {
//		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
//			// undo any magic quote effects so mysql_real_escape_string can do the work
//			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
//			$value = mysql_real_escape_string( $value );
//		} else { // before PHP v4.3.0
//			// if magic quotes aren't already on then add slashes manually
//			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
//			// if magic quotes are active, then the slashes already exist
//		}
//		return $value;
//	}
		
	
}

$database = new MySqlDatabase();


?>