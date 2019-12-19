<style>
    .customHeight {
        height: 300px !important;
    }
</style>

<!-- Men's Featured Items -->
<!--<div class="eshop-section section">-->
<!--    <div class="container">-->
<!--        <a href="--><?php //echo site_url() ?><!--/home/category/MA"><h2 style="color:#4F8DB3">Men's Featured Items</h2></a>-->
<!---->
<!--        <div class="row">-->
<!--            --><?php //$i = 1;
//            foreach ($menFeaturedItem as $value): ?>
<!---->
<!--                <div class="col-sm-4">-->
<!--                    <div class="shop-item">-->
<!--                        <div class="image">-->
<!--                            <a href="--><?php //echo site_url() . '/home/details/' . $value['id'] ?><!--"><img-->
<!--                                        class="customHeight"-->
<!--                                        src="--><?php //echo base_url() ?><!--/uploads/item/--><?php //echo $value['profile_image'] ?><!--"-->
<!--                                        alt="--><?php //echo $value['item_name'] ?><!--"></a>-->
<!--                        </div>-->
<!--                        <div class="title">-->
<!--                            <h3>-->
<!--                                <a href="--><?php //echo site_url() . '/home/details/' . $value['id'] ?><!--">--><?php //echo $value['item_name'] ?><!--</a>-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="price">-->
<!--                            --><?php //if ($value['discount_price'] != $value['sales_price']) {
//                                echo '<span class="price-was">BDT: ' . $value['discount_price'] . '</span> BDT:' . $value['sales_price'];
//                            } else {
//                                echo 'BDT:' . $value['sales_price'];
//                            } ?>
<!--                        </div>-->
<!--                        <div class="description" style="text-align:center">-->
<!--                            <p>Available Size:-->
<!--                                --><?php
//                                $someObject = json_decode($value['size']);
//                                $temp_size = "";
//
//                                if (!empty($someObject)) {
//                                    foreach ($someObject as $key => $val) {
//                                        $temp_size .= $someObject[$key]->size . ",";
//                                    }
//                                }
//
//                                echo rtrim($temp_size, ',');
//                                ?>
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="actions">-->
<!--                            <a href="page-product-details.html" class="btn"><i-->
<!--                                        class="icon-shopping-cart icon-white"></i> Add to Cart</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                --><?php //if (fmod($i, 3) == 0) {
//                    echo '</div><div class="row">';
//                }
//                $i++;
//                ?>
<!---->
<!--            --><?php //endforeach ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Men's Featured Items Ends-->


<!-- Womens's Featured Items -->
<div class="eshop-section section">
    <div class="container">

        <a href="<?php echo base_url() ?>home/category/WO"><h2 style="color:#4F8DB3">Womens's Featured Items</h2></a>

        <div class="row">
            <?php $i = 1;
            foreach ($womenFeaturedItem as $value): ?>

                <div class="col-sm-4">
                    <div class="shop-item">
                        <div class="image">
                            <a href="<?php echo base_url() . 'home/details/' . $value['id'] ?>"><img
                                        class="customHeight"
                                        src="<?php echo base_url() ?>uploads/item/<?php echo $value['profile_image'] ?>"
                                        alt="<?php echo $value['item_name'] ?>"></a>
                        </div>
                        <div class="title">
                            <h3>
                                <a href="<?php echo site_url() . '/home/details/' . $value['id'] ?>"><?php echo $value['item_name'] ?></a>
                            </h3>
                        </div>
                        <div class="price">
                            <?php if ($value['discount_price'] != $value['sales_price']) {
                                echo '<span class="price-was">BDT: ' . $value['discount_price'] . '</span> BDT:' . $value['sales_price'];
                            } else {
                                echo 'BDT:' . $value['sales_price'];
                            } ?>
                        </div>
                        <div class="description" style="text-align:center">
                            <p>Available Size:
                                <?php
                                $someObject = json_decode($value['size']);
                                $temp_size = "";

                                if (!empty($someObject)) {
                                    foreach ($someObject as $key => $val) {
                                        $temp_size .= $someObject[$key]->size . ",";
                                    }
                                }

                                echo rtrim($temp_size, ',');
                                ?>
                            </p>
                        </div>
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn" onclick="addItemToCart(<?php echo $value['id']?>)">
                                <i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <?php if (fmod($i, 3) == 0) {
                    echo '</div><div class="row">';

                }
                $i++;
                ?>


            <?php endforeach ?>
        </div>

    </div>
</div>
<!-- Womens's Featured Items Ends-->

<!-- Kid's Featured Items -->
<!--<div class="eshop-section section">-->
<!--    <div class="container">-->
<!---->
<!--        <a href="--><?php //echo site_url() ?><!--/home/category/KD"><h2 style="color:#4F8DB3">Kid's Featured Items</h2></a>-->
<!---->
<!--        <div class="row">-->
<!--            --><?php //$i = 1;
//            foreach ($kidsFeaturedItem as $value): ?>
<!---->
<!--                <div class="col-sm-4">-->
<!--                    <div class="shop-item">-->
<!--                        <div class="image">-->
<!--                            <a href="--><?php //echo site_url() . '/home/details/' . $value['id'] ?><!--"><img-->
<!--                                        class="customHeight"-->
<!--                                        src="--><?php //echo base_url() ?><!--/uploads/item/--><?php //echo $value['profile_image'] ?><!--"-->
<!--                                        alt="--><?php //echo $value['item_name'] ?><!--"></a>-->
<!--                        </div>-->
<!--                        <div class="title">-->
<!--                            <h3>-->
<!--                                <a href="--><?php //echo site_url() . '/home/details/' . $value['id'] ?><!--">--><?php //echo $value['item_name'] ?><!--</a>-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="price">-->
<!--                            --><?php //if ($value['discount_price'] != $value['sales_price']) {
//                                echo '<span class="price-was">BDT: ' . $value['discount_price'] . '</span> BDT:' . $value['sales_price'];
//                            } else {
//                                echo 'BDT:' . $value['sales_price'];
//                            } ?>
<!--                        </div>-->
<!--                        <div class="description" style="text-align:center">-->
<!--                            <p>Available Size:-->
<!--                                --><?php
//                                $someObject = json_decode($value['size']);
//                                $temp_size = "";
//
//                                if (!empty($someObject)) {
//                                    foreach ($someObject as $key => $val) {
//                                        $temp_size .= $someObject[$key]->size . ",";
//                                    }
//                                }
//
//                                echo rtrim($temp_size, ',');
//                                ?>
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="actions">-->
<!--                            <a href="page-product-details.html" class="btn"><i-->
<!--                                        class="icon-shopping-cart icon-white"></i> Add to Cart</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                --><?php //if (fmod($i, 3) == 0) {
//                    echo '</div><div class="row">';
//                }
//                $i++;
//                ?>
<!---->
<!--            --><?php //endforeach ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Kid's Featured Items Ends-->


<!-- Home & Living Items -->
<div class="eshop-section section">
    <div class="container">

        <a href="<?php echo base_url() ?>home/category/HL"><h2 style="color:#4F8DB3">Home & Living Items</h2></a>

        <div class="row">
            <?php $i = 1;
            foreach ($homeLivingItem as $value): ?>

                <div class="col-sm-4">
                    <div class="shop-item">
                        <div class="image">
                            <a href="<?php echo site_url() . '/home/details/' . $value['id'] ?>"><img
                                        class="customHeight"
                                        src="<?php echo base_url() ?>uploads/item/<?php echo $value['profile_image'] ?>"
                                        alt="<?php echo $value['item_name'] ?>"></a>
                        </div>
                        <div class="title">
                            <h3>
                                <a href="<?php echo site_url() . '/home/details/' . $value['id'] ?>"><?php echo $value['item_name'] ?></a>
                            </h3>
                        </div>
                        <div class="price">
                            <?php if ($value['discount_price'] != $value['sales_price']) {
                                echo '<span class="price-was">BDT: ' . $value['discount_price'] . '</span> BDT:' . $value['sales_price'];
                            } else {
                                echo 'BDT:' . $value['sales_price'];
                            } ?>
                        </div>
                        <div class="description" style="text-align:center">
                            <p>Available Size:
                                <?php
                                $someObject = json_decode($value['size']);
                                $temp_size = "";

                                if (!empty($someObject)) {
                                    foreach ($someObject as $key => $val) {
                                        $temp_size .= $someObject[$key]->size . ",";
                                    }
                                }

                                echo rtrim($temp_size, ',');
                                ?>
                            </p>
                        </div>
                        <div class="actions">
                            <a href="javascript:void(0)" class="btn" onclick="addItemToCart(<?php echo $value['id']?>)">
                                <i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>

                <?php if (fmod($i, 3) == 0) {
                    echo '</div><div class="row">';
                }
                $i++;
                ?>

            <?php endforeach ?>
        </div>
    </div>
</div>
<!--Home & Living Items Ends-->


<script>
    function addItemToCart(productId) {

        $.post("<?php echo base_url() ?>cart/addItemToCart",
            {
                productId: productId,
                quantity: 1
            },
            function(data, status){
            var cartData = JSON.parse(data);
                $('#totalSelectedQuantity').text(cartData.totalItems);
                $.toaster({message: 'Item Added To Cart.', priority: 'success'});
            });
    }
</script>