<?php
$db = mysqli_connect("localhost", "root", "", "belajar-php-mysql");

if (!isset($_GET["id"])) :
    header("location: index.php", true, 301);
    exit();
endif;

$id = $_GET["id"];

$result = mysqli_query($db, "SELECT * FROM movies WHERE id = '$id' ") or die(mysqli_error($db));

$movie = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Movies</title>
    <style>
        body {
            font-family: arial;
            margin: 10%;
        }
    </style>
</head>

<body>

    <h2><?= $movie['judul'] ?></h2>
    <em><?= $movie['genre'] ?>, <?= $movie['tahun'] ?></em>
    <p><?= $movie['deskripsi'] ?></p>

    <ul>
        <li>Director : <?= $movie['direktur'] ?></li>
        <li>Tanggal Rilis : <?= $movie['tgl_rilis'] ?></li>
    </ul>

    <a href="index.php">Kembali</a>
    <a href="edit.php?id=<?= $movie['id'] ?>">Edit</a>
    <a href="hapus.php?id=<?= $movie['id'] ?>" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>

</body>

</html>