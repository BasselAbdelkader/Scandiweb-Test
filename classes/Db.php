<?php

class Db
{
    public $lastQuery = 'no query', $affectedRows = 0;
    protected $_connection;
    private $_host, $_user, $_password, $_db;

    function __construct($host, $user, $password, $db)
    {
        $this->_host = $host;
        $this->_user = $user;
        $this->_password = $password;
        $this->_db = $db;
        $this->connect();
    }

    private function connect()
    {


        $this->_connection = mysqli_connect($this->_host, $this->_user, $this->_password, $this->_db);
        //Check if the connection is successful. If connection fails, die and output error
        if (!$this->_connection) {
            die(mysqli_connect_error());
        } else {

        }
    }

    function sanitize($value)
    {


        //prevent multiple slashing
        $value = stripslashes($value);
        //escape the string
        $value = mysqli_real_escape_string($this->_connection, $value);
        return $value;
    }

    function query($query)
    {
        $this->lastQuery = $query;
        //if query is successful, save the rows affected, if operation failed output error
        if ($result = mysqli_query($this->_connection, $query)) {
            $this->affectedRows = mysqli_affected_rows($this->_connection);
        } else {
            print_r(mysqli_error($this->_connection));
        }
        //if no rows were affected, the query is faulty
        if ($this->affectedRows < 1) {
            return false;
        }
        //if all of this has passed, query is valid, result is then obtained
        return $result;
    }


}


//sanitizing the input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

