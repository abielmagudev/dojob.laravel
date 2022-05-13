<?php

namespace App\Ahex\Zkaffold\Domain;

trait HasExistence
{
    public function isReal()
    {
        return isset($this->id);
    }

    public function isUnreal()
    {
        return ! $this->isReal();
    }
}
