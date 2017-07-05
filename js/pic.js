

/* DYNAMIC BACKGROUND IMAGES */
$(document).ready(function(){

    var header = $('body');
    var backgrounds = new Array(
        'url(/concert/images/concert1.jpg)'
        , 'url(/concert/images/concert2.jpg)'
        , 'url(/concert/images/concert2.jpg)'
    );
    var current = 0;

    function nextBackground() {
        current++;
        current = current % backgrounds.length;
        header.css('background-image', backgrounds[current]);
    }
    setInterval(nextBackground, 10000);
    header.css('background-image', backgrounds[0]);

});



