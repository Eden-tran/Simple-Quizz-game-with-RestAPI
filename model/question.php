<?
class Question
{

    private $conn;

    public $Id;
    public $Title;
    public $AnswerA;
    public $AnswerB;
    public $AnswerC;
    public $CorrectAnswer;

    private $table = 'Quizz';

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function read()
    {
        $query = "select * from $this->table order by Id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function show()
    {
        $query = "select * from $this->table WHERE Id=? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->Id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->Id = $row['Id'];
        $this->Title = $row['Title'];
        $this->AnswerA = $row['AnswerA'];
        $this->AnswerB = $row['AnswerB'];
        $this->AnswerC = $row['AnswerC'];
        $this->CorrectAnswer = $row['CorrectAnswer'];
        return $stmt;
    }
    public function create()
    {
        $query = "Insert INTO $this->table SET Title=:Title,AnswerA=:AnswerA,
        AnswerB=:AnswerB,AnswerC=:AnswerC,CorrectAnswer=:CorrectAnswer";
        $stmt = $this->conn->prepare($query);
        $this->Title = htmlspecialchars(strip_tags($this->Title));
        $this->AnswerA = htmlspecialchars(strip_tags($this->AnswerA));
        $this->AnswerB = htmlspecialchars(strip_tags($this->AnswerB));
        $this->AnswerC = htmlspecialchars(strip_tags($this->AnswerC));
        $this->CorrectAnswer = htmlspecialchars(strip_tags($this->CorrectAnswer));
        $stmt->bindParam(':Title', $this->Title);
        $stmt->bindParam(':AnswerA', $this->AnswerA);
        $stmt->bindParam(':AnswerB', $this->AnswerB);
        $stmt->bindParam(':AnswerC', $this->AnswerC);
        $stmt->bindParam(':CorrectAnswer', $this->CorrectAnswer);
        if ($stmt->execute()) {
            return true;
        } else {
            printf("ERROR %s.\n", $stmt->error);
            return false;
        }
    }
    public function Update()
    {
        $query = "Update $this->table SET Title=:Title,AnswerA=:AnswerA,
        AnswerB=:AnswerB,AnswerC=:AnswerC,CorrectAnswer=:CorrectAnswer WHERE Id=:Id";
        $stmt = $this->conn->prepare($query);
        $this->Title = htmlspecialchars(strip_tags($this->Title));
        $this->AnswerA = htmlspecialchars(strip_tags($this->AnswerA));
        $this->AnswerB = htmlspecialchars(strip_tags($this->AnswerB));
        $this->AnswerC = htmlspecialchars(strip_tags($this->AnswerC));
        $this->CorrectAnswer = htmlspecialchars(strip_tags($this->CorrectAnswer));
        $this->Id = htmlspecialchars(strip_tags($this->Id));

        $stmt->bindParam(':Title', $this->Title);
        $stmt->bindParam(':AnswerA', $this->AnswerA);
        $stmt->bindParam(':AnswerB', $this->AnswerB);
        $stmt->bindParam(':AnswerC', $this->AnswerC);
        $stmt->bindParam(':CorrectAnswer', $this->CorrectAnswer);
        $stmt->bindParam(':Id', $this->Id);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("ERROR %s.\n", $stmt->error);
            return false;
        }
    }
    public function delete()
    {
        $query = "DELETE FROM $this->table WHERE Id=:Id";
        $stmt = $this->conn->prepare($query);

        $this->Id = htmlspecialchars(strip_tags($this->Id));


        $stmt->bindParam(':Id', $this->Id);

        if ($stmt->execute()) {
            return true;
        } else {
            printf("ERROR %s.\n", $stmt->error);
            return false;
        }
    }
}