<?php add_user(); ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Add User</h4>
        <ol class="breadcrumb"></ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php display_message(); ?>
        <div class="card-box">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group m-b-20">
                    <label>Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <label>User Photo <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group m-b-20">
                    <div class="clearfix">
                        <input type="submit" name="add_user" class="btn btn-success pull-right" value="Add User">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>