<?php $pageTitle = "Shop Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
				<h1>Shop</h1>
                <div class="row">
                    <?php get_products_in_shop_page(); ?>
                </div>

            </div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>