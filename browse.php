<?php

include 'includes/includedFiles.php';

?>

    <h1 class="heading-big">You Might Also Like</h1>
    <div class="gridViewContainer">

        <?php
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

        while ($row = mysqli_fetch_assoc($albumQuery)) :
            $artWorkPath = $row['artworkPath'];
            $title = $row['title'];
            $id = $row['id'];
            ?>

            <div class="gridViewItem">
                <span role="link" tabindex="0" onclick="openPage('album.php?id=<?php echo $id; ?>')">
                    <img src="<?php echo $artWorkPath; ?>" alt="image">
                    <div class="gridViewInfo">
                        <div class="name"><?php echo $title; ?></div>
                    </div>
                </span>
            </div>

            <?php
        endwhile;
        ?>

    </div>

<?php
//include 'includes/layouts/footer.php';
