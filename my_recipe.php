<?php include('includes/header.php'); ?>
<section class="py-5" id="recepti">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder mb-5">Moji recepti</h2>
                    <?php
                    if(isset($_GET['msg'])){ 
                    $msg = $_GET["msg"];
                    if($msg = "deleted_post"){
                        echo "<h2 class=\"fw-bolder text-white bg-success mb-5\">Uspešno ste izbrisali recept.</h2>";
                    }else if($msg = "error"){
                        echo "<h2 class=\"fw-bolder text-white bg-danger mb-5\">Greška pri brisanju recepta. Molimo, pokušajte kasnije.</h2>";    
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <?php
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            }
            $query = "SELECT * FROM `posts` WHERE `post_user_id`=$user_id;";
            $select_all_posts_query = mysqli_query($connection, $query);

            $count = mysqli_num_rows($select_all_posts_query);
            if ($count == 0) {
                $exists = false;
                echo "<h2 class=\"text-center\">Još uvek niste postavili nijedan recept.</h2>";
            } else {
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_category_id = $row['post_category_id'];

                    //prikaz datuma
                    $array = explode("-", $post_date);
                    $day = $array[2];
                    $month = $array[1];
                    $year = $array[0];
                    $date = $day . '.' . $month . '.' . $year;
            ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <div class="d-flex align-items-center mb-3 px-3 pt-2">
                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                <div class="small">
                                    <div class="fw-bold"><?php echo $post_author ?></div>
                                    <div class="text-muted"><?php echo $date ?></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <img class="card-img-top" src="<?php echo $post_image ?>" style="max-width:100%; max-height:200px" alt="post image" />
                            </div>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php showCatTitle($post_category_id) ?></div>
                                <a class="text-decoration-none link-dark stretched-link" href="recipe-post.php?id=<?php echo $post_id ?>">
                                    <h5 class="card-title mb-3 fw-bold fs-3"><?php echo $post_title ?></h5>
                                </a>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>
<?php include('includes/footer.php'); ?>