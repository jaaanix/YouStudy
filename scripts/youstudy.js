/**
 * Created by Felix on 31.08.2015.
 */
$(function() {
    var navigation = $('nav ul');
    $('#mobilenavigation').on('click', function() {
        navigation.toggleClass('visible');
    });
    InitializePage();
});

function GetMensa(day, callback) {
    $.ajax({
        type: 'POST',
        url: 'ajax/mensa.php',
        data: {day: day},
        dataType: "json",
        success: callback
    })
}

function InitializePage() {
    if (CURRENTPAGE == "index.php") {
        GetMensa(0,function(data) {
            console.log(data);
        });
    }
}