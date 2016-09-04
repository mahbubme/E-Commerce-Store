<?php $pageTitle = "Category Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <?php include(TEMPLATE_FRONT . DS . "side_nav.php" ); ?>

            <div class="col-md-9">
				<p class="lead">Category Name</p>
                <div class="row">
                    <?php get_products_in_cat_page(); ?>
                </div>

            </div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>