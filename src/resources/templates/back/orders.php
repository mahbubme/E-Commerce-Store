<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Orders</h4>
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
                            <th>Amount</th>
                            <th>Transaction</th>
                            <th>Currency</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php display_orders(); ?>
                    </tbody>
                </table>
            </div>
		</div>
        
    </div> <!-- end col -->

    
</div>