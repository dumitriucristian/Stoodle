$(document).ready(function() {
    $('#sidebarCollapse').on('click', () => {
        $('#content').toggleClass('active');
        $('#sidebar').toggleClass('active');
    })
});