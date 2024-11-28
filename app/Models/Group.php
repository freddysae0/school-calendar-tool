<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = str_replace(' ', '-', $value);
    }

    /**
     * The subjects that belong to the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'group_subject', 'group_id', 'subject_id')->withPivot('day', 'turn')->orderByPivot('turn'); // Incluye los campos adicionales de la tabla pivote

    }
    /**
     * Get the school that owns the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    protected $fillable = [
        "name",
        "code",
        "school_id",
        "is_active",
        "prompt"
    ];


    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;
}
