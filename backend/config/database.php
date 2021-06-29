<?php
/**
 *  file used for connecting to the database.
 */

class Database {


    //Db credentials
    private $host = 'localhost';
    private $db_name = 'pinboard';
    private $username = 'root';
    private $password = '';

    /*
    private $host = 'ctsappre.mysql.db.internal';
    private $db_name = 'ctsappre_api';
    private $username = 'ctsappre_admin';
    private $password = '@ADMIN_CTSAPPRE@';
    */
    public $con;

    //Db connection
    /**
     * @return mixed
     */
    public function getConnection()
    {
        $this->con = null;

        try{
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->con->exec("set names utf8");
        }catch (PDOException $exception){
            echo "Connection error: ". $exception->getMessage();
        }
        return $this->con;
    }
}
