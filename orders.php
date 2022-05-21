<?php
session_start();
$_SESSION['cart'] = $_SESSION['cart'] ?? [];

include("models/config.php"); // Klassen inkluderas
$objProducts = new Products(); // Ett objekt skapas
$products = $objProducts->getData()['products'];



if (isset($_POST['remove'])) {
$objProducts->deleteCart();
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


<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
<form  method="post">
<div class="row justify-content-center my-5">

<?php foreach ($_SESSION['cart'] as $productIndex => $amount) { ?>
<?php $product = $products[$productIndex];
$varTotolt = 0;
$varTotolt += $amount * $product['price'];
?>
<div class="col-12 col-sm-12 col-md-6 col-lg-4 my-3">
<div class="card mb-3">
<div class="row g-0">

<div class="col-md-8">
<div class="card-body">
<div class="row">
<div class="col-6">
<img src="assets/<?php echo $product['image_path'] ?>" class="card-img-top">
<h5 class="card-title"><?php echo $product['name'] ?></h5>
</div>
<div class="col-6">
<button class="btn bgfblue ftn fwhite rounded-pill" type="submit" name="remove" value="<?php echo $productIndex ?>">Remove <i class="fa-solid fa-trash"></i></button>
</div>
</div>
<p class="card-text"><small class="text-muted"><?php echo $product['price'] . "  :-" . $product['currency'];  ?></small></p>
<input class="form-control" type="number" placeholder="amount" value="<?php echo $amount ?>" name="<?php echo $productIndex ?>" readonly>
</div>
</div>
<div class="card-footer">
Price:  <strong><?php echo  $amount * $product['price']  . " ".  $product['currency']; ?></strong>
</div>
</div>
</div>
</div>
<?php

}

?>
</div>

</section>








<section class="container text-center"
<div class="row my-3">
<?php

if(isset($varTotolt)) {
echo "Total price to pay: " . $varTotolt . " kr" ;
}

 ?>
</div>
</section>


</form>








<?php } else { ?>




  <section class="container text-center"
<h1><a href="index.php">You have no orders yet!!!!</a></h1>
  </div>
  </section>


<?php } ?>
</div>
</body>
</html>
