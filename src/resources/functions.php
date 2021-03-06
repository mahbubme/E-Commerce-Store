<?php 

$upload_directory = "uploads";

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

		$product_image = display_image($row['product_image']);

		$product = <<<DELIMETER

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img class="img-responsive" src="../resources/{$product_image}" alt=""></a>
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
		
		$product_image = display_image($row['product_image']);

		$product = <<<DELIMETER

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img class="img-responsive" src="../resources/{$product_image}" alt=""></a>
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

		$product_image = display_image($row['product_image']);

		$product = <<<DELIMETER

                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img class="img-responsive" src="../resources/{$product_image}" alt=""></a>
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
					$product_image = display_image($row['product_image']);

					$product = <<<DELIMETER
					<tr>
						<td>{$row['product_title']}</td>
						<td><img src="../resources/{$product_image}" style="max-width:70px"></td>
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

function display_orders() {

	$query = query("SELECT * FROM orders");
	confirm($query);

	while ($row = fetch_array($query) ) {
		
		$orders = <<<DELIMETER

		<tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>
                <span class="label label-success">{$row['order_status']}</span>
            </td>
            <td>
            	<a href="../../resources/templates/back/delete_order.php?id={$row['order_id']}" class="table-action-btn"><i class="md md-close"></i></a>
            </td>
        </tr>
DELIMETER;
		
		echo $orders;

	}

}

function display_image( $picture ) {

	global $upload_directory;

	return $upload_directory . DS . $picture;

}

function get_products_in_admin() {

	$query = query("SELECT * FROM products");
	confirm($query);

	while ($row = fetch_array($query) ) {
		
		$category = show_product_category_title($row['product_category_id']);
		$product_image = display_image($row['product_image']);

		$products = <<<DELIMETER

		<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>
            <td><img src="../../resources/{$product_image}" style="max-width:150px"></td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td>
            	<a href="index.php?source=edit_product&id={$row['product_id']}" class="table-action-btn"><i class="md md-edit"></i></a>
            	<a href="index.php?source=delete_product&id={$row['product_id']}" class="table-action-btn"><i class="md md-close"></i></a>
            </td>
        </tr>
DELIMETER;
		
		echo $products;

	}

}


function add_product_in_admin() {

	if (isset($_POST['publish'])) {
		
		$product_title = escape_string($_POST['product_title']);
		$product_category_id = escape_string($_POST['product_category_id']);
		$product_price = escape_string($_POST['product_price']);
		$product_description = escape_string($_POST['product_description']);
		$short_desc = escape_string($_POST['short_desc']);
		$product_quantity = escape_string($_POST['product_quantity']);
		$product_image = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);

		move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

		$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_image, product_quantity) VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$short_desc}','{$product_image}','{$product_quantity}')");
		$last_id = last_id();
		confirm($query);
		set_message("<div class='alert alert-success text-center' role='alert'>New Product with id {$last_id} Just Added</div>");

		redirect("index.php?source=products");

	}

}

function update_product() {

	if (isset($_POST['update'])) {
		
		$product_title = escape_string($_POST['product_title']);
		$product_category_id = escape_string($_POST['product_category_id']);
		$product_price = escape_string($_POST['product_price']);
		$product_description = escape_string($_POST['product_description']);
		$short_desc = escape_string($_POST['short_desc']);
		$product_quantity = escape_string($_POST['product_quantity']);
		$product_image = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);
		
		if (empty($product_image)) {
			
			$get_pic = query("SELECT product_image FROM  products WHERE product_id=" .escape_string($_GET['id']). " ");
			confirm($get_pic);

			while ($pic = fetch_array($get_pic) ) {
				
				$product_image = $pic['product_image'];

			}
			
		}

		move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

		$query  = "UPDATE products SET ";
		$query .= "product_title = '{$product_title}', ";
		$query .= "product_category_id = '{$product_category_id}', ";
		$query .= "product_price = '{$product_price}', ";
		$query .= "product_description = '{$product_description}', ";
		$query .= "short_desc = '{$short_desc}', ";
		$query .= "product_quantity = '{$product_quantity}', ";
		$query .= "product_image = '{$product_image}' ";
		$query .= "WHERE product_id=". escape_string($_GET['id']);

		$send_update_query = query($query);

		confirm($send_update_query);
		set_message("<div class='alert alert-success text-center' role='alert'>Product has been updated</div>");

		redirect("index.php?source=products");

	}

}

function show_categories_add_product() {

	$query = query("SELECT * FROM categories");
	confirm($query);

	while ($row = fetch_array($query)) {
		
		$categories_options = <<<DELIMETER

			<option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETER;
		
		echo $categories_options;

	}

}

function show_product_category_title( $product_category_id ) {

	$category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
	confirm($category_query);

	while ($category_row = fetch_array($category_query) ) {

		return $category_row['cat_title'];

	}

}

function show_categories_in_admin() {

	$query = "SELECT * FROM categories";
	$category_query = query($query);
	confirm($category_query);

	while ($row = fetch_array($category_query) ) {

		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];

		$category = <<<DELIMETER

		<tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td>
            	<a href="index.php?source=edit_category&id={$row['cat_id']}" class="table-action-btn"><i class="md md-edit"></i></a>
            	<a href="index.php?source=delete_category&id={$row['cat_id']}" class="table-action-btn"><i class="md md-close"></i></a>
            </td>
        </tr>

DELIMETER;
		
		echo $category;

	}

}

function add_category() {

	if (isset($_POST['add_category'])) {
		
		if (!empty($_POST['cat_title'])) {

			$cat_title = escape_string($_POST['cat_title']);
			$query = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
			confirm($query);

			// if( mysqli_affected_rows($query) == 0 ) {

			// 	set_message("<div class='alert alert-danger text-center' role='alert'>Nothing Worked</div>");

			// }	

			redirect("index.php?source=categories");

		}else {
			set_message("<div class='alert alert-danger text-center' role='alert'>Field cannot be empty.</div>");	
		}
	
	}

}

function update_category() {

	if (isset($_POST['update'])) {

		if (!empty($_POST['cat_title'])) {
		
			$cat_title = escape_string($_POST['cat_title']);

			$query  = "UPDATE categories SET ";
			$query .= "cat_title = '{$cat_title}' ";
			$query .= "WHERE cat_id=". escape_string($_GET['id']);

			$send_update_query = query($query);

			confirm($send_update_query);
			set_message("<div class='alert alert-success text-center' role='alert'>Category has been updated</div>");

			redirect("index.php?source=categories");

		}else {
			set_message("<div class='alert alert-danger text-center' role='alert'>Field cannot be empty.</div>");	
		}

	}

}

function display_users() {

	$query = query("SELECT * FROM users");
	confirm($query);

	while ($row = fetch_array($query) ) {
		
		$user_id = $row['user_id'];
		$username = $row['username'];
		$email = $row['email'];
		$user_photo = display_image($row['user_photo']);

		$user = <<<DELIMETER

		<tr>
            <td>{$user_id}</td>
            <td>{$username}</td>
            <td><img src="../../resources/{$user_photo}" style="max-width:150px"></td>
            <td>{$email}</td>
            <td>
            	<a href="index.php?source=edit_user&id={$row['user_id']}" class="table-action-btn"><i class="md md-edit"></i></a>
            	<a href="index.php?source=delete_user&id={$row['user_id']}" class="table-action-btn"><i class="md md-close"></i></a>
            </td>
        </tr>
DELIMETER;
		
		echo $user;

	}

}

function add_user() {

	if (isset($_POST['add_user'])) {

		$username = escape_string($_POST['username']);
		$email = escape_string($_POST['email']);
		$password = escape_string($_POST['password']);
		$user_photo = escape_string($_FILES['file']['name']);
		$photo_temp = escape_string($_FILES['file']['tmp_name']);

		move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);

		$query = query("INSERT INTO users(username,email,password,user_photo) VALUES('{$username}','{$email}','{$password}','{$user_photo}')");
		confirm($query);

		set_message("<div class='alert alert-success text-center' role='alert'>User has been created</div>");
		 
	}

}

function update_user() {

	if (isset($_POST['update_user'])) {
		
		$email = escape_string($_POST['email']);
		$password = escape_string($_POST['password']);
		$user_photo = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);
		
		if (empty($user_photo)) {
			
			$get_pic = query("SELECT user_photo FROM  users WHERE user_id=" .escape_string($_GET['id']). " ");
			confirm($get_pic);

			while ($pic = fetch_array($get_pic) ) {
				
				$user_photo = $pic['user_photo'];

			}
			
		}

		move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $user_photo);

		$query  = "UPDATE users SET ";
		$query .= "email = '{$email}', ";
		$query .= "user_photo = '{$user_photo}', ";
		$query .= "password = '{$password}' ";
		$query .= "WHERE user_id=". escape_string($_GET['id']);

		$send_update_query = query($query);

		confirm($send_update_query);
		set_message("<div class='alert alert-success text-center' role='alert'>User has been updated</div>");

		redirect("index.php?source=users");

	}	
}


function get_reports() {

	$query = query("SELECT * FROM reports");
	confirm($query);

	while ($row = fetch_array($query) ) {

		$product = <<<DELIMETER

		<tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_quantity']}</td>
            <td>
            	<a href="index.php?source=delete_report&id={$row['report_id']}" class="table-action-btn"><i class="md md-close"></i></a>
            </td>
        </tr>
DELIMETER;
		
		echo $product;

	}

}

/**
 *
 * Slider Functions
 *
 */

function add_slides() {

	if (isset($_POST['add_slide'])) {

		$slide_title = escape_string($_POST['slide_title']);
		$slide_image = escape_string($_FILES['file']['name']);
		$slide_image_loc = escape_string($_FILES['file']['tmp_name']);

		if ( empty($slide_title) || empty($slide_image) ) {
			
			set_message("<div class='alert alert-danger text-center' role='alert'>Fields cannot be empty.</div>");

		}else {

			move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY . DS . $slide_image);

			$query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
			confirm($query);

			set_message("<div class='alert alert-success text-center' role='alert'>Slide Added</div>");

		}

	}

}

function get_slides() {

	$query = query("SELECT * FROM slides");
	confirm($query);

	$count = 0;
	
	while ( $row = fetch_array($query) ) {
		
		$slide_image = display_image($row['slide_image']);

		$slides = <<<DELIMETER
	
		<div class="item">
	      <img class="img-responsive" src="../resources/{$slide_image}" alt="">
	    </div>
DELIMETER;

		echo $slides;

	}

}

function get_active_slide() {

	$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
	confirm($query);

	while ( $row = fetch_array($query) ) {
		
		$slide_image = display_image($row['slide_image']);

		$slides = <<<DELIMETER

		<div class="item active">
	      <img class="img-responsive" src="../resources/{$slide_image}" alt="">
	    </div>
DELIMETER;

		echo $slides;

	}

}

function get_current_slide_in_admin() {

	$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
	confirm($query);

	while( $row = fetch_array($query) ) {

		$slide_image = display_image($row['slide_image']);
		$slide_active_admin = <<<DELIMETER

		<img src="../../resources/{$slide_image}" alt="" class="img-responsive">

DELIMETER;
		
		echo $slide_active_admin;

	}

}

function get_slide_thumbnails() {
	
	$query = query("SELECT * FROM slides ORDER BY slide_id ASC");
	confirm($query);

	while( $row = fetch_array($query) ) {

		$slide_image = display_image($row['slide_image']);
		$slide_thumb_admin = <<<DELIMETER
	
		<div class="text-center" style="max-width: 300px;padding:15px; display: inline-block">
			<img src="../../resources/{$slide_image}" class="img-responsive" alt="" class="img-responsive">
			<a class="btn btn-danger" href="index.php?source=delete_slide&id={$row['slide_id']}"><span class="glyphicon glyphicon-remove"></span></a>
		</div>

DELIMETER;
		
		echo $slide_thumb_admin;

	}

}

?>