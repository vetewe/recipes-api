<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Resep</title>
</head>

<body>
    <h3>Daftar resep</h3>
    <a href="<?= base_url('resep/create') ?>"><button>Tambah</button></a>
    <br>
    <?php
    foreach ($list as $dt) {
        echo $dt['id'] . ' - 
            <a href="' . base_url('resep/preview/') . $dt['id'] . '">' . $dt['name'] . '</a> - 
            ' . $dt['ingredients'] . ' - 
            ' . $dt['instructions'] . ' -
            ' . $dt['cookTimeMinutes'] . ' -
            ' . $dt['cuisine'] . ' -
            ' . $dt['caloriesPerServing'] . ' -
            ' . $dt['image'] . ' -
            ' . $dt['rating'] . ' -
            ' . $dt['mealType'] . ' -
            <a href="' . base_url('resep/edit/') . $dt['id'] . '">Edit</a> &nbsp
            <a href="' . base_url('resep/delete/') . $dt['id'] . '" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus ?\')">Delete</a><br>';
    }
    ?>
</body>

</html>