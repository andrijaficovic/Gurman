<?php include('./includes/header.php'); ?>
<section class="py-5" id="recepti">
    <div class="container px-5 my-3">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
            </div>
        </div>
        <div class="row gx-5">
            <?php
            global $connection;
            $cat_id = $_GET['id'];
            $cat_title = $_GET['content'];
            $query = "SELECT * FROM `posts` WHERE `post_category_id` = $cat_id";
            $select_all = mysqli_query($connection, $query);
            echo "<div class=\"row gx-5 justify-content-center pt-3\">
            <div class=\"col-lg-8 col-xl-6\">
                <div class=\"text-center\">
                    <h2 class=\"fw-bolder display-4\">$cat_title</h2>
                </div>
            </div>
        </div>";
            while ($row = mysqli_fetch_assoc($select_all)) :
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_sastojci = $row['post_sastojci'];
                $post_priprema = $row['post_priprema'];
                $post_category_id = $row['post_category_id'];
                //prikaz datuma
                $array = explode("-", $post_date);
                $day = $array[2];
                $month = $array[1];
                $year = $array[0];
                $date = $day . '.' . $month . '.' . $year;
            ?>
                <div class="col-lg-4 mb-5 py-3 px-3">
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
                            <a class="text-decoration-none link-dark stretched-link" href="./recipe-post.php?id=<?php echo $post_id ?>">
                                <h5 class="card-title mb-3 fw-bold fs-3"><?php echo $post_title ?></h5>
                            </a>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</section>
<?php include('./includes/footer.php'); ?>