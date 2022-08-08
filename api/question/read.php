<?
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8');
include_once '../../config/db.php';
include_once '../../model/question.php';
$db = new db();
$conn = $db->connect();
$question = new question($conn);
$read = $question->read();
$quesNum = $read->rowCount();
if ($quesNum > 0) {
    // $questionArr = [];
    $questionArr['data'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        // echo '</br>' . $Id;
        $questionItem = array(
            'Id' => $Id,
            'Title' => $Title,
            'AnswerA' => $AnswerA,
            'AnswerB' => $AnswerB,
            'AnswerC' => $AnswerC,
            'CorrectAnswer' => $CorrectAnswer,
        );
        array_push($questionArr['data'], $questionItem);
    }
    echo json_encode($questionArr, JSON_UNESCAPED_UNICODE);
};

// var_dump($questionArr);