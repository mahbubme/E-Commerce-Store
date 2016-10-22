<?php

    if (isset($_GET['id'])) {
        
        $query = query("DELETE FROM users WHERE user_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>User Deleted</div>");
        redirect("index.php?source=users");

    }else {

        redirect("index.php?source=users");

    }

?>