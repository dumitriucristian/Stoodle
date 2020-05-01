var questions = document.getElementById("formular").children;
var index = 0;

function nextQuestion(select_name) {
    questions[index].style.display = "none";
    $(questions[index]).addClass("hidden");
    index += 1;
}

function formular() {
    $(body).append('
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Holy guacamole!</strong> You should check in on some of those fields below.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
');
}