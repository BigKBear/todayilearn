<?php
/*
Create a database connection using PDO or use MYSQLi if PDO is not avaiable

Wrap it in aclass whihc implments the singleton Design Pattern
*/
include 'database_connector.php';

class Database {
    //Define all the needed database properties
    private static $_instance = null;//use the variable with out instantiating the class
    private $servername = DB_HOST;
    private $db_name    = DB_NAME;
	private $user1      = DB_USER;
	private $password   = DB_PASS;
	private $port       = DB_PORT;
	
	private $conn;
	private $mysqli;
	
	//ensuring the Singleton class
	static function getInstance(){
	    /*Creates an instance of this object if none exists and returns it.*/
    	if(!self::$_instance)
    	{
    	    self::$_instance = new self();
    	}
    	    return self::$_instance;
    	
	}

    //Defining all the Actions
    private function __construct(){
        try {
            //$conn->getInstance();
    	    //$conn = new PDO("mysql:host={self::$servername};dbname={self::$db_name", self::$user, self::$password);
    	    // set the PDO error mode to exception
    	    
    	    $this->mysqli = new mysqli('127.0.0.1', 'dariothornhill1', '', 'c9', 3306);
    	    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) 
        {
        	printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
    }
    
    private function __clone(){
        
    }
    
    function __destruct(){
        echo '<br>Closing database: ', $this->db_name;
        /* close connection */
        
        $this->mysqli->close();
    }
  
    //alows the creation of a new skill
    public function createSkill($skill_being_added){
        // we're going to want to use 
        $sql = "INSERT INTO skills (description) VALUES ('{$skill_being_added}')";
            
            /*Returns FALSE on failure. For successful SELECT, SHOW, DESCRIBE
            or EXPLAIN queries mysqli_query() will return a mysqli_result object.
            For other successful queries mysqli_query() will return TRUE.*/
            
            $result =  $this->mysqli->query($sql);
            echo $this->mysqli->error;
            return $result;
            /*if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }*/
            
        //$conn->close();
    }
   
   //returns all skills to be displayed in pagination
   public function qry($sql){
       /*$skill_stmt = false;
       
        if(isset($conn)){
            $skills_sql = 'SELECT * FROM skills';
            
            $skil_stmt = $conn->prepare($skills_sql);
            $skill_stmt -> execute();
            
            $skills_result = $skill_stmt->fetch_assoc();
        }
        
        if($skills_result){
            return $skills_result;
            var_dump($skills_result);
        }
        else if (cond2) {
            return null;
        }else if (cond3) {
            return null;
        }else if (cond4) {
            return null;
        } else {
        }*/
    
    if ($result = $this->mysqli->query($sql)) 
    {

        /* fetch associative array 
        while ($row = $result->fetch_assoc()) 
        {
            printf ("%s -> %s -> %d -> %d\n", $row["skill_id"], $row["description"], $row["t_up"], $row["t_down"]);
        }*/
        
        $assoc = $result->fetch_all(MYSQLI_ASSOC);
        /* free result set */
        $result->free();
        return $assoc;
    }
   }
   
   //read a single user set of skill(s)
   public function getUserSkills($user_id){
       $sql = "Select FROM user_skills WHERE id =$user_id";
   }
   
   /*TODO: Read a set of skills for aparticulat date of time
   EXAMPLE: start of september till end of September
   */
   public function getSkillsByDate($start_date,$end_date){
       $sql = "Select FROM user_skills WHERE start_date LIKE \'\%$start_date\%\'";
       //$sql = "Select FROM user_skills WHERE start_date >'$start_date' AND <'$start_date';
       
   }
   
   public function updateSingleUserSkill(){
       
   }
   
   public function deleteSingleUserSkill(){
       
   }
   
}

?>