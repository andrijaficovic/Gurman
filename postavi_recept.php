<?php include('includes/header.php'); ?>

<body style="background-color:#264653;">
    <section class="my-5 mx-5">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-10 col-lg-10 col-xl-9 col-xs-12">
                        <div class="card" style="border-radius: 1.5rem;">
                            <div class="card-body px-3 py-5" style="background-color:white;border-radius: 1rem;">
                                <h2 class="fw-bold mb-2 text-uppercase text-center text-dark">Dodajte recept</h2>
                                <form action="postavi_recept.check.php" method="post" enctype="multipart/form-data">
                                    <?php if (isset($_GET['error'])) {
                                        if ($_GET['error'] == "emptyinput") { //nije uradjeno
                                            echo "<p class='bg-danger text-white text-center fw-bold'>Morate popuniti sva polja za registraciju!<p>";
                                        } else if ($_GET['error'] == "bigfile") {
                                            echo "<p class='bg-danger text-white text-center fw-bold'>Veličina fajla ne sme biti veća od 10 MB</p>";
                                        } else if ($_GET['error'] == "wrongext") {
                                            echo "<p class='bg-danger text-white text-center fw-bold'>Jedine validne ekstenzije fajla su JPEG, JPG i PNG</p>";
                                        } else if ($_GET['error'] == "error") {
                                            echo "<p class='bg-danger text-white text-center fw-bold'>Greška, pokušajte kasnije</p>";
                                        } else if ($_GET['error'] == "statementfailed") {
                                            echo "<p class='bg-danger text-white text-center fw-bold'>Greška, pokušajte kasnije.</p>";
                                        } else if ($_GET['error'] == "none") {
                                            echo "<h3 class=\"bg-success text-center fw-bold text-white\">Uspešno ste postavili Vaš recept!</h3>";
                                        }
                                    } ?>
                                    <!-- Naziv recepta -->
                                    <div class="form-outline mb-4">
                                        <label for="form3Example1cg" class="fw-bold">Naziv recepta</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Naziv recepta" name="recipeName" required />
                                    </div>
                                    <!-- Kategorija -->
                                    <div class="form-outline mb-4">
                                        <select id="form3Example1cg" class="form-control form-control-lg" name="recipeCategory" required>
                                            <option value="">Odaberite kategoriju</option>
                                            <?php getRecipeCategories(); ?>
                                        </select>
                                    </div>
                                    <!-- Tagovi -->
                                    <div class="form-outline mb-4">
                                        <label for="form3Example1cg" class="fw-bold">Tagovi</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Tagovi" name="recipeTags" required />
                                    </div>
                                    <!-- Slika -->
                                    <div class="form-outline mb-4">
                                        <label for="form3Example1cg" class="fw-bold">Izaberite fotografiju</label>
                                        <input type="file" id="form3Example1cg" class="form-control form-control-lg" name="recipeImg" required />
                                    </div>
                                    <!-- Sastojci -->
                                    <div class="form-outline mb-4">
                                        <label for="form3Example1cg" class="fw-bold">Sastojci</label>
                                        <textarea name="recipeSastojci" id="" cols="30" rows="10" id="form3Example3cg" class="form-control form-control-lg" placeholder="Sastojci"></textarea>
                                    </div>
                                    <!-- Priprema -->
                                    <div class="form-outline mb-4">
                                        <label for="form3Example1cg" class="fw-bold">Pripremni postupak</label>
                                        <textarea name="recipePriprema" id="" cols="30" rows="10" id="form3Example3cg" class="form-control form-control-lg" placeholder="Priprema"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-light btn-lg px-5" style="background-color:#2a9d8f" type="submit" name="submit">Postavite recept</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include('includes/footer.php'); ?>