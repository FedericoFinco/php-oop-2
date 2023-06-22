<?php 
require __DIR__ . "/Product.php";
require __DIR__ . "/Category.php";
require __DIR__ . "/Food.php";
require __DIR__ . "/Toy.php";

$cani = new Category("cani", "<i class=\"fa-solid fa-dog\"></i>");
$gatti = new Category("gatti", "<i class=\"fa-solid fa-cat\"></i>");

// $prodotto1 = new Product(
//     $cani,
//     "prodtto prova",
//     "15",
//     "3",
//     "6",
// );

$prodotto1 = new Food(
    $cani,
    "prodtto prova",
    "15",
    "3",
    "6",
);

$prodotto2 = new Toy(
    $gatti,
    "prodotto prova due",
    "25",
    "4",
    "2",
);

$prodotto2->setColor("Color red");

$prodotto1->setWeight("2kg");

$prodotto1->setStars(5);
$prodotto1->setStars(3);
$prodotto1->setStars(3);

$products = [$prodotto1, $prodotto2];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <title>Document</title>
</head>
<body>
    
    <main>
        <h1>prodotti</h1>
        <?php foreach ($products as $product) { ?>
        <h1>
            <?= $product->name ?>
        </h1>
        <img src="<?= $product->img ?>" alt="">
        <p>per : <?= $product->categories->name ?> <?=$product->categories->icon?></p>
        <p> prezzo : <?= $product->getPrice() . '&euro;' ?></p>
        <p> stelle : <?= $product->getStars() ?> su 5 </p>
        <p> recensioni: <?= $product->reviews ?></p>
        <p> dettagli: 
            <?php 
                if (method_exists($product, 'getWeight')) {
                echo $product->getWeight();
                } 
                else if (method_exists($product, 'getColor')) {
                echo $product->getColor();
                } 
                else if (method_exists($product, 'getSize')) {
                echo $product->getSize();
                } else {
                    echo "<small> nothing to show </small>";
                }
            ?></p>
        <form action="" method="GET">
        <select name="stars" id="">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
        </select>
        <!-- pusha solo l'ultimo valore e non tiene memoria. non c'è il binding sulla voce stelle sopra. -->
        <button>vota come stelle <?php $prodotto1->setStars (intval($_GET["stars"])) ?></button>
        </form>
        <?php var_dump($prodotto1->starsArray) ?>
        <?php } ?>
    </main>
</body>
</html>