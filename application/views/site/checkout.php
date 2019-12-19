<style>
    .required
    {
        color: red;
    }
</style>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Order Confirmation</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">

        <form id="submit_form" name="submit_form" class="form-horizontal" role="form">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Contact Form -->
                    <h2>Personal Information</h2>

                    <div class="contact-form-wrapper">

                        <div class="form-group">
                            <label for="Name" class="col-sm-3 control-label"><b>Your name</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="full_name" name="full_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-email" class="col-sm-3 control-label"><b>Your Mobile</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="mobile" name="mobile"
                                       placeholder="Insert Valid Mobile Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-email" class="col-sm-3 control-label"><b>Your Email</b></label>
                            <div class="col-sm-9">
                                <input class="form-control" id="email" name="email" type="email"
                                       placeholder="Insert Valid Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-message" class="col-sm-3 control-label"><b>Region</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" id="region" name="region">
                                    <option value="0">Please select...</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-message" class="col-sm-3 control-label"><b>Address</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5"
                                          id="address" name="address"
                                          placeholder="i.e: House No# 123, Road# 12, Lake Circus, Kalabaghan, Dhaka-1205"></textarea>
                            </div>
                        </div>


                    </div>
                    <!-- End Contact Info -->
                </div>

                <div class="col-sm-6">
                    <!-- Contact Form -->
                    <h2>Payment Information</h2>
                    <div id="message"></div>

                    <div class="contact-form-wrapper">

                        <div class="form-group">
                            <label for="contact-message" class="col-sm-3 control-label"><b>Payment By</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" id="paymentType" name="paymentType">
                                    <option value="0">Please select ...</option>
                                    <option value="bKash">bKash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="NexusPayRocket">Nexus Pay Rocket</option>
                                    <option value="CashOnDelivery">Cash on Delivery</option>
                                </select>
                            </div>
                        </div>
                        <div id="showPaymentMessage" class="form-group">
                            <label for="contact-message" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <div class="alert alert-warning" style="margin-top: 0px;margin-bottom: 0px">
                                    Cash on Delivery is applicable only for Chandpur Sadar
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="totalAmount" class="col-sm-3 control-label"><b>Sub Total</b></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" style="font-weight: bold"
                                       id="subTotalAmount" name="subTotalAmount"
                                       value="<?php echo $subTotalAmount ?>" readonly>
                            </div>
                        </div>
                        <div id="divShippingRate" class="form-group">
                            <label for="divShippingRate" class="col-sm-3 control-label"><b>Shipping Rate</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="50" style="font-weight: bold"
                                       id="shipping_rate" name="shipping_rate" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="totalAmount" class="col-sm-3 control-label"><b>Total Amount</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" style="font-weight: bold"
                                       id="totalAmount" name="totalAmount"
                                       value="<?php echo $totalAmount?>" readonly>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="paidAmount" class="col-sm-3 control-label"><b>Paid Amount</b> <span class="required">*</span></label>-->
<!--                            <div class="col-sm-9">-->
<!--                                <input class="form-control" type="text" style="font-weight: bold"-->
<!--                                       id="paidAmount" name="paidAmount"-->
<!--                                       value="--><?php //echo $totalAmount ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->

                        <div id="divTransactionId" class="form-group">
                            <label for="Name" class="col-sm-3 control-label"><b>Transaction ID</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" style="font-weight: bold"
                                       id="transaction_id" name="transaction_id" type="text">
                            </div>
                        </div>

                        <div id="divReferenceId" class="form-group">
                            <label for="Name" class="col-sm-3 control-label"><b>Reference NO</b></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" style="font-weight: bold"
                                       id="reference_no" name="reference_no">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="termsCons" class="col-sm-3 control-label"><b>Terms & Cons.</b> <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input id="termsCons" name="termsCons" type="checkbox" value="Y">
                                        I have read and agree to the Terms and Conditions.
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="Name" class="col-sm-3 control-label"><b></b></label>
                            <div class="col-sm-9">
                                <button id="btnSubmit" type="submit"
                                        class="btn pull-right btn-block">Confirm Order
                                </button>
                            </div>

                        </div>

                    </div>
                    <!-- End Contact Info -->
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        onClearForm();
        $('#termsCons').click(function () {
            if ($(this).prop('checked') === true) {
                $('#btnSubmit').prop('disabled', false);
            } else {
                $('#btnSubmit').prop('disabled', true);
            }
        });

        $('#paymentType').change(function () {
            if ($(this).val() === 'CashOnDelivery') {
                $('#showPaymentMessage').show();
                $('#divTransactionId').hide();
                $('#divReferenceId').hide();
            } else {
                $('#showPaymentMessage').hide();
                $('#divTransactionId').show();
                $('#divReferenceId').show();
            }
        });


        /*Submit Button Action Performed*/
        $("form#submit_form").submit(function (event) {

            if ($.trim($('#full_name').val()) === "") {
                $.toaster({message: 'Insert full name ???', priority: 'warning'});
                $('#full_name').focus();
                return false;
            } else if ($.trim($('#mobile').val()) === "") {
                $.toaster({message: 'Insert Mobile number ???', priority: 'warning'});
                $('#full_name').focus();
                return false;
            } else if ($.trim($('#region').val()) === "0") {
                $.toaster({message: 'Select Region ???', priority: 'warning'});
                $('#region').focus();
                return false;
            } else if ($.trim($('#address').val()) === "") {
                $.toaster({message: 'Insert Complete address ???', priority: 'warning'});
                $('#address').focus();
                return false;
            } else if ($.trim($('#paymentType').val()) === "0") {
                $.toaster({message: 'Select Payment Type ???', priority: 'warning'});
                $('#address').focus();
                return false;
            } else {

                if ($.trim($('#paymentType').val()) !== "CashOnDelivery") {
                    if ($.trim($('#transaction_id').val()) === "") {
                        $.toaster({message: 'Insert '+$('#paymentType').val()+' Transaction ID ???', priority: 'warning'});
                        $('#transaction_id').focus();
                        return false;
                    }
                }

                $('#btnSubmit').prop('disabled', true);

                event.preventDefault();
                var formData = new FormData($(this)[0]);
                //formData.append("action","insertOrUpdate");

                $.ajax({
                    url: '<?php echo base_url() ?>cart/confirmOrder',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        $('#btnSubmit').prop('disabled', false);

                        var result = JSON.parse(data);
                        if ($.trim(result.msg) === 'success') {
                            $.toaster({message: 'Your Order Successfully Submitted.', priority: 'success'});
                            $("#submit_form").trigger('reset');
                            window.location.href = "http://www.nafizabootic.com";
                            onClearForm();
                        } else if ($.trim(result.msg) === 'EE') {
                            $.toaster({
                                message: 'Woops! Something went wrong. Please try again later !!!',
                                priority: 'danger'
                            });
                        }
                    }
                });
                return false;
            }

        });

    });


    function onClearForm() {
        $('#showPaymentMessage').hide();
        $('#divTransactionId').show();
        $('#divReferenceId').show();
        $('#btnSubmit').prop('disabled', true);
        $("#submit_form").trigger('reset');
    }


</script>

