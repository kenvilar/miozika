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
    <input type="search" class="search-input" value="<?php echo $term; ?>" placeholder="Start typing..."
           onfocus="var val=this.value; this.value=''; this.value= val;">
</div>

<script>
	$('.search-input').focus();

	$(function () {
		var timer;

		$('.search-input').keyup(function () {
			clearTimeout(timer);

			timer = setTimeout(function () {
				var val = $('.search-input').val();
				openPage('search.php?term=' + val);
			}, 1500);
		});
	});
</script>
