<?php
$id = $_GET["id_post"];


$sql = "DELETE FROM posts WHERE id_post = $id";

if ($conn->query($sql)){
    header("location: posts.php");
    exit;
} else {
    echo "Something went wrong";
}