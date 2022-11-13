<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuidTrait{

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function getKeyType()
    {
        return 'string';
    }
}

?>
