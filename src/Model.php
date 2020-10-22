<?php

namespace App;

use Dotenv\Dotenv;
use PDO;
use PDOException;

abstract class Model
{
    // Hold the Dotenv-Class
    protected $dotenv;
    // Hold the complete Connect String with DSN
    protected $connect;
    // Hold the Database Handle
    protected $dbHandle;
    // Hold the Database Statement
    protected $dbStatement;
    // Hold the bind Elements
    protected $bound = array();

    /**
     * Model constructor
     */
    public function __construct() {
        $this->setDotenv();
    }
    /**
     * @result (void) Set the Dotenv-Class
     */
    public function setDotenv()
    {
        $this->dotenv = Dotenv::createImmutable('../');
    }

    protected function optionsPDO() {
        $options = array();
        $options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_OBJ;
        $options[PDO::ATTR_ORACLE_NULLS] = PDO::NULL_EMPTY_STRING;
        if($_ENV['ENV']) {
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $options[PDO::ATTR_EMULATE_PREPARES] = false;
        } else {
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_SILENT;
        }
        return $options;
    }

    /**
     * @param $dsn
     * @param $user
     * @param $pass
     * @param $options
     * @result (void)
     */
    protected function doPDO($dsn, $user, $pass, $options) {
        try {
            $this->dbHandle = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            if($_ENV['ENV'] !== 'Dev') {
                $message = new Mssg;
                $message->error504();
            } else {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }

    /**
     * Prepare the query
     * @param $sql (String) The Query Parameter
     */
    protected function prepareQuery($sql) {
        $this->dbStatement = $this->dbHandle->prepare($sql);
    }

    /**
     * Binds a value to a corresponding named or question mark placeholder in the SQL statement that was used to prepare the statement.
     * @param $param ({Question mark }string) This Question mark the form :name parameter to identifier the Parameter
     * @param $value (mixed) The value to bind to the parameter.
     * @param $type (constant) Explicit data type for the parameter using the PDO::PARAM_* constants default is the value NULL
     * @noinspection CallableParameterUseCaseInTypeContextInspection
     */
    protected function bind($param, $value, $type = false)
    {
        if ($type === false) {
            switch (true) {
                case is_int($value):
                    // Represents the SQL INTEGER data type
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    // Represents a boolean data type
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    // Represents the SQL NULL data type
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    // Represents the SQL CHAR, VARCHAR, or other string data type
                    $type = PDO::PARAM_STR;
            }
        }
        $this->dbStatement->bindValue($param, $value, $type);
    }

    /**
     * @param array $array (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @result (void) loop trough to $this->bind
     */
    protected function prepareBind(array $array) {

        $value = null;
        $type = false;
        // loop to get the Key === Param
        foreach ($array as $param=>$valueType) {
            // Search in Subarray for Keys, put that value in Parameter
            if(array_key_exists ( 'value', $valueType)) {
                $value = $valueType['value'];
            }
            if (array_key_exists ( 'type', $valueType)) {
                $type = $valueType['type'];
            }
            $this->bind($param, $value, $type);
        }
    }

    /**
     * Execute the PDO
     */
    protected function execute(){
        $this->dbStatement->execute();
    }

    /**
     * @param $sql (string) The SQL String
     * @param array $bind (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @return mixed An Array with all the results from the Query
     */
    final protected function resultsArr($sql, array $bind)
    {
        $this->prepareQuery($sql);
        if(!empty($bind)) {
            $this->prepareBind($bind);
        }
        $this->execute();
        return $this->dbStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql (string) The SQL String
     * @param array $bind (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @return mixed A Single array with the (first) results from the Query
     */
    final protected function resultsArrSingle($sql, array $bind)
    {
        $this->prepareQuery($sql);
        if(!empty($bind)) {
            $this->prepareBind($bind);
        }
        $this->execute();
        return $this->dbStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql (string) The SQL String
     * @param array $bind (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @return mixed An Obj with the (first) results from the Query
     */
    final protected function resultsObj($sql, array $bind)
    {
        $this->prepareQuery($sql);
        if(!empty($bind)) {
            $this->prepareBind($bind);
        }
        $this->execute();
        return $this->dbStatement->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * @param $sql (string) The SQL String
     * @param array $bind (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @return mixed An Obj with all the results from the Query
     */
    final protected function resultsObjSingle($sql, array $bind)
    {
        $this->prepareQuery($sql);
        if(!empty($bind)) {
            $this->prepareBind($bind);
        }
        $this->execute();
        return $this->dbStatement->fetch(PDO::FETCH_OBJ);
    }



    /**
     * @return (string )Returns the ID of the last inserted row
     * @noinspection PhpDocSignatureInspection
     */
    protected function lastInsertId(){
        return $this->dbHandle->lastInsertId();
    }
}