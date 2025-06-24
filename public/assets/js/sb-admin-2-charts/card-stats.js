$(function () {
    let stat_origin_year = sessionStorage.getItem("stat_year");
    if (stat_origin_year == null || stat_origin_year == "") {
        stat_origin_year = new Date().getFullYear();
    }

    $.ajax({
        url: "/get-dash-stats",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('.data-csrf_token').data('csrf'),
        },
        data: {
            stat_origin_year: stat_origin_year,
        },
        dataType: "json",
        success: function (r) {
            if (r.success) {
                $('.card-stats-request-this-month').text(r.thisMonth);

                $('.card-stats-request-annual').text(r.annual);

                if(r.completed > 0){
                    $('.card-stats-request-completed').text(Math.round((r.completed / r.annual) * 100) + "%")
                    $('.card-stats-request-completed-progress-bar').css('width', Math.round((r.completed / r.annual) * 100) + "%").text(r.completed +' / '+ r.annual);
                }else{
                    $('.card-stats-request-completed').text("0%")
                    $('.card-stats-request-completed-progress-bar').css('width', "0%");
                }
                
                $('.card-stats-request-pending').text(r.pending);
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
});