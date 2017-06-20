<?php

namespace App\Filter;

use App\QueryFilter;

class ContactsFilter extends QueryFilter
{
    public function input()
    {
        return parent::filters();
    }

    public function email($input = '')
    {
        if (!$input) {
            return $this;
        }

        return $this->builder->where('email', 'LIKE', '%' . $input . '%')->orderBy('id', 'DESC');
    }
}
