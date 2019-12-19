<div class="col-md-9">

    <!-- Data Table Starts -->
    <div class="row">

        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        <legend>Pending Orders</legend>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="filter_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>ORDER NO</th>
                            <th>CUSTOMER</th>
                            <th>MOBILE</th>
                            <th>ORDER DATE</th>
                            <th>TOTAL AMOUNT</th>
                            <th>PAYMENT TYPE</th>
                            <th>#TRANS. ID</th>
                            <th>#REF. NO</th>
                            <th style="width: 5%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div  id="orderConfirm" class="modal fade bs-example-modal-sm" tabindex="-1"
             role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Order Delivery/Placement Date</h4>
                    </div>
                    <div class="modal-body">
                        <form id="submit_form">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Order No :</label>
                                <input type="hidden" id="orderId" value="0">
                                <input type="text" class="form-control" id="order_no" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Delivery Date :</label>
                                <input type="text" class="form-control" id="deliver_date">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Total Amount:</label>
                                <input type="text" class="form-control" id="total_amount" readonly>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Due Amount:</label>
                                <input type="text" class="form-control" id="due_amount" value="0">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Order Status:</label>
                                <select type="text" class="form-control" id="order_status">
                                    <option value="R">Ready for Deliver</option>
                                    <option value="D">Delivered</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="onOrderReady()">Confirm Delivery Ready</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="confirmRejectModel" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Reject Confirmation
                    </div>
                    <div class="modal-body">
                        <h1>Are you sure ???</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="onRejectConfirm()">Confirm Reject</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<script>

    $(document).ready(function () {

        jQuery.ajaxSetup({
            beforeSend: function () {
                $('#wait').show();
            },
            complete: function () {
                $('#wait').hide();
            },
            success: function () {
            }
        });

        $("#deliver_date").datetimepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            pickTime: false,
            minView : 2
        });

        /*Form Onload Action Performed*/
        clearForm();
        loadGrid();

        /*Clear Button Action Performed*/
        $('#btnClear').click(function () {
            clearForm();
            loadGrid();
        });




    });


    function clearForm() {
        $("#submit_form").trigger('reset');
        $("#orderId").val('0');
        $('#btnSubmit').prop('disabled', false);
    }




    function loadGrid() {
        var url = "<?php echo base_url() ?>order/getPendingOrders";
        $("#filter_table").dataTable().fnDestroy();
        $.getJSON(url, function (data) {
            if (!jQuery.isEmptyObject(data.records)) {
                $('#filter_table tbody tr').remove();
                var html = "";
                $.each(data.records, function (i, data) {
                    html += "<tr id='tr_"+data.id+"'>";
                    html += "<td>" + data.id + "</td>";
                    html += "<td>" + data.order_no + "</td>";
                    html += "<td>" + data.full_name + "</td>";
                    html += "<td>" + data.mobile + "</td>";
                    html += "<td align='right'>" + data.order_date + "</td>";
                    html += "<td align='right'>" + data.payment_tp + "</td>";
                    html += "<td align='center'>" + data.total_amount + "</td>";
                    html += "<td align='center'>" + data.transaction_id + "</td>";
                    html += "<td align='center'>" + data.reference_no + "</td>";
                    html += "<td align='center'>";
                    html += "<span class='glyphicon glyphicon-eye-open' onclick='onConfirmOrder("+JSON.stringify(data)+")' style='cursor: pointer;color: green' aria-hidden='true'></span>";
                    html += " <span class='glyphicon glyphicon-trash' onclick='onRejectOrder("+JSON.stringify(data)+")' style='cursor: pointer;color:red' aria-hidden='true'></span>";
                    html += "</td>";
                    html += '</tr>';
                });

                $('#filter_table tbody').append(html);


                /*Add Double Click Event on Data Grid*/
                $('#filter_table >tbody > tr').dblclick(function () {

                    var record_id = $(this).find('td:eq(0)').text();
                    var url = "<?php echo base_url() ?>item/getInfo/" + record_id;
                    $.getJSON(url, function (data) {
                        if (!jQuery.isEmptyObject(data.itemInfo)) {
                            $.each(data.itemInfo, function (i, data) {

                                $("#temp_id").val(data.id);
                                $("#item_name").val(data.item_name);
                                $("#item_code").val(data.item_code);
                                $("#group_id").val(data.group_id);
                                $("#brand_id").val(data.brand_id);
                                $("#current_stock").val(data.current_stock);
                                $("#purchase_price").val(data.purchase_price);
                                $("#sales_price").val(data.sales_price);
                                $("#discount_price").val(data.discount_price);
                                $("#short_desc").val(data.short_desc);
                                $("#description").val(data.description);

                                $('#image_list tbody tr').remove();

                                $.each(JSON.parse(data.image), function (i, img) {
                                    //alert(img.imgName);
                                    var html = '<tr id=tr_' + i + '>';
                                    html += '<td style="width: 70%"><input type="file" class="btn btn-default" name="userfile[]"></td>';
                                    html += '<td style="width: 20%" align="center"><img alt="64x64" class="media-object" style="width: 64px; height: 64px;" src="<?php echo base_url() . '/uploads/item/' ?>' + img.imgName + '" data-holder-rendered="true"><input type="hidden" name="hidden_image[]" value="' + img.imgName + '"></td>';
                                    html += '<td style="width: 10%" align="center"><button onclick="removeRow(' + i + ')" class="btn btn-danger btn-sm" type="button"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button></td>';
                                    html += '</tr>';
                                    $('#image_list tbody').append(html);
                                });

                                $("#submit_form input[type=checkbox]").each(function () {
                                    $(this).attr('checked', false);
                                });

                                $.each(JSON.parse(data.size), function (i, siz) {
                                    $('#size_' + siz.size).prop('checked', true);
                                });

                                if (data.display === "S") {
                                    $("#rbShow").prop("checked", true);
                                } else {
                                    $("#rbHide").prop("checked", true);
                                }

                            });
                        }
                    });

                });
            }
            $('#filter_table').dataTable({"aaSorting": []});
        });
    }

    function onConfirmOrder(data) {

        $('#orderId').val(data.id);
        $('#order_no').val(data.order_no);
        $('#total_amount').val(data.total_amount);
        $('#due_amount').val(0);

        $('#orderConfirm').modal('show');
        $.toaster({message: 'Order Selected Order No: '+data.order_no, priority: 'info'});
    }

    function onOrderReady() {
        var url = '<?php echo base_url() ?>order/readyDelivery';

        if($('#orderId').val() ==='0') {
            $.toaster({message: 'Select Order ???', priority: 'warning'});
        } else if($('#deliver_date').val() ==='') {
            $.toaster({message: 'Select Delivery Date ???', priority: 'warning'});
        } else if($('#due_amount').val() ==='') {
            $.toaster({message: 'Insert due amount ???', priority: 'warning'});
        } else {
            $.post(url,
                {
                    id: $('#orderId').val(),
                    deliverDate: $('#deliver_date').val(),
                    dueAmount: $('#due_amount').val(),
                    orderStatus: $('#order_status').val()
                },
                function(data, status){
                    var res = JSON.parse(data);
                    if(res.msg === '1') {
                        $('#tr_' + $('#orderId').val()).remove();
                        $('#orderConfirm').modal('hide');
                        clearForm();
                        $.toaster({message: 'Order successfully updated.', priority: 'success'});
                    } else {
                        $.toaster({message: 'Woops! Something went wrong !!!', priority: 'error'});
                    }
                });
        }
    }


    function onRejectOrder(data) {
        $('#orderId').val(data.id);
        $('#confirmRejectModel').modal('show');
    }
    
    function onRejectConfirm() {
        var url = '<?php echo base_url() ?>order/rejectOrder';

        if($('#orderId').val() ==='0') {
            $.toaster({message: 'Select Order ???', priority: 'warning'});
        }  else {
            $.post(url,
                {
                    id: $('#orderId').val()
                },
                function(data, status){
                    var res = JSON.parse(data);
                    if(res.msg === '1') {
                        $('#tr_' + $('#orderId').val()).remove();
                        $('#confirmRejectModel').modal('hide');
                        clearForm();
                        $.toaster({message: 'Order successfully Rejected.', priority: 'success'});
                    } else {
                        $.toaster({message: 'Woops! Something went wrong !!!', priority: 'error'});
                    }
                });
        }
    }

</script>

















