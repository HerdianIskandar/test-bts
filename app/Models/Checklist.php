<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Model
{
    protected $table = 'checklist';

    protected $fillable = ['name'];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }
}
