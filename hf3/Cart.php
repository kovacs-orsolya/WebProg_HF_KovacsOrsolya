<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }
    public function getItems(): array
    {
        return $this->items;
    }
    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method
        foreach ($this->items as $value) {
            if ($value->getProduct()->getId() === $product->getId()) {
                $newQuantity = $value->getQuantity() + $quantity;
                if ($newQuantity > $product->getAvailableQuantity()) {
                    $newQuantity = $product->getAvailableQuantity();
                }
                $value->setQuantity($newQuantity);
                return $value;
            }
        }
        if ($quantity > $product->getAvailableQuantity()) {
            $quantity = $product->getAvailableQuantity();
        }
        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
        $isFound = false;
        foreach ($this->items as $key => $value) {
            if ($value->getProduct()->getId() === $product->getId()) {
                $isFound = true;
                unset($this->items[$key]);
            }
            count($this->items);
        }
        if (!$isFound) {
            echo "Product not found in cart.<br>";
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        //TODO Implement method
        $quantity = 0;
        foreach ($this->items as $item) {
            $quantity += $item->getQuantity();
        }
        return $quantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->getProduct()->getPrice()*$item->getQuantity();
        }
        return $sum;
    }
}