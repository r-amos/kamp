<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Integration extends Model
{
    public function accessTokens(): HasMany
    {
        return $this->hasMany(AccessToken::class);
    }
}
