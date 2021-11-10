<?php

$db = mysqli_connect("localhost", "root", "", "belajar-php-mysql");

if (isset($_POST["submit"])) {
    $judul      = htmlspecialchars($_POST["judul"]);
    $slug       = str_replace(" ", "-", $judul);
    $deskripsi  = htmlspecialchars($_POST["deskripsi"]);
    $direktur   = htmlspecialchars($_POST["direktur"]);
    $genre      = htmlspecialchars($_POST["genre"]);
    $tahun      = htmlspecialchars($_POST["tahun"]);
    $cover      = htmlspecialchars($_POST["cover"]);
    $tgl_rilis  = htmlspecialchars($_POST["tgl_rilis"]);

    $query = "INSERT INTO movies (judul, slug, deskripsi, direktur, genre, tahun, cover, tgl_rilis)
                VALUES ('$judul', '$slug', '$deskripsi', '$direktur', '$genre', '$tahun', '$cover', '$tgl_rilis')";
    mysqli_query($db, $query) or die(mysqli_error($db));

    if (mysqli_affected_rows($db) > 0) :
        echo '
        <script>
            alert("Data movies berhasil tersimpan");
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
    <title>Tambah Data Movie</title>
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

    <h2>Form Tambah Data Movie</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" required>
        </div>
        <div class="input-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="23" required></textarea>

        </div>
        <div class="input-group">
            <label for="direktur">Direktur</label>
            <input type="text" name="direktur" id="direktur" required>
        </div>
        <div class="input-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" required>
        </div>
        <div class="input-group">
            <label for="tahun">Tahun</label>
            <input type="text" name="tahun" id="tahun" required>
        </div>
        <div class="input-group">
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" required>
        </div>
        <div class="input-group">
            <label for="tgl_rilis">Tanggal Rilis</label>
            <input type="date" name="tgl_rilis" id="tgl_rilis" required>
        </div>
        <div class="input-group">
            <button type="submit" name="submit">Simpan</button>
            <a href="index.php">Kembali</a>
        </div>
    </form>

</body>

</html>