<?php 

    if (isset($_GET['id'])) {
        
        $query = query("SELECT * FROM users WHERE user_id = " .escape_string($_GET['id']). "");
        confirm($query);

        while ($row = fetch_array($query)) {
            
            $username = escape_string($row['username']);
            $email = escape_string($row['email']);
            $password = escape_string($row['password']);
            $user_photo = escape_string($row['user_photo']); 
            $user_photo = display_image($user_photo);

        }

    }

    update_user(); 

?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Edit User</h4>
        <ol class="breadcrumb"></ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php display_message(); ?>
        <div class="card-box">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group m-b-20">
                    <label>Username <span class="text-danger"></span></label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" disabled>
                </div>

                <div class="form-group m-b-20">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                </div>

                <div class="form-group m-b-20">
                    <label>User Photo <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control">
                    <img src="../../resources/<?php echo $user_photo; ?>" style="max-width:200px" alt="">
                </div>

                <div class="form-group m-b-20">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>"> 
                </div>

                <div class="form-group m-b-20">
                    <div class="clearfix">
                        <input type="submit" name="update_user" class="btn btn-success pull-right" value="Update User">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>