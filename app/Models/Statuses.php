<?php

namespace App\Models;

use App\Enums\Enums\StatusEnum as EnumsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusEnum;

class Statuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'status',

    ];

    protected $casts = [
        'status' => EnumsStatusEnum::class, // لكي يدعم enum
    ];

    /**
     * علاقة الحالة مع الطلب
     */
    public function application()
    {
        return $this->belongsTo(Applications::class);
    }
}
