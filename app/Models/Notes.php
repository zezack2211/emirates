<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'name',
    ];

    /**
     * العلاقة مع الطلب
     */
    public function application()
    {
        return $this->belongsTo(Applications::class);
    }
}
