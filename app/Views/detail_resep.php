<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Detail : {{ $recipes['name'] }}</title>
</head>

<body>
    <div>
        <h5><?= $recipes['name'] ?></h5>
        <img src="<?= base_url('/img/') . $recipes['image'] ?>" alt="">
        <p>Ingredients : <?= $recipes['ingredients'] ?></p>
        <p>Instructions : <?= $recipes['instructions'] ?></p>
        <p>Cook Time Minutes : <?= $recipes['cookTimeMinutes'] ?> min</p>
        <p>Cuisine : <?= $recipes['cuisine'] ?></p>
        <p>Calories Per Serving : <?= $recipes['caloriesPerServing'] ?> kcl</p>
        <p>Rating : <?= $recipes['rating'] ?></p>
        <p>Meal Type : <?= $recipes['mealType'] ?></p>
    </div>
</body>

</html>