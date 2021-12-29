$(document).ready(function() {

        var table = $("#report")
            .DataTable({
                buttons: [
                    "excel",
                    "pdf",
                    "print"
                ],
            });

        table
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");

});
