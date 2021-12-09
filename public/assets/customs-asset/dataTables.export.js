$(document).ready(function() {

    $("thead")
        .find("th:first")
        .removeClass("sorting_asc");
    var screenSize = $(window).width();

    if (screenSize > 720) {
        var table = $("#example1")
            .removeAttr("width")
            .DataTable({
                pageLength : 7,
                orderCellsTop: false,
                orderable: false,
                fixedHeader: false,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                searching: true,
                buttons: [
                    "excel",
                    "pdf",
                    "print"
                ],
                select: true,
                // scrollY: "300px",
                // scrollX: true,
                scrollCollapse: true,
                paging: true,
                columnDefs: [
                    {
                        orderable: false,
                        className: "select-checkbox",
                        targets: 0
                    }
                ],
                select: {
                    style: "os",
                    selector: "td:first-child",
                    style: "multi"
                },
                order: [[1, "asc"]],
                fixedColumns: true
            });

        table
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");

        // Column search hide for table resize
        // $('#example1 thead tr').clone(true).appendTo('#example1 thead');
        $("#example1 thead tr:eq(1) th").each(function(i) {
            var title = $(this).text();
            $(this).html(
                '<input type="text" placeholder="Search ' + title + '" />'
            );

            $("input", this).on("keyup change", function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        // Select All Rows
        $("#selectbox").on("click", function() {
            if (this.checked) {
                table.rows().select();
            } else {
                table.rows().deselect();
            }
        });

    } else {
        $("#example1").DataTable({
            responsive: true
        });
        $("#example1_length").remove();
    }

    if(window.location.href.indexOf("customer") > -1 )
    {
        $('#example1_filter').append(`<a href="customer/create" class="btn btn-sm btn-primary ml-5">Add a new customer</a>`)
    } else if(window.location.href.indexOf("equipment") > -1){
        $('#example1_filter').append(`<a href="equipment/create" class="btn btn-sm btn-primary ml-5">Add a new piece of equipment</a>`)
    } else if(window.location.href.indexOf("service/requests") > -1){
        $('#example1_filter').append(`<a href="requests/create" class="btn btn-sm btn-primary ml-5">Add a new service request</a>`)
    } else if(window.location.href.indexOf("service/activities") > -1){
        $('#example1_filter').append(`<a href="activities/create" class="btn btn-sm btn-primary ml-5">Add a new service activities</a>`)
    } else if(window.location.href.indexOf("serviceitems") > -1){
        $('#example1_filter').append(`<a href="serviceitems/create" class="btn btn-sm btn-primary ml-5">Add a Service Item</a>`)
    }

});
