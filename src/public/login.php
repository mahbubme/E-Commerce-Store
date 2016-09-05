<?php $pageTitle = "Login Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h1 class="text-center">Login</h1>
                <form class="well" action="" method="post">
                    <?php display_message(); ?>
                    <?php login_user(); ?> 
                    
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>