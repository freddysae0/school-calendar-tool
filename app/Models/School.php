<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function groups(){
        return $this->hasMany(Group::class);
    }
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    protected $fillable = [
        'name',
        'link',
        'phone',
        'address',
        'schedule_id',
    ];
    use HasFactory;
}
