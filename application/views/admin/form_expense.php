
<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title"><legend>Expenses</legend></div>
                </div>
                <div class="panel-body">
                    <form id="submit_form" name="submit_form" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label for="inputGroupName" class="col-sm-2 control-label">Expense Head :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="head_id" name="head_id">
                                    <option value="0">Select...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputGroupName" class="col-sm-2 control-label">Expense Date :</label>
                            <div class="col-sm-10">
                                <input class="form-control"
                                       id="expense_date"
                                       name="expense_date"
                                       placeholder="Expense Date"
                                       type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputGroupName" class="col-sm-2 control-label">Expense Amount :</label>
                            <div class="col-sm-10">
                                <input class="form-control"
                                       id="expense_amount"
                                       name="expense_amount"
                                       placeholder="Expense Amount"
                                       type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputGroupName" class="col-sm-2 control-label">Notes :</label>
                            <div class="col-sm-10">
                                <input class="form-control"
                                       id="notes"
                                       name="notes"
                                       placeholder="Short notes on expenses"
                                       type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Display : </label>
                            <div class="col-sm-10">
                                <label class="radio radio-inline">
                                    <input id="rbShow" name="enabled" value="S" type="radio" checked>Show
                                </label>
                                <label class="radio radio-inline">
                                    <input id="rbHide" name="enabled" value="H" type="radio">Hide
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" id="temp_id" name="temp_id" value="0"/>
                                <button type="button" id="btnClear" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Clear</button>
                                <button type="submit" id="btnSubmit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form END -->

    <!-- Data Table Starts -->
    <div class="row">

        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-body">
                    <table  id="filter_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Head Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Display</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function(){

        jQuery.ajaxSetup({
            beforeSend: function() {
                $('#wait').show();
            },
            complete: function(){
                $('#wait').hide();
            },
            success: function() {}
        });

        $("#expense_date").datetimepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            pickTime: false,
            minView : 2
        });

        /*Form Onload Action Performed*/
        clearForm();
        getExpenseHeads();
        loadGrid();

        /*Clear Button Action Performed*/
        $('#btnClear').click(function(){
            clearForm();
            loadGrid();
            getExpenseHeads();
        });


        /*Submit Button Action Performed*/
        $("form#submit_form").submit(function(event) {

            if ($.trim($('#head_id').val()) === "0") {
                $.toaster({message: 'Select Expense Head ???', priority: 'warning'});
                $('#head_id').focus();
                return false;
            } else if ($.trim($('#expense_date').val()) === "") {
                $.toaster({message: 'Select Expense Date ???', priority: 'warning'});
                $('#expense_date').focus();
                return false;
            } else if ($.trim($('#expense_amount').val()) === "") {
                $.toaster({message: 'Insert expense amount ???', priority: 'warning'});
                $('#expense_amount').focus();
                return false;
            } else if ($.trim($('#notes').val()) === "") {
                $.toaster({message: 'Insert notes ???', priority: 'warning'});
                $('#notes').focus();
                return false;
            } else {

                $('#btnSubmit').prop('disabled',true);
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo site_url() ?>expense/insertOrUpdateExpense',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        $('#btnSubmit').prop('disabled',false);
                        var result = JSON.parse(data);

                        if ($.trim(result.msg) === '1') {
                            clearForm();
                            loadGrid();
                            $.toaster({message: "Successfully Saved.", priority: 'success'});
                        } else if($.trim(result.msg) === '2'){
                            clearForm();
                            loadGrid();
                            $.toaster({message: "Successfully Updated.", priority: 'success'});
                        } else if($.trim(result.msg) === 'EE') {
                            alert(result.errorDesc);
                        }
                    }
                });
                return false;
            }

        });


    });


    function clearForm(){
        $("#submit_form").trigger('reset');
        $("#temp_id").val('0');
        $('#btnSubmit').prop('disabled',false);
    }


    function loadGrid(){
        var url = "<?php echo base_url() ?>expense/getExpenseList";
        $("#filter_table").dataTable().fnDestroy();
        $.getJSON(url,function(data){
            if(!jQuery.isEmptyObject(data.records)){
                $('#filter_table tbody tr').remove();
                var html = "";
                $.each(data.records, function(i,data){
                    html += "<tr>";
                    html +="<td>"+data.id+"</td>";
                    html +="<td>"+data.head_name+"</td>";
                    html +="<td>"+data.expense_amount+"</td>";
                    html +="<td>"+data.expense_date+"</td>";
                    html +="<td align='center'>"+(data.enabled==='S' ? 'Show': 'Hide')+"</td>";
                    html += '</tr>';
                });

                $('#filter_table tbody').append(html);


                /*Add Double Click Event on Data Grid*/
                $('#filter_table >tbody > tr').dblclick(function(){

                    var record_id = $(this).find('td:eq(0)').text();
                    var url="<?php echo base_url() ?>expense/getExpenseInfo?id="+record_id;
                    $.getJSON(url,function(data){
                        if(!jQuery.isEmptyObject(data.expenseInfo)){
                            $.each(data.expenseInfo, function(i,data){

                                $("#temp_id").val(data.id);
                                $("#head_id").val(data.head_id);
                                $("#expense_date").val(data.expense_date);
                                $("#expense_amount").val(data.expense_amount);
                                $("#notes").val(data.notes);

                                if(data.enabled === "S"){
                                    $("#rbShow").prop("checked",true);
                                } else {
                                    $("#rbHide").prop("checked",true);
                                }

                            });
                        }
                    });

                });
            }

            $('#filter_table').dataTable();
        });
    }

    function getExpenseHeads() {

        var url = "<?php echo base_url() ?>expense/getExpenseHeadList";
        $.getJSON(url, function (data) {
            if (!jQuery.isEmptyObject(data.records)) {
                $('#head_id').find('option').not(':first').remove();
                var combo = "";
                $.each(data.records, function (i, data) {
                    combo += '<option value="' + data.id + '">' + data.head_name + '</option>';
                });
                $('#head_id').append(combo);
            }


        });

    }


</script>


	

	












