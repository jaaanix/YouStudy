/**
 * Created by Felix on 31.08.2015.
 */
$(function() {
    var navigation = $('nav ul');
    $('#mobilenavigation').on('click', function() {
        navigation.toggleClass('visible');
    });
});