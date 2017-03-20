<?php

namespace App\Filter;

use App\QueryFilter;

class UsersFilter extends QueryFilter
{
    public function input()
    {
        return parent::filters();
    }

    public function name($input = '')
    {
        if (! $input) {
            return $this;
        }

        return $this->builder->where('name', 'LIKE', '%' . $input . '%');
    }

    public function email($input = '')
    {
        if (! $input) {
            return $this;
        }

        return $this->builder->where('email', 'LIKE', '%' . $input . '%');
    }

    public function phone_number($input = '')
    {
        if (! $input) {
            return $this;
        }

        return $this->builder->where('phone_number', 'LIKE', '%' . $input . '%');
    }
}
