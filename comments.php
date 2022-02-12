<!-- Comments section-->
<?php
if (isset($_GET['id']) && isset($_SESSION['username']) && isset($_POST['comment']) && isset($_POST['content'])) {
    $post_id = $_GET['id'];
    $username = $_SESSION['username'];
    $content = $_POST['content'];
    $query = "INSERT INTO `comments`(`post_id`, `username`, `comment_content`) VALUES($post_id, $username, $content)";
    if ($result = mysqli_query($connection, $query)) {
        header("location: recipe-post.php?id=$post_id&error=none");
        exit();
    } else {
        header("location: recipe-post.php?id=$post_id&error=error");
        exit();
    }
}
?>
<section>
    <div class="card bg-light">
        <div class="card-body">
            <!-- Comment form-->
            <form class="mb-4" action="recipe-post.php" method="post">
                <textarea class="form-control" rows="3" placeholder="Kaži nam da li ti se recept svideo i podeli iskustvo sa nama!" name="content"></textarea>
                <input type="submit" value="Dodaj komentar" name="comment" class="bg-primary text-white rounded-pill p-1 my-3 fw-bold">
            </form>
            <!-- comment -->
            <?php
            $query = "SELECT * FROM `comments` WHERE `post_id`=$post_id";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);
            if ($count == 0) {
                echo "<h3>Budite prvi koji će da ostavi komentar!</h3>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $username = $row['username'];
                    $comment_content = $row['comment_content'];
                    echo "<div class=\"d-flex\">
                            <div class=\"ms-3\">
                                <div class=\"fw-bold\">$username</div>
                                $comment_content
                            </div>
                        </div>";
                }
            }
            ?>
        </div>
    </div>
</section>