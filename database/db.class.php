<?php

class DBQUERY
{
    protected $servername = "localhost";
    protected $username = "root";     
    protected $password = "";
    protected $dbname = "masterdatabase";
    protected $connect;

    public function __construct(){
        $this->connect = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
    }    

    public function get_rows(){

        $args = func_get_args();

        $conn = $this->connect;
        
        $where = (isset($args[1]) && isset($args[2]))? " WHERE ". $args[1] ."=".$args[2] : "";

        $where += (isset($args[3]) && isset($args[4]))? " AND ". $args[3] ."=".$args[4] : "";

        $sql = "SELECT * FROM " . $args[0] . $where;

        $result = $conn->query($sql);

        if($where){
            $row = $result->fetch_assoc();
        }
        else{
            $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }              

        if(isset($row)){
            return json_encode($row,true); 
            
        }
        else{
            return "none";
        }

        $conn->close();

    }

    public function insert_row($table,$form_data){
        
        $fields = array_keys($form_data);

        $conn = $this->connect; 
        
        $sql = "INSERT INTO ".$table."
        (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        if ($conn->query($sql) === TRUE) {
            return TRUE;
        } else {            
            return "Error inserting record: " . $conn->error;
        }
        
        $conn->close();
    }

    public function delete_row($table,$col,$id){                    
        
        $conn = $this->connect; 
        
        /* $whereSQL = (isset($col) && isset($id))? " WHERE ".$col."=".$id : ""; */

        $whereSQL =" WHERE ".$col."=".$id;

        $sql = "DELETE FROM ".$table.$whereSQL;

        if ($conn->query($sql) === TRUE) {        
            /* return "Record deleted successfully!"; */
            return TRUE;
        } 
        
        else {
            return "Error deleting record: " . $conn->error;
        }        
        $conn->close();
    }

    public function update_row($table,$form_data,$col,$id){        
        
        $conn = $this->connect; 
        
        /* $whereSQL = (isset($col) && isset($id))? " WHERE ".$col." = ".$id : ""; */

        $whereSQL = " WHERE ".$col." = ".$id ;

        $sql = "UPDATE ".$table." SET ";
        
        $sets = array();
        foreach($form_data as $column => $value)
        {
            $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);

        $sql .= $whereSQL;

        if ($conn->query($sql) === TRUE) {        
            return TRUE;
        } else {            
            /* return "Error updating record: " . $conn->error; */
            return $sql;       
        }                
        
        $conn->close();
    }

}

?>