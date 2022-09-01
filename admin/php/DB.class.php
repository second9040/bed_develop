<?php
class DB
{
    private $dbh;
    private $error;
    private $qError;
    private $stmt;
    private $settings;
    public $prefix;

    public function __construct()
    {
        $this->settings = parse_ini_file(__DIR__."/settings.ini.php");
        $dsn = 'mysql:dbname=' . $this->settings["dbname"] . ';host=' . $this->settings["host"] . '';
        $this->prefix = $this->settings["prefix"];
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
            );

        try{
            $this->dbh = new PDO($dsn, $this->settings["user"], $this->settings["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
        }
        //catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    private function Connect()
    {
        $this->settings = parse_ini_file(__DIR__."/settings.ini.php");
        $dsn = 'mysql:dbname=' . $this->settings["dbname"] . ';host=' . $this->settings["host"] . '';
        try {
            # Read settings from INI file, set UTF8mb4
            $this->pdo = new PDO($dsn, $this->settings["user"], $this->settings["password"], array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ));
            # We can now log any exceptions on Fatal error.
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Disable emulation of prepared statements, use REAL prepared statements instead.
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            # Connection succeeded, set the boolean to true.
            $this->bConnected = true;
        }
        catch (PDOException $e) {
            # Write into log
            echo "error sql connect";
            // echo $this->ExceptionLog($e->getMessage());
            die();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();

        $this->qError = $this->dbh->errorInfo();
        if(!is_null($this->qError[2])) {
            echo $this->qError[2];
        }
        echo true;
    }

    public function get()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    public function endTransaction()
    {
        return $this->dbh->commit();
    }

    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }

    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }

    public function queryError()
    {
        $this->qError = $this->dbh->errorInfo();
        if(!is_null($this->qError[2])){
            echo $this->qError[2];
        }
    }

}//end class db

?>