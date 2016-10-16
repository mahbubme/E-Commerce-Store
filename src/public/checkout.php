<?php $pageTitle = "Checkout Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php display_message(); ?>
                <h1>Checkout</h1>

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="business" value="pay-facilitator@mahbub.me">
                    <input type="hidden" name="currency_code" value="US">

                	<table class="table table-striped">
                		<thead>
                			<tr>
                                <th>Product</th>
                				<th>Image</th>
                				<th>Price</th>
                				<th>Quantity</th>
                				<th>Sub-total</th>
                				<th></th>
                				<th></th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php cart(); ?>
                		</tbody>
                	</table>
                    <?php echo show_paypal(); ?>
                </form>

            </div>

            <!-- Cart Totals -->
            <div class="col-sm-4 clearfix pull-right">
                <h2>Cart Totals</h2>
                <table class="table table-bordered">
                    <tr class="cart-subtotal">
                        <th>Items:</th>
                        <td><span class="amount"><?php echo isset($_SESSION['item_quantity']) ?  $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?></span></td>
                    </tr>
                    <tr class="shipping">
                        <th>Shipping and Handling</th>
                        <td>Free Shipping</td>
                    </tr>
                    <tr class="order-total">
                        <th>Order Total</th>
                        <td><strong><span class="amount">&#36;<?php echo isset($_SESSION['item_total']) ?  $_SESSION['item_total'] : $_SESSION['item_total'] = ""; ?></span></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>