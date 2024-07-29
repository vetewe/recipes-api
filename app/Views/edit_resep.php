<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
</head>

<body>
    <h5>Form Edit Resep</h5>
    <form action="<?= base_url('resep/edit/') . $recipes['id'] ?>" method="POST">
        <?= csrf_field() ?>
        <table>
            <tr>
                <td>Name :</td>
                <td>
                    <input type="text" name="name" value="<?= $recipes['name'] ?>" placeholder="Ketikkan Nama Makanan">
                </td>
            </tr>
            <tr>
                <td>Ingredients :</td>
                <td>
                    <input type="text" name="ingredients" value="<?= $recipes['ingredients'] ?>" placeholder="Ketikkan Bahan Makanan">
                </td>
            </tr>
            <tr>
                <td>Instructions :</td>
                <td>
                    <input type="text" name="instructions" value="<?= $recipes['instructions'] ?>" placeholder="Ketikkan Perintah Memasak">
                </td>
            </tr>
            <tr>
                <td>Cook Time Minutes :</td>
                <td>
                    <input type="text" name="cookTimeMinutes" value="<?= $recipes['cookTimeMinutes'] ?>" placeholder="Ketikkan Durasi Memasak">
                </td>
            </tr>
            <tr>
                <td>Cuisine :</td>
                <td>
                    <input type="text" name="cuisine" value="<?= $recipes['cuisine'] ?>" placeholder="Ketikkan Gaya Memasak">
                </td>
            </tr>
            <tr>
                <td>Calories PerServing :</td>
                <td>
                    <input type="text" name="caloriesPerServing" value="<?= $recipes['caloriesPerServing'] ?>" placeholder="Ketikkan Kalori Per Porsi">
                </td>
            </tr>
            <tr>
                <td>Image :</td>
                <td>
                    <input type="text" name="image" value="<?= $recipes['image'] ?>" placeholder="Tambah Gambar">
                </td>
            </tr>
            <tr>
                <td>Rating :</td>
                <td>
                    <input type="text" name="rating" value="<?= $recipes['rating'] ?>" placeholder="Ketikkan Penilian">
                </td>
            </tr>
            <tr>
                <td>Meal Type :</td>
                <td>
                    <input type="text" name="mealType" value="<?= $recipes['mealType'] ?>" placeholder="Ketikkan Jenis Makanan">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="<?= base_url() ?>"><button>Kembali</button></a>
                    <input type="submit" name="simpan" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>