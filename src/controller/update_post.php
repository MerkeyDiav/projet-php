<?php
$title_post = $_POST["title_post"];
$content_post = $_POST["content_post"];

if (isset($_FILES["post_picture"]["name"])){
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
}

$sql = empty($_FILES["post_picture"]["name"]) ?
    "UPDATE posts SET title_post = $title_post, content_post = $content_post" :
    "UPDATE posts SET title_post = $title_post, content_post = $content_post, post_picture = $post_picture";

if ($conn->query($sql)){
    header("location: post.php");
    exit;
}

