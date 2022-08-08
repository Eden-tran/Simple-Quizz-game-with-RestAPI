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
// $data->Id = isset($_GET['Id']) ?  $_GET['Id'] : die();
$question->Id = $data->Id;


if ($question->delete()) {
    echo json_encode(array('message', 'question deleted'));
} else {
    echo json_encode(array('message', 'question not deleted'));
}