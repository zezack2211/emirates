<?php

namespace App\Enums\Enums;


enum StatusEnum: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'قيد المراجعة',
            self::Accepted => 'مقبول',
            self::Rejected => 'مرفوض',
        };
    }
}
