<?php $pageTitle = "Product Single Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <?php include(TEMPLATE_FRONT . DS . "side_nav.php" ); ?>
			
			<?php 

				$query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
				confirm($query);

			?>

			<?php while ($row = fetch_array($query)) : ?>

	            <div class="col-md-9">
	                <div class="row">
	                    
	                    <div class="clearfix">
		                    <div class="col-sm-7">
		                    	<img src="<?php echo $row['product_image']; ?>" alt="" class="img-responsive">
		                    </div>

		                    <div class="col-sm-5">
		                    	<div class="thumbnail well">
		                    		<div class="caption-full">
		                                <h4><?php echo $row['product_title']; ?></h4>
		                    			<h4>&#36;<?php echo $row['product_price']; ?></h4>
		                                <p><?php echo $row['short_desc']; ?></p>
		                                <div class="text-center">
		                                	<a href="item.php?id={$row['product_id']}" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Add to cart</a>
		                                </div>
		                    		</div>
		                    	</div>
		                    </div>
	                    </div>

	                    <div class="col-sm-12 clearfix">
						    <ul class="nav nav-tabs" id="myTabs" role="tablist">
						        <li role="presentation" class="active"><a href="#description" id="description-tab" role="tab" data-toggle="tab" aria-controls="description" aria-expanded="true">Description</a>
						        </li>
						        <li role="presentation" class=""><a href="#reviews" role="tab" id="review-tab" data-toggle="tab" aria-controls="reviews" aria-expanded="false">Reviews</a>
						        </li>
						    </ul>
						    <div class="tab-content" id="myTabContent">
						        <div class="tab-pane fade active in" role="tabpanel" id="description" aria-labelledby="description-tab">
						            <p><?php echo $row['product_description']; ?></p>
						        </div>
						        <div class="tab-pane fade" role="tabpanel" id="reviews" aria-labelledby="review-tab">
						            <p></p>
						        </div>
						    </div>
	                    </div>

	                </div>
	            </div>

        	<?php endwhile; ?>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>