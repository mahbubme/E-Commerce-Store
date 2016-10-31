<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Products</h4>
        <ol class="breadcrumb"></ol>
        <?php display_message(); ?>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<div class="table-responsive">
                <table class="table table-actions-bar">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Id</th>
                            <th>Order Id</th>
                            <th>Price</th>
                            <th>Product Title</th>
                            <th>Product Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php get_reports(); ?>
                    </tbody>
                </table>
            </div>
		</div>
        
    </div> <!-- end col -->

    
</div>