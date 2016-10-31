<?php $pageTitle = "Dashboard"; ?>

<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "header.php" ); ?>


<?php 
    
    if (!isset($_SESSION['username'])) {
        redirect("../../public");
    }
    
?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <?php 

                            if ( isset( $_GET['source'] ) ) {
                                $source = $_GET['source'];
                            }else {
                                $source = '';
                            }

                            switch( $source ) {
                                case 'orders':
                                    include(TEMPLATE_BACK . DS . "orders.php" );
                                break;

                                case 'products':
                                    include(TEMPLATE_BACK . DS . "products.php" );
                                break;

                                case 'add_product':
                                    include(TEMPLATE_BACK . DS . "add_product.php" );
                                break;

                                case 'edit_product':
                                    include(TEMPLATE_BACK . DS . "edit_product.php" );
                                break;

                                case 'delete_product':
                                    include(TEMPLATE_BACK . DS . "delete_product.php" );
                                break;

                                case 'categories':
                                    include(TEMPLATE_BACK . DS . "product_categories.php" );
                                break;

                                case 'delete_category':
                                    include(TEMPLATE_BACK . DS . "delete_category.php" );
                                break;
                                
                                case 'edit_category':
                                    include(TEMPLATE_BACK . DS . "edit_category.php" );
                                break;

                                case 'users':
                                    include(TEMPLATE_BACK . DS . "users.php" );
                                break;

                                case 'add_user':
                                    include(TEMPLATE_BACK . DS . "add_user.php" );
                                break;

                                case 'delete_user':
                                    include(TEMPLATE_BACK . DS . "delete_user.php" );
                                break;

                                case 'edit_user':
                                    include(TEMPLATE_BACK . DS . "edit_user.php" );
                                break;

                                case 'reports':
                                    include(TEMPLATE_BACK . DS . "reports.php" );
                                break;

                                case 'delete_report':
                                    include(TEMPLATE_BACK . DS . "delete_report.php" );
                                break;

                                default:
                                    include(TEMPLATE_BACK . DS . "orders.php" );
                                break;
                            }


                        ?>


                    </div> <!-- container -->

                </div> <!-- content -->
<?php include(TEMPLATE_BACK . DS . "footer.php" ); ?>