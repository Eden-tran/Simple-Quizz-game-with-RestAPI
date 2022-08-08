<?
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8');
include_once '../../config/db.php';
include_once '../../model/question.php';
$db = new db();
$conn = $db->connect();
$question = new question($conn);
$question->Id = isset($_GET['Id']) ?  $_GET['Id'] : die();
$question->show();
$questionItem = array(
    'Id' => $question->Id,
    'Title' => $question->Title,
    'AnswerA' => $question->AnswerA,
    'AnswerB' => $question->AnswerB,
    'AnswerC' => $question->AnswerC,
    'CorrectAnswer' => $question->CorrectAnswer,
);
echo json_encode($questionItem, JSON_UNESCAPED_UNICODE);