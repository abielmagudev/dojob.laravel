<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JobPlugin extends Pivot
{
    public function api()
    {
        return $this->hasMany(ApiPlugin::class, 'id', 'plugin_id');
    }
}
