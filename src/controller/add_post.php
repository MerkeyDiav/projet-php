<?php
$title_post = $_POST["title_post"];
$content_post = $_POST["content_post"];
$author = USER_NAME;
if (move_uploaded_file($_FILES['bulletin']['tmp_name'], $bulletin)) {
    echo 'Fichier enregistré avec succès.';
} else {
    echo 'Une erreur s\'est produite lors de l\'enregistrement du fichier.';
}

$post_folder_path = '../../assets/images/posts/';
createFolder($post_folder_path);
$extension = pathinfo($_FILES['post_picture']['name'], PATHINFO_EXTENSION);
$new_name = $title_post . date("YmdHis") . '.' . $extension;
$post_picture = $post_folder_path . $new_name;
if (move_uploaded_file($_FILES['post_picture']['tmp_name'], $post_picture)) {
    echo 'Fichier enregistré avec succès.';
} else {
    echo 'Une erreur s\'est produite lors de l\'enregistrement du fichier.';
}

$sql = "insert into `posts`(title_post, content_post, auteur) VALUES(:title_post, :content_post, :author)";

if ($stmt = $conn->prepare($sql)){
    $stmt->bindParam(":title_post", $param_title_post, PDO::PARAM_STR);
    $stmt->bindParam(":content_post", $param_content_post, PDO::PARAM_STR);
    $stmt->bindParam(":author", $param_author, PDO::PARAM_STR);

    $param_author = $author;
    $param_content_post = $content_post;
    $param_title_post = $title_post;
    if ($stmt->execute()) {
        header("location: post_list.php");
    } else{
        echo "something went wrong";
    }
    unset($stmt);
}

