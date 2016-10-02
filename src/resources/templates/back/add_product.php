<?php add_product_in_admin(); ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Add Product</h4>
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
                    <input type="text" name="product_title" class="form-control" placeholder="e.g : Apple iMac">
                </div>

                <div class="form-group m-b-20">
                    <label>Product Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="product_description" rows="5" placeholder="Please enter description"></textarea>
                </div>

                <div class="form-group m-b-20">
                    <label>Product Summary</label>
                    <textarea class="form-control" name="short_desc" rows="3" placeholder="Please enter summary"></textarea>
                </div>

                <div class="form-group m-b-20">
                    <label>Category <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="product_category_id">
                        <option>Select</option>
                    </select>
                </div>

                <div class="form-group m-b-20">
                    <label>Price <span class="text-danger">*</span></label>
                    <input type="text" name="product_price" class="form-control" placeholder="e.g : $562.56">
                </div>

                <div class="form-group m-b-20">
                    <label>Product Image <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <label>Quantity <span class="text-danger">*</span></label>
                    <input type="text" name="product_quantity" class="form-control" placeholder="e.g : 10">
                </div>

                <div class="form-group m-b-20">
                    <div class="clearfix">
                        <input type="submit" name="publish" class="btn btn-success pull-right" value="Publish">
                        <input type="submit" name="draft" class="btn btn-primary pull-right" value="Draft">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>