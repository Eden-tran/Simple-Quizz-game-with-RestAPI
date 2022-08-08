const api = "http://localhost/RestApi-Quizz/api/question/read.php";
const question = document.getElementById("content");
const answer = document.querySelectorAll(".answer");
const nextQues = document.getElementById("nextQues");
let curretQues = 0;
let point = 0;
loadQues();
function loadQues() {
  removeAnswer();
  const title = document.getElementById("title");
  const answerA = document.getElementById("AnswerA");
  const answerB = document.getElementById("AnswerB");
  const answerC = document.getElementById("AnswerC");
  fetch(api)
    .then((respon) => respon.json())
    .then((data) => {
      const getQuestion = data.data[curretQues];
      title.innerText = getQuestion.Title;
      answerA.innerText = getQuestion.AnswerA;
      answerB.innerText = getQuestion.AnswerB;
      answerC.innerText = getQuestion.AnswerC;
      document.getElementById("CorrectAnswer").value =
        getQuestion.CorrectAnswer;
      document.getElementById("TotalQues").value = data.data.length;
    })
    .catch((error) => console.log(error));
}
function removeAnswer() {
  answer.forEach((answer) => {
    answer.checked = false;
  });
}
function getAnswer() {
  let Playeranswer = undefined;
  answer.forEach((answer) => {
    if (answer.checked) {
      Playeranswer = answer.value.toLowerCase();
    }
  });
  return Playeranswer;
}

nextQues.onclick = () => {
  const totalques = document.getElementById("TotalQues").value;

  if (curretQues + 1 >= totalques) {
    question.innerHTML = `<h2> Bạn đã được ${point} điểm </h2>
        <button onclick='location.reload()'>Làm lại</button>
    `;
  } else {
    const Play = getAnswer();
    if (Play) {
      if (
        Play === document.getElementById("CorrectAnswer").value.toLowerCase()
      ) {
        point++;
      }
      curretQues++;
      loadQues();
    } else {
      alert("hãy chọn đáp án");
    }

    //   console.log(Play);
  }
};
