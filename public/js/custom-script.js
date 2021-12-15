$(document).ready(function () {
    //Initialize BS Custime File Input
    bsCustomFileInput.init();
    //Initialize Select2 Elements
    $(".select2").select2();
    //Initialize all tooltips
    $('[data-toggle="tooltip"]').tooltip();

    $(document).on("click", ".btn-yes,.btn-no", function () {
        var btnName = $(this).attr("id");
        var btn = $(`input[id="` + btnName + `"]`);
        var root = $(btn).parents(".icheck-primary").parent();
        if ($(btn).val() == "yes" || $(btn).val() == "crossmonth") {
            $(root).find(".showDetails").fadeIn("slow");
        } else {
            $(root).find(".showDetails").fadeOut(500);
            // $(root).find('input[type="file"]').val("");
        }
    });

    // Define Read only Date at top
    function GetTodayDate() {
        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var currentDate = dd + "-" + (MM + 1) + "-" + yyyy;

        return currentDate;
    }
    $(".date").html("Date : " + GetTodayDate());

    // $(document).on('click','.btn-modal',function(){
    //     var id = $(this).attr('id');
    //     // var modal = $('.modal').find($('div[id="`+id+`"]'));
    //     var myModal = new bootstrap.Modal(document.getElementById(id), {
    //         keyboard: false
    //     })
    //     myModal.show();

    // })
});
