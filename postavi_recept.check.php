<?php include('includes/db.php'); ?>
<?php include('includes/functions.php'); ?>
<?php
session_start();

if(isset($_POST['submit'])){
    $imgNameId = imgNameId();

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

    $allowedExtensions = ['jpeg','jpg','png'];
    if(in_array($imgExtensionActual, $allowedExtensions)){
        if($recipeImgError == 0){
            if($recipeImgSize < 10000000){
                $newRecipeImgName = $imgNameId.".".$imgExtensionActual;
                $imgDestination = "images/recepti/".$newRecipeImgName;
                move_uploaded_file($recipeImgTmpName, $imgDestination);
                header("location: ./postavi_recept.php?error=none");
            }else{
                header("location: ./postavi_recept.php?error=bigfile");    
            }
        }else{
            header("location: ./postavi_recept.php?error=error");    
        }
    }else{
        header("location: ./postavi_recept.php?error=wrongext");
        exit();
    }

    //provera za prazne inpute i validacija
    createRecipe($recipeCategory, $recipeName, $recipeSastojci, $recipePriprema, $imgDestination, $recipeTags);
    if(emptyInputRecipe($recipeName, $recipeCategory, $recipetags, $recipeImg, $recipeSastojci, $recipePriprema) !== false);

}
?>