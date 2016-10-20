<?php

    if (isset($_GET['id'])) {
        
        $query = query("DELETE FROM categories WHERE cat_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>Category Deleted</div>");
        redirect("index.php?source=categories");

    }else {

        redirect("index.php?source=categories");

    }

?>