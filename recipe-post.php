<?php include('includes/header.php') ?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE `post_id` = $id";
$select_all = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_all)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_sastojci = $row['post_sastojci'];
    $post_priprema = $row['post_priprema'];
    $post_tags = $row['post_tags'];
    $post_category_id = $row['post_category_id'];
    //prikaz datuma
    $array = explode("-", $post_date);
    $day = $array[2];
    $month = $array[1];
    $year = $array[0];
    $date = $day . '.' . $month . '.' . $year;
}
$tagovi = explode(" ", $post_tags);
foreach ($tagovi as $tag) {
    echo "";
}
?>
<!-- Page Content-->
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-12">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1 text-center"><?php echo $post_title ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2"><?php echo $date ?></div>
                        <!-- Post categories-->
                        <?php showTag($post_tags) ?>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4 text-center"><img class="img-fluid rounded" src="<?php echo $post_image ?>" alt="..." style="max-width: 60%;" /></figure>
                    <!-- Post content-->
                    <div class="d-flex align-items-center mb-3 px-3 pt-2">
                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                        <div class="small">
                            <div class="fw-bold"><?php echo $post_author ?></div>
                            <div class="text-muted"><?php echo $date ?></div>
                        </div>
                    </div>
                    <section class="mb-5">
                        <h2 class="fw-bolder mb-4 mt-5">Sastojci:</h2>
                        <p class="fs-5 mb-4"><?php echo $post_sastojci ?></p>
                    </section>
                    <section class="mb-5">
                        <h2 class="fw-bolder mb-4 mt-5">Priprema:</h2>
                        <p class="fs-5 mb-4"><?php echo $post_priprema ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <?php
                if (isset($_POST['content'])) {
                    $content = $_POST['content'];
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                    }else{
                        $username = "Anonimus";
                    }
                    writeComment($id, $username, $content);
                }
                ?>
                 <section>
                    <div class="card bg-light">
                        <div class="card-body">
                             <form class="mb-4" action="" method="post">
                                <textarea class="form-control" rows="3" placeholder="Kaži nam da li ti se recept svideo i podeli iskustvo sa nama!" name="content"></textarea>
                                <input type="submit" value="Dodaj komentar" name="comment" class="bg-primary text-white rounded-pill p-1 my-3 fw-bold">
                            </form>
                         </div>
                    </div>
                </section> 
            </div>
        </div>
    </div>
</section>
</main>
<?php include('includes/footer.php'); ?>