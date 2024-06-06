<?php

namespace Hi\PhpOop\Models;

use Hi\PhpOop\Commons\Model;

class Gallery extends Model
{
    protected string $tableName = 'product_galleries';

    public function destroy($id)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('product_id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }
}
