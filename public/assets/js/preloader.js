//  Preloader page
$( function() {
    paceOptions = {
        ajax: true,
        document: true,
        eventLag: false
    };
    Pace.on('done', function () {
        $('#preloader').addClass("isdone");
        $('.loading').addClass("isdone");
    });
} );



