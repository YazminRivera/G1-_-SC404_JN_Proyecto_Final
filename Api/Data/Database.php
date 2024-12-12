<?php
class Database
{
    protected $connection = null;
 
    public function __construct()
    {

        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            
            if ( mysqli_connect_errno()) {                
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }          
    }
 
    public function select($query = "" , $params = [], $openConnection = true)
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);      

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        } finally {
            if ($openConnection == true) {
                $this->connection->close();
            }
        }
        return false;
    }

    public function execute($query = "" , $params = [], $openConnection = false)
    {
        try {
            $stmt = $this->executeStatement( $query , $params );

            /*$errors = $stmt->errorInfo();
            if($errors){
                echo ($errors[2]);
            }else{
                /*Do rest
            }*/

            //echo($stmt);
            //$stmt->close();
 
            return "";
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        } finally {
            if ($openConnection == true) {
                $this->connection->close();
            }
        }
        return false;
    }
 
    public function beginTransaction() {
        $this->connection->begin_transaction();
    }

    public function commitTransaction() {
        $this->connection->commit();
        $this->connection->close();
    }

    public function rollbackTransaction() {
        $this->connection->rollback();
        $this->connection->close();
    }

    private function executeStatement($query = "" , $params = [])
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }

            /*echo ('params');
            print_r($params);*/
 
            if( $params && count($params) > 0 ) {
                /*foreach ($params as $currentParameter) {
                    $stmt->bind_param($currentParameter[0], $currentParameter[1]);
                }*/

                $stmt->bind_param($params[0], ...$params[1]);
            }
 
            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }   
    }
}