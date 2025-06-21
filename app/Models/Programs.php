<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
    ];

    /**
     * العلاقة مع القسم (Department)
     */
    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
    public function applications()
    {
        return $this->hasMany(Applications::class);
    }
}
