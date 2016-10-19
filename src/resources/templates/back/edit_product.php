<?php 

    if (isset($_GET['id'])) {
        
        $query = query("SELECT * FROM products WHERE product_id = " .escape_string($_GET['id']). "");
        confirm($query);

        while ($row = fetch_array($query)) {
            
            $product_title = escape_string($row['product_title']);
            $product_category_id = escape_string($row['product_category_id']);
            $product_price = escape_string($row['product_price']);
            $product_description = escape_string($row['product_description']);
            $short_desc = escape_string($row['short_desc']);
            $product_quantity = escape_string($row['product_quantity']);
            $product_image = escape_string($row['product_image']); 
            $product_image = display_image($product_image);

        }

    }

    update_product(); 

?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Edit Product</h4>
        <ol class="breadcrumb"></ol>
        <?php display_message(); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group m-b-20">
                    <label>Product name <span class="text-danger">*</span></label>
                    <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">
                </div>

                <div class="form-group m-b-20">
                    <label>Product Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="product_description" rows="5"><?php echo $product_description; ?></textarea>
                </div>

                <div class="form-group m-b-20">
                    <label>Product Summary</label>
                    <textarea class="form-control" name="short_desc" rows="3"><?php echo $short_desc; ?></textarea>
                </div>

                <div class="form-group m-b-20">
                    <label>Category <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="product_category_id">
                        <option value="<?php echo $product_category_id; ?>"><?php echo show_product_category_title($product_category_id); ?></option>
                        <?php show_categories_add_product(); ?>
                    </select>
                </div>

                <div class="form-group m-b-20">
                    <label>Price <span class="text-danger">*</span></label>
                    <input type="text" name="product_price" class="form-control" value="<?php echo $product_price; ?>">
                </div>

                <div class="form-group m-b-20">
                    <label>Product Image <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control"> <br>
                    <img src="../../resources/<?php echo $product_image; ?>" style="max-width:200px" alt="">
                </div>

                <div class="form-group m-b-20">
                    <label>Quantity <span class="text-danger">*</span></label>
                    <input type="text" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>">
                </div>

                <div class="form-group m-b-20">
                    <div class="clearfix">
                        <input type="submit" name="update" class="btn btn-success pull-right" value="Update">
                        <input type="submit" name="draft" class="btn btn-primary pull-right" value="Draft">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>