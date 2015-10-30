<?php
require_once('akh.db.config.php');
/*
*As it turns out Singletons may be bad for TDD too bad our project manager dind't know this whatcha gonna do
*/
class DAL_DB {
    private static $_inst;
    private $_conn;
    private $_host = DB_HOST;
    private $_dbname = DB_NAME;
    private $_uname = DB_USR;
    private $_pass = DB_PASS;
    private $_port = DB_PORT;
    
    private $_sql;
    
    // This function follows the singleton class programming pattern
    public static function getInstance ($config = array()) {
        /* We need one, and only one, instance;
        * If there is no instance, create one now,I  
        * otherwise return the already existing instance
        */
        if (!self::$_inst) {
            self::$_inst = new self($config);
        } //else {Remember that we must always return the instance
            return self::$_inst;
       // }
    }
    
    /* A constructor is a special function that will run whenever we set up a new
     * instance. Here, our constructor will set up the connection.
     * Note that we refer to the $this object to avoid the scope issues from 10/25.
     *
     *Additionally note that we have made the visibility of the constructor private
     *this prevents it from being created from outside the class context using the "new" keyword
     */
    private function __construct($config = array()) {
        try {
            $this->_host = (isset($config['host']))?$config['host'] : DB_HOST;
            $this->_uname = (isset($config['user']))?$config['user'] : DB_USR;
            $this->_pass = (isset($config['pass']))?$config['pass'] : DB_PASS;
            $this->_dbname = (isset($config['database']))?$config['database'] : DB_NAME;
            $this->_port = (isset($config['port']))?$config['port'] : DB_PORT;
            
            $this->_conn = new mysqli($this->_host, $this->_uname, $this->_pass, $this->_dbname, $this->_port);
           /* if (mysqli_connect_error) {
                // trigger an error here, instead of an exception because something went horribly wrong and we don't really want to recover
                trigger_error("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")", E_USER_ERROR);
            }*/
       } catch (Exception $ex) {
           echo "Database error. " . $ex->getMessage ();
           //throw new Exception($ex->getMessage());
        }
    }
    
    /* So this is an example of a getter; this function allows us to access the 
     * private connection variable $_conn that is inside the DAL class. In our code
     * we would do something like $myConnection = $instanceOfDb->getConnection()
     * to set a connection variable
     */
    public function getConnection() {
        return $this->_conn;
    }
    
    /* Clone is another special function, like a constructor or destructor, but instead of
     * setting up or tearing down an object, it creates a copy. In this case, we are using
     * singleton to prevent duplication, so we can enforce this here by having an empty
     * clone function.
     */
    public function __clone() { 
        // This function is empty because we never want to try cloning a singleton
    }
    
    /* the destructor, like our constructor, is a special function. It will run when we dispose
     * of an instance of our class
     */
    public function __destruct() {
        if("mysqli" == get_class($this->_conn)) {
            $this->_conn->close();
            
        }
    }
    
    public function destroy(){
        
        //Get rid of this instance incase its misconfigured so it is recreated on the next call
        self::$_inst = null;
    }
    
    /* ====
     * We have all of the basics out of the way, so we want to get down to the business of running queries.
     */
    
    // This functionality will move into the table class once it is made
    /**
     * This function will execute a direct SQL query against the database. We will use it as a basis for the rest of our
     * query work.
     * $qry         The SQL to run
     * $qryParams   Vars array to bind to the SQL statement
     * $results     Returned records from the query
     */
    // public function rawSQLQuery ($qry, $qryParams = null)
    // {
    //     $params = array(''); // Create the empty 0 index
    //     $this->_sql = $qry;
    //     $stmt = $this->_prepareQuery();
    //     if (is_array ($bindParams) === true) {
    //         foreach ($bindParams as $prop => $val) {
    //             $params[0] .= $this->_determineType($val);
    //             array_push($params, $bindParams[$prop]);
    //         }
    //         call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
    //     }
    //     $stmt->execute();
    //     $this->count = $stmt->affected_rows;
    //     $this->_stmtError = $stmt->error;
    //     $this->_lastQuery = $this->replacePlaceHolders ($this->_query, $params);
    //     $res = $this->_dynamicBindResults($stmt);
    //     $this->reset();
    //     return $res;
    // }
    
    /* Next steps:
     * Write a table class as a base for our models
     *   It should handle basic CRUD
     */
}
/*?> whenever you have a php file that will be included it is good practice to
not close it with ?> this is because any white space after the closing tag will
be interpretted as content. Ever seen a "headers 
already sent" error?*/