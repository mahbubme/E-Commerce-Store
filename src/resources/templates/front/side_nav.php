<div class="col-md-3">
	<p class="lead">Shop Name</p>
	<ul class="list-group">
		<?php 
			
			$query = "SELECT * FROM categories";
			$send_query = mysqli_query($connection, $query);

			if (!$send_query) {
				die("QUERY FAILED" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_array($send_query)) {
	  			echo "<li class='list-group-item'>{$row['cat_title']}</li>";
			}

		?>
	</ul>
</div>