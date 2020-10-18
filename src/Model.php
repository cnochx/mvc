<?php

namespace App;

use Dotenv\Dotenv;
use PDO;
use PDOException;

abstract class Model
{
    // Database Handle
    protected $dbHandle;
    // Database Statement
    protected $dbStatement;

    protected $bound = array();

    /**
     * Model constructor, create the PDO
     */
    public function __construct() {
        // Integrate dotenv
        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        // data source name
        $dsn = 'mysql:host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';dbname='.$_ENV['DB_NAME'].';charset=utf8';
        // Set a PDO::attribute to PDO
        $options = array();
        $options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_OBJ;
        $options[PDO::ATTR_ORACLE_NULLS] = PDO::NULL_EMPTY_STRING;
        if($_ENV['ENV']) {
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $options[PDO::ATTR_EMULATE_PREPARES] = false;
        } else {
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_SILENT;
        }
        // create PDO
        try {
            $this->dbHandle = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
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
    public function prepareQuery($sql) {
        $this->dbStatement = $this->dbHandle->prepare($sql);
    }

    /**
     * Binds a value to a corresponding named or question mark placeholder in the SQL statement that was used to prepare the statement.
     * @param $param ({Question mark }string) This Question mark the form :name parameter to identifier the Parameter
     * @param $value (mixed) The value to bind to the parameter.
     * @param $type (constant) Explicit data type for the parameter using the PDO::PARAM_* constants default is the value NULL
     * @noinspection CallableParameterUseCaseInTypeContextInspection
     */
    public function bind($param, $value, $type = false)
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
    public function prepareBind(array $array) {

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
    public function execute(){
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
    final public function resultsArr($sql, array $bind)
    {
        $this->prepareQuery($sql);
        $this->prepareBind($bind);
        $this->execute();
        return $this->dbStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql (string) The SQL String
     * @param array $bind (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @return mixed A Single array with all the results from the Query
     */
    final public function resultsSingle($sql, array $bind)
    {
        $this->prepareQuery($sql);
        $this->prepareBind($bind);
        $this->execute();
        return $this->dbStatement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql (string) The SQL String
     * @param array $bind (mixed) An Array to bind to avoid sql injection
     * example for that array:
     * $bind[':id']['value'] = 2;
     * $bind[':id']['type'] = false;
     * @return mixed An Obj with all the results from the Query
     */
    final public function resultsObj($sql, array $bind)
    {
        $this->prepareQuery($sql);
        $this->prepareBind($bind);
        $this->execute();
        return $this->dbStatement->fetch(PDO::FETCH_OBJ);
    }



    /**
     * @return (string )Returns the ID of the last inserted row
     * @noinspection PhpDocSignatureInspection
     */
    public function lastInsertId(){
        return $this->dbHandle->lastInsertId();
    }
}