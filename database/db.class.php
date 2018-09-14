<?php
require $_SERVER['DOCUMENT_ROOT']. '/1_mes/vendor/autoload.php';
class DBQUERY
{          
    protected $connect;

    public function __construct(){
        $dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT'].'\1_mes');
        $dotenv->load();
        $servername = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USERNAME'];     
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_DATABASE'];
        $this->connect = new mysqli($servername, $username, $password,$dbname);        
    }

    public function get_rows(){
        $args = func_get_args();
        $conn = $this->connect;        
        $where = (isset($args[1]) && isset($args[2]))? " WHERE ". $args[1] ." = '".$args[2]."'" : "";
        $where .= (isset($args[3]) && isset($args[4]))? " AND ". $args[3] ." = '".$args[4]."'" : "";
        $sql = "SELECT * FROM " . $args[0] . $where;
        if($result = $conn->query($sql)){
            if($where){
                $row = $result->fetch_assoc();
            }
            else{
                $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
        }
        else{
            return "Error retrieving record/s: " . $conn->error;
        }                      
        if(isset($row)){
            return json_encode($row,true);             
        }
        else{
            return "none";
        }
        $conn->close();
    }

    public function get_rows2($table,$filter){
        $conn = $this->connect;
        $sql = "SELECT * FROM " . $table. " " . $filter;
        if($result = $conn->query($sql)){           
                $row = $result->fetch_assoc();      
        }
        else{
            return "Error retrieving record/s: " . $conn->error;
        }
        if(isset($row)){
            return json_encode($row,true);             
        }
        else{
            return "none";
        }
        $conn->close();
    }

    public function get_rows3($table,$filter,$distinct = false, $cols= ''){
        $conn = $this->connect;
        if($distinct == true){
            $sql = "SELECT DISTINCT ";
        }
        else{
            $sql = "SELECT ";
        }
        if(!$cols == ""){
            $sql .= $cols . " FROM " . $table . " " . $filter;
        }
        else{
            $sql .= "* FROM " . $table . " " . $filter;
        }
        
        if($result = $conn->query($sql)){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
        }
        else{
            return "Error retrieving record/s: ". $sql ." ". $conn->error;
        }
        if(isset($rows)){
            $rows = json_encode($rows,true);
            return json_decode($rows);           
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
        $whereSQL =" WHERE ".$col." = '".$id."'";
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
        $whereSQL = " WHERE ".$col." = '".$id."'" ;
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
            return "Error updating record: " . $conn->error;
            /* return $sql;  */      
        }                        
        $conn->close();
    }
}
?>