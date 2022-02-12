<?php include('includes/db.php'); ?>
<?php include('includes/functions.php'); ?>
<?php
session_start();

if (isset($_POST['submit']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    //Prikupljanje podataka iz forme
    $recipeName = $_POST['recipeName'];
    $recipeImg = $_FILES['recipeImg'];
    $recipeSastojci = $_POST['recipeSastojci'];
    $recipePriprema = $_POST['recipePriprema'];
    $recipeCategory = $_POST['recipeCategory']; //vraca id kategorije
    $recipeCategoryName = getCategoryName($recipeCategory);
    $recipeTags = $_POST['recipeTags'];

    //Opcije za files img
    $recipeImgName = $_FILES['recipeImg']['name'];
    $recipeImgTmpName = $_FILES['recipeImg']['tmp_name'];
    $recipeImgSize = $_FILES['recipeImg']['size'];
    $recipeImgError = $_FILES['recipeImg']['error'];
    $recipeImgType = $_FILES['recipeImg']['type'];

    $imgExtension = explode('.', $recipeImgName);
    //Uzima vrednost sa kraja niza $imgExtension
    $imgExtensionActual = strtolower(end($imgExtension));

    $allowedExtensions = ['jpeg', 'jpg', 'png'];
    if (in_array($imgExtensionActual, $allowedExtensions)) {
        if ($recipeImgError == 0) {
            if ($recipeImgSize < 10000000) {
                $newRecipeImgName = $id . "." . $imgExtensionActual;
                $imgDestination = "images/recepti/" . $newRecipeImgName;
                move_uploaded_file($recipeImgTmpName, $imgDestination);
                header("location: ./edit_recipe.php?error=none");
            } else {
                header("location: ./edit_recipe.php?error=bigfile");
            }
        } else {
            header("location: ./edit_recipe.php?error=error");
        }
    } else {
        header("location: ./edit_recipe.php?error=wrongext");
        exit();
    }

    //provera za prazne inpute i validacija
    updateRecipe($recipeCategory, $recipeName, $recipeSastojci, $recipePriprema, $imgDestination, $recipeTags, $id);
    if (emptyInputRecipe($recipeName, $recipeCategory, $recipetags, $recipeImg, $recipeSastojci, $recipePriprema) !== false);
}
?>