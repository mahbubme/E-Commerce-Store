<?php

    if (isset($_GET['id'])) {
        $query = query("DELETE FROM reports WHERE report_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>Report Deleted</div>");
        redirect("index.php?source=reports");

    }else {

        redirect("index.php?source=reports");

    }

?>