<?php
/* Because we're lazy, and more than a little clever,
 * we're going to do some of the leg work to actually use our database
 * in a base class called Table.
 * All we're doing here is the setup for basic CRUD
 * The other models we write will use this as the foundation
 */
 
/* I should mention that we want to use the ActiveRecord pattern here, 
 * despite the drawbacks.
 * It's a pretty nice, logical way to approach record management for databases,
 * so you should get familiar with it.
 */
 
 class Table {
    protected $_id = null;
    protected $_table = null;
    private $db;
     
     // By now we should recognise what this is
    function __construct(DAL_DB $db) {
        // this one was empty but some clever person decided to use dependency injection
        //Now when we are testing the code we can supply a test database with its own config
        $this->db = $db;
    } 
    
    /* We are going to create the properties (columns) on the fly
     * $data is an associative array of key -> value pairs used to get the properties
     * and their values
     */
    function bind($data) {
        //var_dump($data);
        foreach ($data as $key=>$value) {
            $this->$key = $value;
            //echo $key."-->>".$value;
        }
    }
    
    // go to the table in the db and look for the id we pass
    // we are going to add some error handling to these functions later
    // meanwhile, think about some of the issues that could arise using this code
    function load($id) {
        $this->_id = $id;
        //$dbo = Db::getInstance(); //What if the code Nazi doesn't like the name Db? How many places would you have to change it? Hint: Dependency Injection
        
        $sql = $this->buildQuery();
        
        $this->db->doQuery($sql);
        
        $row = $this->db->loadObjectList();
        
        if (isset($row) && is_array($row)) {
            foreach ($row as $key => $value) {
                if ($key == "id") {
                    continue;
                }
                $this->$key = $value;            
            }               
        }
    }
    
    /* think about a way to combine the function with the one above. 
     * is it advisable to do this?
     */
    function load_all() {
        //$db = Db::getInstance();
        $sql = $this->buildQuery();
        
        $this->db->doQuery($sql);
        
        $row = $this->db->loadObjectList();
        
        
    }
    
    // write database object contents to database
    // again think about possible pitfalls here
    function store() {
        //$dbo = Db::getInstance();
        $sql = $this->buildQuery();
        $this->db->doQuery($sql);
    }
    
    function remove() {
        //$dbo = Db::getInstance();
        $sql = $this->buildQuery();
        $this->db->doQuery($sql);
    }
    /*
    *If we use store() to build an insert and it is successful what happens at $stmt->fetch_all(MYSQLI_ASSOC)?
    */
    private function buildQuery($qry, array $qryParams = array()) {
        $stmt = self::$this->db->prepare($qry);
        
        if(count($params) > 0 ) {
            foreach ($param as $key => $value) {
                $stmt->bindValue( $key, $value );
            }
        }
        $stmt->execute();
        
        $result = $stmt->fetchAll(MYSQLI_ASSOC);
        
        return $result;
    }
 }
