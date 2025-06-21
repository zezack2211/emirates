<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    /**
     * العلاقة مع المستخدم (الموظف أو المدير)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function programs()
    {

        return $this->hasMany(Programs::class, 'department_id'); // ✅ تأكدي أن الاسم مفرد وصحيح
    }
}
