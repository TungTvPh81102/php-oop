<?php

namespace Hi\PhpOop\Models;

use Hi\PhpOop\Commons\Model;

class CartDetail extends Model
{
    protected string $tableName = 'cart_details';

    public function findByCartIDAndProductID($cartID, $productID)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('cart_id = ?')
            ->setParameter(0, $cartID)
            ->andWhere('product_id = ?')
            ->setParameter(1, $productID)
            ->fetchAssociative();
    }

    public function deleteByCartID($cardID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id = ?')
            ->setParameter(0, $cardID)
            ->executeQuery();
    }

    public function updateByProductID($cartID, $cartIDProductID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id = ?')
            ->setParameter(0, $cartID)
            ->andWhere('product_id = ?')
            ->setParameter(1, $cartIDProductID)
            ->executeQuery();
    }

    public function deleteByCartIdAndProductID($cartID, $cartIDProductID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id = ?')
            ->setParameter(0, $cartID)
            ->andWhere('product_id = ?')
            ->setParameter(1, $cartIDProductID)
            ->executeQuery();
    }

    public function updateByCartIdAndProductId($cartID, $productID, $quantity)
    {
        $query = $this->queryBuilder->update($this->tableName);

        $query->set('quantity', '?')
            ->setParameter(0, $quantity)
            ->where('cart_id = ?')
            ->setParameter(1, $cartID)
            ->andWhere('product_id = ?')
            ->setParameter(2, $productID)
            ->executeQuery();
    }
    
}
