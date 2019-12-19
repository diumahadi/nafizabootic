<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-sm-3 blog-sidebar">
                <h4>Search our Items</h4>
                <form>
                    <div class="input-group">
                        <input class="form-control input-md" id="appendedInputButtons" type="text">
                        <span class="input-group-btn">
									<button class="btn btn-md" type="button">Search</button>
								</span>
                    </div>
                </form>

                <h4>Categories</h4>
                <ul class="blog-categories">
                    <?php foreach ($category as $value): ?>
                        <li>
                            <a href="<?php echo base_url() ?>home/group/<?php echo $value['id'] ?>"><?php echo $value['group_name'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>

            </div>
            <!-- End Sidebar -->
            <div class="col-sm-9">
                <div class="row">
                    <?php

                    $flag = 0;

                    $totalRecord = count($categoryItems);


                    if (fmod($totalRecord, 3) != 0) {
                        $flag = 1;
                    }

                    $i = 1;
                    foreach ($categoryItems as $value): ?>

                        <div class="col-sm-4">
                            <div class="shop-item">
                                <div class="image">
                                    <a href="<?php echo site_url() . '/home/details/' . $value['id'] ?>"><img
                                                class="customHeight"
                                                src="<?php echo base_url() ?>uploads/item/<?php echo $value['profile_image'] ?>"
                                                alt="Item Name"></a>
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
                                    <button onclick="addItemToCart(<?php echo $value['id'] ?>)" class="btn"><i
                                                class="icon-shopping-cart icon-white"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <?php if (fmod($i, 3) == 0) {
                            echo '</div><div class="row">';
                        }
                        $i++;
                        ?>


                    <?php endforeach ?>

                    <?php if ($flag == 1) {
                        echo "</div>";
                    } ?>
                </div>
            </div>
            <!-- End Blog Post -->
        </div>
    </div>
</div>

<div class="eshop-section section">
    <div class="container">
        <h2>Related Products</h2>
        <div class="row">

            <?php foreach ($relatedItems as $value): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-item-image">
                            <a href="<?php echo site_url() . '/home/details/' . $value['id'] ?>"><img
                                        style="height:250px;width:100%"
                                        src="<?php echo base_url() ?>uploads/item/<?php echo $value['profile_image'] ?>"
                                        alt="Item Name"></a>
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
                        <div class="actions">
                            <button onclick="addItemToCart(<?php echo $value['id'] ?>)" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Add</button>
                            <span>or <a href="<?php echo site_url() . '/home/details/' . $value['id'] ?>">Read more</a></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>


    </div>
</div>


<script>
    function addItemToCart(productId) {

        $.post("<?php echo base_url() ?>cart/addItemToCart",
            {
                productId: productId,
                quantity: 1
            },
            function (data, status) {
                var cartData = JSON.parse(data);
                $('#totalSelectedQuantity').text(cartData.totalItems);
                $.toaster({message: 'Item Added To Cart.', priority: 'success'});
            });
    }
</script>