<?php 

// helper functions

function last_id() {

	global $connection;

	return mysqli_insert_id($connection);

}

function set_message($msg) {

	if (!empty($msg)) {
		$_SESSION['message'] = $msg;
	}else{
		$msg = "";
	}

}

function display_message() {

	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}

}

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
                                	<a href="cart.php?add={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
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
                                	<a href="cart.php?add={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
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
                                	<a href="cart.php?add={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
DELIMETER;
		
		echo $product;
	}
}

function login_user() {

	if(isset($_POST['submit'])) {

		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);

		$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
		confirm($query);

		if (mysqli_num_rows($query) == 0) {

			set_message("<div class='alert alert-danger text-center' role='alert'>Your Password or Username is wrong</div>");
			redirect("login.php");

		}else{

			$_SESSION['username'] = $username;
			//set_message("<div class='alert alert-success' role='alert'>Welcome to Admin {$username}</div>");
			redirect("admin");

		}

	}

}

function send_message() {

	if (isset($_POST['submit'])) {
		
		$to = "admin@mail.com";
		$from_name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$headers = "From: {$from_name} {$email}";

		$result = mail($to, $subject, $message, $headers);

		if (!$result) {
			set_message("<div class='alert alert-danger text-center' role='alert'>Sorry we could not send your message</div>");
			redirect("contact.php");
		}else{
			set_message("<div class='alert alert-success text-center' role='alert'>Your message has been sent</div>");
			redirect("contact.php");
		}

	}

}

function cart() {

	$total = 0;
	$item_quantity = 0;
	$item_name = 1;
	$item_number = 1;
	$amount = 1;
	$quantity = 1;

	foreach ($_SESSION as $name => $value) {
		
		if ($value > 0) {

			if (substr($name, 0, 8) == "product_") {

				$length = strlen($name - 8);
				$id = substr($name, 8, $length);

				$query = query("SELECT * FROM products WHERE product_id=". escape_string($id) ."");
				confirm($query);

				while ($row = fetch_array($query)) {

					$sub = $row['product_price'] * $value;
					$item_quantity += $value;

					$product = <<<DELIMETER
					<tr>
						<td>{$row['product_title']}</td>
						<td>&#36;{$row['product_price']}</td>
						<td>{$value}</td>
						<td>&#36;{$sub}</td>
						<td>
							<a class="btn btn-warning" href="cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"></span></a>
							<a class="btn btn-success" href="cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>
							<a class="btn btn-danger" href="cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>

					<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
					<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
					<input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
					<input type="hidden" name="quantity_{$quantity}" value="{$value}">
DELIMETER;
				
				echo $product;

				$item_name++;
				$item_number++;
				$amount++;
				$quantity++;


				}

				$_SESSION['item_total'] = $total += $sub;
				$_SESSION['item_quantity'] = $item_quantity;

			}

		}

	}

}

function show_paypal() {

	if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1 ) {

		$paypal_button = <<<DELIMETER
	                    <input type="image" name="upload" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
DELIMETER;

		return $paypal_button;	

	}

}


function report() {

	if (isset($_GET['tx'])) {

        $amount = $_GET['amt'];
        $currency = $_GET['cc'];
        $transaction = $_GET['tx'];
        $status = $_GET['st'];

		$total = 0;
		$item_quantity = 0;

		foreach ($_SESSION as $name => $value) {
			
			if ($value > 0) {

				if (substr($name, 0, 8) == "product_") {

					$length = strlen($name - 8);
					$id = substr($name, 8, $length);

			        $send_order = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency) VALUES('{$amount}','{$transaction}','{$status}','{$currency}')");
					$last_id = last_id();

					confirm($send_order);

					$query = query("SELECT * FROM products WHERE product_id=". escape_string($id) ."");
					confirm($query);

					while ($row = fetch_array($query)) {

						$product_price = $row['product_price'];
						$product_title = $row['product_title'];
						$sub = $row['product_price'] * $value;
						$item_quantity += $value;
						
						$insert_report = query("INSERT INTO reports (product_id, order_id, product_title, product_price, product_quantity) VALUES('{$id}','{$last_id}','{$product_title}','{$product_price}','{$value}')");
						confirm($insert_report);

					}

					$total += $sub;
					//echo $item_quantity;

				}

			}

		}

		session_destroy();

	}else {

		redirect("index.php");

	}

}

/*
 *
 * BACK END FUNCTIONS
 *
 */

?>