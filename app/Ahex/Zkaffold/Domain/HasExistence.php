<?php

namespace App\Ahex\Zkaffold\Domain;

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
