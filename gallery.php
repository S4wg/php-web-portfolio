<?php
require 'includes/functions.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$photo=findOneById($id);
$limit=6;
$offset=0;
if ($id==7) {
    $limit=11;
    $offset=7;
} elseif ($id==13) {
    $limit=15;
    $offset=13;
}

$selection=findPaged($limit,$offset);
if ($photo === false)
    redirectionErreur404();
?>
<!doctype html>
<html lang="fr">
<?php include('includes/head.php'); ?>
<body id="gallery">
<?php include('includes/header.php'); ?>
    <main>
        <div id="hero">
            <h1>My greatest shots</h1>
        </div>
        <div class="container">
            <div id="pictures">
                <?php foreach ($selection as $select) { ?>

                <a href="detail.php?id=<?php echo $select['id'];?>" title="Picture <?php echo $select['id']?>">
                    <img src="images/medium/<?php echo $select['slug']?>.jpg" alt="Picture 1">
                    <br>Picture <?php echo $select['id'];?>
                </a>
                <?php }?>
            </div>
            <p id="pager">
                <a href="gallery.php?id=<?php
                if ($id==7)
                    echo 1;
                else if ($id==13)
                    echo 7;
                else if ($id==1)
                    echo 13;
                ?>" class="btn">
                    Previous page
                </a>
                <a href="gallery.php?id=<?php
                if ($id==13)
                    echo 1;
                else
                    echo $id+=6;
                    ?>" class="btn">
                    Next page
                </a>
            </p>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>
</html>
