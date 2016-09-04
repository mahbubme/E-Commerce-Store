<?php 

// helper functions

function redirect($location) {

	header("Location: $location");

}

function query($sql) {

	global $connection;

	return mysqli_query($connection, $sql);

}

function confirm($result) {

	global $connection;

	if (!$result) {
		die("QUERY FAILED" . mysqli_error($connection));
	}

}

function escape_string($string) {

	global $connection;

	return mysqli_real_escape_string($connection, $string);

}

function fetch_array($result) {

	return mysqli_fetch_array($result);

}

/*
 *
 * FRONT END FUNCTIONS
 *
 */

// get products
function get_products() {

	$query = query("SELECT * FROM products");
	confirm($query);

	while($row = fetch_array($query)) {

		$product = <<<DELIMETER

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img class="img-responsive" src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="text-center">
                                	<a href="item.php?id={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
DELIMETER;
		
		echo $product;
	}
}

function get_categories() {

	$query = query("SELECT * FROM categories");
	confirm($query);

	while ($row = fetch_array($query)) {

		$category_links = <<<DELIMETER
			<li class='list-group-item'><a href="category.php?id={$row['cat_id']}">{$row['cat_title']}</a></li>
DELIMETER;
		
		echo $category_links;
	}

}

function get_products_in_cat_page() {

	$query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");
	confirm($query);

	while($row = fetch_array($query)) {

		$product = <<<DELIMETER

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img class="img-responsive" src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="text-center">
                                	<a href="item.php?id={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
DELIMETER;
		
		echo $product;
	}
}


function get_products_in_shop_page() {

	$query = query("SELECT * FROM products");
	confirm($query);

	while($row = fetch_array($query)) {

		$product = <<<DELIMETER

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img class="img-responsive" src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="text-center">
                                	<a href="item.php?id={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
DELIMETER;
		
		echo $product;
	}
}

/*
 *
 * BACK END FUNCTIONS
 *
 */

?>