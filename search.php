<?php

include 'includes/includedFiles.php';

if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

?>

<div class="search-container">
    <h4>Search for an artist, album or song</h4>
    <input type="search" class="search-input" value="<?php echo $term; ?>" placeholder="Start typing...">
</div>

<script>
	$(function () {
		var timer;

		$('.search-input').keyup(function () {
			clearTimeout(timer);

			timer = setTimeout(function () {
				var val = $('.search-input').val();
				openPage('search.php?term=' + val);
			}, 2000);
		});
	});
</script>
