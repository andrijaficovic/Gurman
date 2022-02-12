<?php
function showAllCategories() {
    global $connection;
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class=\"dropdown-item\" href=\"./recepti.php?id=$cat_id&content=$cat_title\">$cat_title</a></li>";
    }
}

function showTag($string){
    $tagovi = explode(" ", $string);
    foreach ($tagovi as $tag) {
        echo "<a class=\"badge bg-primary text-decoration-none link-light mx-1\" href=\"./search2.php?q=$tag\">$tag</a>";
    }
}

//prikaz recepata po kategoriji
function showRecepti()
{
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
    while ($row = mysqli_fetch_assoc($select_all)
    ) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_sastojci = $row['post_sastojci'];
        $post_priprema = $row['post_priprema'];
        $post_category_id = $row['post_category_id'];
        include_once('./blank_recipe.php');
    }
}

function showCatTitle($post_category_id)
{
    global $connection;
    $catTitleQuery = "SELECT `cat_title` FROM `categories` WHERE `cat_id` = $post_category_id";
    $catTitle = mysqli_query($connection, $catTitleQuery);
    while ($row = mysqli_fetch_assoc($catTitle)) {
        $category_title = $row['cat_title'];
    }
    echo $category_title;
}

function emptyInputRegister($name, $surname, $username, $email, $password, $r_password){
    if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password) || empty($r_password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputRecipe($recipeName, $recipeCategory, $recipeTags, $recipeImg, $recipeSastojci, $recipePriprema){
    if (empty($recipeName) || empty($recipeCategory) || empty($recipeTags) || empty($recipeImg) || empty($recipeSastojci) || empty($recipePriprema)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
    //regex provera za username da li je validan ili ne
    if (!preg_match('/^[a-zA-Z0-9\d_]{2,20}$/i', $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $r_password){
    if($password !== $r_password){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function usernameExists($connection, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $statement = $connection->prepare($sql);
    if(!mysqli_stmt_prepare($statement,$sql)){
        header("location: ./register.php?error=statementfailed");
        exit();
    }
    $statement->bind_param('ss',$username, $email);
    $statement->execute();

    $resultData = mysqli_stmt_get_result($statement);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    $statement->close();
}

function createUser($connection, $name, $surname, $username, $email, $password){
    $sql = "INSERT INTO users(`name`, `surname`, `username`, `email`, `password`) VALUES(?, ?, ?, ?, ?);";
    $statement = $connection->prepare($sql);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ./register.php?error=statementfailed");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $statement->bind_param('sssss', $name, $surname, $username, $email, $hashedPassword);
    $statement->execute();
    $statement->close();
    header('location: ./register.php?error=none');
    exit();
}

function emptyInputLogin($username, $password){
    if(empty($username) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($connection, $username, $password){
    $usernameExists = usernameExists($connection, $username, $username);

    if($usernameExists == false){
        header("location: login.php?error=wronglogin");
        exit();
    }

    $hashedPassword = $usernameExists['password'];
    $checkPassword = password_verify($password,$hashedPassword);

    if($checkPassword === false){
        header("location: login.php?error=wrongpassword");
     }else if($checkPassword === true){
         session_start();
         $_SESSION["user_id"] = $usernameExists['user_id'];
         $_SESSION["username"] = $usernameExists['username'];
         $_SESSION["name"] = $usernameExists['name'];
         $_SESSION["surname"] = $usernameExists['surname'];
         header("location: index.php");
         exit();
     }
}

function dateToBase(){
    $dan = date("d");
    $mesec = date("m");
    $godina = date("Y");
    return $godina . "-" . $mesec . "-" . $dan;
}

function datePost($post_date){
    $array = explode("-",$post_date);
    $day = $array[2];
    $month = $array[1];
    $year = $array[0];
    return $day.'.'.$month.'.'.$year;
}

function imgNameId(){
    global $connection;
    $query = "SELECT MAX(`post_id`) FROM `posts`;";
    $result = mysqli_query($connection, $query);
    if($row = mysqli_fetch_array($result)){
        $max_id = $row[0];
    }
    return ($max_id + 1);
}

function getRecipeCategories(){
    global $connection;
    $query = "SELECT `cat_id`, `cat_title` FROM `categories`;";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<option value=\"$cat_id\">$cat_title</option>";
    }
}

function getCategoryName($recipeCategory){
    //upit 
    global $connection;
    $query = "SELECT `cat_title` FROM `categories` WHERE `cat_id` = ?;";
    $statement = $connection->prepare($query);
    if (!mysqli_stmt_prepare($statement, $query)) {
        header("location: ./postavi_recept.php?error=statementfailed");
        exit();
    }
    $statement->bind_param("i",$recipeCategory);
    $statement->execute();
    //uzmem rezultat kao string i vratim

}

function createRecipe($recipeCategory, $recipeName, $recipeSastojci, $recipePriprema, $imgDestination, $recipeTags){
    global $connection;
    $query = "INSERT INTO `posts`(`post_category_id`, `post_user_id`, `post_title`, `post_author`, `post_sastojci`, `post_priprema`, `post_date`, `post_image`, `post_tags`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($query);
    if (!mysqli_stmt_prepare($statement, $query)) {
        header("location: ./postavi_recept.php?error=statementfailed");
        exit();
    }
    $post_category_id = $recipeCategory;
    $post_user_id = $_SESSION["user_id"];
    $post_title = $recipeName;
    $post_author = getAuthorSession();
    $post_sastojci = $recipeSastojci;
    $post_priprema = $recipePriprema;
    $post_date = dateToBase();
    $post_image = $imgDestination;
    $post_tags = $recipeTags;
    $statement->bind_param("iisssssss",$post_category_id, $post_user_id, $post_title, $post_author, $post_sastojci, $post_priprema, $post_date, $post_image, $post_tags);
    $statement->execute();
    header("location: ./postavi_recept.php?error=none");
    exit();
}

function getAuthorSession(){
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['surname'])){
        $name = $_SESSION['name'];
        $surname = $_SESSION['surname'];
        $full_name = $name." ".$surname;
    }
    return $full_name;
}

// function updateRecipe($recipeCategory, $recipeName, $recipeSastojci, $recipePriprema, $imgDestination, $recipeTags, $id)
// {
//     global $connection;
//     $query = "UPDATE `posts` SET `post_category_id`=?, `post_user_id`=?, `post_title`=?, `post_author`=?, `post_sastojci`=?, `post_priprema`=?, `post_date`=?, `post_image`=?, `post_tags`=? WHERE `post_id`=$id";
//     $statement = $connection->prepare($query);
//     if (!mysqli_stmt_prepare($statement, $query)) {
//         header("location: ./postavi_recept.php?error=statementfailed");
//         exit();
//     }
//     $post_category_id = $recipeCategory;
//     $post_user_id = $_SESSION["user_id"];
//     $post_title = $recipeName;
//     $post_author = getAuthorSession();
//     $post_sastojci = $recipeSastojci;
//     $post_priprema = $recipePriprema;
//     $post_date = dateToBase();
//     $post_image = $imgDestination;
//     $post_tags = $recipeTags;
//     $statement->bind_param("iisssssss", $post_category_id, $post_user_id, $post_title, $post_author, $post_sastojci, $post_priprema, $post_date, $post_image, $post_tags);
//     $statement->execute();
//     header("location: ./edit_recipe.php?error=none");
//     exit();
// }
function writeComment($post_id, $username, $comment_content){
    global $connection;
    $query = "INSERT INTO `comments` (`post_id`, `username`, `comment_content`) VALUES ($post_id, '$username', '$comment_content');";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $smsg = "Komentar je uspešno upisan.";
    } else {
        echo "Komentar je neuspešno upisan";
    }
}

function pagination(){
    global $connection;
    $sql = 'SELECT * FROM `posts`';
    $result = mysqli_query($connection, $sql);
    $number_of_results = mysqli_num_rows($result);
    $results_per_page = 9;
    if(isset($_GET)){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    
    $this_page_first_result = ($page - 1) * $results_per_page;

    $sql2 = "SELECT * FROM `posts` LIMIT $this_page_first_result,$results_per_page";
    $result2 = mysqli_query($connection, $sql2);
    
    $number_of_pages = ceil($number_of_results / $results_per_page);
    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo "<a href='index.php?page=$page>" . $page . "|</a>";
    }
}
?>