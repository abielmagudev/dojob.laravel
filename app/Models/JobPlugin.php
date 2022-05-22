<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JobPlugin extends Pivot
{
    public function isEnabled()
    {
        return (bool) $this->is_enabled;
    }
}
