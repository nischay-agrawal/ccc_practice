<?php
    class Product {
        private $productId;
        private $name;
        private $price;

        public function __construct($productId, $name, $price) {
            $this->productId = $productId;
            $this->name = $name;
            $this->price = $price;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getName() {
            return $this->name;
        }
    }

    class ShoppingCart {
        private $items = [];

        public function addItem(Product $product) {
            $this->items[] = $product;
        }

        public function calculateTotal() {
            $total = 0;
            foreach ($this->items as $item) {
                $total += $item->getPrice();
            }
            return $total;
        }

        public function displayItems() {
            echo "------------------------------------------------------------------------\n<br>";
            echo "Shopping Cart Items:\n<br>";
            echo "------------------------------------------------------------------------\n<br>";
            foreach ($this->items as $item) {
                echo "{$item->getName()} - {$item->getPrice()} USD \n<br>";
            }
            echo "------------------------------------------------------------------------\n<br>";
        }
    }

    // Create product objects
    $product1 = new Product(1, "Laptop", 800);
    $product2 = new Product(2, "Smartphone", 400);
    $product3 = new Product(3, "TV", 600);

    // Create a shopping cart object
    $cart = new ShoppingCart();

    // Add products to the cart
    $cart->addItem($product1);
    $cart->addItem($product2);
    $cart->addItem($product3);

    // Display items and calculate total price
    $cart->displayItems();
    echo "Total Price: " . $cart->calculateTotal() . " USD";
?>
