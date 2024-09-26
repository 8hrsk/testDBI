
<?php
class Database {

    protected $connection;
    public $connectionStatus;

    protected function getCredentials() { // Вообще, такие данные я храню в .env, но ванильный php не умеет работать с переменными окружения так, как мне это нужно, поэтому хардкод
        return array(
            "host" => "localhost",
            "user" => "root",
            "pass" => "",
            "database" => "vueserv"
        );
    }

    protected function connect() {
        $credentials = $this->getCredentials();
        $this->connection = new mysqli($credentials["host"], $credentials["user"], $credentials["pass"], $credentials["database"]);
        $this->connectionStatus = true;

        if ($this->connection->connect_error) {
            $this->connectionStatus = false;
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    protected function close() {
        if ($this->connectionStatus === true) {
            $this->connection->close();
        }
    }
}