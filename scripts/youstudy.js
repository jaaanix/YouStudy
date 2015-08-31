/**
 * Created by Felix on 31.08.2015.
 */
$(function () {
    var navigation = $('nav ul');
    $('#mobilenavigation').on('click', function () {
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
        GetMensa(0, function (data) {
            var hinweis,
                beilagen,
                container = $('#mensa tbody');
            for (var i = 0; i < data.titles.length; i++) {



                var item = $('<tr><td>' + data.titles[i] + '</td><td><img src="' + data.images[i] + '"></td><td>' + data.desc[i] + '</td><td>' + data.preise[i] + '</td></tr>')
                if (data.titles[i].toLowerCase().indexOf("hinweis") > -1) {
                    hinweis = item;
                } else if (data.titles[i].toLowerCase().indexOf("beilagen") > -1) {
                    beilagen = item;
                } else {
                    container.append(item);
                }
            }
            container.append(beilagen);
            container.append(hinweis);
        });
    }
}