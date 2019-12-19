<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Proceed To Check out</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="panel panel-default">

            <div class="panel-body" style="padding:0px">
                <table class="table table-striped table-bordered" style="margin:0px">
                    <thead>
                    <tr>
                        <th width="20%" class="text-center">IMAGE</th>
                        <th width="30%">ITEM</th>
                        <th width="15%" class="text-center">QTY(S)</th>
                        <th width="15%" class="text-center">PRICE</th>
                        <th width="15%" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->cart->contents() as $item): ?>
                    <tr id="tr_<?php echo $item['rowid'] ?>">
                        <td align="center"><img style="height: 150px;width: 100%"
                                                src="<?php echo base_url() ?>uploads/item/<?php echo $item['image'] ?>"
                                                alt="<?php echo $item['name'] ?>"></td>
                        <td><?php echo $item['name'] ?></td>
                        <td align="center">

                            <div class="input-group">
                                <input class="form-control text-center"
                                       id="qty_<?php echo $item['rowid'] ?>"
                                       value="<?php echo $item['qty'] ?>" readonly>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default"
                                            onclick='onDecreaseQuantity({"rowid":"<?php echo $item['rowid'] ?>"})'>
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </button>
                                    <button type="button" class="btn btn-default"
                                            onclick='onIncreaseQuantity({"rowid":"<?php echo $item['rowid'] ?>"})'>
                                        <span class="glyphicon glyphicon-chevron-up"></span>
                                    </button>
                                </div>
                            </div>

                        </td>
                        <td align="center"><h2><?php echo $item['price'] ?></h2></td>
                        <td align="center">
                            <button type="button" onclick='onDeleteItem({"rowid":"<?php echo $item['rowid'] ?>"})'
                                    class="remove-news btn btn-xs btn-default">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer" style="height: 100px">

                <div class="col-xs-12 text-center" >

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">Total Amount:</span>
                        <input type="text" class="form-control text-center" id="totalAmount" readonly>
                        <span class="input-group-btn">
                            <a href="<?php echo base_url()?>cart/proceedToCheckOut" class="btn btn-default" type="button">PROCEED TO CHECKOUT >></a>
                          </span
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $.post("<?php echo base_url() ?>cart/getCartData",{},
            function (data, status) {
                var cartData = JSON.parse(data);
                $('#totalSelectedQuantity').text(cartData.totalItems);
                $('#totalAmount').val(cartData.totalAmount);
            });
    });

    function onIncreaseQuantity(id) {
        var qtyVal = parseInt($('#qty_' + id.rowid).val());
        $.post("<?php echo base_url() ?>cart/updateItemQty",
            {
                rowid: id.rowid,
                quantity: ++qtyVal
            },
            function (data, status) {
                var cartData = JSON.parse(data);
                $('#totalSelectedQuantity').text(cartData.totalItems);
                $('#totalAmount').val(cartData.totalAmount);
                $('#qty_' + id.rowid).val(qtyVal);
            });

    }

    function onDecreaseQuantity(id) {
        var qtyVal = parseInt($('#qty_' + id.rowid).val());
        if (qtyVal > 1) {
            $.post("<?php echo base_url() ?>cart/updateItemQty",
                {
                    rowid: id.rowid,
                    quantity: --qtyVal
                },
                function (data, status) {
                    var cartData = JSON.parse(data);
                    $('#totalSelectedQuantity').text(cartData.totalItems);
                    $('#totalAmount').val(cartData.totalAmount);
                    $('#qty_' + id.rowid).val(qtyVal);
                });
        }
    }

    function onDeleteItem(id) {
        $.post("<?php echo base_url() ?>cart/removeItem",
            {
                rowid: id.rowid
            },
            function (data, status) {
                var cartData = JSON.parse(data);
                $('#totalSelectedQuantity').text(cartData.totalItems);
                $('#totalAmount').val(cartData.totalAmount);
                $('#tr_' + id.rowid).remove();
            });
    }


</script>



