<?php

namespace App\Models\Extensions;

trait HasExistence
{
    public function isReal(string $property = 'id')
    {
        return isset($this->$property);
    }

    public function isUnreal(string $property = 'id')
    {
        return ! $this->isReal($property);
    }
}
