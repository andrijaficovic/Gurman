<?php include('./includes/header.php'); ?>

<body style="background-color:#264653">
    <section class="my-5 mx-1 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 1.5rem;">
                            <div class="card-body px-3 py-5" style="background-color:white;border-radius: 1rem;">
                                <h2 class="fw-bold mb-2 text-uppercase text-center text-dark">Napravite Vaš nalog</h2>
                                <p class="text-dark fw-bolder mb-5 text-center">Molimo, unesite Vaše podatke za registraciju</p>
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == "emptyinput") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Morate popuniti sva polja za registraciju!<p>";
                                    } else if ($_GET['error'] == "invalidusername") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Odaberite validno korisničko ime</p>";
                                    } else if ($_GET['error'] == "invalidemail") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Odaberite validnu email adresu</p>";
                                    } else if ($_GET['error'] == "passwordsdontmatch") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Lozinke se razlikuju!</p>";
                                    } else if ($_GET['error'] == "statementfailed") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Pokušajte kasnije.</p>";
                                    } else if ($_GET['error'] == "usernametaken") {
                                        echo "<p class=\"bg-danger text-white text-center fw-bold\">Odabrano korisničko ime je već zauzeto!</p>";
                                    } else if ($_GET['error'] == "none") {
                                        echo "<h3 class=\"bg-success text-center fw-bold text-white\">Uspešno ste se registrovali!</h3>";
                                    }
                                }
                                ?>
                                <form action="register.check.php" method="post">
                                    <!-- Ime -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Ime" name="name" required />
                                    </div>
                                    <!-- Prezime -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Prezime" name="surname" required />
                                    </div>
                                    <!-- Username -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Korisničko ime" name="username" required />
                                    </div>
                                    <!-- Email -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email" name="email" required />
                                    </div>
                                    <!-- Lozinka -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Lozinka" name="password" required minlength="6" maxlength="12" />
                                    </div>
                                    <!-- Ponovi lozinku -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Ponovite lozinku" name="r_password" required />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-light btn-lg px-5" style="background-color:#2a9d8f" type="submit" name="submit">Registruj se</button>
                                    </div>
                                    <p class="text-center text-dark fw-bold mt-5 mb-0">Već ste registrovani? <a href="./login.php" class="text-dark-50 fw-bold"><u>Prijavite se</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include('./includes/footer.php'); ?>