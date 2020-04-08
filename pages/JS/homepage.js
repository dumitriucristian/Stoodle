function getCard(cardValue) {
    console.log(cardValue);
    $('#displayCard')
        .empty()
        .removeClass("hidden")
        .append("<span><img src='./Images/Icons/close.png' alt='close' onclick='hideCard()'></span>")
        .append("<p>" + cardValue + "</p>");
}

function hideCard() {
    $('#displayCard')
        .addClass("hidden")
}