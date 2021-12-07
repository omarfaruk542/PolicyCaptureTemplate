$(document).ready(function() {
    $(".select2").select2();

    var baseURL = $(location).attr('origin')+'/cryologistics_new';


    var modelId = $("#model").data("model");
    var statusId = $("#status").data("status");
    var customerId = $("#customer").data("customer");
    var cp_orderId = $("#cp_order").data("cp_order");
    var serial_numId = $("#serial_num").data("serial_num");
    var userId = $("#userdesig").data("userdesig");
    var serviceStatusid = $("#servicestatus").data("servicestatusid");
    var problemflag = $("#problemflag").data("problemflag");
    var activityType = $("#activity_type").data("type");
    var equipmentserial = $("#equipment_serial").data("serial");
    var locationId = $("#location").data("location");
    var actionuserId = $("#useraction").data("useraction");
    var equpmentSerialArr = "";

    if (equipmentserial) {
        equpmentSerialArr = $.makeArray($(equipmentserial));
        if (equpmentSerialArr.length == 0) {
            equpmentSerialArr = equipmentserial.split(",");
        }
    }

    // Customer List Dropdown
    $.ajax({
        url: baseURL+"/customer",
        type: "GET"
    }).then(function(data) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].id === customerId) {
                var option = new Option(data[i].name, data[i].id, false, true);
            } else {
                var option = new Option(data[i].name, data[i].id, false, false);
            }
            $("#c_name")
                .append(option)
                .trigger("change");
        }
    });
    // Users List Dropdown
    $.ajax({
        url: baseURL+"/register/userlist",
        type: "GET"
    }).then(function(data) {
        for (var i = 0; i < data.length; i++) {
            if (data[i].id === actionuserId) {
                var option = new Option(data[i].name, data[i].id, false, true);
            } else {
                var option = new Option(data[i].name, data[i].id, false, false);
            }
            $("#userlist")
                .append(option)
                .trigger("change");
        }
    });
     // Users List Dropdown
     $.ajax({
        url: baseURL+"/location",
        type: "GET"
    }).then(function(data) {
        var location = data.data;
        for (var i = 0; i < location.length; i++) {
            if (location[i].id === locationId) {
                var option = new Option(location[i].name, location[i].id, false, true);
            } else {
                var option = new Option(location[i].name, location[i].id, false, false);
            }
            $("#locationlist")
                .append(option)
                .trigger("change");
        }
    });
    // Model List Dropdown
    $.ajax({
        url: baseURL+"/model",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === modelId) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectmodel")
                .append(option)
                .trigger("change");
        }
    });

    // Status List Dropdown
    $.ajax({
        url: baseURL+"/status",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === statusId) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectstatus")
                .append(option)
                .trigger("change");
        }
    });

    // Customer Purchage Order List Dropdown
    $.ajax({
        url: baseURL+"/cp_order",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === cp_orderId) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectcp_order")
                .append(option)
                .trigger("change");
        }
    });
    // Material Serial Number List Dropdown
    $.ajax({
        url: baseURL+"/serial_num",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === serial_numId) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectserial_num")
                .append(option)
                .trigger("change");
        }
    });

    // Equipment Serial Number List Dropdown
    $.ajax({
        url: baseURL+"/equipment",
        type: "GET"
    }).then(function(data) {
        let response = data;
        for (var i = 0; i < response.length; i++) {
            if (equipmentserial) {
                for (var x = 0; x < equpmentSerialArr.length; x++) {
                    if (response[i].id == equpmentSerialArr[x]) {
                        var option = new Option(
                            response[i].equip_serial,
                            response[i].id,
                            true,
                            true
                        );
                        $("#select_equipment_serial")
                            .append(option)
                            .trigger("change");
                    } else {
                        var option = new Option(
                            response[i].equip_serial,
                            response[i].id,
                            false,
                            false
                        );
                    }
                }
            } else {
                var option = new Option(
                    response[i].equip_serial,
                    response[i].id,
                    false,
                    false
                );
            }

            $("#select_equipment_serial")
                .append(option)
                .trigger("change");
        }
    });

    // Service Status List Dropdown
    $.ajax({
        url: baseURL+"/service/servicestatus",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === serviceStatusid) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectservicestatus")
                .append(option)
                .trigger("change");
        }
    });

    // Designation List Dropdown
    $.ajax({
        url: baseURL+"/user/designation",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === userId) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectdesignation")
                .append(option)
                .trigger("change");
        }
    });

    // Problem Flag List Dropdown
    $.ajax({
        url: baseURL+"/service/problemflag",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === problemflag) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectproblemflag")
                .append(option)
                .trigger("change");
        }
    });

    // Service Activity List Dropdown
    $.ajax({
        url: baseURL+"/service/activitytype",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === activityType) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectactivitytype")
                .append(option)
                .trigger("change");
        }
    });

    // Location List Dropdown
    $.ajax({
        url: baseURL+"/location",
        type: "GET"
    }).then(function(data) {
        let response = data.data;
        for (var i = 0; i < response.length; i++) {
            if (response[i].id === activityType) {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    true
                );
            } else {
                var option = new Option(
                    response[i].name,
                    response[i].id,
                    false,
                    false
                );
            }
            $("#selectlocation")
                .append(option)
                .trigger("change");
        }
    });


    $(document).on("click", ".select2", function() {
        $(".select2-search__field").select();
    });

    $(document).on("change", "#warranty_start, #s_contact_s", function() {
        function toValidDate(datestring) {
            return datestring.replace(/(\d{2})(\/)(\d{2})/, "$3$2$1");
        }

        function lastDayOfMonth(date) {
            if (isNaN(date.getDate() - 1)) {
                return new Date(date.getFullYear(), date.getMonth(), 0);
            } else {
                return new Date(
                    date.getFullYear() + 1,
                    date.getMonth(),
                    date.getDate() - 1
                );
            }
        }

        var d = $(this).val();
        var date = new Date(d);
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        var lastDay = lastDayOfMonth(date);
        var year = lastDay.getFullYear();
        var month = lastDay.getMonth() + 1;
        var day = lastDay.getDate();

        var endDate =
            year +
            "-" +
            (month < 10 ? "0" + month : month) +
            "-" +
            (day < 10 ? "0" + day : day);

        if (this.name == "warranty_start") {
            $(`input[name="warranty_end"]`).val(endDate);
        } else if (this.name == "s_contact_s") {
            $(`input[name="s_contact_e"]`).val(endDate);
        }
    });

    $(
        "#status_form,#cp_order_form,#serial_num_form,#servicestatus_form,#designation_form,#problemflag_form,#activitytype_form,#location_form"
    ).on("submit", function(e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let formUrl = $(this).data("form");
        let formID = $(this).attr("id");
        let modal = `#staticBackdrop${formUrl}`;
        let url = "";

        if (formUrl == "status") {
            url = baseURL+"/status";
        } else if (formUrl == "cp_order") {
            url = baseURL+"/cp_order";
        } else if (formUrl == "serial_num") {
            url = baseURL+"/serial_num";
        } else if (formUrl == "servicestatus") {
            url = baseURL+"/service/servicestatus";
        } else if (formUrl == "designation") {
            url = baseURL+"/user/designation";
        } else if (formUrl == "problemflag") {
            url = baseURL+"/service/problemflag";
        } else if (formUrl == "activitytype") {
            url = baseURL+"/service/activitytype";
        }  else if (formUrl == "location") {
            url = baseURL+"/location";
        }

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: url,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(data) {
                let filedData = data.data.original.data;
                if (data.msg == "success") {
                    $("#saveRecordToast").toast("show");
                    $(modal).modal("hide");
                    $(`#${formUrl}_form`)[0].reset();

                    $(`#select${formUrl}`)
                        .find("option")
                        .not(":first")
                        .remove();

                    for (var i = 0; i < filedData.length; i++) {
                        var option = new Option(
                            filedData[i].name,
                            filedData[i].id,
                            false,
                            false
                        );
                        $(`#select${formUrl}`)
                            .append(option)
                            .trigger("change");
                    }
                }
            },
            error: function(error) {
                $.each(error.responseJSON.errors,function(k,v){
                    $('.invalid-feedbacks').text(v[0]);
                })


            }
        });
    });

    $(document).on(
        "click",
        "#modellist,#statusList,#cp_orderList,#serial_numList,#designationlist,#servicestatuslist,#problemflaglist,#activitytypelist,#LocationList",
        function() {
            var url = $(this).data("url");
            // var table = $(this).parents('.content').find('.list');
            var currDiv = $(this).data("target");
            var table = $(currDiv).find("table");
            var route = $(currDiv)
                .find("table")
                .attr("id");
            var targetModel = `#${route}Update`;

            $(table).DataTable({
                ajax: url,
                bDestroy: true,
                rowCallback: function(nRow, aData, iDisplayIndex) {
                    var oSettings = this.fnSettings();
                    $("td:first", nRow).html(
                        oSettings._iDisplayStart + iDisplayIndex + 1
                    );
                    return nRow;
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "description"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            if (route == "model") {
                                var edit = baseURL+"/model/" + data + "/edit";
                                var del = baseURL+"/model/" + data;
                            } else if (route == "status") {
                                var edit = baseURL+"/status/" + data + "/edit";
                                var del = baseURL+"/status/" + data;
                            } else if (route == "cp_order") {
                                var edit = baseURL+"/cp_order/" + data + "/edit";
                                var del = baseURL+"/cp_order/" + data;
                            } else if (route == "serial_num") {
                                var edit = baseURL+"/serial_num/" + data + "/edit";
                                var del = baseURL+"/serial_num/" + data;
                            } else if (route == "designation") {
                                var edit = baseURL+"/designation/" + data + "/edit";
                                var del = baseURL+"/designation/" + data;
                            } else if (route == "servicestatus") {
                                var edit =
                                baseURL+"/service/servicestatus/" + data + "/edit";
                                var del = baseURL+"/service/servicestatus/" + data;
                            } else if (route == "problemflag") {
                                var edit =
                                baseURL+"/service/problemflag/" + data + "/edit";
                                var del = baseURL+"/service/problemflag/" + data;
                            } else if (route == "activitytype") {
                                var edit =
                                baseURL+"/service/activitytype/" + data + "/edit";
                                var del = baseURL+"/service/activitytype/" + data;
                            } else if (route == "location") {
                                var edit =
                                baseURL+"/location/" + data + "/edit";
                                var del = baseURL+"/location/" + data;
                            }

                            return (
                                '<a href="' +
                                edit +
                                '" data-id=' +
                                data +
                                ' class="btn btn-sm btn-warning mr-2 btn-update" data-toggle="modal" data-target="' +
                                targetModel +
                                '" data-route="' +
                                route +
                                '"><i class="fas fa-pencil-alt"></i></a> <a href="' +
                                del +
                                '" data-id=' +
                                data +
                                ' class="btn btn-sm btn-danger btn-edit"><i class="far fa-trash-alt"></i></a>'
                            );
                        }
                    }
                ],
                order: [1, "asc"],
                select: {
                    style: "os",
                    selector: "td:first-child"
                }
            });
        }
    );

    $(document).on("click", ".btn-update", function() {
        let id = $(this).data("id");
        let target = $(this).data("target");
        let form = $(target).find("form");
        let route = $(this).data("route");
        let url = $(this).attr("href");
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                $(form)
                    .find('input[name="name"]')
                    .val(data.name);
                $(form)
                    .find('textarea[name="description"]')
                    .val(data.description);
                $(form)
                    .find('input[name="' + route + '_id"]')
                    .val(data.id);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $(document).on(
        "submit",
        "#status_update_form,#model_update_form, #cp_order_update_form,#serial_num_update_form,#designation_update_form,#servicestatus_update_form,#problemflag_update_form,#activitytype_update_form,#location_update_form",
        function(e) {
            e.preventDefault();
            var modal = $(this).parents(".modal");
            var formData = $(this).serialize();
            var route = $(this).data("table");
            var id = $(this)
                .find('input[name="' + route + '_id"]')
                .val();
            var toast = `#toast${route}Update`;
            var url = "";
            var table = `#${route}`;
            var SelectList = "";

            if (route == "model") {
                url = baseURL+"/model/" + id;
                SelectList = $("#selectmodel");
            } else if (route == "status") {
                url = baseURL+"/status/" + id;
                SelectList = $("#selectstatus");
            } else if (route == "cp_order") {
                url = baseURL+"/cp_order/" + id;
                SelectList = $("#selectcp_order");
            } else if (route == "serial_num") {
                url = baseURL+"/serial_num/" + id;
                SelectList = $("#selectserial_num");
            } else if (route == "designation") {
                url = baseURL+"/designation/" + id;
                SelectList = $("#selectdesignation");
            } else if (route == "servicestatus") {
                url = baseURL+"/service/servicestatus/" + id;
                SelectList = $("#selectservicestatus");
            } else if (route == "problemflag") {
                url = baseURL+"/service/problemflag/" + id;
                SelectList = $("#selectproblemflag");
            } else if (route == "activitytype") {
                url = baseURL+"/service/activitytype/" + id;
                SelectList = $("#selectactivitytype");
            } else if (route == "location") {
                url = baseURL+"/location/" + id;
                SelectList = $("#selectlocation");
            }

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: url,
                type: "PUT",
                data: formData,
                success: function(data) {
                    var dt = data.data.original.data;
                    var datatable = $(table).DataTable();
                    if (data.msg == "success") {
                        $(modal).modal("hide");
                        $(toast).toast("show");

                        datatable.clear();
                        datatable.rows.add(dt);
                        datatable.draw();

                        $(SelectList)
                            .find("option")
                            .not(":first")
                            .remove();

                        for (var i = 0; i < dt.length; i++) {
                            var option = new Option(
                                dt[i].name,
                                dt[i].id,
                                false,
                                false
                            );
                            SelectList.append(option).trigger("change");
                        }
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    );

    $(".show-edit-card").on("click", function(e) {
        e.preventDefault();
        $(this).toggleClass("d-none");
        $(".cancel-edit-card").toggleClass("d-none");
        $(".edit-card").toggleClass("d-none");
        $("#case_des, #activity_des").focus();
    });

    $(".cancel-edit-card").on("click", function(e) {
        e.preventDefault();
        $(this).toggleClass("d-none");
        $(".show-edit-card").toggleClass("d-none");
        $(".edit-card").toggleClass("d-none");
    });
});
