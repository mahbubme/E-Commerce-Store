        <!-- Navigation -->
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">E-Commerce Store</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="shop.php">&nbsp; Shop</a></li>
                        <li><a href="checkout.php">&nbsp; Checkout</a></li>
                        <li><a href="contact.php">&nbsp; Contact</a></li>
                        <?php 
                            if (isset($_SESSION['username'])) {
                                echo "<li><a href='admin/index.php' target='_blank'>&nbsp; Admin</a></li>";
                                echo "<li><a href='logout.php'><i class='fa fa-sign-out'></i>&nbsp; Logout</a></li>";
                            }else {
                                echo "<li><a href=''><i class='fa fa-user'></i>&nbsp; Sign Up</a></li>
                                <li><a href='login.php'><i class='fa fa-sign-in'></i>&nbsp; Login</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>