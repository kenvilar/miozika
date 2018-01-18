<?php include 'includes/layouts/header.php'; ?>

<h1 class="heading-big">You Might Also Like</h1>
<div class="gridViewContainer">

    <?php
    $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 5");

    while ($row = mysqli_fetch_assoc($albumQuery)) :
        $artWorkPath = $row['artworkPath'];
        $title = $row['title'];
        $id = $row['id'];

        echo '<div class="gridViewItem">';
        echo "    <a href='album.php?id={$id}'>";
        echo "        <img src='{$artWorkPath}' alt='image'>";
        echo '        <div class="gridViewInfo">';
        echo "            <div class='name'>{$title}</div>";
        echo '        </div>';
        echo '    </a>';
        echo '</div>';
    endwhile;
    ?>

</div>

<?php include 'includes/layouts/footer.php'; ?>
