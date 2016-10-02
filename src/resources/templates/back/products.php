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
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php get_products_in_admin(); ?>
                    </tbody>
                </table>
            </div>
		</div>
        
    </div> <!-- end col -->

    
</div>