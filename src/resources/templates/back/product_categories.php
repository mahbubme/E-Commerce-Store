<?php add_category(); ?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Product Categories</h4>
        <ol class="breadcrumb"></ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <?php display_message(); ?>
        <div class="card-box">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="cat_title">Title</label>
                    <input type="text" name="cat_title" class="form-control">
                </div>
                <div class="form-group text-right">
                    <input type="submit" name="add_category" class="btn btn-success" value="Add Category">
                </div>
            </form>
        </div>
    </div>
	<div class="col-sm-6">
        <div class="card-box">
			<div class="table-responsive">
                <table class="table table-actions-bar">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php show_categories_in_admin(); ?>
                    </tbody>
                </table>
            </div>
		</div>
    </div> <!-- end col -->
</div>