<?php add_slides(); ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Add Slide</h4>
        <ol class="breadcrumb"></ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <?php display_message(); ?>
        <div class="card-box">
            <form action="" method="post" enctype="multipart/form-data">
				
				<div class="form-group m-b-20">
                    <label for="file">Upload Banner <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <label for="slide_title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="slide_title" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <div class="clearfix">
                        <input type="submit" name="add_slide" class="btn btn-success pull-right" value="Save">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col-sm-6">
    	<div class="card-box">
    		<?php get_current_slide_in_admin(); ?>
    	</div>
    </div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title">Slides Available</h4><br>
	</div>
    <?php get_slide_thumbnails(); ?>
</div>