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
        } else if ($(btn).val() == "category_wise") {
            var table = $(root).find('table');
            $(table).text('');
            $(root).find('.show-minutemodal').hide();
            $(root).find('.show-categorymodal').fadeIn("slow");
            $(root).find(".showDetails").fadeIn("slow");
            var html = `
            <thead>
                <tr>
                    <th class="py-1">Category Name</th>
                    <th class="py-1">Minimum Minutes</th>
                    <th class="py-1">Maximum Minutes</th>
                    <th class="py-1">OT Minutes</th>
                    <th class="py-1">Action</th>
                </tr>
            </thead>
            <tbody class="ot-rounding-body">
                <tr>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="roundingtype[]">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="min[]" step="any">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="max[]" step="any">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="number" class="w-100 border-0"
                            name="otmin[]" step="any">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>
            </tbody>
            `
            $(table).append(html);

        } else if ($(btn).val() == "minute_wise") {
            var table = $(root).find('table');
            $(table).text('');
            $(root).find('.show-categorymodal').hide();
            $(root).find('.show-minutemodal').fadeIn("slow");
            $(root).find(".showDetails").fadeIn("slow");
            var html = `
            <thead>
                <tr>
                    <th class="py-1">Rule Name</th>
                    <th class="py-1">Minimum Minutes</th>
                    <th class="py-1">Maximum Minutes</th>
                    <th class="py-1">OT Minutes</th>
                    <th class="py-1">Action</th>
                </tr>
            </thead>
            <tbody class="ot-rounding-body">
                <tr>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="roundingtype[]">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="min[]" step="any">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="max[]" step="any">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="number" class="w-100 border-0"
                            name="otmin[]" step="any">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>
            </tbody>
            `
            $(table).append(html);

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
