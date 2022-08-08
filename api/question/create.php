<?
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,
Access-Control-Allow-Methods,Authorization,X-Requested-With');
include_once '../../config/db.php';
include_once '../../model/question.php';
$db = new db();
$conn = $db->connect();
$question = new question($conn);
$data = json_decode(file_get_contents("php://input"));
$question->Title = $data->Title;
$question->AnswerA = $data->AnswerA;
$question->AnswerB = $data->AnswerB;
$question->AnswerC = $data->AnswerC;
$question->CorrectAnswer = $data->CorrectAnswer;

if ($question->create()) {
    echo json_encode(array('message', 'question created'));
} else {
    echo json_encode(array('message', 'question not created'));
}