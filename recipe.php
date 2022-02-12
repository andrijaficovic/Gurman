<?php
$query = "SELECT * FROM posts ORDER BY `post_date` DESC;";
$select_all_posts_query = mysqli_query($connection, $query);

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
            <div class="text-center" style="max-width:100%; max-height:200px; height:100%; object-fit:cover">
                <img class="card-img-top" src="<?php echo $post_image ?>" style="max-width:100%; max-height:200px; height:100%; object-fit:cover" alt="post image" />
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
<?php } ?>