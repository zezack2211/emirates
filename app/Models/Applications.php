<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'realtive_name',
        'relative_phone',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        // إذا كان اسم العمود مختلفاً مثلاً 'program_id'
        return $this->belongsTo(Programs::class, 'program_id');
    }
    public function documents()
    {
        return $this->hasMany(Documents::class, 'application_id'); // استخدم العمود الصحيح
    }


    public function notes()
    {
        return $this->hasMany(Notes::class, 'application_id');
    }
    public function statuses()
    {
        return $this->hasMany(Statuses::class, 'application_id'); // ✅ التصحيح هنا
    }
    public function latestStatus()
    {
        // HasOne(RelatedModel, foreignKey = 'application_id', localKey = 'id')
        return $this->hasOne(Statuses::class, 'application_id', 'id')->latestOfMany();
    }
    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}
