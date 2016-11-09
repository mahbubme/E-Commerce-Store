<?php

    if (isset($_GET['id'])) {

    	$query_find_image = query("SELECT slide_image FROM slides WHERE slide_id = " . escape_string($_GET['id']) . " ");
    	confirm($query_find_image);

    	$row = fetch_array($query_find_image);
    	$target_path = UPLOAD_DIRECTORY . DS . $row['slide_image'];

    	unlink($target_path);

		$query = query("DELETE FROM slides WHERE slide_id = ". escape_string($_GET['id']) ." ");
        confirm($query);

        set_message("<div class='alert alert-danger text-center' role='alert'>Slide Deleted</div>");
        redirect("index.php?source=slides");

    }else {

        redirect("index.php?source=slides");

    }

?>