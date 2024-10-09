<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    // TODO Generate constructor with all properties of the class
    // TODO Generate getters and setters of properties

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
    public function getProduct(): Product
    {
        return $this->product;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }
    public function increaseQuantity()
    {   
        //TODO $quantity must be increased by one.
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if ($this->product->getAvailableQuantity() > $this->quantity) {
            $this->quantity++;    
        }else {
            throw new Exception("Product available quantity is {$this->product->getAvailableQuantity()}");
        }
    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1
        if ($this->quantity > 1) {
            $this->quantity--;    
        }else {
            throw new Exception("Product can't be lass than 1.");
        }
    }
}