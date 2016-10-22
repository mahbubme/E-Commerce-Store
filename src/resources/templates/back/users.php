<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Users</h4>
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
                            <th>Username</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php display_users(); ?>
                    </tbody>
                </table>
            </div>
		</div>
        
    </div> <!-- end col -->
    <div class="col-sm-12">
        <a href="index.php?source=add_user" class="btn btn-primary">Add User</a>  
    </div>
</div>