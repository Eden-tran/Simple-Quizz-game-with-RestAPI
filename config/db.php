<?
class db
{

    //connect database by PDO
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $table = 'rest-API-quizz';
    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->table", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Successful";
        } catch (PDOException $e) {
            echo "Failedi: " . $e->getMessage();
        }
        return $this->conn;
    }
}