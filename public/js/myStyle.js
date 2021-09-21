var url = window.location.pathname.split('/');
var lok2 = url[2];
var lok1 = url[1];
var lok3 = url[3];
$(document).ready(function() {
    $('.dropdown-toggle').dropdown()
    setAktiv();
    $('#tambahdata').modal({
        backdrop: 'static',
        keyboard: false
    });
});

function setAktiv() {
    if (lok1 === undefined || lok1 === '') {
        $('#sidebar #dashboard').addClass('active');
    } else {
        $('#sidebar #' + lok1).addClass('active');
    }
}

function getParameter(param) {
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    return urlParams.get(param);
}
