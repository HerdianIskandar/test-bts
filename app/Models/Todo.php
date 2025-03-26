<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['checklist_id', 'name', 'status'];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
}
