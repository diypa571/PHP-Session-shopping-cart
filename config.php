<?php
/*
 * Author: Diyar Parwana
 * Date: 10 April, 2022
 */


Class Products
{
// a private  reference for the json file
private $dataFile ='assets/db.json';

// The default __Construct
public function __Construct()
{
	 return define("DATA_SOURCE", $this->dataFile);
}


// This function will get the data from the json file and return it as php array
public function getData() {
	// Check if file exist
	if (!file_exists(__DIR__ . "/" . DATA_SOURCE)) {
	// Not exist.. create one
	$dataInit = [
	'theProducts' => [],
	];

	//  A file put function to write to the file
	file_put_contents(__DIR__ . "/" . DATA_SOURCE, json_encode($dataInit, JSON_PRETTY_PRINT));
	}
	// json decode the file and return it
	return json_decode(file_get_contents(__DIR__ . "/" . DATA_SOURCE), true);
} //



// This function is for add items
// For this session variables will be used
public function addCart() {
  //
	   $cartElem = & $_SESSION['cart'][$_POST['productIndex']];
	   if (!isset($cartElem)) {
	     $cartElem = 0;
	   }

	  $cartElem++;

}

// This function will remove the items from the list...

public function deleteCart() {
	unset($_SESSION['cart'][$_POST['remove']]);
}



}


?>
