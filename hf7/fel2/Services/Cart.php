<?php
namespace fel2\Services;

use fel2\Models\CartItem;
use fel2\Models\Product;

class Cart {
    private array $items = [];
    private const SESSION_NAME = 'cart';

    public function __construct() {
        $this->loadFromSESSION();
    }

    public function addItem(Product $product): void {
        $productId = $product->getId();
        if (isset($this->items[$productId])) {
            $this->items[$productId]->incrementQuantity();
        } else {
            $this->items[$productId] = new CartItem($product);
        }
        $this->saveToSESSION();
    }

    public function removeItem(int $productId): void {
        if (isset($this->items[$productId])) {
            $this->items[$productId]->decrementQuantity();
            if ($this->items[$productId]->getQuantity() === 0) {
                unset($this->items[$productId]);
            }
            $this->saveToSESSION();
        }
    }

    public function getItems(): array {
        return $this->items;
    }

    public function getTotalPrice(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    private function loadFromSESSION(): void {
        if (isset($_SESSION[self::SESSION_NAME])) {
            $cartData = json_decode($_SESSION[self::SESSION_NAME], true);
            foreach ($cartData as $productId => $itemData) {
                $product = new Product($productId, $itemData['name'], $itemData['price']);
                $this->items[$productId] = new CartItem($product, $itemData['quantity']);
            }
        }
    }

    private function saveToSESSION(): void {
        $cartData = [];
        foreach ($this->items as $productId => $item) {
            $cartData[$productId] = [
                'name' => $item->getProduct()->getName(),
                'price' => $item->getProduct()->getPrice(),
                'quantity' => $item->getQuantity()
            ];
        }
        $_SESSION[self::SESSION_NAME] = json_encode($cartData);
    }
}