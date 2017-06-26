<?php

namespace App\Filter;

use App\QueryFilter;

class HashtagsFilter extends QueryFilter
{
    public function input()
    {
        return parent::filters();
    }

    public function name($input = '')
    {
        if (!$input) {
            return $this;
        }

        return $this->builder->where('name', 'LIKE', '%' . $input . '%');
    }
}
