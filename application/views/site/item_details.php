<script type="text/javascript">
    jssor_1_slider_init = function () {

        var jssor_1_options = {
            $AutoPlay: 1,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*responsive code begin*/

        /*remove responsive code if you don't want the slider scales while window resizing*/
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 600);
                jssor_1_slider.$ScaleWidth(refSize);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*responsive code end*/
    };
</script>

<style>
    /* jssor slider arrow navigator skin 02 css */
    /*
    .jssora02l                  (normal)
    .jssora02r                  (normal)
    .jssora02l:hover            (normal mouseover)
    .jssora02r:hover            (normal mouseover)
    .jssora02l.jssora02ldn      (mousedown)
    .jssora02r.jssora02rdn      (mousedown)
    .jssora02l.jssora02lds      (disabled)
    .jssora02r.jssora02rds      (disabled)
    */
    .jssora02l, .jssora02r {
        display: block;
        position: absolute;
        /* size of arrow element */
        width: 55px;
        height: 55px;
        cursor: pointer;
        background: url('<?php echo base_url()?>img/a02.png') no-repeat;
        overflow: hidden;
    }

    .jssora02l {
        background-position: -3px -33px;
    }

    .jssora02r {
        background-position: -63px -33px;
    }

    .jssora02l:hover {
        background-position: -123px -33px;
    }

    .jssora02r:hover {
        background-position: -183px -33px;
    }

    .jssora02l.jssora02ldn {
        background-position: -3px -33px;
    }

    .jssora02r.jssora02rdn {
        background-position: -63px -33px;
    }

    .jssora02l.jssora02lds {
        background-position: -3px -33px;
        opacity: .3;
        pointer-events: none;
    }

    .jssora02r.jssora02rds {
        background-position: -63px -33px;
        opacity: .3;
        pointer-events: none;
    }

    /* jssor slider thumbnail navigator skin 03 css *//*.jssort03 .p            (normal).jssort03 .p:hover      (normal mouseover).jssort03 .pav          (active).jssort03 .pdn          (mousedown)*/
    .jssort03 .p {
        position: absolute;
        top: 0;
        left: 0;
        width: 62px;
        height: 32px;
    }

    .jssort03 .t {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .jssort03 .w, .jssort03 .pav:hover .w {
        position: absolute;
        width: 60px;
        height: 30px;
        border: white 1px dashed;
        box-sizing: content-box;
    }

    .jssort03 .pdn .w, .jssort03 .pav .w {
        border-style: solid;
    }

    .jssort03 .c {
        position: absolute;
        top: 0;
        left: 0;
        width: 62px;
        height: 32px;
        background-color: #000;
        filter: alpha(opacity=45);
        opacity: .45;
        transition: opacity .6s;
        -moz-transition: opacity .6s;
        -webkit-transition: opacity .6s;
        -o-transition: opacity .6s;
    }

    .jssort03 .p:hover .c, .jssort03 .pav .c {
        filter: alpha(opacity=0);
        opacity: 0;
    }

    .jssort03 .p:hover .c {
        transition: none;
        -moz-transition: none;
        -webkit-transition: none;
        -o-transition: none;
    }

    * html .jssort03 .w {
        width /**/: 62px;
        height /**/: 32px;
    }
</style>


<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Item Details</h1>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        <div class="row">
            <!-- Product Image & Available Colors -->
            <div class="col-sm-6">

                <!-- Product -->
                <div class="shop-item">
                    <!-- Product Image -->
                    <div class="image">
                        <!-- img style="width:100%;height:500px;" src="<?php echo base_url() . '/uploads/item/' . $itemInfo->profile_image ?>" alt="Item Name" -->

                        <div id="jssor_1"
                             style="position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:500px;overflow:hidden;visibility:hidden;">
                            <!-- Loading Screen -->
                            <div data-u="loading"
                                 style="position:absolute;top:0px;left:0px;background:url('img/loading2.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
                            <div data-u="slides"
                                 style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:500px;overflow:hidden;">

                                <?php
                                $someObject = json_decode($itemInfo->image);

                                if (!empty($someObject)) {
                                    foreach ($someObject as $key => $val) {

                                        ?>

                                        <div>
                                            <img data-u="image"
                                                 src="<?php echo base_url() . '/uploads/item/' . $someObject[$key]->imgName ?>"/>
                                            <img data-u="thumb"
                                                 src="<?php echo base_url() . '/uploads/item/' . $someObject[$key]->imgName ?>"/>
                                        </div>

                                        <?php


                                    }
                                }


                                ?>


                            </div>
                            <!-- Thumbnail Navigator -->
                            <div data-u="thumbnavigator" class="jssort03"
                                 style="position:absolute;left:0px;bottom:0px;width:600px;height:60px;"
                                 data-autocenter="1">
                                <div style="position:absolute;top:0;left:0;width:100%;height:100%;background-color:#000;filter:alpha(opacity=30.0);opacity:0.3;"></div>
                                <!-- Thumbnail Item Skin Begin -->
                                <div data-u="slides" style="cursor: default;">
                                    <div data-u="prototype" class="p">
                                        <div class="w">
                                            <div data-u="thumbnailtemplate" class="t"></div>
                                        </div>
                                        <div class="c"></div>
                                    </div>
                                </div>
                                <!-- Thumbnail Item Skin End -->
                            </div>
                            <!-- Arrow Navigator -->
                            <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;"
                                  data-autocenter="2"></span>
                            <span data-u="arrowright" class="jssora02r"
                                  style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
                        </div>


                    </div>

                </div>
                <!-- End Product -->


            </div>
            <!-- End Product Image & Available Colors -->
            <!-- Product Summary & Options -->
            <div class="col-sm-6 product-details">
                <h4><?php echo $itemInfo->item_name ?></h4>
                <input type="hidden" id="itemId" value="<?php echo $itemInfo->id ?>">
                <div class="price">
                    <?php if ($itemInfo->discount_price != $itemInfo->sales_price) {
                        echo '<span class="price-was">BDT: ' . $itemInfo->discount_price . '</span> BDT:' . $itemInfo->sales_price;
                    } else {
                        echo 'BDT:' . $itemInfo->sales_price;
                    } ?>
                </div>
                <h5>Quick Overview</h5>
                <p>
                    <?php echo $itemInfo->description ?>
                </p>
                <table class="shop-item-selections">

                    <tr>
                        <td><b>Size:</b></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-sm btn-grey" data-toggle="dropdown" href="#">XXL <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">


                                    <?php
                                    $someObject = json_decode($itemInfo->size);

                                    if (!empty($someObject)) {
                                        foreach ($someObject as $key => $val) {
                                            echo '<li role="menuitem"><a href="#">' . $someObject[$key]->size . '</a></li>';
                                        }
                                    }


                                    ?>


                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- Quantity -->
                    <tr>
                        <td><b>Quantity:</b></td>
                        <td>
                            <input id="quantity" type="text" class="form-control input-sm input-micro" value="1">
                        </td>
                    </tr>
                    <!-- Add to Cart Button -->
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button onclick="addItemToCart()" class="btn btn">
                                <i class="icon-shopping-cart icon-white"></i> Add to Cart
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- End Product Summary & Options -->

            <!-- Full Description & Specification -->
            <div class="col-sm-12">
                <div class="tabbable">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs product-details-nav">
                        <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>

                    </ul>
                    <!-- Tab Content (Full Description) -->
                    <div class="tab-content product-detail-info">
                        <div class="tab-pane active" id="tab1">
                            <h4>Item Description Coming Soon.</h4>

                        </div>


                    </div>
                </div>
            </div>
            <!-- End Full Description & Specification -->
        </div>
    </div>
</div>

<script type="text/javascript">jssor_1_slider_init();</script>


<script>
    function addItemToCart() {

        $.post("<?php echo base_url() ?>cart/addItemToCart",
            {
                productId: $('#itemId').val(),
                quantity: $('#quantity').val()
            },
            function(data, status){
                var cartData = JSON.parse(data);
                $('#totalSelectedQuantity').text(cartData.totalItems);
                $.toaster({message: 'Item Added To Cart.', priority: 'success'});
            });
    }
</script>