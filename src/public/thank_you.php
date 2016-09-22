<?php $pageTitle = "Thank You Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <?php 

                    if (isset($_GET['tx'])) {

                        $amount = $_GET['amt'];
                        $currency = $_GET['cc'];
                        $transaction = $_GET['tx'];
                        $status = $_GET['st'];

                        $query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency) VALUES('{$amount}','{$transaction}','{$status}','{$currency}')");
                        confirm($query);

                        session_destroy();

                    }else {

                        redirect("index.php");

                    }

                ?>
                <h1 class="text-center">Thank You</h1>
            </div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>