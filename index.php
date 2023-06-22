<?php 
require __DIR__ . "/Product.php";
require __DIR__ . "/Category.php";
require __DIR__ . "/Food.php";
require __DIR__ . "/Toy.php";
require __DIR__ . "/Collar.php";

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
    [$cani],
    "prodtto prova",
    "15",
    "3",
    "6",
);

$prodotto4 = new Food(
    [$cani],
    "prodtto prova",
    "15",
    "3",
    "6",
);

$prodotto2 = new Toy(
    [$gatti],
    "prodotto prova due",
    "25",
    "4",
    "2",
);

$prodotto3= new Collar(
    [$gatti,$cani],
    "prodotto prova tre",
    "12",
    "5",
    "15",
);

$prodotto3->setSize("M = 25cm");
$prodotto3->setImg("https://assets.hermes.com/is/image/hermesproduct/medor-dog-collar--079813CJ3O-front-1-300-0-800-800_g.jpg");
$prodotto3->setStock(20);


$prodotto2->setColor("Color red");
$prodotto2->setImg("https://m.media-amazon.com/images/I/51Lck44D7dL.jpg");
$prodotto2->setStock(30, "year");


// $prodotto1->setWeight(101);
$prodotto1->setImg("https://www.foodpet.it/wp-content/uploads/2022/02/luscious_lamb_pork_2160x.jpg");
$prodotto2->setStock(50, "day");


// $prodotto4->setWeight("-2kg");
// $prodotto4->setImg("https://www.foodpet.it/wp-content/uploads/2022/02/luscious_lamb_pork_2160x.jpg");

$prodotto1->setStars(5);
$prodotto1->setStars(3);
$prodotto1->setStars(3);

$products = [$prodotto1, $prodotto2, $prodotto3];
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
        <p>per : <?= $product->getCathegoryAsString() ?> <?=$product->getCathegoryIconAsString()?></p>
        <p> prezzo :
            <?= $product->getPrice() . '&euro;' ?>
            <!-- <?php 
            try {
                echo $product->getPrice();
            } catch (RangeException $e) {
                echo "ciao " . $e->getMessage(); //non entra mai qua anche se il get message me lo fa di range exception
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
            ?> -->
        </p>
        <p> stelle : <?= $product->getStars() ?> su 5 </p>
        <p> recensioni: <?= $product->reviews ?></p>
        <p> dettagli: 
            <?php 
                if (method_exists($product, 'getWeight')) {
                    // try {
                    //     echo $product->getWeight();
                    // } catch (RangeException $e) {
                    //     echo "Peso non disponibile: " . $e->getMessage();
                    // } catch (Exception $e) {
                    //     echo "Peso non disponibile: " . $e->getMessage();
                    // } 
                    // echo $product->getWeight();
                    try {
                        echo $product->getWeight();
                    }catch (RangeException $e) {
                        echo "attenzione " . $e->getMessage();
                    }catch (Exception $e) {
                        echo "Peso non disponibile: " . $e->getMessage();
                    }
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
            <p>stock : <?= $product->getStock() ?></p>
        <form action="" method="GET">
        <select name="stars" id="">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
        </select>
        <!-- pusha solo l'ultimo valore e non tiene memoria. non c'è il binding sulla voce stelle sopra. -->
        <!-- <button>vota come stelle <?php $prodotto1->setStars (intval($_GET["stars"])) ?></button> -->
        <button>vota come stelle </button>
        </form>
        <?php var_dump($prodotto1->starsArray) ?>
        <?php var_dump($prodotto1) ?>
        <?php } ?>
    </main>
</body>
</html>