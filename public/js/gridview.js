$(document).ready(function () {
    var count = 2;
    const leavetype = [];
    $('.add-shift').click(function(e){
        e.preventDefault();
        var html = `<tr>
                    <td class="py-0 px-0" style="width: 15%;">
                        <input type="text" class="w-100 border-0" name="shiftname[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="time" class="w-100 border-0" name="intime[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="time" class="w-100 border-0" name="outtime[]">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <input type="number" class="w-100 border-0" name="whour[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="time" class="w-100 border-0" name="lgrace[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="time" class="w-100 border-0" name="eograce[]">
                    </td>
                        <td class="py-0 px-0" style="width: 10%;">
                        <input type="time" class="w-100 border-0" name="lout[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="time" class="w-100 border-0" name="lin[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="text" class="w-100 border-0" name="not[]">
                    </td>
                        <td class="py-0 px-0" style="width: 10%;">
                        <input type="text" class="w-100 border-0" name="eot[]">
                    </td>
                    <td class="py-0 px-0 w-auto" >
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.shift-plan-body').append(html);
    });

    $('.add-rule').click(function (e) {
        e.preventDefault();
        var html = `<tr>
                    <td class="py-0 px-0" style="width: 20%;">
                        <input type="text" class="w-100 border-0" name="rulename[]">
                    </td>
                    <td class="py-0 px-0 w-auto">
                        <input type="text" class="w-100 border-0" name="shiftplan[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <input type="text" class="w-100 border-0" name="roster_days[]">
                    </td>
                    <td class="py-0 px-0" width="120px">
                        <input type="number" class="w-100 border-0 text-center" name="roster_seq[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.shift-rule-body').append(html);
    })

      $('.add-ot-round').click(function (e) {
        e.preventDefault();
        var html = `<tr>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0" name="roundingtype[]">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0" name="min[]" step="any">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0" name="max[]" step="any">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="number" class="w-100 border-0" name="otmin[]" step="any">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.ot-rounding-body').append(html);
    })

    $('.add-ot-rate').click(function (e) {
        e.preventDefault();
        var html = `<tr>
                        <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="ot_rule[]">
                        </td>
                        <td class="py-0 px-0 w-25">
                            <input type="text" class="w-100 border-0"
                                name="ot_formula[]">
                        </td>
                        <td class="py-0 px-0 w-25">
                            <input type="text" class="w-100 border-0"
                                name="ot_remarks[]">
                        </td>
                        <td class="py-0 px-0" style="width: 10%;">
                            <i class="far fa-trash-alt text-danger delete"></i>
                        </td>
                </tr>`;
        $('.ot-rate-body').append(html);
    })

    $('.add-lv-calender').click(function (e) {
        e.preventDefault();
        var html = `<tr>
                    <td class="py-0 px-0 w-25">
                    <input type="text" class="w-100 border-0"
                        name="lv_cal_rule[]">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="date" class="w-100 border-0"
                            name="lv_from[]">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="date" class="w-100 border-0"
                            name="lv_to[]">
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0"
                            name="lv_remarks[]">
                    </td>
                    <td class="py-0 px-0" style="width: 10%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.lv-calender-body').append(html);
    })

    $('.add-lv-policy').click(function (e) {
        e.preventDefault();
        count = count + 2;
        var leavevalue = $('#lv_type').find(":selected").val();
        var leavename = $('#lv_type').find(":selected").text();

        var html = `<tr>
                    <td class="py-0 px-0" width="15%">
                        <input type="text" class="w-100 border-0" name="lv_name[]" value="`+leavename+`" disabled
                        style="height: 24px; padding: 0 5px;">
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <input type="text" class="w-100 border-0" name="lv_days[]"
                        style="height: 24px; padding: 0 5px;">
                    </td>
                    <td class="py-0 px-0" width="15%">
                        <div class="custom-control custom-radio d-inline mr-2">
                            <input class="custom-control-input" type="radio" id="rcredit`+(count)+`" name="lv_credit_`+leavevalue+`" value="boy">
                            <label title="Beginning of the Year" for="rcredit`+(count)+`" class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">BOY </label>
                        </div>
                        <div class="custom-control custom-radio d-inline">
                            <input type="radio" class="custom-control-input" name="lv_credit_`+(leavevalue)+`" id="rcredit`+(count+1)+`" value="eoy">
                            <label title="End of the Year" for="rcredit`+(count+1)+`" class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">EOY </label>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="22%">
                        <div class="custom-control custom-radio d-inline mr-2">
                            <input type="radio" class="custom-control-input" name="calbasis_`+leavevalue+`" id="rbasis`+count+`" value="doj">
                            <label title="Date of Joining" for="rbasis`+count+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">DOJ</label>
                        </div>
                        <div class="custom-control custom-radio d-inline">
                            <input type="radio" class="custom-control-input" name="calbasis_`+leavevalue+`" id="rbasis`+(count+1)+`" value="doj">
                            <label title="Date of confirmation" for="rbasis`+(count+1)+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">DOC</label>
                        </div>
                            <div class="d-inline ml-2">
                            <input type="text" class="w-25 border-1" name="daysafter[]" placeholder="Days after"
                        style="height: 24px;">
                        </div>
                    </td>
                    <td class="py-0 px-0" width="15%">
                        <div class="custom-control custom-radio d-inline mr-2">
                            <input type="radio" class="custom-control-input" name="caltype_`+leavevalue+`" id="rcaltype`+count+`" value="cc">
                            <label title="Company Calendar" for="rcaltype`+count+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">CC</label>
                        </div>
                        <div class="custom-control custom-radio d-inline">
                            <input type="radio" class="custom-control-input" name="caltype_`+leavevalue+`" id="rcaltype`+(count+1)+`" value="ec">
                            <label title="Employee Calendar" for="rcaltype`+(count+1)+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">EC</label>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="13%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="prodata`+count+`" name="prodata_`+leavevalue+`" value="prodata">
                            <label for="prodata`+count+`" class="custom-control-label"
                            title="First year proportionate"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <input type="text" class="w-100 border-0"
                            name="lv_limit[]" style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="15%">
                        <input type="text" class="w-100 border-0" name="lv_cfw[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;

            if(leavevalue == null || leavevalue == "" || leavevalue == 0){
                alert('Please select leave type');
            } else {
                if(leavetype.includes(leavevalue)){
                    alert('Leave exists')
                } else {
                    leavetype.push(leavevalue);
                    $('.lv-policy-body').append(html);
                }
            }
    })
    $('.add-en-policy').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="enrule[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="20%">
                        <div class="d-flex">
                            <input type="text" class="w-100 border-1" name="endays[]"
                            style="height: 24px;">
                            <select class="custom-select custom-select-sm" style="height: 25px;">
                                <option selected>select Item</option>
                                <option value="1">Fixed</option>
                                <option value="2">%</option>
                            </select>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="25%">
                        <input type="text" class="w-100 border-0" name="enpay[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" width="30%">
                        <input type="text" class="w-100 border-0" name="enremarks[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.encash-policy-body').append(html);
    })

    $('.add-mlv-policy').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="10%">
                        <input type="text" class="w-100 border-0" name="mlvrule[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="15%">
                        <div class="d-flex">
                            <input type="text" class="w-100 border-1" name="mlvdays[]"
                            style="height: 24px;">
                            <select class="custom-select custom-select-sm" style="height: 25px;">
                                <option selected>select Item</option>
                                <option value="1">Fixed</option>
                                <option value="2">Prorate</option>
                            </select>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <input type="number" class="w-100 border-0" name="bedd[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" width="10%">
                        <input type="number" class="w-100 border-0" name="aedd[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="20%">
                        <div class="custom-control custom-radio d-inline mr-2">
                            <input type="radio" class="custom-control-input" name="dependson`+count+`" id="depends`+count+`" value="doj">
                            <label title="Date of Joining" for="depends`+count+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">DOJ</label>
                        </div>
                        <div class="custom-control custom-radio d-inline">
                            <input type="radio" class="custom-control-input" name="dependson`+count+`" id="depends`+(count+1)+`" value="doj">
                            <label title="Date of confirmation" for="depends`+(count+1)+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">DOC</label>
                        </div>
                            <div class="d-inline ml-2">
                            <input type="text" class="w-25 border-1" name="mlvdaysafter[]" placeholder="Days after"
                        style="height: 24px;">
                        </div>
                    </td>
                        <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-radio d-inline mr-2">
                            <input type="radio" class="custom-control-input" name="mlvcaltype`+count+`" id="mlvrcaltype`+count+`" value="cc">
                            <label title="Company Calendar" for="mlvrcaltype`+count+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">CC</label>
                        </div>
                        <div class="custom-control custom-radio d-inline">
                            <input type="radio" class="custom-control-input" name="mlvcaltype`+count+`" id="mlvrcaltype`+(count+1)+`" value="ec">
                            <label title="Employee Calendar" for="mlvrcaltype`+(count+1)+`"
                            class="custom-control-label"
                            style="font-size: 14px; cursor: pointer;">EC</label>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <input type="text" class="w-100 border-0" name="fpay[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <input type="text" class="w-100 border-0" name="lpay[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.mlv-policy-body').append(html);
    })

    $('.add-salary-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="salaryrule[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="25%">
                        <div class="d-flex">
                            <select class="custom-select custom-select-sm" style="height: 25px;">
                                <option selected>Select Salary Head</option>
                                <option value="1">GROSS</option>
                                <option value="2">BASIC</option>
                                <option value="3">HOUSE RENT</option>
                                <option value="4">MEDICAL</option>
                                <option value="5">FOOD ALLOWANCE</option>
                                <option value="6">CONVEYANCE ALLOWANCE</option>
                            </select>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="30%">
                        <input type="text" class="w-100 border-0" name="salaryCalc[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="salaryfixed`+count+`" name="isfixed" value="isfixed">
                            <label for="salaryfixed`+count+`" class="custom-control-label"
                            title="Is Fixed Salary" style="cursor: pointer;"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <input type="number" class="w-100 border-0" name="rounding[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.salary-rule-body').append(html);
    })

    $('.add-attenbonus-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="attenrule[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="35%">
                            <input type="text" class="w-100 border-0" name="attencal[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="30%">
                        <input type="text" class="w-100 border-0" name="attenamnt[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="attenfixed`+count+`" name="attenfixed" value="isfixed">
                            <label for="attenfixed`+count+`" class="custom-control-label"
                            title="Is Fixed Salary" style="cursor: pointer;"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.atten-rule-body').append(html);
    })

    $('.add-otAmnt-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="attenrule[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="75%">
                            <input type="text" class="w-100 border-0" name="attencal[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.OTAmnt-rule-body').append(html);
    })

    $('.add-otherallow-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="otherrule[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="35%">
                            <input type="text" class="w-100 border-0" name="otherrulecal[]"
                        style="height: 24px;">
                    </td>
                    <td class="py-0 px-0" width="30%">
                        <input type="text" class="w-100 border-0" name="otherruleamnt[]"
                        style="height: 24px;">
                    </td>
                        <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="otherrulefixed`+count+`" name="otherrulefixed" value="isfixed">
                            <label for="otherrulefixed`+count+`" class="custom-control-label"
                            title="Is Fixed Salary" style="cursor: pointer;"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.otherallow-rule-body').append(html);
    })

    $('.add-arrear-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="arrrule[]">
                    </td>
                    <td class="py-0 px-0" width="40%">
                        <input type="text" class="w-100 border-0" name="arrcal[]">
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="arrtax`+count+`" name="arrtax" value="arrtax">
                            <label for="arrtax`+count+`" class="custom-control-label"
                            title="Is Taxable" style="cursor: pointer;"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0" name="arr_remarks[]">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.arrear-rule-body').append(html);
    })

    $('.add-deduct-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <div class="d-flex">
                            <select class="custom-select custom-select-sm" style="height: 25px;">
                                <option selected>Select Rule Name</option>
                                <option value="1">Absenteeism</option>
                                <option value="2">Late In</option>
                                <option value="3">Early Out</option>
                                <option value="4">No Pay</option>
                                <option value="5">Advance</option>
                                <option value="6">Adjustment</option>
                                <option value="6">Others</option>
                            </select>
                        </div>
                    </td>
                    <td class="py-0 px-0" width="40%">
                        <input type="text" class="w-100 border-0" name="deduct_cal[]">
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="salde`+count+`" name="salde" value="salde">
                            <label for="salde`+count+`" class="custom-control-label"
                            title="Is Taxable" style="cursor: pointer;"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0" name="salde_remarks[]">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.salary-deduct-rule-body').append(html);
    })

    $('.add-tax-rule').click(function (e) {
        e.preventDefault();
           count = count + 2;
        var html = `<tr>
                    <td class="py-0 px-0" width="20%">
                        <input type="text" class="w-100 border-0" name="tax_rule[]">
                    </td>
                    <td class="py-0 px-0" width="40%">
                        <input type="text" class="w-100 border-0" name="tax_cal[]">
                    </td>
                    <td class="py-0 px-0" width="10%">
                        <div class="custom-control custom-checkbox d-inline">
                            <input class="custom-control-input" type="checkbox" id="taxfixed`+count+`" name="taxfixed" value="taxfixed">
                            <label for="taxfixed`+count+`" class="custom-control-label"
                            title="Is Taxable" style="cursor: pointer;"></label>
                        </div>
                    </td>
                    <td class="py-0 px-0 w-25">
                        <input type="text" class="w-100 border-0" name="tax_remarks[]">
                    </td>
                    <td class="py-0 px-0" style="width: 5%;">
                        <i class="far fa-trash-alt text-danger delete"></i>
                    </td>
                </tr>`;
        $('.tax-rule-body').append(html);
    })

    $(document).on('click', '.delete', function () {
        $(this).parents('tr').remove();
        // leavetype.pop(leavevalue);
    })
});
