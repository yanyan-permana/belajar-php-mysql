<?php

$db = mysqli_connect("localhost", "root", "", "belajar-php-mysql");

if (!isset($_GET["id"])) :
    header("location: index.php", true, 301);
    exit();
endif;

$id = $_GET["id"];

$query = "DELETE FROM movies WHERE id = '$id' ";

mysqli_query($db, $query) or die(mysqli_error($db));

echo '  
    <script>
        alert("Data movies berhasil terhapus");
        window.location.href = "index.php";
    </script>
';
