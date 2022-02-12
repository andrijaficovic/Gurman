<?php include('./includes/header.php') ?>
<!-- Header-->
<header class="py-5" style="background-color:#f4a261">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <!-- col-lg-8 col-xl-7 col-xxl-6 -->
                <div class="my-5 text-center">
                    <!-- ovde je bio text-start-6 -->
                    <img src="./images/gurman.png" alt="" class="img-fluid mb-2">
                    <!-- <h1 class="display-3 fw-bolder text-white mb-2">Gurman.rs</h1> -->
                    <p class="lead fw-normal text-white mb-4 fw-bold">Vaš vodič kroz oazu recepta, do punog stomaka.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mb-3">
                        <!-- SEARCH RECEPTI -->
                        <form class="d-flex" action="./search.php" method="post">
                            <input class="form-control me-2" type="search" placeholder="Šta vam se jede danas?" aria-label="Search" name="search">
                            <button class="btn btn-outline-dark text-white" type="submit" style="background-color:#264653" name="submit">Traži</button>
                        </form>
                    </div>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <!-- ovde je bio justify-content-xl-start-->
                        <a class="btn btn-lg px-4 me-sm-3 text-white" href="#recepti" style="background-color:#264653">Idi na recepte</a>
                    </div>
                </div>
            </div>
            <!--<div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="./images/pocetna_index.jpg" alt="hrana" /></div>-->
        </div>
    </div>
</header>
<!-- Testimonial section-->
<?php include('./testimonial.php'); ?>
<?php include('./recipes.php'); ?>
</main>
<?php include('./includes/footer.php'); ?>