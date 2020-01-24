<?php
require 'includes/functions.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$photo=findOneById($id);
if ($photo === false)
    redirectionErreur404();

?>
<!doctype html>
<html lang="fr">
<?php include('includes/head.php'); ?>
<body id="detail">
<?php include('includes/header.php'); ?>
    <main>
        <div id="hero">
            <!-- Picture title -->
            <h1><?php echo $photo['title']?></h1>
        </div>
        <div class="container">
            <figure>
                <!-- Picture file (large) -->
                <img src="images/large/<?php echo $photo['slug']?>.jpg" alt="Image large file"/>
                <!-- Picture date and location -->
                <figcaption><?php echo $photo['date']?> - <?php echo $photo['location'] ?></figcaption>
            </figure>
            <!-- Picture description  !!!!!javascript:void(0)!!!!!-->
            <p><?php echo $photo['description'] ?></p>
            <p id="pager">
                <a href="detail.php?id=<?php if ($id!=1){ 
                                                echo $id-1;
                                                } else {
                                                    echo $id=1;}?>" class="btn">
                    Previous shot
                </a>
                <a href="detail.php?id=<?php if ($id!=16){ 
                                                echo $id+1;
                                                } else {
                                                    echo $id=16;}?>" class="btn">
                    Next shot
                </a>
            </p>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>
</html>
