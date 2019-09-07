<?php

namespace Crudificator\filter;

class filterNotShowFieldOnForm{
    
    public function __construct() {
        $this->defineFilters();
    }

    public function defineFilters()
    {
        $this->filters = [
            'extra_autoIncrement'
        ];
    }

    public function extra_autoIncrement($field, $value)
    {
        return $field == 'extra' && $value == 'auto_increment';
    }

    public function hasRestriction($key, $value)
    {
        foreach ($this->filters as $functionFilterName) {
            if ($this->$functionFilterName($key, $value) ) {
                return true;
            }
        }
        return false;
    }

}