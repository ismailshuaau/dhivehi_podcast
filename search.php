<?php 
include("includes/includedFiles.php");

if (isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
} else {
	$term = "";
}
?>

<div class="search-container">
	<h4>Search</h4>
	<input type="text" class="search" value="<?php echo $term ?>" placeholder="Artist, Album or Song">
</div>