<?php include('./includes/header.php'); ?>

<body style="background-color:#264653">
    <section class="gradient-custom">
        <div class="container my-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="border-radius: 1.5rem; background-color:white">
                        <div class="card-body px-3 py-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase text-dark">Prijava</h2>
                                <p class="text-dark mb-5 fw-bold">Molimo, unesite Vaše podatke za prijavu</p>
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == "emptyinput") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Morate popuniti sva polja za prijavu!<p>";
                                    } else if ($_GET['error'] == "wronglogin") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Neispravni podaci za prijavu</p>";
                                    } else if ($_GET['error'] == "wrongpassword") {
                                        echo "<p class='bg-danger text-white text-center fw-bold'>Neispravna lozinka!</p>";
                                    }
                                }
                                ?>
                                <form action="login.check.php" method="post">
                                    <!-- Korisnicko ime -->
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg" placeholder="Korisničko ime/Email" name="username" required />
                                    </div>
                                    <!-- Lozinka -->
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Lozinka" name="password" required minlength="6" maxlength="12" />
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Zaboravili ste lozinku?</a></p>
                                    <button class="btn btn-outline-light btn-lg px-5" style="background-color:#2a9d8f" type="submit" name="submit">Prijavi se</button>
                                    <div>
                                        <p class="mt-4 text-dark fw-bold">Zaboravili ste lozinku?<a href="./login-reset.php" class="text-dark-50 fw-bold">Resetuj lozinku</a></p>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0 text-dark fw-bold">Nemate nalog?<a href="./register.php" class="text-dark-50 fw-bold"> Registrujte se</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include('./includes/footer.php'); ?>