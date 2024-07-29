<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
</head>

<body>
    <h5>Form Tambah Resep</h5>
    <form action="<?= base_url('resep/create') ?>" method="POST">
        <?= csrf_field() ?>
        <table>
            <tr>
                <td>Name :</td>
                <td>
                    <input type="text" name="name" value="" placeholder="Ketikkan Nama Makanan">
                </td>
            </tr>
            <tr>
                <td>Ingredients :</td>
                <td>
                    <input type="text" name="ingredients" value="" placeholder="Ketikkan Bahan Makanan">
                </td>
            </tr>
            <tr>
                <td>Instructions :</td>
                <td>
                    <input type="text" name="instructions" value="" placeholder="Ketikkan Perintah Memasak">
                </td>
            </tr>
            <tr>
                <td>Cook Time Minutes :</td>
                <td>
                    <input type="text" name="cookTimeMinutes" value="" placeholder="Ketikkan Durasi Memasak">
                </td>
            </tr>
            <tr>
                <td>Cuisine :</td>
                <td>
                    <input type="text" name="cuisine" value="" placeholder="Ketikkan Gaya Memasak">
                </td>
            </tr>
            <tr>
                <td>Calories PerServing :</td>
                <td>
                    <input type="text" name="caloriesPerServing" value="" placeholder="Ketikkan Kalori Per Porsi">
                </td>
            </tr>
            <tr>
                <td>Image :</td>
                <td>
                    <input type="text" name="image" value="" placeholder="Tambah Gambar">
                </td>
            </tr>
            <tr>
                <td>Rating :</td>
                <td>
                    <input type="text" name="rating" value="" placeholder="Ketikkan Penilian">
                </td>
            </tr>
            <tr>
                <td>Meal Type :</td>
                <td>
                    <input type="text" name="mealType" value="" placeholder="Ketikkan Jenis Makanan">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="simpan" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>