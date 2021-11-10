<?php

$db = mysqli_connect("localhost", "root", "", "belajar-php-mysql");

if (!isset($_GET["id"])) :
    header("location: index.php", true, 301);
    exit();
endif;

$id = $_GET["id"];

$query = "SELECT * FROM movies WHERE id = '$id' ";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    $id         = htmlspecialchars($_POST["id"]);
    $judul      = htmlspecialchars($_POST["judul"]);
    $slug       = str_replace(" ", "-", $judul);
    $deskripsi  = htmlspecialchars($_POST["deskripsi"]);
    $direktur   = htmlspecialchars($_POST["direktur"]);
    $genre      = htmlspecialchars($_POST["genre"]);
    $tahun      = htmlspecialchars($_POST["tahun"]);
    $cover      = htmlspecialchars($_POST["cover"]);
    $tgl_rilis  = htmlspecialchars($_POST["tgl_rilis"]);

    $query = "UPDATE movies 
                SET
                judul       = '$judul',
                slug        = '$slug',
                deskripsi   = '$deskripsi',
                direktur    = '$direktur',
                genre       = '$genre',
                tahun       = '$tahun',
                cover       = '$cover',
                tgl_rilis   = '$tgl_rilis'
                WHERE id = '$id'";
    mysqli_query($db, $query) or die(mysqli_error($db));

    if (mysqli_affected_rows($db) > 0) :
        echo '
        <script>
            alert("Data movies berhasil terupdate");
            window.location.href = "index.php";
        </script>';
    endif;

    // header("location: index.php", true, 301);
    // exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Movie</title>
    <style>
        body {
            font-family: arial;
            margin: 10%;
        }

        .input-group {
            margin: 10px 0;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Form Edit Data Movie</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="input-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" value="<?= $row['judul'] ?>" required>
        </div>
        <div class="input-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="23" required><?= $row['deskripsi'] ?></textarea>

        </div>
        <div class="input-group">
            <label for="direktur">Direktur</label>
            <input type="text" name="direktur" id="direktur" value="<?= $row['direktur'] ?>" required>
        </div>
        <div class="input-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= $row['genre'] ?>" required>
        </div>
        <div class="input-group">
            <label for="tahun">Tahun</label>
            <input type="text" name="tahun" id="tahun" value="<?= $row['tahun'] ?>" required>
        </div>
        <div class="input-group">
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" value="<?= $row['cover'] ?>" required>
        </div>
        <div class="input-group">
            <label for="tgl_rilis">Tanggal Rilis</label>
            <input type="date" name="tgl_rilis" id="tgl_rilis" value="<?= $row['tgl_rilis'] ?>" required>
        </div>
        <div class="input-group">
            <button type="submit" name="submit">Update</button>
            <a href="index.php">Kembali</a>
        </div>
    </form>

</body>

</html>