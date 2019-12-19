<div class="col-md-9">

    <div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">
                        <legend>Item</legend>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="submit_form" name="submit_form" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Item Name :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="item_name" name="item_name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Item Code :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="item_code" name="item_code" readonly type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Group : </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="group_id" name="group_id">
                                    <option value="0">Select...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Brand : </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="brand_id" name="brand_id">
                                    <option value="0">Select...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logo" class="col-sm-2 control-label">Image : </label>
                            <div class="col-sm-10">

                                <div class="table-responsive">
                                    <table id="image_list" class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td style="width: 70%">
                                                <input type="file" class="btn btn-default" name="userfile[]">
                                            </td>
                                            <td style="width: 20%"></td>
                                            <td style="width: 10%"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button id="btnAdd" type="button" class="btn btn-info">Add Image</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Size : </label>
                            <div class="col-sm-10">
                                <label class="checkbox-inline">
                                    <input id="size_XL" name="size[]" type="checkbox" value="XL">XL
                                </label>
                                <label class="checkbox-inline">
                                    <input id="size_XXL" name="size[]" type="checkbox" value="XXL">XXL
                                </label>
                                <label class="checkbox-inline">
                                    <input id="size_L" name="size[]" type="checkbox" value="L">L
                                </label>
                                <label class="checkbox-inline">
                                    <input id="size_M" name="size[]" type="checkbox" value="M">M
                                </label>
                                <label class="checkbox-inline">
                                    <input id="size_S" name="size[]" type="checkbox" value="S">S
                                </label>
                                <label class="checkbox-inline">
                                    <input id="size_OneSize" name="size[]" type="checkbox" value="OneSize">One Size
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Current Stock :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="current_stock" name="current_stock" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Purchase Price :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="purchase_price" name="purchase_price" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sales Price :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="sales_price" name="sales_price" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Discount Price :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="discount_price" name="discount_price" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Short Description :</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="short_desc" name="short_desc" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description :</label>
                            <div class="col-sm-10">
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Display : </label>
                            <div class="col-sm-10">
                                <label class="radio radio-inline"><input id="rbShow" name="diplay" value="S"
                                                                         type="radio" checked>Show </label>
                                <label class="radio radio-inline"><input id="rbHide" name="diplay" value="H"
                                                                         type="radio">Hide </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" id="temp_id" name="temp_id" value="0"/>
                                <button type="button" id="btnClear" class="btn btn-default"><i
                                            class="glyphicon glyphicon-refresh"></i> Clear
                                </button>
                                <button type="submit" id="btnSubmit" class="btn btn-primary"><i
                                            class="glyphicon glyphicon-ok"></i> Save
                                </button>
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
                    <table id="filter_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ITEM ID</th>
                            <th>ITEM MODEL/NAME</th>
                            <th>BRAND</th>
                            <th>GROUP</th>
                            <th>SALES PRICE</th>
                            <th>DISCOUNT PRICE</th>
                            <th>DISPLAY</th>
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

        /*Form Onload Action Performed*/
        clearForm();
        loadGrid();
        loadFormContent();

        /*Clear Button Action Performed*/
        $('#btnClear').click(function () {
            clearForm();
            loadGrid();
        });

        $('#btnAdd').click(function () {
            addRow();
        });

        $('#sales_price').keyup(function () {
            $('#discount_price').val($(this).val());
        });


        /*Submit Button Action Performed*/
        $("form#submit_form").submit(function (event) {

            if ($.trim($('#item_name').val()) === "") {
                $.toaster({message: 'Insert Item Name ???', priority: 'warning'});
                $('#item_name').focus();
                return false;
            } else if ($.trim($('#item_code').val()) === "") {
                $.toaster({message: 'Insert Item Code ???', priority: 'warning'});
                $('#item_code').focus();
                return false;
            } else if ($.trim($('#group_id').val()) === "") {
                $.toaster({message: 'Select Item Group ???', priority: 'warning'});
                $('#group_id').focus();
                return false;
            } else if ($.trim($('#current_stock').val()) === "") {
                $.toaster({message: 'Insert Current Stock ???', priority: 'warning'});
                $('#current_stock').focus();
                return false;
            } else if ($.trim($('#sales_price').val()) === "") {
                $.toaster({message: 'Insert Sales Price ???', priority: 'warning'});
                $('#sales_price').focus();
                return false;
            } else if ($.trim($('#discount_price').val()) === "") {
                $.toaster({message: 'Insert Discount Price ???', priority: 'warning'});
                $('#discount_price').focus();
                return false;
            } else {
                event.preventDefault();
                $('#btnSubmit').prop('disabled', true);
                var formData = new FormData($(this)[0]);
                formData.append("action", "insertOrUpdate");

                $.ajax({
                    url: '<?php echo base_url() ?>item/insertOrUpdate',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        $('#btnSubmit').prop('disabled', false);
                        var result = JSON.parse(data);

                        if ($.trim(result.msg) === 'EX') {
                            $.toaster({
                                message: "Brand Name < " + result.exists + " > Exists !!!",
                                priority: 'warning'
                            });
                        } else if ($.trim(result.msg) === 'NX') {
                            $.toaster({message: "Upload at lest One Image !!!", priority: 'warning'});
                        } else if ($.trim(result.msg) === '1') {
                            $.toaster({message: 'Successfully Saved.', priority: 'success'});
                            clearForm();
                            loadGrid();
                        } else if ($.trim(result.msg) === '2') {
                            clearForm();
                            loadGrid();
                            $.toaster({message: 'Successfully Updated.', priority: 'success'});
                        } else if ($.trim(result.msg) === 'EE') {
                            $.toaster({message: result.errorDesc, priority: 'warning'});
                        }
                    }
                });
                return false;
            }

        });


    });


    function clearForm() {
        $("#submit_form").trigger('reset');
        $("#temp_id").val('0');
        $('#btnSubmit').prop('disabled', false);
        $('#image_list tbody tr').remove();
        addRow();
        getNewProductId();
    }

    function addRow() {

        var rowCount = $('#image_list tbody tr').length;
        if (rowCount < 3) {
            $('#image_list').append('<tr id=tr_' + rowCount + '><td><input type="file" class="btn btn-default" name="userfile[]"></td><td></td><td align="center"><button onclick="removeRow(' + rowCount + ')" class="btn btn-danger btn-sm" type="button"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button></td></tr>');
        } else {
            $.toaster({message: 'Maximum 3 Image can be uploaded', priority: 'warning'});
        }
    }

    function removeRow(id) {
        var rowCount = $('#image_list tbody tr').length;
        if (rowCount > 1) {
            $('#tr_' + id).remove();
        } else {
            $.toaster({message: 'Minimum One Image To be Uploaded !!!', priority: 'warning'});
        }

    }

    function loadFormContent() {
        var url = "<?php echo base_url() ?>item/loadFormContent";
        $.getJSON(url, function (data) {
            if (!jQuery.isEmptyObject(data.group)) {
                $('#group_id').find('option').not(':first').remove();
                var combo = "";
                $.each(data.group, function (i, data) {
                    combo += '<option value="' + data.id + '">' + data.group_name + '</option>';
                });
                $('#group_id').append(combo);
            }
            if (!jQuery.isEmptyObject(data.brand)) {
                $('#brand_id').find('option').not(':first').remove();
                var combo = "";
                $.each(data.brand, function (i, data) {
                    combo += '<option value="' + data.id + '">' + data.brand_name + '</option>';
                });
                $('#brand_id').append(combo);
            }

        });
    }

    function getNewProductId() {
        var url = "<?php echo base_url() ?>item/getNewProductId";
        $.getJSON(url, function (data) {
            if (!jQuery.isEmptyObject(data)) {
                $('#item_code').val(data.newProductId);
            }
        });
    }


    function loadGrid() {
        var url = "<?php echo base_url() ?>item/loadGrid";
        $("#filter_table").dataTable().fnDestroy();
        $.getJSON(url, function (data) {
            if (!jQuery.isEmptyObject(data.records)) {
                $('#filter_table tbody tr').remove();
                var html = "";
                $.each(data.records, function (i, data) {
                    html += "<tr>";
                    html += "<td>" + data.id + "</td>";
                    html += "<td>" + data.item_name + "</td>";
                    html += "<td>" + data.brand_name + "</td>";
                    html += "<td>" + data.group_name + "</td>";
                    html += "<td align='right'>" + data.sales_price + "</td>";
                    html += "<td align='right'>" + data.discount_price + "</td>";
                    html += "<td align='center'>" + data.displayTp + "</td>";
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


</script>


	

	












