<?php include('includes/header.php') ?>
<!-- Header-->
<header class="py-5" style="background-color:#f4a261">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <!-- col-lg-8 col-xl-7 col-xxl-6 -->
                <div class="my-5 text-center">
                    <!-- ovde je bio text-start-6 -->
                    <h1 class="display-3 fw-bolder text-white mb-2">Gurman.rs</h1>
                    <p class="lead fw-normal text-white mb-4">Vaš vodič kroz oazu recepta, do punog stomaka.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mb-3">
                        <!-- SEARCH RECEPTI -->
                        <form class="d-flex" action="#search" method="post">
                            <input class="form-control me-2" type="search" placeholder="Šta vam se jede danas?" aria-label="Search" name="search">
                            <button class="btn btn-outline-dark text-white" type="submit" style="background-color:#264653" name="submit">Traži</button>
                        </form>
                    </div>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <!-- ovde je bio justify-content-xl-start-->
                        <a class="btn btn-lg px-4 me-sm-3 text-white" href="#pronadjeni_recepti" style="background-color:#264653">Pronađeni rezultati</a>
                    </div>
                </div>
            </div>
            <!--<div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="./images/pocetna_index.jpg" alt="hrana" /></div>-->
        </div>
    </div>
</header>
<!-- Sekcija za recepte-->
<?php
$search = $_GET['q'];
$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%'";
$search_query = mysqli_query($connection, $query);
if (!$search_query) {
    die("QUERY FAILED" . mysqli_error($connection));
}

$count = mysqli_num_rows($search_query);
if ($count == 0) {
    $exists = false;
    echo "<h1 class=\"text-center display-2 \">Nema rezultata za Vašu pretragu.</h1>";
} else {
    $exists = true;
    while ($row = mysqli_fetch_assoc($search_query)) {
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
    }
}
if ($exists) {
?>

    <div class="col-lg-4 mb-5 py-5 px-5" id="pronadjeni_recepti">
        <div class="card h-100 shadow border-0">
            <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex align-items-center mb-3 px-3 pt-2">
                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                    <div class="small">
                        <div class="fw-bold"><?php echo $post_author ?></div>
                        <div class="text-muted"><?php echo $date ?></div>
                    </div>
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
            </div>
        </div>
    </div>
    </main>
<?php } ?>
<?php include('includes/footer.php'); ?>