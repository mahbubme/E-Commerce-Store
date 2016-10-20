<?php 

    if (isset($_GET['id'])) {
        
        $query = query("SELECT * FROM categories WHERE cat_id = " .escape_string($_GET['id']). "");
        confirm($query);

        while ($row = fetch_array($query)) {
            
            $cat_title = escape_string($row['cat_title']);

        }

    }

    update_category(); 

?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Edit Product</h4>
        <ol class="breadcrumb"></ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php display_message(); ?>
        <div class="card-box">
            <form action="" method="post">

                <div class="form-group m-b-20">
                    <label for="cat_title">Title<span class="text-danger">*</span></label>
                    <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
                </div>

                <div class="form-group m-b-20">
                    <div class="clearfix">
                        <input type="submit" name="update" class="btn btn-success pull-right" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>