<?php 
/*
 * Template Name: creating
 */

/* other PHP code here */

/* class Product 
{ 

    public $name = 'soap'; 
    public $price = 20;  # cents

    public function priceAsCurrency($divisor = 1, $currencySymbol = '$')
    { 
        $priceAsCurrency = $this->price / $divisor; 

        return $currencySymbol . $priceAsCurrency; 

    }
}

$product = new Product();
print $product->priceAsCurrency(). PHP_EOL; 
*/

class Product2 
{ 

    public $name;
    public $price;

    public function __construct($name = 'Soap', $price = 100)
    {   
      $this->name = $name; 
      $this->price = $price; 

    }

    public function priceAsCurrency($divisor = 1, $currencySymbol = '$')
    { 
        $priceAsCurrency = $this->price / $divisor; 

        return $currencySymbol . $priceAsCurrency; 

    }
}
$product = new Product2(price: 200); 
print $product->name . PHP_EOL;
print $product->price . PHP_EOL;