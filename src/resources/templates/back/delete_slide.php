<?php

    if (isset($_GET['id'])) {
        $query = query("DELETE FROM slides WHERE slide_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>Slide Deleted</div>");
        redirect("index.php?source=slides");

    }else {

        redirect("index.php?source=slides");

    }

?>