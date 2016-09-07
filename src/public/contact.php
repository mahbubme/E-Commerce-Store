<?php $pageTitle = "Contact Page"; ?>

<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php" ); ?>
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<div class="col-sm-2"></div>
        	<div class="col-sm-8 well">
        		<form class="row" action="" method="post">
                    <?php display_message(); ?>
        			<?php send_message(); ?>

        			<div class="form-group clearfix clearfix">
        				<div class="col-sm-2">
        					<label for="name" class="control-label">Name</label>
        				</div>
        				<div class="col-sm-10">
                        	<input type="text" name="name" class="form-control" placeholder="Your Name" required="required">
        				</div>
                    </div>
                    <div class="form-group clearfix">
        				<div class="col-sm-2">
        					<label for="email" class="control-label">Email</label>
        				</div>
        				<div class="col-sm-10">
                        	<input type="email" name="email" class="form-control" placeholder="Your Email" required="required">
        				</div>
                    </div>
                    <div class="form-group clearfix">
        				<div class="col-sm-2">
        					<label for="subject" class="control-label">Subject</label>
        				</div>
        				<div class="col-sm-10">
                        	<input type="text" name="subject" class="form-control" placeholder="Your Subject" required="required">
        				</div>
                    </div>
                    <div class="form-group clearfix">
        				<div class="col-sm-2">
        					<label for="message" class="control-label">Message</label>
        				</div>
        				<div class="col-sm-10">
                        	<textarea name="message" id="" cols="30" rows="3" class="form-control" placeholder="Your Message" required="required"></textarea>
        				</div>
                    </div>
                    <div class="form-group clearfix">
        				<div class="col-sm-12 text-right">
                        	<button type="submit" name="submit" class="btn btn-primary">Send Message</button>
        				</div>
                    </div>
        		</form>
        	</div>
        	<div class="col-sm-2"></div>
        </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php" ); ?>