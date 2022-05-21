<?php
session_start();

$_SESSION['cart'] = $_SESSION['cart'] ?? [];


include("models/config.php"); // Klassen inkluderas
$objProducts = new Products(); // Ett objekt skapas
$products = $objProducts->getData()['products'];


if(isset($_POST['add']))
{
$objProducts->addCart();
}


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/ftn.css" rel="stylesheet">
<title>PHP-Session shopping cart</title>
</head>

<body class="bgfgrey">


<section class="container text-center">

<h1 class="my-3"> PHP-SESSION SHOPPING CART </h1>

</section>

<section class="container text-center">
<div class="accordion" id="accordionExample">
<div class="row justify-content-center">
<div class="col-6">

<div class="accordion-item">
<h2 class="accordion-header" id="headingOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<i class="fa-solid fa-basket-shopping ftn30 mx-4"></i>   <span class="ftn30"> <?php echo count($_SESSION['cart']); ?> </span>
</button>
</h2>
<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
<div class="accordion-body">

<ul class="list-group list-group-flush">
<?php foreach ($_SESSION['cart'] as $key => $price) { ?>
<li class="list-group-item">
<strong> <?php echo $products[$key]['name'] . "</strong> |  price:<strong> " . $price . "</strong>"; ?>
<?php } ?>
</li>
</ul>
<a href="orders.php" class="btn btn-success rounded-pill my-3">Orders</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<section class="container text-center">
<div class="row justify-content-center">

  <?php foreach ($products as $key => $product) { ?>
<div class="col-12 col-sm-12 col-md-6 col-lg-4 my-3">
    <div class="card">
      <img src="assets/<?php echo $product['image_path'] ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo $product['name'] . " " . "| " . $product['currency'] . $product['price'] ?></h5>
         <form method="post" action="">
          <input type="hidden" name="productIndex" value="<?php echo $key ?>">
        <button class="btn bgfblue ftn fwhite my-4 rounded-pill" name="add" type="submit">Add to cart</button>
        </form>
      </div>
    </div>
  </div>
<?php  } ?>

</div>
</div>
</section>


<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
