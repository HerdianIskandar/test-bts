<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['checklist_id', 'name', 'status'];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['checklist'] ?? false, fn($query, $checklist) => $query->where('checklist_id', $checklist->id));

        $query->when($filters['todo'] ?? false, fn($query, $todo) => $query->where('id', $todo->id));
    }
}
