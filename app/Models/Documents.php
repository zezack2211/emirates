<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithFileUploads;

class Documents extends Model
{
    use HasFactory;
    use WithFileUploads;
    protected $fillable = [
        'application_id',
        'national_id',
        'certificate',
        'photo',
    ];

    /**
     * العلاقة مع طلب التقديم
     */
    public function application()
    {
        return $this->belongsTo(Applications::class);
    }
}
