<?php

namespace Hi\PhpOop\Models;

use Hi\PhpOop\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function getAll()
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.name',
                'p.sku',
                'p.price_regular',
                'p.discount',
                'p.thumbnail',
                'p.status',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name',
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
    }

    public function findById($id)
    {
        return $this->queryBuilder
            ->select(
                'p.*',
                'GROUP_CONCAT(g.image) as g_image',
                'c.name as c_name',
                'c.id as c_id'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->innerJoin('p', 'product_galleries', 'g', 'g.product_id = p.id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function getTreding()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where("status = 'publish' ")
            ->andWhere('is_trending = 1')
            ->orderBy('id', 'DESC')
            ->fetchAllAssociative();
    }
}
