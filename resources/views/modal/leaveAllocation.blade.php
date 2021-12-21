<div class="modal fade" id="leaveallocationmodel" tabindex="-1" aria-labelledby="leaveallocationmodellabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h6 class="modal-title" id="leaveallocationmodellabel">Leave Allocation Example</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered border-primary text-center" style="font-size: 12px">
                        <thead>
                            <tr>
                                <th class="w-25">Leave Type</th>
                                <th>Allocation (Days)</th>
                                <th>Credit/ Allocation</th>
                                <th>Allocation From</th>
                                <th>Calendar Type</th>
                                <th>Proportionate Calculation</th>
                                <th>Consecutive Limit (Days)</th>
                                <th>Carry Forward</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Casual Leave</td>
                                <td>10</td>
                                <td>BOY</td>
                                <td>DOJ</td>
                                <td>CC</td>
                                <td>True</td>
                                <td>3 Days</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>Sick Leave</td>
                                <td>14</td>
                                <td>BOY</td>
                                <td>DOJ</td>
                                <td>CC</td>
                                <td>False</td>
                                <td>N/A</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>Earn Leave</td>
                                <td>(P,L)/18 = 1</td>
                                <td>BOY</td>
                                <td>DOJ-After 365 Days</td>
                                <td>CC</td>
                                <td>False</td>
                                <td>N/A</td>
                                <td>100% to next year</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
