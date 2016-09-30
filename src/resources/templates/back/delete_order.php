<?php require_once("../../config.php"); ?>

<?php

    if (isset($_GET['id'])) {
        $query = query("DELETE FROM orders WHERE order_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>Order Deleted</div>");
        redirect("../../../public/admin/index.php?source=orders");

    }else {

        redirect("../../../public/admin/index.php?source=orders");

    }

?>