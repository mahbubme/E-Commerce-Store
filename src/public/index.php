<?php $pageTitle = "Home Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <?php include(TEMPLATE_FRONT . DS . "side_nav.php" ); ?>

            <div class="col-md-9">
                
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <!-- Carousel -->        
                        <?php include(TEMPLATE_FRONT . DS . "slider.php" ); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img class="img-responsive" src="http://placehold.it/780x500" alt="">
                            <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>
                                    <a href="#" class="btn btn-primary" role="button">Button</a> 
                                    <a href="#" class="btn btn-default" role="button">Button</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>