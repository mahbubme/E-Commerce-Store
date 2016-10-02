<?php

    if (isset($_GET['id'])) {
        $query = query("DELETE FROM products WHERE product_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>Product Deleted</div>");
        redirect("index.php?source=products");

    }else {

        redirect("index.php?source=products");

    }

?>