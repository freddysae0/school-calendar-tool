<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_subject', 'subject_id', 'group_id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    protected $fillable = [
        'name',
    ];


    use HasFactory;
}
