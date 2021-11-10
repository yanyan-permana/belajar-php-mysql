<?php

$db = mysqli_connect("localhost", "root", "", "belajar-php-mysql");

$result = mysqli_query($db, "SELECT * FROM movies");

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$movies = $data;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Movies</title>
    <style>
        body {
            font-family: arial;
            margin: 10%;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: left;
        }

        tr th,
        tr td {
            padding: 8px;
        }
    </style>
</head>

<body>

    <h2>Daftar Movies Populer 2021</h2>
    <a href="tambah.php">Tambah Data</a>
    <table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($movies as $movie) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $movie["judul"] ?></td>
                <td><?= $movie["genre"] ?></td>
                <td><?= $movie["tahun"] ?></td>
                <td><img src="thumbnail/<?= $movie['cover'] ?>" alt="joker"></td>
                <td><a href="detail.php?id=<?= $movie['id'] ?>">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>