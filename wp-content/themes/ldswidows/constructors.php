<?php 


class Product 
{ 

    public $name = 'soap'; 
    public $price = 20;  # cents

    public function __construct($name, $price)
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
$product = new Product('Soap', 100); 
print $product->name; 