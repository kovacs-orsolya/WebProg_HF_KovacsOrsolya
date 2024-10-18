<?php


class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    // TODO Generate constructor with all properties of the class
    // TODO Generate getters and setters of properties

    public function __construct(int $id, string $title, float $price, int $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getPrice():float
    {
        return $this->price;
    }
    public function getAvailableQuantity(): int
    {
        return $this->availableQuantity;
    }
    public function setID(int $id): void
    {
        $this->id = $id;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function setAvailableQuantity(int $availableQuantity): void
    {
        $this->availableQuantity = $availableQuantity;
    }
    public function __toString(): string
    {
        return sprintf("ID: %d, Name: %s, Price: %.2f, Quantity: %d", $this->id, $this->title, $this->price, $this->availableQuantity);
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        //TODO Implement method
        $items = $cart->getItems();
        foreach ($items as $item) {
            if ($item->getProduct()->getId() === $this->getId()) {
                $newQuantity = $item->getQuantity() + $quantity;
                if ($newQuantity > $this->getAvailableQuantity()) {
                    $newQuantity = $this->getAvailableQuantity();
                }
                $item->setQuantity($newQuantity);
                return $item;
            }
        }
        if ($quantity > $this->getAvailableQuantity()) {
            $quantity = $this->getAvailableQuantity();
        }
        $cartItem = new CartItem($this, $quantity);
        $items[] = $cartItem;
        $cart->setItems($items);
        
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method
        $items = $cart->getItems();
        $isFound = false;
        foreach ($items as $key => $value) {
            if ($value->getProduct()->getId() === $this->getId()) {
                $isFound = true;
                unset($items[$key]);
                $cart->setItems($items);
            }
        }
        if (!$isFound) {
            echo "Product not found in cart.<br>";
        }    
    }
}