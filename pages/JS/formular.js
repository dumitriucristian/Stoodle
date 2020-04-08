var questions = document.getElementById("formular").children;
var index = 0;

function nextQuestion() {
    console.log(questions[index]);
    questions[index].style.display = "none";
    $(questions[index]).addClass("hidden");
    index += 1;
}