<?php
include 'includes/layouts/header.php';
if (isset($_GET['id'])) :
    $albumId = $_GET['id'];
else :
    header('Location: index.php');
endif;

$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");

while ($row = mysqli_fetch_assoc($albumQuery)) {
    echo $row['title'] . '<br>';
}
?>



<?php include 'includes/layouts/footer.php'; ?>
