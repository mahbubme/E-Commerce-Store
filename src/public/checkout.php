<?php $pageTitle = "Checkout Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>

<?php 
	
	if (isset($_SESSION['product_1'])) {
		echo $_SESSION['product_1'];
	}
?>   
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php display_message(); ?>
                <h1>Checkout</h1>

                <form action="">
                	<table class="table table-striped">
                		<thead>
                			<tr>
                				<th>Product</th>
                				<th>Price</th>
                				<th>Quantity</th>
                				<th>Sub-total</th>
                				<th></th>
                				<th></th>
                			</tr>
                		</thead>
                		<tbody>
                			<tr>
                				<td>apple</td>
                				<td>$23</td>
                				<td>3</td>
                				<td>2</td>
                				<td><a href="cart.php?remove=1">Remove</a></td>
                				<td><a href="cart.php?delete=1">Delete</a></td>
                			</tr>
                		</tbody>
                	</table>
                </form>
            </div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>