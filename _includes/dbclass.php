<?php
 
class DBQUERY
{
    public $servername = "localhost";
    public $username = "root";     
    public $password = "";
    public $dbname = "masterdatabase";
    
    public function get_rows(){

        $args = func_get_args();

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname); 
        
        $where = (isset($args[1]) && isset($args[2]))? " WHERE ". $args[1] ."=".$args[2] : "";

        $sql = "SELECT * FROM " . $args[0] . $where;

        $result = $conn->query($sql);
        
        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);

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

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname); 
        
        $sql = "INSERT INTO ".$table."
        (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        if ($conn->query($sql) === TRUE) {
            return "success";
        } else {            
            return "Error: " . $conn->error;
        }

        $conn->close();
    }

    public function delete_row($table,$col,$id){      
        
        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname); 
        
        $whereSQL = (isset($col) && isset($id))? " WHERE ".$col."=".$id : "";

        $sql = "DELETE FROM ".$table.$whereSQL;

        if ($conn->query($sql) === TRUE) {        
            return "Record deleted successfully!";
        } 
        
        else {
            return "Error deleting record: " . $conn->error;
        }                   
        $conn->close();
    }

    public function update_row($table,$form_data,$col,$id){      
        
        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname); 
        
        $whereSQL = (isset($col) && isset($id))? " WHERE ".$col."=".$id : "";

        $sql = "UPDATE ".$table." SET ";
        
        $sets = array();
        foreach($form_data as $column => $value)
        {
            $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);

        $sql .= $whereSQL;

        if ($conn->query($sql) === TRUE) {        
            return "success";
        } else {            
            return "Error updating record: " . $conn->error;        
        }                   
        $conn->close();
    }

}

?>